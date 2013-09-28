<?php
/** Configuration Variables **/
define ('DEVELOPMENT_ENVIRONMENT',true);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$default['controller'] = 'Main';
$default['action'] = 'index';