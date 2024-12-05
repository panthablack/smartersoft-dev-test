<?php

namespace App;

class Application
{
    public function __construct(protected Router $router) {}

    public function handleRequest()
    {
        // load routes
        $this->router->loadWebRoutes();
        // dispatch request
        $this->router->dispatch();
    }
}
