<?php
require '../vendor/autoload.php';

// adding an external config file
require '../config.php';
require '../data/generated-conf/config.php';

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../app/views/");

// if url is not found (404)
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['view']->render($response->withStatus(404), '404.php', ['router' => $c->router]);
    };
};

// root
$app->get('/', function ($request, $response, $args) {
    $users = UserQuery::create()->find();

    // template rendering, passing data (users) and router
    $response = $this->view->render($response, "home.php", ['users' => $users, 'router' => $this->router]);

    return $response;
})->setName('home');

$app->get('/register', function ($request, $response, $args) {
    $response = $this->view->render($response, "register.php", ['router' => $this->router]);

    return $response;
});

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
