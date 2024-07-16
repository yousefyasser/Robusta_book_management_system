<?php

use models\Database;

$uri = "/book";
$heading = 'Edit';

$db = Database::setup();
$book = $db->query("SELECT * FROM books WHERE id = :id", [
    "id" => $_GET['id'] ?? $_POST['id']
])->fetchOrFail();

require(base_path('views/books/edit.view.php'));
