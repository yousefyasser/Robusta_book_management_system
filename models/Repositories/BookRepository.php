<?php

namespace models\Repositories;

use models\adapters\DatabaseAdapter;

class BookRepository
{
    protected $adapter;

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter->table('books');
    }

    public function get_books()
    {
        return $this->adapter->findAll();
    }

    public function find($id)
    {
        return $this->adapter->find($id);
    }

    public function create($data)
    {
        $this->adapter->create($data);
    }

    public function update($id, $data)
    {
        $this->adapter->update($id, $data);
    }

    public function delete($id)
    {
        $this->adapter->delete($id);
    }
}
