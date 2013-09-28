<?php
class Controller
{
    protected $_controller;
    protected $_action;
    protected $_template;

    function __construct($controller, $action)
    {
        $this->_controller = ucfirst($controller);
        $this->_action = $action;

        $this->_template = new Template($controller,$action);

    }

    function set($name,$value)
    {
        $this->_template->set($name,$value);
    }

    function __destruct()
    {
        $this->_template->render();
    }

}