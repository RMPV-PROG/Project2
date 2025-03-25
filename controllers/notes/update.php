<?php 

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$userId = 2;

$sql = "SELECT * FROM notes WHERE id = :id"; 
$note = $db->query($sql, ['id' => $_POST['id']])->findOrFail();

authorize ($note['user_id'] === $userId);

$body_min_ln = 3;
$body_max_ln = 15;
if (! Validator::string($_POST['body'], $body_min_ln, $body_max_ln)) {
    $errors['body'] = "The body must be between {$body_min_ln} and {$body_max_ln} characters";
}

if (empty($errors)) {
    
    $sql = "UPDATE notes SET body = :body WHERE id = :id"; 
    $db->query($sql, [
        'body' => $_POST['body'],
        'id' => $_POST['id']
    ]);

    header('location: /notes');
    die();
}

view("notes/edit.view.php", [
    'page' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
]);