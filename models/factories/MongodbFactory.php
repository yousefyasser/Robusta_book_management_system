<?php

namespace models\factories;

use models\adapters\MongodbAdapter;
use models\adapters\DatabaseAdapter;
use models\Repositories\BookRepository;

class MongodbFactory implements DatabaseFactory
{
    public function create_adapter(): DatabaseAdapter
    {
        return MongodbAdapter::get_instance();
    }

    public function create_book_repository(): BookRepository
    {
        return new BookRepository($this->create_adapter());
    }
}
