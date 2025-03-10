<?php 

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contacts' => 'controllers/contacts.php',
    '/notes' => 'controllers/notes.php'
];


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

routeToController ($path, $routes);



function routeToController ($path, $routes) {
    if (array_key_exists($path, $routes)) {
        require $routes[$path];
    } else {
        abort();
    }
}