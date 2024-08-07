<?php

use core\Validator;
use core\Router;
use models\Database;

// validate the form data

$errors = Validator::get_validation_errors();
if (!empty($errors)) {
    $heading = 'Add New';
    return require(base_path('views/books/create.view.php'));
}

// create empty folder for uploads if not found

if (!is_dir(base_path('public/uploads'))) {
    mkdir(base_path('public/uploads'));
}

// move uploaded file to uploads folder

$dstPath = !empty($_FILES['cover_image']['name']) ? move_file() : NULL;

$newBookData = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'publishing_date' => $_POST['publishing_date'],
    'cover_image' => $dstPath,
    'summary' => $_POST['summary']
];

Database::table('books')->create($newBookData);

Router::redirect('/books');
