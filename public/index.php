<?php

const BASE_PATH = __DIR__ . '/../';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/') {
    require BASE_PATH . 'controllers/index.php';
} else if ($uri === '/books') {
    require BASE_PATH . 'controllers/books/index.php';
}
