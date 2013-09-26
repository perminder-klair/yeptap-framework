<?php

/**
 * Set error reporting and display errors settings.  You will want to change these when in production.
 */
error_reporting(-1);
ini_set('display_errors', 1);

/**
 * Website document root
 */
define('SERVER_ROOT', __DIR__.DIRECTORY_SEPARATOR);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://localhost/scripts/micro-framework/');

//yoursite.com is your webserver
define('APP_DIR' , 'app');

//yoursite.com is your webserver
define('FRAMEWORK_DIR' , 'base');

/**
 * Fetch the router
 */
require_once(SERVER_ROOT . '/' . FRAMEWORK_DIR . '/' . 'bootstrap.php');