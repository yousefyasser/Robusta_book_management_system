<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;
use models\adapters\MysqlAdapter;
use models\Repositories\BookRepository;
use models\Repositories\BookHistoryRepository;

class MysqlFactory implements DatabaseFactory
{
    public function create_book_repository(): BookRepository
    {
        return BookRepository::get_instance($this->create_adapter());
    }

    public function create_book_history_repository(): BookHistoryRepository
    {
        return new BookHistoryRepository($this->create_adapter());
    }

    public function create_adapter(): DatabaseAdapter
    {
        return MysqlAdapter::get_instance();
    }
}
