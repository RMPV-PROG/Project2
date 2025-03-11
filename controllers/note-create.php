<?php 

$page = "Create Note";

$userId = 2;

$config = require 'config.php';

$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //dd($_POST);
    $sql = "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)"; 
    $db->query($sql, ['body' => $_POST['body'], 'user_id' => $userId]);
}

require "views/note-create.view.php";