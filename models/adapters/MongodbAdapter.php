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

    public static function table($collection)
    {
        $instance = self::get_instance();
        $instance->collection = $instance->connection->selectCollection($collection);
        return $instance;
    }

    public function findAll()
    {
        return $this->collection->find();
    }

    public function find($id, $fail = false)
    {
        $result = $this->collection->findOne(['id' => $id]);

        if (!$result && $fail) {
            Router::abort();
        }

        return $result;
    }

    public function create($data)
    {
        $this->collection->insertOne($data);
    }

    public function update($id, $data)
    {
        $this->collection->updateOne(['id' => $id], ['$set' => $data]);
    }

    public function delete($id)
    {
        $this->collection->deleteOne(['id' => $id]);
    }
}
