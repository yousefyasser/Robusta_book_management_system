<?php

namespace models\adapters;

interface DatabaseAdapter
{
    public static function get_instance();
    public function findAll();
    public function find($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}
