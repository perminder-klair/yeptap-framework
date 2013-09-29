<?php

class Controller
{
    protected $_controller;
    protected $_action;
    protected $_template;
    public $renderLayout=true;

    /**
     * @param $controller
     * @param $action
     */
    public function __construct($controller, $action)
    {
        $this->_controller = ucfirst($controller);
        $this->_action = $action;

        $this->_template = new Template($controller,$action);
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name,$value)
    {
        $this->_template->set($name,$value);
    }

    /**
     * s
     */
    public function __destruct()
    {
        $this->_template->render($this->renderLayout);
    }

}