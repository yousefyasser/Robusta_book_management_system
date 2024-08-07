<?php

use models\Database;

$book = Database::table('books')->find($_GET['id'] ?? INF);

require(base_path('views/books/show.view.php'));
