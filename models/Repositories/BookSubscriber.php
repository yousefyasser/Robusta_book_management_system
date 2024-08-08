<?php

namespace models\Repositories;

interface BookSubscriber
{
    public function update_history($book_id);
}
