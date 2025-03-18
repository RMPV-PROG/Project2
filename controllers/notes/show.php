<?php 

$config = require base_path('config.php');

$db = new Database($config['database']);

$page = "Note";

$userId = 2;

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

authorize ($note['user_id'] === $userId);

require base_path("views/notes/show.view.php");