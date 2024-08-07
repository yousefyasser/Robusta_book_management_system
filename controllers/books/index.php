<?php

use models\Database;

$books = Database::table('books')->findAll();

require(base_path('views/books/index.view.php'));
