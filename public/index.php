<?php

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/') {
    require base_path('controllers/index.php');
} else if ($uri === '/books') {
    require base_path('controllers/books/index.php');
}
