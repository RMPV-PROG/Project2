<?php 

use Core\App;
use Core\Database;
use Core\Validator;

require base_path('Core/Validator.php');

$userId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$errors = [];

$body_min_ln = 3;
$body_max_ln = 15;
if (! Validator::string($_POST['body'], $body_min_ln, $body_max_ln)) {
    $errors['body'] = "The body must be between {$body_min_ln} and {$body_max_ln} characters";
}

if (empty($errors)) {
    
    $sql = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)"; 
    $db->query($sql, [
        'body' => $_POST['body'],
        'user_id' => $userId
    ]);

    header('location: /notes');
    die();
}

view("notes/create.view.php", [
    'page' => 'Create Note',
    'errors' => $errors
]);

