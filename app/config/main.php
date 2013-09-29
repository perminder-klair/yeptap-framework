<?php
/** Site Variables **/
define ('SITE_NAME','My Site');

/** Configuration Variables **/
define ('DEVELOPMENT_ENVIRONMENT',true);

/** Log errors, location /app/logs/ **/
define ('LOG_ERRORS',false);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

/** Set default controller and action **/
$default['controller'] = 'Main';
$default['action'] = 'index';