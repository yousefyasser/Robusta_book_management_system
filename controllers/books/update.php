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
$oldCoverImagePath = Database::table('books')->find($_POST['id'], true);

if (valid_path($oldCoverImagePath['cover_image'])) {
    unlink(base_path("public/{$oldCoverImagePath['cover_image']}"));
}

// Update book in database
$updatedBook = [
    "id" => $_POST['id'],
    "title" => $_POST['title'],
    "author" => $_POST['author'],
    "publishing_date" => $_POST['publishing_date'],
    "cover_image" => $dstPath,
    "summary" => $_POST['summary']
];

Database::table('books')->update($updatedBook['id'], $updatedBook);

Router::redirect('/books');
