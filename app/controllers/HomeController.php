<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use \UserQuery;
use \User;
use \JobQuery;
use \UserContactInfo;
use \UserContactInfoQuery;

// takes care of routing index page and /register
class HomeController
{

    // -- set up routing --

    public function index($app)
    {
        $app->get('/', function ($request, $response, $args) {
            return $this->view->render(
                $response,
                "home.php",
            ['router' => $this->router,
            'logged_in'=>false,
            'users'=>UserQuery::create()->find(),
            'jobs'=>JobQuery::create()->find(),
            'jobs_completed'=>JobQuery::create()->completed()->find()]
            );
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
                $contact_info = UserContactInfoQuery::create()->findOneByEmail($post['email']);
                $pass = $post['password'];

                if ($contact_info == null || !$contact_info->getUser()->login($pass)) {
                    // user doesn't exist or wrong password
                    $response = $response->withJson(['success'=>false]);
                } else {
                    logUserIn($contact_info->getUser()->getId());
                    $response = $response->withJson(['success'=>true, 'path'=>$this->router->pathFor('profile')]);
                }
            } else {
                // register
                $email = $post['email'];
                $first = $post['first'];
                $last = $post['last'];
                $password = $post['password'];

                $user = new User();
                $user->setFirstName($first);
                $user->setLastName($last);
                $user->setPassword($password);
                if (!$user->validate()) {
                    // an error occured
                    $response = $response->withJson(['success'=>false]);
                } else {
                    // all good
                    $user->setConfirmationKey(md5(rand(0, 1000)));

                    // set a row of contact_info, each user should have a row
                    $contact_info = new UserContactInfo();
                    $contact_info->setEmail($email);
                    $contact_info->setUser($user);

                    $contact_info->save();
                    $user->setDateJoined(getCurrentDate()->getTimestamp());

                    $user->save();
                    logUserIn($user->getId());

                    // change path from profile to confirm
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
                $info = UserContactInfoQuery::create()->findOneByUsername($post['username']);

                echo ($info== null)?"true":"false";
            });

            $app->post('/email', function ($request, $response) {
                $post = $request->getParsedBody();
                $info = UserContactInfoQuery::create()->findOneByEmail($post['email']);

                echo ($info== null)?"true":"false";
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
