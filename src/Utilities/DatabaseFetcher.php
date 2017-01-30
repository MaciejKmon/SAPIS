<?php

namespace Utilities;

use PDOException;

class DatabaseFetcher
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct(string $dns, string $username, string $password)
    {
        try {
            $this->connection = new \PDO($dns, $username, $password);
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchAll(string $tablename)
    {
        
    }
}
