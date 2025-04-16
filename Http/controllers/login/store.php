<?php 

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();


if ($form->validate($email, $password)) {

    $auth = new Authenticator();
    if ($auth->attempt($email, $password)) {
        redirect('/');
    }

    $form->setError('email', 'No account found');
    
}

// view("login/create.view.php", [
//     'page' => 'Log In',
//     'errors' => $form->errors()
// ]);

// $_SESSION['_flash']['errors'] = $form->errors();
Session::flash('errors', $form->errors());

redirect('/login');
