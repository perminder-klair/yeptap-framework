<?php

namespace yeptap\base;

use \yeptap\base\ORM;

class Model extends ORM
{
    protected $_model;
    public $db;

    /**
     * Initialization that the object may need before it is used
     */
    public function __construct()
    {
        $con = new \yeptap\base\drivers\PDO(array(
            'host' => DB_HOST,
            'user' => DB_USER,
            'pwd' => DB_PASSWORD,
            'dbname' => DB_NAME,
        ));

        $this->db = $con->connect();
    }

    /**
     * The destructor method will be called as soon as there are no other references to a particular object
     */
    public function __destruct()
    {

    }
}