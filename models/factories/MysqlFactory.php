<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;
use models\adapters\MysqlAdapter;
use models\Repositories\BookRepository;

class MysqlFactory implements DatabaseFactory
{
    public function create_book_repository(): BookRepository
    {
        return new BookRepository($this->create_adapter());
    }

    public function create_adapter(): DatabaseAdapter
    {
        return MysqlAdapter::get_instance();
    }
}
