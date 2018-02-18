<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Helpers\ImageUpload;
use App\Helpers\Mail;
use \UserQuery;
use \User;
use \Job;
use \JobQuery;
use \JobPayment;
use Slim\Exception\NotFoundException;

class UserController
{
    // takes care of routing all routes in /user/{}/{}/...
    public static function getVars($app)
    {
        return ['logged_in'=>true, 'router'=> $app->router, 'user' => currentUser()];
    }

    public function confirmUser($app)
    {
        $app->get('/confirm', function ($request, $response) use ($app) {
            $user = currentUser();
            // check if has key in url, if so, confirm user and
            // redirect to profile
            $get = $request->getQueryParams();
            if (isset($get['key']) && isset($get['email'])) {
                // trying to confirm account
                $key = $user->getConfirmationKey();
                if ($get['key'] == $key && $get['email'] ==
                                    $user->getContactInfo()->getEmail()) {
                    // correct key
                    $user->setConfirmationKey("");
                    $user->save();
                    return $response->withRedirect($this->router->pathFor('profile'));
                } else {
                    // incorrect key, set a new key to the user and log out
                    $user->setConfirmationKey(md5(rand(0, 1000)));
                    $user->save();
                    return $response->withRedirect($this->router->pathFor('signout'));
                }
            }

            // if haven't confirmed email
            // show confirm view
            if (!$user->isConfirmed()) {
                return $this->view->render($response, "confirm.php", UserController::getVars($this));
            }
            // else, send them to profile page
            else {
                return $response->withRedirect($this->router->pathFor('profile'));
            }
        })->setName('confirm');

        // send mail when confirm is posted to, this in order to let the page
        // load quick and mail is sent through ajax call
        $app->post('/confirm', function ($request, $response) use ($app) {
            $arr = Mail::confirmEmail(url(), currentUser());
            return $response->withJson($arr);
        });
    }

    // profile page
    public function profile($app)
    {
        // if get request, show the profile view, either the signed in user,
        // of the user that matches the id that was passed
        $app->group('/profile', function () use ($app) {

            // current user profile page
            $app->get('', function ($request, $response, $args) {
                $arr = UserController::getVars($this);
                $arr['visiting'] = false;
                return $this->view->render($response, "profile.php", $arr);
            })->setName('profile');

            // visiting another user profile
            $app->get('/{id:[0-9]+}', function ($request, $response, $args) {
                $arr = UserController::getVars($this);
                $arr['visiting'] = false;

                $user = UserQuery::create()->findPk($args['id']);
                if ($user != null) {
                    // if id is valid
                    $arr['user'] = $user;
                    $arr['visiting'] = true;
                } else {
                    // invalid user, throw 404
                    throw new \Slim\Exception\NotFoundException($request, $response);
                }
                // check if trying to visit themselves through url
                if ($user->getId() == currentUser()->getId()) {
                    return $response->withRedirect($this->router->pathFor('profile'));
                }
                return $this->view->render($response, "profile.php", $arr);
            })->setName('visiting_profile');

            // when posting to profile, that means the user wants to change
            // some of their contact information
            $app->post('', function ($request, $response) {
                $post = $request->getParsedBody();
                // key will be PhoneNumber, Facebook, Twitter, Instagram
                $key = $post['key'];
                $value = $post['value'];

                // put it in a try block since the jquery could be
                // modified when posting
                try {
                    $contact = currentUser()->getContactInfo();
                    $contact->setByName($key, $value);
                    $contact->save();
                    $response = $response->withJson(['success'=>true]);
                } catch (\Exception $e) {
                    $response = $response->withJson(['success'=>false]);
                }
                return $response;
            });
        });
    }

