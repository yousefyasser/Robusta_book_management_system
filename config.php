<?php

return [
    'db' => [
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_DATABASE'],
        'charset' => 'utf8mb4'
    ]
];
