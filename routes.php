<?php

$router->get('/', 'index.php');

$router->get('/books', 'books/index.php');

$router->get('/books/create', 'books/create.php');
$router->post('/books/create', 'books/store.php');

$router->get('/book', 'books/show.php');

$router->get('/book/edit', 'books/edit.php');
$router->patch('/book', 'books/update.php');

$router->delete('/book', 'books/destroy.php');
