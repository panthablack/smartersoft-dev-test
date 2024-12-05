<?php

namespace App;

use App\Controllers\GoogleApiController;

class Router
{
    private $routes = [];

    // Define a route
    public function add($method, $path, $callback)
    {
        $this->routes[] = new Route(strtoupper($method), $path, $callback);
    }

    // Dispatch the current request
    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route->method === $requestMethod && $route->path === $requestUri) {
                try {
                    return call_user_func($route->callback);
                } catch (\Throwable $th) {
                    // This would include returning appropriate status codes etc. later
                    throw $th;
                }
            }
        }

        // No matching route found
        http_response_code(404);
        View::loadView('errors/404', ['title' => 'Not Found']);
    }

    public function loadWebRoutes()
    {
        // These would ideally be kept in a separate routes file and loaded in as the app grows
        $this->add('GET', '/', function () {
            View::loadView('home', ['title' => 'Home', 'message' => 'Welcome!']);
        });

        $this->add('GET', '/search', function () {
            return (new GoogleApiController())->search();
        });
    }
}
