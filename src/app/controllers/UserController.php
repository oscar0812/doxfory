<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use \UserQuery;
use \User;

class UserController
{
    // profile page
    public function profile($app)
    {
        $app->get('/profile', function ($request, $response) {
            return $this->view->render($response, "profile.php", ['router' => $this->router]);
        })->setName('profile');
    }
    // sign out route
    public function signOut($app)
    {
        $app->get('/signout', function ($request, $response) {
            logUserOut();
            return $response->withRedirect($this->router->pathFor('home'));
        })->setName('signout');
    }

    public static function setUpRouting($app)
    {
        $controller = new UserController();
        $app->group('/user', function () use ($app, $controller) {
            $controller->profile($app);
            $controller->signOut($app);
        })->add(function ($request, $response, $next) {
            // can only visit /user/{url} if signed in
            if (currentUser() != null) {
                $response = $next($request, $response);
            }
            return $response;
        });
    }
}
