<?php
class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    /** Set Variables **/

    function set($name, $value)
    {
        $this->variables[$name] = $value;
    }

    /** Display Template **/

    function render($renderHeader = true)
    {
        extract($this->variables);

        if ($renderHeader == true) {
            if (file_exists(SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include (SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include (SERVER_ROOT . APP_DIR . DS . 'views' . DS . 'common' . DS . 'header.php');
            }
        }

        include (SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');

        if ($renderHeader == true) {
            if (file_exists(SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include (SERVER_ROOT . APP_DIR . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include (SERVER_ROOT . APP_DIR . DS . 'views' . DS . 'common' . DS . 'footer.php');
            }
        }
    }

}
