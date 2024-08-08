<?php

use models\Database;

$uri = "/book";
$heading = 'Edit';

$book = Database::get_book_repository()->find($_GET['id'] ?? $_POST['id']);

require(base_path('views/books/edit.view.php'));
