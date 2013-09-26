<?php

//Automatically includes files containing classes that are called
function autoloadBaseComponents($className) {
    $filename = SERVER_ROOT . FRAMEWORK_DIR . "/components/" . $className . ".php";
    //var_dump($filename);exit;
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadBaseModel($className) {
    $filename = SERVER_ROOT . FRAMEWORK_DIR . "/models/" . $className . ".php";
    //var_dump($filename);exit;
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadModel($className) {
    $filename = SERVER_ROOT . APP_DIR . "/models/" . $className . ".php";
    //var_dump($filename);exit;
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadController($className) {
    $filename = SERVER_ROOT . APP_DIR . "/controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register("autoloadBaseComponents");
spl_autoload_register("autoloadBaseModel");
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");

/**
 * This controller routes all incoming requests to the appropriate controller
 */

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&' , $request);

//the page is the first element
$page = array_shift($parsed);

//the rest of the array are get statements, parse them out.
$getVars = array();
foreach ($parsed as $argument)
{
    //split GET vars along '=' symbol to separate variable, values
    list($variable , $value) = preg_split('/[\s=]+/' , $argument);
    $getVars[$variable] = urldecode($value);
}

//compute the path to the file
$target = SERVER_ROOT . '/' . APP_DIR . '/controllers/' . $page . '.php';

//get target
if (file_exists($target))
{
    include_once($target);

    //modify page to fit naming convention
    $class = ucfirst($page) . '_Controller';

    //instantiate the appropriate class
    if (class_exists($class))
    {
        $controller = new $class;
    }
    else
    {
        //did we name our class correctly?
        die('class does not exist!');
    }
}
else
{
    //can't find the file in 'controllers'! 
    die('page does not exist!');
}

//once we have the controller instantiated, execute the default function
//pass any GET variables to the main method
$controller->main($getVars);