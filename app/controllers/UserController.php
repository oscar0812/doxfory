<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Helpers\ImageUpload;
use App\Helpers\Mail;
use \UserQuery;
use \User;

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
        $app->get('/profile', function ($request, $response) {
            return $this->view->render($response, "profile.php", UserController::getVars($this));
        })->setName('profile');
    }

    public function job($app)
    {
        $app->get('/job', function ($request, $response) {
            $vars['router'] = $this->router;
            return $this->view->render($response, "job.php", UserController::getVars($this));
        })->setName('job');
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
            $arr = ImageUpload::uploadPfp($current_user->getId());

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
                if ($get['key'] == $key && $get['email'] == $current_user->getEmail()) {
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
                //  die();
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
            $arr = Mail::confirmEmail(url() , currentUser());
            return $response->withJson($arr);
        });
    }

    // entry point
    public static function setUpRouting($app)
    {
        $controller = new UserController();

        $app->group('/user', function () use ($app, $controller) {
            $controller->profile($app);
            $controller->job($app);
            $controller->confirmUser($app);
            $controller->uploadPfp($app);
        })->add(function ($request, $response, $next) {
            // can only visit /user/{url} if signed in
            $current_user = currentUser();
            $path = $request->getUri()->getPath();

            if ($current_user != null) {
                // to avoid infinite recursion
                if (!$current_user->isConfirmed() && $path != 'user/confirm') {
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