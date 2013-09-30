<?php

namespace app\models;

use yeptap\base\Model;

class Main extends Model
{
    /**
     * Initialization that the object may need before it is used
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    public function getDbData()
    {

        $data = $this->db->query('SELECT * FROM actor');

        foreach($data as $row) {
            print_r($row);
        }
        exit;
    }
}