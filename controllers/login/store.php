<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please provide a valid email address.";
}

$passw_min_ln = 4;
$passw_max_ln = 255;
if (! Validator::string($password, $passw_min_ln, $passw_max_ln)) {
    $errors['password'] = "Please provide a valid password";
}

if (! empty($errors)) {
    view("login/create.view.php", [
        'page' => 'Log In',
        'errors' => $errors
    ]);
} else {

    $user = $db->query('SELECT * FROM users WHERE email = :email', [
        'email' => $email
    ])->find();


    if ($user && password_verify($password, $user['password'])) {

        login([
            'id' => $user['id'],
            'email' => $user['email']
        ]);

        header('location: /');
        exit;

    } else {

        view("login/create.view.php", [
            'page' => 'Log In',
            'errors' => [
                'email' => 'No account found'
            ]
        ]);

    }

}