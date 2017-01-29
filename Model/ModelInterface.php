<?php

namespace Model;

use Utilities\DatabaseFetcher;

interface ModelInterface
{
    public function loadRepository(DatabaseFetcher $getData);
}
