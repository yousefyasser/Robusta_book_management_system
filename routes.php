<?php

$router->get('/', 'index.php');

$router->get('/books', 'books/index.php');
$router->get('/books/create', 'books/create.php');
