<?php

namespace models\Repositories;

use models\adapters\DatabaseAdapter;

class BookHistoryRepository
{
    protected $adapter;

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter->table('books_history');
    }

    public function get_book_history($book_id)
    {
        return $this->adapter->findAll(['book_id' => $book_id]);
    }
}
