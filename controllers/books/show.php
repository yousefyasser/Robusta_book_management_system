<?php

use models\Database;

$book = Database::get_book_repository()->find($_GET['id'] ?? INF);


$showHistory = isset($_GET['showHistory']) && $_GET['showHistory'] === 'True';

if ($showHistory) {
    $historyData = Database::get_book_history_repository()->get_book_history($_GET['id']);
    require(base_path('views/books/show_history.view.php'));
}

require(base_path('views/books/show.view.php'));
