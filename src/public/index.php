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

// takes care of routing: /, and /register
$home = new App\Controllers\HomeController($app);

// profile page
$app->get('/profile', function ($request, $response) {
    return $this->view->render($response, "profile.php", ['router' => $this->router]);
})->setName('profile');

// sign out url
$app->get('/signout', function ($request, $response) {
    logUserOut();
    return $response->withRedirect($this->router->pathFor('home'));
})->setName('signout');


$app->run();
