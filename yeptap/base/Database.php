<?php

namespace yeptap\base;

/**
 * The Database Library handles database interaction for the application
 */
abstract class Database
{
    abstract protected function connect();
    abstract protected function disconnect();
    //abstract protected function prepare();
    //abstract protected function query();
    //abstract protected function fetch();
}