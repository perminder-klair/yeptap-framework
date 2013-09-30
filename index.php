<?php

/**
 * Website document root
 */
define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', __DIR__.DS);
define('APP_DIR' , 'app');
define('FRAMEWORK_DIR' , 'yeptap');

/**
 * Init app
 */
//Autoload classes
require_once(SERVER_ROOT . DS . FRAMEWORK_DIR . DS . 'Autoloader.php');
\yeptap\Autoloader::register();

require_once(SERVER_ROOT . DS . FRAMEWORK_DIR . DS . 'bootstrap.php');