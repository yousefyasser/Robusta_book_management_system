<?php

namespace models;

use models\factories\MongodbFactory;
use models\factories\MysqlFactory;
use Exception;

class Database
{
    public static function get_book_repository()
    {
        return self::get_factory()->create_book_repository();
    }

    private static function get_factory()
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

        return $dbFactory;
    }
}
