<?php 

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

// require base_path('Core/router.php');
$router = new \Core\Router();

$routes = require base_path('routes.php');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($path, $method);












