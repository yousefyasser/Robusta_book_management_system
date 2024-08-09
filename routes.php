<?php

use \controllers\BookController;

$router->get('/', 'index.php');

$router->get('/books', [BookController::class, 'index']);

$router->get('/book', [BookController::class, 'show']);

$router->get('/books/create', [BookController::class, 'create']);
$router->post('/books/create', [BookController::class, 'store']);

$router->get('/book/edit', [BookController::class, 'edit']);
$router->patch('/book', [BookController::class, 'update']);

$router->delete('/book', [BookController::class, 'destroy']);
