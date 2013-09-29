<?php
//Autoload classes
require_once(SERVER_ROOT . DS . FRAMEWORK_DIR . DS . 'Autoloader.php');
\Yeptap\Autoloader::register();

require_once(SERVER_ROOT . APP_DIR . DS .'config' . DS . 'main.php');

$url = $_GET['url'];
/** @var $routing **/
$routing = array(
    '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
);
require_once(SERVER_ROOT . DS . FRAMEWORK_DIR . DS . 'helpers/shared.php');