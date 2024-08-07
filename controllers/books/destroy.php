<?php

use models\Database;
use core\Router;

$coverImagePath = Database::table('books')->find($_POST['id'], true);

if (valid_path($coverImagePath['cover_image'])) {
    unlink(base_path("public/{$coverImagePath['cover_image']}"));
}

Database::table('books')->delete($_POST['id']);

Router::redirect('/books');
