<?php

namespace models\adapters;

use PDO;

class MysqlAdapter implements DatabaseAdapter
{
    public static $instance;
    public $connection;

    private function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public static function get_instance()
    {
        if (!self::$instance) {
            $dbConfig = require(base_path('config.php'));
            self::$instance = new MysqlAdapter($dbConfig['db'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        }

        return self::$instance;
    }

    public function findAll()
    {
        return $this->connection->query('SELECT * FROM books')->fetchAll();
    }

    public function find($id)
    {
    }

    public function create($data)
    {
    }

    public function update($id, $data)
    {
    }

    public function delete($id)
    {
    }
}
