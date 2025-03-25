<?php 

use Core\App;
use Core\Database;

// $config = require base_path('config.php');
// $db = new Database($config['database']);

// $db = App::Container()->resolve('Core\Database');
// $db = App::Container()->resolve(Database::class);
$db = App::resolve(Database::class);

$userId = 2;

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

authorize ($note['user_id'] === $userId);

$sql = "DELETE FROM notes WHERE id = :id";
$db->query($sql, ['id' => $_POST['id']]);
header('location: /notes');
exit;

