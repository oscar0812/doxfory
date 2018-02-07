<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use \UserQuery;
use \User;
use \SocialMedia;

// takes care of routing index page and /register
class HomeController
{

    // -- set up routing --

    public function index($app)
    {
        $app->get('/', function ($request, $response, $args) {
            return $this->view->render($response, "home.php", ['router' => $this->router, 'logged_in'=>false]);
        })->setName('home');
    }

    // register page
    // if get -> show register page if not signed in
    public function showRegisterPage($app)
    {
        $app->get('/register', function ($request, $response, $args) {
            return $this->view->render($response, "register.php", ['router' => $this->router, 'logged_in'=>false]);
        })->setName('register');
    }

    // if post -> trying to login or register for a new account
    public function registerUser($app)
    {
        $app->post('/register', function ($request, $response, $args) {
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
                    $response = $response->withJson(['success'=>true, 'path'=>$this->router->pathFor('profile')]);
                }
            } else {
                // register
                $email = $post['email'];
                $first = $post['first'];
                $last = $post['last'];
                $password = $post['password'];

                $user = new User();
                $user->setEmail($email);
                $user->setFirstName($first);
                $user->setLastName($last);
                $user->setPassword($password);
                if (!$user->validate()) {
                    // an error occured
                    $response = $response->withJson(['success'=>false]);
                } else {
                    // all good
                    $user->setConfirmationKey(md5(rand(0, 1000)));

                    // set a row of social_media, each user should have a row
                    $social = new SocialMedia();
                    $social->setUser($user);
                    $social->save();

                    $user->save();
                    logUserIn($user->getId());

                    // change path from profile to confirm once confirm logic is finished
                    $response = $response->withJson(['success'=>true, 'path'=>$this->router->pathFor('profile')]);
                }
            }

            return $response;
        });
    }

    // routing group w/ middleware applied
    // helper calls for register, to check if email and username are available
    public function registerMethods($app)
    {
        $app->group('/register', function () use ($app) {
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
        });
    }

    public static function setUpRouting($app)
    {
        // apply middleware
        $controller = new HomeController();
        $app->group('', function () use ($app, $controller) {
            $controller->index($app);
            $controller->showRegisterPage($app);
            $controller->registerUser($app);
            $controller->registerMethods($app);
        })->add(function ($request, $response, $next) {
            // can only visit /{url} if not signed in
            if (currentUser() == null) {
                $response = $next($request, $response);
            } else {
                $response = $response->withRedirect($this->router->pathFor('profile'));
            }
            return $response;
        });
    }
}
