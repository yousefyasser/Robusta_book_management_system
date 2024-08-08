<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;
use models\Repositories\BookRepository;

interface DatabaseFactory
{
    public function create_adapter(): DatabaseAdapter;
    public function create_book_repository(): BookRepository;
}
