<?php

namespace models\adapters;

use MongoDB\Client;
use core\Router;

class MongodbAdapter implements DatabaseAdapter
{
    private static $instance;
    private $connection;

    protected $collection;

    /**
     * TODO: Install MongoDB PHP extension
     */
    private function __construct($config)
    {
        $connectionString = "mongodb://{$config['host']}:{$config['port']}";
        // $this->connection = (new Client($connectionString))->selectDatabase($config['dbname']);
    }

    public static function get_instance()
    {
        if (!self::$instance) {
            $dbConfig = require(base_path('config.php'));
            self::$instance = new self($dbConfig['db']);
        }

        return self::$instance;
    }

    public function findAll($table)
    {
        $this->connection->selectCollection($table);
        return $this->collection->find();
    }

    public function find($table, $id, $fail = false)
    {
        $this->connection->selectCollection($table);
        $result = $this->collection->findOne(['id' => $id]);

        if (!$result && $fail) {
            Router::abort();
        }

        return $result;
    }

    public function create($table, $data)
    {
        $this->connection->selectCollection($table);
        $this->collection->insertOne($data);
    }

    public function update($table, $id, $data)
    {
        $this->connection->selectCollection($table);
        $this->collection->updateOne(['id' => $id], ['$set' => $data]);
    }

    public function delete($table, $id)
    {
        $this->connection->selectCollection($table);
        $this->collection->deleteOne(['id' => $id]);
    }
}
