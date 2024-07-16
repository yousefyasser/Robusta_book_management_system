<?php

use core\Validator;
use core\Router;
use models\Database;

// validate the form data

$errors = Validator::get_validation_errors();
if (!empty($errors)) {
    $heading = 'create';
    return require(base_path('views/books/create.view.php'));
}

// create empty folder for uploads if not found

if (!is_dir(base_path('public/uploads'))) {
    mkdir(base_path('public/uploads'));
}

// move uploaded file to uploads folder

$dstPath = !empty($_FILES['cover_image']['name']) ? move_file() : NULL;

// store the uploaded image path (in public/uploads) in the database

$db = Database::setup();
$db->query('INSERT INTO books (title, author, publishing_date, cover_image, summary) 
            VALUES (:title, :author, :publishing_date, :cover_image, :summary)', [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'publishing_date' => $_POST['publishing_date'],
    'cover_image' => $dstPath,
    'summary' => $_POST['summary']
]);


Router::redirect('/books');
