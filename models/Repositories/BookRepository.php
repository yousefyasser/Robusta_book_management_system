<?php

namespace models\Repositories;

use models\adapters\DatabaseAdapter;

class BookRepository
{
    private static $instance;
    protected $adapter;
    private static $subscribers = [];
    public $table = 'books';

    public function __construct(DatabaseAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public static function get_instance(DatabaseAdapter $adapter)
    {
        if (!self::$instance) {
            self::$instance = new self($adapter);
        }
        return self::$instance;
    }

    public static function subscribe(BookSubscriber $subscriber)
    {
        self::$subscribers[] = $subscriber;
    }

    public function notify($id)
    {
        $oldBook = $this->find($id);

        foreach (self::$subscribers as $subscriber) {
            $subscriber->update_history($oldBook);
        }
    }

    public function get_books()
    {
        return $this->adapter->findAll($this->table);
    }

    public function find($id)
    {
        return $this->adapter->find($this->table, $id);
    }

    public function create($data)
    {
        $this->adapter->create($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->notify($id);
        $this->adapter->update($this->table, $id, $data);
    }

    public function delete($id)
    {
        $this->adapter->delete($this->table, $id);
    }
}
