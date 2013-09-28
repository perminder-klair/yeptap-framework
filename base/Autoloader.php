<?php

namespace Yeptap;

class Autoloader
{

    public static function autoloadBaseClasses($className) {
        $filename = SERVER_ROOT . FRAMEWORK_DIR . "/classes/" . $className . ".php";
        //var_dump($filename);exit;
        if (is_readable($filename)) {
            require $filename;
        }
    }

    public static function autoloadModel($className) {
        $filename = SERVER_ROOT . APP_DIR . "/models/" . $className . ".php";
        //var_dump($filename);exit;
        if (is_readable($filename)) {
            require $filename;
        }
    }

    public static function autoloadController($className) {
        $filename = SERVER_ROOT . APP_DIR . "/controllers/" . $className . ".php";
        if (is_readable($filename)) {
            require $filename;
        }
    }

    public static function register()
    {
        spl_autoload_register(__NAMESPACE__ . "\\Autoloader::autoloadBaseClasses");
        spl_autoload_register(__NAMESPACE__ . "\\Autoloader::autoloadModel");
        spl_autoload_register(__NAMESPACE__ . "\\Autoloader::autoloadController");
    }

}