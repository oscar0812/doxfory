<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class UserController
{
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }
}
