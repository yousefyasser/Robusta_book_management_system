<?php

namespace core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path('controllers/' . $route['controller']);
            }
        }

        Router::abort();
    }

    public static function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/httpErrors/{$code}.php");

        die();
    }

    public static function redirect($uri)
    {
        header("location: {$uri}");
        die();
    }
}
