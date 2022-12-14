<?php 

namespace App;

class Router {

    private array $routes;

    public function register(string $requestMethod, string $route, callable|array $action):self
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }
    public function post(string $route, callable|array $action):self
    {
        return $this->register('post', $route, $action);
    }
    public function get(string $route, callable|array $action):self
    {
        return $this->register('get', $route, $action);
    }
    

    public function resolve(string $requestMethod, string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;
        if (!$action){
            throw new Exceptions\RouteNotFoundException();
        }
        if (is_callable($action)){
            return $action();
        }
        
        if (is_array($action)){
            [$controller_class, $method] = $action;
            if (class_exists($controller_class)){
                $controller = new $controller_class();
                if(method_exists($controller, $method)){
                    return call_user_func_array([$controller, $method], []);
                }
            }
        }

        throw new Exceptions\RouteNotFoundException();
    }
}