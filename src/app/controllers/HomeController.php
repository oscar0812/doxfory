<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use \UserQuery;
use \User;

// takes care of routing index page and /register
class HomeController
{
    public function __construct($app)
    {
        $home = $this;

        // -- set up routing --

        // root
        $app->get('/', function ($request, $response, $args) use ($home) {
            return $home->index($request, $response, $args, $this);
        })->setName('home');

        // register page
        // if get -> show register page if not signed in
        $app->get('/register', function ($request, $response, $args) use ($home) {
            return $home->showRegisterPage($request, $response, $args, $this);
        })->setName('register');

        // if post -> trying to login or register for a new account
        $app->post('/register', function ($request, $response, $args) use ($home) {
            return $home->registerUser($request, $response, $args, $this);
        });

        // routing group w/ middleware applied
        // helper calls for register, to check if email and username are available
        $app->group('/register', function () use ($app, $home) {
            return $home->registerMethods($app);
        })->add(function ($request, $response, $next) {
            // can only visit /register/{url} if not signed in
            if (currentUser() == null) {
                $response = $next($request, $response);
            }
            return $response;
        });
    }

    public function index($request, $response, $args, $app)
    {
        return $app->view->render($response, "home.php", ['router' => $app->router]);
    }

    public function showRegisterPage($request, $response, $args, $app)
    {
        if (currentUser() == null) {
            return $app->view->render($response, "register.php", ['router' => $app->router]);
        } else {
            // if already signed in, send to profile
            return $response->withRedirect($app->router->pathFor('profile'));
        }
    }

    public function registerUser($request, $response, $args, $app)
    {
        $post = $request->getParsedBody();
        if ($post['type'] == 'login') {
            // check if valid login credentials, if yes, sign in
            $user = UserQuery::create()->findOneByEmail($post['email']);
            $pass = $post['password'];

            if ($user == null || !$user->login($pass)) {
                // user doesn't exist or wrong password
                $response = $response->withJson(['success'=>false]);
            } else {
                logUserIn($user->getId());
                $response = $response->withJson(['success'=>true, 'path'=>$app->router->pathFor('profile')]);
            }
        } else {
            // register
            $email = $post['email'];
            $username = $post['username'];
            $password = $post['password'];

            $user = new User();
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setPassword($password);
            if (!$user->validate()) {
                // an error occured
                $response = $response->withJson(['success'=>false]);
            } else {
                // all good
                $user->save();
                logUserIn($user->getId());

                // change path from profile to confirm once confirm logic is finished
                $response = $response->withJson(['success'=>true, 'path'=>$app->router->pathFor('profile')]);
            }
        }

        return $response;
    }

    public function registerMethods($app)
    {
        // return "false" if already in use, "true" if not
        $app->post('/username', function ($request, $response) {
            $post = $request->getParsedBody();
            $user = UserQuery::create()->findOneByUsername($post['username']);

            echo ($user== null)?"true":"false";
        });

        $app->post('/email', function ($request, $response) {
            $post = $request->getParsedBody();
            $user = UserQuery::create()->findOneByEmail($post['email']);

            echo ($user== null)?"true":"false";
        });
    }
}
