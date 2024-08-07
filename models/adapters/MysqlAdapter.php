<?php

namespace models\adapters;

use PDO;
use core\Router;

class MysqlAdapter implements DatabaseAdapter
{
    private static $instance;
    private $connection;
    private $statement;
    protected $table;

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

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public static function table($table)
    {
        $instance = self::get_instance();
        $instance->table = $table;
        return $instance;
    }

    public function findAll()
    {
        return $this->query("SELECT * FROM {$this->table}")->statement->fetchAll();
    }

    public function find($id, $fail = false)
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE id = :id", [
            'id' => $id
        ])->statement->fetch();

        if (!$result && $fail) {
            Router::abort();
        }

        return $result;
    }

    public function create($data)
    {
        $this->query("INSERT INTO books (title, author, publishing_date, cover_image, summary) 
                      VALUES (:title, :author, :publishing_date, :cover_image, :summary)", $data);
    }

    public function update($id, $data)
    {
        $this->query("UPDATE {$this->table} 
                      SET title = :title, author = :author, publishing_date = :publishing_date, cover_image = :cover_image, summary = :summary 
                      WHERE id = :id", $data);
    }

    public function delete($id)
    {
        $this->query("DELETE FROM {$this->table} WHERE id = :id", [
            'id' => $id
        ]);
    }
}
