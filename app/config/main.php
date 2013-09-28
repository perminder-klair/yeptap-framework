<?php
/** Configuration Variables **/
define ('DEVELOPMENT_ENVIRONMENT',true);

//yoursite.com is your webserver
define('SITE_ROOT' , 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

define('DB_NAME', 'yourdatabasename');
define('DB_USER', 'yourusername');
define('DB_PASSWORD', 'yourpassword');
define('DB_HOST', 'localhost');