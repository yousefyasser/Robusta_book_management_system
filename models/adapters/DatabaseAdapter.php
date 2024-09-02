<?php

namespace models\adapters;

interface DatabaseAdapter
{
    public static function get_instance();
    public function findAll($table);
    public function find($table, $id);
    public function create($table, $data);
    public function update($table, $id, $data);
    public function delete($table, $id);
}
