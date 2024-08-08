<?php

namespace models\factories;

use models\adapters\MongodbAdapter;
use models\adapters\DatabaseAdapter;
use models\Repositories\BookRepository;
use models\Repositories\BookHistoryRepository;

class MongodbFactory implements DatabaseFactory
{

    public function create_book_repository(): BookRepository
    {
        return new BookRepository($this->create_adapter());
    }

    public function create_book_history_repository(): BookHistoryRepository
    {
        return new BookHistoryRepository($this->create_adapter());
    }

    public function create_adapter(): DatabaseAdapter
    {
        return MongodbAdapter::get_instance();
    }
}
