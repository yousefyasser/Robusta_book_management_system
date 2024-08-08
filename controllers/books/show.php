<?php

use models\Database;

$book = Database::get_book_repository()->find($_GET['id'] ?? INF);

require(base_path('views/books/show.view.php'));
