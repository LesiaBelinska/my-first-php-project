<?php

class Router
{
    private array $routes = [];

    public function addRoute(string $path, array $rules): void
    {
        $this->routes[$path] = $rules;
    }

    public function processRoute(string $url, string $method)
    {
        $routes = $this->routes;
        if (!$routes) {
            throw new Exception('Routes not defined');
        }

        foreach ($routes as $routeUrl => $routeMethods) {
            if ($routeUrl === $url) {
                $controllerAction = $routeMethods[$method] ?? null;
                break;
            }
        }
        if (!isset($controllerAction)) {
            header('Not Found', true, 404);
            echo "<p>PAGE NOT FOUND</p>";
            exit;
        }
        [$controller, $action] = explode('@', $controllerAction);
        if (!isset($controller) && !isset($action)){
            throw new Exception('Invalid route action');
        }

        require_once CONTROLLERS_DIR . $controller . '.php';
        $controllerObject = new $controller;
        $controllerObject->$action();
    }
}