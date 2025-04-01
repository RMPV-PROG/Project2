<?php 

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/contacts' => 'controllers/contacts.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/notes/create' => 'controllers/notes/create.php'
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contacts', 'controllers/contacts.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes/create', 'controllers/notes/store.php')->only('auth');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

// $router->get('/register', 'controllers/registration/create.php')->only('guest');
// $router->get('/notes/create', 'controllers/notes/create.php')->only('auth');


