<?php

namespace models\Repositories;

use models\adapters\DatabaseAdapter;

class BookHistoryRepository implements BookSubscriber
{
    public $adapter;
    public $table = 'books_history';

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function get_book_history($book_id)
    {
        return $this->adapter->findAll($this->table, ['book_id' => $book_id], 'updated_at DESC');
    }

    public function update_history($oldBook)
    {
        $oldBook['book_id'] = $oldBook['id'];
        unset($oldBook['id']);
        $this->adapter->create($this->table, $oldBook);
    }
}
