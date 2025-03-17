<?php 

require 'Validator.php';

$page = "Create Note";

$userId = 2;

$config = require 'config.php';

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $body_min_ln = 3;
    $body_max_ln = 5;
    if (! Validator::string($_POST['body'], $body_min_ln, $body_max_ln)) {
        $errors['body'] = "The body must be between {$body_min_ln} and {$body_max_ln} characters";
    }


    if (empty($errors)) {
        $sql = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)"; 
        $db->query($sql, ['body' => $_POST['body'], 'user_id' => $userId]);

        $_POST['body'] = '';
    }

}

require "views/note-create.view.php";