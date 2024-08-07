<?php

use core\Router;
use models\Database;
use core\Validator;

$errors = Validator::get_validation_errors();

if (!empty($errors)) {
    return require(base_path('controllers/books/edit.php'));
}

if (!is_dir(base_path("public/uploads"))) {
    mkdir(base_path("public/uploads"));
}

$dstPath = move_file();

// Remove old cover image
$db = Database::setup();

$oldCoverImagePath = $db->query("SELECT cover_image FROM books WHERE id = :id", [
    "id" => $_POST['id']
])->fetchOrFail();

if (valid_path($oldCoverImagePath['cover_image'])) {
    unlink(base_path("public/{$oldCoverImagePath['cover_image']}"));
}

// Update book in database
$db->query("UPDATE books SET title = :title, author = :author, publishing_date = :publishing_date, cover_image = :cover_image, summary = :summary WHERE id = :id", [
    "id" => $_POST['id'],
    "title" => $_POST['title'],
    "author" => $_POST['author'],
    "publishing_date" => $_POST['publishing_date'],
    "cover_image" => $dstPath,
    "summary" => $_POST['summary']
]);

Router::redirect('/books');
