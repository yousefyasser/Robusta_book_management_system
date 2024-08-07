<?php

namespace models;

use models\factories\DatabaseFactory;
use models\factories\MongodbFactory;
use models\factories\MysqlFactory;
use Exception;

class Database
{
    private $adapter;

    public function __construct(DatabaseFactory $factory)
    {
        $this->adapter = $factory->create_adapter();
    }

    public static function table($table)
    {
        return self::setup()::table($table);
    }

    public static function setup()
    {
        switch ($_ENV['DB_CONNECTION']) {
            case 'mysql':
                $dbFactory = new MysqlFactory();
                break;
            case 'mongodb':
                $dbFactory = new MongodbFactory();
                break;
            default:
                throw new Exception('Database connection not supported');
        }

        return (new Database($dbFactory))->adapter;
    }
}
