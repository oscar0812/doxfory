<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Helpers\ImageUpload;
use App\Helpers\Mail;
use \UserQuery;
use \User;
use \JobQuery;
use Slim\Exception\NotFoundException;

class UserController
{
    // takes care of routing all routes in /user/{}/{}/...
    public static function getVars($app)
    {
        return ['logged_in'=>true, 'router'=> $app->router, 'current_user' => currentUser()];
    }

    // profile page
    public function profile($app)
    {
        $app->get('/profile[/{id:[0-9]+}]', function ($request, $response, $args) {
            $arr = UserController::getVars($this);
            $arr['visiting'] = false;

            if (isset($args['id'])) {
                // if id was passed
                $user = UserQuery::create()->findPk($args['id']);
                if ($user != null) {
                    // if id is valid
                    $arr['current_user'] = $user;
                    $arr['visiting'] = true;
                }
            }
            return $this->view->render($response, "profile.php", $arr);
        })->setName('profile');
    }

    // set up routing for job and jobs
    public function jobs($app)
    {
        $app->group('/job', function () use ($app) {
            //    /job/create
            $app->get('/create', function ($request, $response) {
                return $this->view->render($response, "create_job.php", UserController::getVars($this));
            })->setName('create_job');

            //    /job/ID
            $app->get('/{id:[0-9]+}', function ($request, $response, $args) {
                $id = $args['id'];
                $job = JobQuery::create()->findOneById($id);

                if ($job != null) {
                    // valid job
                    $arr = UserController::getVars($this);
                    $arr['job'] = $job;
                    return $this->view->render($response, "job.php", $arr);
                } else {
                    // show 404 not found
                    throw new \Slim\Exception\NotFoundException($request, $response);
                }
            })->setName('job');
        });

        //    /jobs
        $app->get('/jobs', function ($request, $response) {
            return $this->view->render($response, "jobs.php", UserController::getVars($this));
        })->setName('jobs');
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
    public function uploadPfp($app)
    {
        $app->post('/upload', function ($request, $response) {
            $current_user = currentUser();
            // call ImageUpload which returns an array with flags and data
            $arr = ImageUpload::uploadPfp($current_user->getId(), $this->router->pathFor('home'));

            if ($arr['success']) {
                // successfully uploaded image, so set the path as the
                // users pfp url in db
                $current_user->setProfilePicture($arr['path']);
                $current_user->save();
            }
            return $response->withJson($arr);
        })->setName('upload_pfp');
    }

    public function confirmUser($app)
    {
        $app->get('/confirm', function ($request, $response) use ($app) {
            $current_user = currentUser();
            // check if has key in url, if so, confirm user and
            // redirect to profile
            $get = $request->getQueryParams();
            if (isset($get['key']) && isset($get['email'])) {
                // trying to confirm account
                $key = $current_user->getConfirmationKey();
                if ($get['key'] == $key && $get['email'] ==
                                    $current_user->getContactInfo()->getEmail()) {
                    // correct key
                    $current_user->setConfirmationKey("");
                    $current_user->save();
                    return $response->withRedirect($this->router->pathFor('profile'));
                } else {
                    // incorrect key, set a new key to the player and log out
                    $current_user->setConfirmationKey(md5(rand(0, 1000)));
                    $current_user->save();
                    return $response->withRedirect($this->router->pathFor('signout'));
                }
            }

            // if haven't confirmed email
            // show confirm view
            if (!$current_user->isConfirmed()) {
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

    // entry point
    public static function setUpRouting($app)
    {
        $controller = new UserController();

        $app->group('/user', function () use ($app, $controller) {
            $controller->profile($app);
            $controller->jobs($app);
            $controller->confirmUser($app);
            $controller->uploadPfp($app);
        })->add(function ($request, $response, $next) {
            // can only visit /user/{url} if signed in
            $current_user = currentUser();
            $path = $request->getUri()->getPath();

            if ($current_user != null) {
                // to avoid infinite recursion
                if (!$current_user->isConfirmed() && !endsWith($path, "user/confirm")) {
                    $response = $response->withRedirect($this->router->pathFor('confirm'));
                } else {
                    $response = $next($request, $response);
                }
            } else {
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
