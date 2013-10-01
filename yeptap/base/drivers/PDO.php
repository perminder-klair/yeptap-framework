<?php

namespace yeptap\base\drivers;

use yeptap\base\Database;

class PDO extends Database
{
    public $pdo = NULL;

    protected $config = array();

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function connect()
    {
        extract($this->config);

        // Clear config for security reasons
        $this->config = NULL;

        // Connect to PDO
        try {
            $this->pdo = new \PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        return $this->pdo;
    }

    public function disconnect()
    {

    }
}