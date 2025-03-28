<?php 

namespace Core;

class Router {
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function add($uri, $controller, $method)
    {
        // $this->routes[] = [
        //     'uri' => $uri,
        //     'controller' => $controller,
        //     'method' => $method
        // ];
        $this->routes[] = compact('uri','controller','method');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    public function abort($code = Response::NOT_FOUND) {
        http_response_code($code);
    
        require base_path("views/{$code}.php");
    
        die();
    }
}