    // set up routing for /jobs
    public function jobs($app)
    {
        $app->group('/jobs', function () use ($app) {
            //    /job/create
            // if get request, simply show the view to create a new job
            $app->get('/create', function ($request, $response) {
                // reset previous job image
                unset($_SESSION['jobImageUpload']);
                return $this->view->render($response, "create_job.php", UserController::getVars($this));
            })->setName('create_job');

            // if post request, new job data is coming in
            // save to database if valid
            $app->post('/create', function ($request, $response) {
                $post = $request->getParsedBody();
                if (isset($post['title']) && isset($post['description'])) {
                    $title = $post['title'];
                    $description = $post['description'];

                    $job = new Job();
                    $job->setTitle($title);
                    $job->setDescription($description);

                    $job->setNotify(isset($post['notify']));
                    $job->setTimePosted(getCurrentTime());

                    $job->setPostedById(currentUser()->getId());
                    $job->setAcceptedById(currentUser()->getId());


                    if (!$job->validate()) {
                        // error
                        $response = $response->withJson(['success'=>false]);
                    } else {
                        // passed validation, its good data
                        $payment = new JobPayment();
                        $payment->setByName($post['payment_select'], true);

                        if ($payment->isBarter()) {
                            $payment->setBarterItem($post['payment_info']);
                        } else {
                            // substring to remove the leading $
                            $payment->setMoneyAmount(substr($post['payment_info'], 1));
                        }

                        $payment->setJob($job);
                        $payment->save();

                        $arr = ImageUpload::uploadJobImage(
                            $job->getId(),
                          $this->router->pathFor('home')
                        );

                        if ($arr['success']) {
                            $job->setImage($arr['path']);
                        }

                        $job->save();

                        $response = $response->withJson(['success'=>true]);
                    }
                } else {
                    // info wasnt passed correctly
                    $response = $response->withJson(['success'=>false]);
                }
                return $response;
            });

            //    /job/ID
            $app->get('/{id:[0-9]+}', function ($request, $response, $args) {
                $id = $args['id'];
                $job = JobQuery::create()->findOneById($id);

                if ($job != null) {
                    // valid job
                    $arr = UserController::getVars($this);
                    $arr['job'] = $job;
                    // if job was posted by currently signed in user
                    $arr['posted_by_user'] = $job->getPostedById() == currentUser()->getId();
                    return $this->view->render($response, "job.php", $arr);
                } else {
                    // show 404 not found
                    throw new \Slim\Exception\NotFoundException($request, $response);
                }
            })->setName('job');

            //    /jobs/all
            $app->get('/all', function ($request, $response) {
                $arr = UserController::getVars($this);
                $arr['jobs'] = JobQuery::create()->notCompleted()->newestToOldest()->find();
                return $this->view->render($response, "jobs.php", $arr);
            })->setName('jobs');
        });
    }

    public function users($app)
    {
        $app->get('/users', function ($request, $response) {
            $arr = UserController::getVars($this);
            $arr['users'] = UserQuery::create()->find();
            return $this->view->render($response, "users.php", $arr);
        })->setName('users');
    }
    // sign out route
    public function signOut($app)
    {
        $app->get('/signout', function ($request, $response) {
            logUserOut();
            return $response->withRedirect($this->router->pathFor('home'));
        })->setName('signout');
    }

    // only accepts post request
    // if posted, means user is trying to change pfp
    // or trying to post an image for a job
    public function uploadImg($app)
    {
        $app->group('/upload', function () use ($app) {

            // trying to upload a pfp
            $app->post('/pfp', function ($request, $response) {
                $user = currentUser();
                // call ImageUpload which returns an array with flags and data
                $arr = ImageUpload::uploadPfp($user->getId(), $this->router->pathFor('home'));

                if ($arr['success']) {
                    // successfully uploaded image, so set the path as the
                    // users pfp url in db
                    $user->setProfilePicture($arr['path']);
                    $user->save();
                }
                return $response->withJson($arr);
            })->setName('upload_pfp');

            $app->post('/job', function ($request, $response) {
                $imageName = 'jobImageUpload';
                $post = $request->getParsedBody();
                $imageArr = ImageUpload::checkForErrors($imageName, 'img/uploads/job/');

                if ($imageArr['success']) {
                    // no errors while uploading job image
                    $aExtraInfo = getimagesize($_FILES[$imageName]['tmp_name']);
                    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES[$imageName]['tmp_name']));

                    $response = $response->withJson(['success'=>true, 'img'=>$sImage]);
                    session_start_safe();
                    $_SESSION[$imageName] = $sImage;
                } else {
                    $response = $response->withJson($imageArr);
                }

                return $response;
            })->setName('upload_job_image');
        });
    }

    // entry point
    public static function setUpRouting($app)
    {
        $controller = new UserController();

        $app->group('/user', function () use ($app, $controller) {
            $controller->profile($app);
            $controller->jobs($app);
            $controller->users($app);
            $controller->confirmUser($app);
            $controller->uploadImg($app);
        })->add(function ($request, $response, $next) {
            // can only visit /user/{url} if signed in
            $user = currentUser();
            $path = $request->getUri()->getPath();

            if ($user != null) {
                // to avoid infinite recursion
                if (!$user->isConfirmed() && !endsWith($path, "user/confirm")) {
                    $response = $response->withRedirect($this->router->pathFor('confirm'));
                } else {
                    $response = $next($request, $response);
                }
            } else {
                // user isn't signed in, send em home
                $response = $response->withRedirect($this->router->pathFor('home'));
            }
            return $response;
        });

        // signout doesnt have to be in middleware with all checks,
        // it can be called whenever
        $app->group('/user', function () use ($app, $controller) {
            $controller->signOut($app);
        });
    }
}
