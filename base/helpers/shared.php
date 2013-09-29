<?php

/** Check if environment is development and display errors **/
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    }
}

/** Check for Magic Quotes and remove them **/
function stripSlashesDeep($value)
{
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes()
{
    if ( get_magic_quotes_gpc() ) {
        $_GET    = stripSlashesDeep($_GET   );
        $_POST   = stripSlashesDeep($_POST  );
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

/** Check register globals and remove them **/
function unregisterGlobals()
{
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Secondary Call Function **/
function performAction($controller,$action,$queryString = null,$render = 0)
{
    $controllerName = ucfirst($controller).'Controller';
    $dispatch = new $controllerName($controller,$action);
    $dispatch->render = $render;
    return call_user_func_array(array($dispatch,$action),$queryString);
}

/** Routing **/
function routeURL($url)
{
    global $routing;

    foreach ( $routing as $pattern => $result ) {
        if ( preg_match( $pattern, $url ) ) {
            return preg_replace( $pattern, $result, $url );
        }
    }

    return ($url);
}

/** Main Call Function **/
function callHook()
{
    global $url;
    global $default;

    $queryString = array();

    if (!isset($url)) {
        $controller = $default['controller'];
        $action = $default['action'];
    } else {
        $url = routeURL($url);
        $urlArray = array();
        $urlArray = explode("/",$url);
        $controller = $urlArray[0];
        array_shift($urlArray);
        if (isset($urlArray[0])) {
            $action = $urlArray[0];
            array_shift($urlArray);
        } else {
            $action = 'index'; // Default Action
        }
        $queryString = $urlArray;
    }

    $controllerName = ucfirst($controller).'Controller';

    if ((int)method_exists($controllerName, $action)) {
        $dispatch = new $controllerName($controller,$action);

        call_user_func_array(array($dispatch,"beforeAction"),$queryString);
        call_user_func_array(array($dispatch,$action),$queryString);
        call_user_func_array(array($dispatch,"afterAction"),$queryString);
    } else {
        throw new YeptapException($action . ' method does not exists');
    }
}

/** GZip Output **/
function gzipOutput()
{
    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ')
        || false !== strpos($ua, 'Opera')) {
        return false;
    }

    $version = (float)substr($ua, 30);
    return (
        $version < 6
            || ($version == 6  && false === strpos($ua, 'SV1'))
    );
}

function my_exception_handler($e) {
    echo '<h1>Yeptap has caught an exception</h1>';
    echo '<h3>' . $e->getMessage() . '</h3>';

    if (DEVELOPMENT_ENVIRONMENT===true) {
        Debug::dump($e->getTraceAsString());
    }
    if (LOG_ERRORS===true)
        Logger::newMessage($e);
}

set_exception_handler('my_exception_handler');

/** Get Required Files **/
gzipOutput() || ob_start("ob_gzhandler");

setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();