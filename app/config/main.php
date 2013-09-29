<?php
/** Site Variables **/
define ('SITE_NAME','My Site');

/** Configuration Variables **/
define ('DEVELOPMENT_ENVIRONMENT',true);

/** Log errors, location /app/logs/ **/
define ('LOG_ERRORS',true);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$routing = array(
    '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3'
);
$default['controller'] = 'Main';
$default['action'] = 'index';