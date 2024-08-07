<?php

use models\Database;
use core\Router;

// validate id actually exists
$db = Database::setup();
$coverImagePath = $db->query("SELECT cover_image FROM books WHERE id = :id", [
    "id" => $_POST['id']
])->fetchOrFail();

if (valid_path($coverImagePath['cover_image'])) {
    unlink(base_path("public/{$coverImagePath['cover_image']}"));
}

// delete row from database
$db->query("DELETE FROM books WHERE id = :id", [
    "id" => $_POST['id']
]);

Router::redirect('/books');
