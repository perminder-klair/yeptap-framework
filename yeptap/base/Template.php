<?php

namespace yeptap\base;

class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;
    protected $_viewPath;
    protected $_layoutPath;
    public $defaultLayout = 'main';

    /**
     * Initialization that the object may need before it is used
     *
     * @param $controller
     * @param $action
     */
    public function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;

        $this->_viewPath =  SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS;
        $this->_layoutPath = SERVER_ROOT . APP_DIR . DS . 'views' . DS . 'layouts' . DS;
    }

    /**
     * Set Variables
     *
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    /** 
     * Render View and Template 
     */
    public function render($renderLayout = true)
    {
        extract($this->variables);

        $viewFile = $this->_viewPath . $this->_action . '.php';
        if (!file_exists($viewFile))
            throw new YeptapException('View file does not exists: ' . $viewFile);

        if ($renderLayout === true) {
            if (file_exists($this->_layoutPath . $this->defaultLayout .'.php')) {
                include ($this->_layoutPath . $this->defaultLayout .'.php');
            }
        } elseif($renderLayout === false) {
            include ($viewFile);
        } else {
            if (file_exists($this->_layoutPath . DS . $renderLayout .'.php')) {
                include ($this->_layoutPath . DS . $renderLayout .'.php');
            }
        }
    }

    /**
     * Render Parital view file
     * 
     * @param $partialFile
     * @param array $data
     * @throws YeptapException
     */
    public function renderPartial($partialFile, $data=array())
    {
        extract($data);

        if (file_exists($this->_viewPath . $partialFile . '.php')) {
            include ($this->_viewPath . $partialFile . '.php');
        } else {
            throw new YeptapException('Partial view file does not exists: ' . $this->_viewPath . $partialFile . '.php');
        }
    }

}
