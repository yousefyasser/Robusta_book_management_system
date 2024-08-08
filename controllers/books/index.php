<?php

use models\Database;

$books = Database::get_book_repository()->get_books();

require(base_path('views/books/index.view.php'));
