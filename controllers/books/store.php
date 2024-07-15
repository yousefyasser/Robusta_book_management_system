<?php

use core\Router;
use models\Database;

// TODO: validate all input

// create empty folder for uploads if not found

if (!is_dir(base_path('public/uploads'))) {
    mkdir(base_path('public/uploads'));
}

// move uploaded file to uploads folder

$srcPath = $_FILES['cover_image']['tmp_name'];
$dstPath = base_path('public/uploads/' . $_FILES['cover_image']['name']);
move_uploaded_file($srcPath, $dstPath);

// store the uploaded image path (in public/uploads) in the database

$db = Database::setup();
$db->query('INSERT INTO books (title, author, publishing_date, cover_image, summary) 
            VALUES (:title, :author, :publishing_date, :cover_image, :summary)', [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'publishing_date' => $_POST['publishing_date'],
    'cover_image' => '/uploads/' . $_FILES['cover_image']['name'],
    'summary' => $_POST['summary']
]);


Router::redirect('/books');
