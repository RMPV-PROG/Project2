<?php 

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        // $this->routes[] = compact('uri','controller','method');
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
              
                // if ($route['middleware'] === 'guest') {
                //     // $obj = new Guest;
                //     // $obj->handle();
                //     (new Guest)->handle();
                // }

                // if ($route['middleware'] === 'auth') {
                //     (new Auth)->handle();
                // }

                // refactor 1
                // if ($route['middleware']) {
                //     $middleware = Middleware::MAP[$route['middleware']];
                //     (new $middleware)->handle();
                // }

                // refactor 2
                Middleware::resolve($route['middleware']);
            
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

    public function only($key) 
    {
        $key_last = array_key_last($this->routes);
        $this->routes[$key_last]['middleware'] = $key;
    }
}