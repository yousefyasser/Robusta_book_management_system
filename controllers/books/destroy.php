<?php

use models\Database;
use core\Router;

$coverImagePath = Database::get_book_repository()->find($_POST['id'], true);

if (valid_path($coverImagePath['cover_image'])) {
    unlink(base_path("public/{$coverImagePath['cover_image']}"));
}

Database::get_book_repository()->delete($_POST['id']);

Router::redirect('/books');
