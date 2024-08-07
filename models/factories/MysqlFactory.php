<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;
use models\adapters\MysqlAdapter;

class MysqlFactory implements DatabaseFactory
{
    public function create_adapter(): DatabaseAdapter
    {
        return MysqlAdapter::get_instance();
    }
}
