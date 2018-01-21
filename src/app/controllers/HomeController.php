<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function index(RequestInterface $request, ResponseInterface $response, $args)
    {
        return $this->app->view->render($response, "home.php", ['router' => $this->app->router]);
    }

    public function showRegisterPage(RequestInterface $request, ResponseInterface $response, $args)
    {
        return $this->app->view->render($response, "register.php", ['router' => $this->app->router]);
    }

    public function registerUser(RequestInterface $request, ResponseInterface $response, $args)
    {
        $data = $request->getParsedBody();
        print_r($data);

        return $response;
    }
}
