<?php
require '../vendor/autoload.php';

// adding an external config file
require '../config.php';
require '../data/generated-conf/config.php';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../app/views/");

// link the controller calls to instances
$container[HomeController::class] = function ($c) {
    return new App\Controllers\HomeController($c);
};

// if url is not found (404)
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response->withStatus(404), '404.php', ['router' => $c->router]);
    };
};

// -- set up routing --

// root
$app->get('/', HomeController::class.':index')->setName('home');

// register page
$app->get('/register', HomeController::class.':showRegisterPage')->setName('register');
$app->post('/register', HomeController::class.':registerUser')->setName('register-user');

// basic POST route, named route
$app->post('/color', function ($request, $response) {
    $data = $request->getParsedBody();
    echo filter_var($data['color'], FILTER_SANITIZE_STRING);

    return $response;
})->setName('color-handler');


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
