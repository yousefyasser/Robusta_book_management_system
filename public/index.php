<?php

use Dotenv\Dotenv;
use core\Router;

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . 'core/functions.php');
require(base_path('vendor/autoload.php'));

// Load Environment Variables

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

// Routes

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$router = new Router();

require(base_path('routes.php'));

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
