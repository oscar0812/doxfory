<?php
require '../vendor/autoload.php';

// adding an external config file
require '../config.php';
require '../data/generated-conf/config.php';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../app/views/");

/*
// link the controller calls to instances
$container[HomeController::class] = function ($c) {
    return new App\Controllers\HomeController($c);
};

$app->get('/register', HomeController::class.':showRegisterPage')->setName('register');
*/

// if url is not found (404)
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response->withStatus(404), '404.php', ['router' => $c->router]);
    };
};

// -- set up routing --

// root
$app->get('/', function ($request, $response) {
    return $this->view->render($response, "home.php", ['router' => $this->router]);
})->setName('home');



// register page
// if get -> show register page if not signed in
$app->get('/register', function ($request, $response) {
    if (currentUser() == null) {
        return $this->view->render($response, "register.php", ['router' => $this->router]);
    } else {
        return $response->withRedirect($this->router->pathFor('profile'));
    }
})->setName('register');

// if post -> trying to login or register for a new account
$app->post('/register', function ($request, $response) {
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
        $username = $post['username'];
        $password = $post['password'];

        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword($password);
        $user->save();

        logUserIn($user->getPk());

        // change path from profile to confirm once confirm logic is finished
        $response = $response->withJson(['success'=>true, 'path'=>$this->router->pathFor('profile')]);
    }

    return $response;
});

// routing group w/ middleware applied
// helper calls for register, to check if email and username are available
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
})->add(function ($request, $response, $next) {

    // can only visit /register/{url} if not signed in
    if (currentUser() == null) {
        return $next($request, $response);
    }
    return $response;
});


$app->get('/profile', function ($request, $response) {
    return $this->view->render($response, "profile.php", ['router' => $this->router]);
})->setName('profile');



$app->run();
