<?php

const BASE_PATH = __DIR__ . '/../';

if (parse_url($_SERVER['REQUEST_URI'])['path'] === '/') {
    require BASE_PATH . 'controllers/index.php';
}
