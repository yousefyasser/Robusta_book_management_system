<?php

use Dotenv\Dotenv;
use core\Router;
use models\Database;

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');
require(base_path('vendor/autoload.php'));

// Load Environment Variables

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// Book History Repository Subscription to Book Repository
Database::get_book_repository()->subscribe(Database::get_book_history_repository());

// Routes

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$router = new Router();

require(base_path('routes.php'));

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
