<?php

namespace Basis\Core;


class Router
{
    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }


    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @param $uri
     * @param $requestType
     * @return mixed
     * @throws \Exception
     */
    public function direct($uri, $requestType)
    {
        if(array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }

        throw new \Exception('No route defined for this URI.');
    }

    /**
     * Call the relevant controller method.
     *
     * @param $controller
     * @param $action
     * @return mixed
     * @throws \Exception
     */
    protected function callAction($controller, $action)
    {
        $controller = "Basis\\App\\Controller\\{$controller}";
        $object = new $controller;

        if(!method_exists($controller, $action)) {
            throw new \Exception("{$controller} does not respond to the {$action}  action.");
        }

        return $object->$action();
    }


}