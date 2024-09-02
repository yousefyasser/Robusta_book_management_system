<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;
use models\Repositories\BookRepository;
use models\Repositories\BookHistoryRepository;

interface DatabaseFactory
{
    public function create_adapter(): DatabaseAdapter;
    public function create_book_repository(): BookRepository;
    public function create_book_history_repository(): BookHistoryRepository;
}
