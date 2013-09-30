<?php
//Sets the default timezone used by all date/time functions
date_default_timezone_set('UTC');

//Autoload classes
require_once(SERVER_ROOT . DS . FRAMEWORK_DIR . DS . 'Autoloader.php');
\yeptap\Autoloader::register();

//Include main config file
require_once(SERVER_ROOT . APP_DIR . DS .'config' . DS . 'main.php');

$url = $_GET['url'];
/** @var $routing **/
$routing = array(
    '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
);
require_once('helpers/shared.php');