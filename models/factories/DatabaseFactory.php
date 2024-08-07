<?php

namespace models\factories;

use models\adapters\DatabaseAdapter;

interface DatabaseFactory
{

    public function create_adapter(): DatabaseAdapter;
}
