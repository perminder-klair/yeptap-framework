<?php

/** Configuration Variables **/

define ('SITE_NAME','My Site');

define('DB_NAME', 'sakila');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', '127.0.0.1');

define ('DEVELOPMENT_ENVIRONMENT',true);

/** Log errors, location /app/logs/ **/
define ('LOG_ERRORS',false);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

/** Set default controller and action **/
$default['controller'] = 'Main';
$default['action'] = 'index';