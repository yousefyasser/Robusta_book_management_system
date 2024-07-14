<?php

use Dotenv\Dotenv;
use models\Database;

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');
require(base_path('vendor/autoload.php'));

// Load Environment Variables

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// Configure Database

$dbConfig = [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_DATABASE'],
    'charset' => 'utf8mb4'
];
$db = new Database($dbConfig, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

// Routes

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/') {
    require base_path('controllers/index.php');
} else if ($uri === '/books') {
    require base_path('controllers/books/index.php');
}
