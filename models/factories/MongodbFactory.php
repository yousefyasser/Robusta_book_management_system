<?php

namespace models\factories;

use models\adapters\MongodbAdapter;
use models\adapters\DatabaseAdapter;

class MongodbFactory implements DatabaseFactory
{
    public function create_adapter(): DatabaseAdapter
    {
        return MongodbAdapter::get_instance();
    }
}
