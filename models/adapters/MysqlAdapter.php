<?php

namespace models\adapters;

use PDO;
use core\Router;

class MysqlAdapter implements DatabaseAdapter
{
    private static $instance;
    private $connection;
    private $statement;

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
            self::$instance = new self($dbConfig['db'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
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

    public function findAll($table, array $conditions = [])
    {
        $where = '';

        // If there are conditions, build the WHERE clause
        if (!empty($conditions)) {
            $where = 'WHERE ' . query_formatter(' AND ', $conditions);
        }

        return $this->query("SELECT * FROM {$table} {$where}", $conditions)->statement->fetchAll();
    }

    public function find($table, $id, $fail = false)
    {
        $result = $this->query("SELECT * FROM {$table} WHERE id = :id", [
            'id' => $id
        ])->statement->fetch();

        if (!$result && $fail) {
            Router::abort();
        }

        return $result;
    }

    public function create($table, $data)
    {
        $fields = implode(', ', array_keys($data));
        $values = ":" . implode(', :', array_keys($data));

        $this->query("INSERT INTO {$table} ({$fields}) 
                      VALUES ({$values})", $data);
    }

    public function update($table, $id, $data)
    {
        $dataWithoutId = $data;
        unset($dataWithoutId['id']);
        $columns = query_formatter(', ', $dataWithoutId);

        $this->query("UPDATE {$table} 
                      SET {$columns} 
                      WHERE id = :id", $data);
    }

    public function delete($table, $id)
    {
        $this->query("DELETE FROM {$table} WHERE id = :id", [
            'id' => $id
        ]);
    }
}
