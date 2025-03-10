<?php 

$config = require 'config.php';

$db = new Database($config['database']);

// $id = $_GET['id'];

// http://localhost:8080/contacts?id=1;drop%20table%20users - drop table users

// $sql = "SELECT * FROM posts WHERE id = :id";  //->fetch()
// // $sql = 'SELECT * FROM posts'; //->fetchAll()

// $posts = $db->query($sql, [':id' => $id])->fetchAll();

// print_r($posts);

$page = "Notes";

$sql = "SELECT * FROM notes WHERE user_id = 2"; 
$notes = $db->query($sql)->fetchAll();


require "views/notes.view.php";