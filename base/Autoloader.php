<?php

namespace yeptap;

class Autoloader
{
    public static function register()
    {
        set_include_path(
            implode(PATH_SEPARATOR,
                array_unique(
                    array_merge(
                        array(
                            SERVER_ROOT . FRAMEWORK_DIR,
                            SERVER_ROOT . FRAMEWORK_DIR . '/helpers',
                            SERVER_ROOT . APP_DIR . '/models',
                            SERVER_ROOT . APP_DIR . '/controllers',
                        ),
                        explode(PATH_SEPARATOR, get_include_path())
                    )
                )
            )
        );

        spl_autoload_register(function ($class) {
            $file = sprintf("%s.php", str_replace('\\', DIRECTORY_SEPARATOR, $class));
            if (($classPath = stream_resolve_include_path($file)) != false) {
                require $classPath;
            }
        }, true);
    }
}