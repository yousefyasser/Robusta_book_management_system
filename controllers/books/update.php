<?php

use core\Router;
use models\Database;
use core\Validator;

$errors = Validator::get_validation_errors();

if (!empty($errors)) {
    return require(base_path('controllers/books/edit.php'));
}

$dstPath = move_file();

$db = Database::setup();
$db->query("UPDATE books SET title = :title, author = :author, publishing_date = :publishing_date, cover_image = :cover_image, summary = :summary WHERE id = :id", [
    "id" => $_POST['id'],
    "title" => $_POST['title'],
    "author" => $_POST['author'],
    "publishing_date" => $_POST['publishing_date'],
    "cover_image" => $dstPath,
    "summary" => $_POST['summary']
]);

Router::redirect('/books');
