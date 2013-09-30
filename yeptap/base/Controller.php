<?php

namespace yeptap\base;

class Controller
{
    protected $_controller;
    protected $_action;
    protected $_template;
    public $renderLayout=true;

    /**
     * Initialization that the object may need before it is used
     *
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
     * The destructor method will be called as soon as there are no other references to a particular object
     */
    public function __destruct()
    {
        $this->_template->render($this->renderLayout);
    }

}