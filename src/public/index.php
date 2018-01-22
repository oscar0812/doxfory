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
// if post -> trying to login or register for a new account
$app->get('/register', function ($request, $response) {
    return $this->view->render($response, "register.php", ['router' => $this->router]);
})->setName('register');

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
            logUserIn($user->getPk());
            $response = $response->withJson(['success'=>true]);
        }
    } else {
        // register
    }

    return $response;
});

// helper calls for register, to check if email and username are available
$app->group('/register', function () use ($app) {
    // return "false" if already in use, "true" if not
    $app->post('/username', function ($request, $response) {
        $post = $request->getParsedBody();
        $username = $post['username'];

        if (UserQuery::create()->findOneByUsername() != null) {
            echo "false";
        } else {
            echo "true";
        }
    });

    $app->post('/email', function ($request, $response) {
        $response->getBody()->write(date('Y-m-d H:i:s'));
        return $response;
    });
});


// routing group w/ middleware applied
// (uses closure to maintain $app in scope)
$app->group('/friends', function () use ($app) {
    $app->get('/chandler', function ($request, $response) {
        $response->getBody()->write(date('Y-m-d H:i:s'));
        return $response;
    });

    $app->get('/phoebe', function ($request, $response) {
        $response->getBody()->write(time());
        return $response;
    });
})->add(function ($request, $response, $next) {
    $response->getBody()->write("<p>I AM A BIG TOP BANNER</p>");
    $response = $next($request, $response);
    $response->getBody()->write("<p>I AM A BIG BOTTOM BANNER</p>");

    return $response;
});

$app->run();
