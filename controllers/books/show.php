<?php

use models\Database;

$db = Database::setup();

$book = $db->query("SELECT * FROM books WHERE id = :id", [
    "id" => $_GET['id'] ?? INF
])->fetchOrFail();

require(base_path('views/books/show.view.php'));
