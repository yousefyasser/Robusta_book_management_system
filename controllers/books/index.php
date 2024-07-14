<?php

$books = $db->query("SELECT * FROM books")->get();

require(base_path('views/books/index.view.php'));
