<?php 

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$page = "Notes";

$userId = 2;

$sql = "SELECT * FROM notes WHERE user_id = {$userId}"; 
$notes = $db->query($sql)->get();

view("notes/index.view.php", [
    'page' => 'Notes',
    'notes' => $notes
]);