<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Helpers\ImageUpload;
use \UserQuery;
use \User;

class UserController
{
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

    // this function needs work, not complete yet, but here for reminder
    public function uploadImages($app)
    {
        $app->get('/upload', function ($request, $response) {
            ImageUpload::upload('hello');
        })->setName('signout');
    }

    public function confirmUser($app)
    {
        $app->get('/confirm', function ($request, $response) {
            // if haven't confirmed email
            // show confirm view and send an email
            $current_user = currentUser();
            if (!$current_user->isConfirmed()) {
                return $this->view->render($response, "confirm.php", UserController::getVars($this));
            }
            // else, send them to profile page
            else {
                return $response->withRedirect($this->router->pathFor('profile'));
            }
        })->setName('confirm');
    }

    public static function setUpRouting($app)
    {
        $controller = new UserController();
        $app->group('/user', function () use ($app, $controller) {
            $controller->profile($app);
            $controller->signOut($app);
            $controller->job($app);
            $controller->confirmUser($app);
        })->add(function ($request, $response, $next) {
            // can only visit /user/{url} if signed in
            if (currentUser() != null) {
                $response = $next($request, $response);
            } else {
                $response = $response->withRedirect($this->router->pathFor('home'));
            }
            return $response;
        });
    }
}
