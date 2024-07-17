<?php

use models\Database;
use core\Router;

// validate id actually exists
$db = Database::setup();
$db->query("SELECT * FROM books WHERE id = :id", [
    "id" => $_POST['id']
])->fetchOrFail();

// delete row from database
$db->query("DELETE FROM books WHERE id = :id", [
    "id" => $_POST['id']
]);

Router::redirect('/books');
