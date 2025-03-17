<?php 

$page = "Create Note";

$userId = 2;

$config = require 'config.php';

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (strlen($_POST['body']) == 0) {
        $errors['body'] = 'A body is required';
    }

    $body_max_ln = 5;
    if (strlen($_POST['body']) > $body_max_ln) {
        $errors['body'] = "The body con not be more than {$body_max_ln} characters";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)"; 
        $db->query($sql, ['body' => $_POST['body'], 'user_id' => $userId]);

        $_POST['body'] = '';
    }

}

require "views/note-create.view.php";