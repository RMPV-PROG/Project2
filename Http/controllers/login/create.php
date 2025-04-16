<?php

use Core\Session;

view("login/create.view.php", [
    'page' => 'Log In',
    'errors' => Session::getFlash('errors') 
]);