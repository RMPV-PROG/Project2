<?php 

$config = require 'config.php';

$db = new Database($config['database']);

$page = "Notes";

$userId = 2;

$sql = "SELECT * FROM notes WHERE user_id = {$userId}"; 
$notes = $db->query($sql)->get();

require "views/notes.view.php";