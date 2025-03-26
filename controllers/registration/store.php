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
    $errors['password'] = "Please provide a password at least {$passw_min_ln} characters.";
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

if (! empty($errors)) {
    view("registration/create.view.php", [
        'page' => 'New User',
        'errors' => $errors
    ]);
} else {

    if (! $user) {
        $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
            'email' => $email,
            'password' => $password
        ]);

        $_SESSION['user'] = [
            'email' => $email
        ];
    }

    header('location: /');
    exit;

}





