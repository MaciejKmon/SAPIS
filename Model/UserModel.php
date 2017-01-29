<?php

namespace Model;

use Entity\User;
use Utilities\DatabaseFetcher;

class UserModel implements ModelInterface
{
    /**
     * @var User[]
     */
    private $users;

    public function loadRepository(DatabaseFetcher $getData)
    {

    }
}
