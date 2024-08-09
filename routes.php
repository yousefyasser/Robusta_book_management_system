<?php

use \controllers\BookController;
use controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);

$router->get('/books', [BookController::class, 'index']);

$router->get('/book', [BookController::class, 'show']);

$router->get('/books/create', [BookController::class, 'create']);
$router->post('/books/create', [BookController::class, 'store']);

$router->get('/book/edit', [BookController::class, 'edit']);
$router->patch('/book', [BookController::class, 'update']);

$router->delete('/book', [BookController::class, 'destroy']);
