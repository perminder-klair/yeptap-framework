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
                            __DIR__ . DIRECTORY_SEPARATOR,
                            __DIR__ . DIRECTORY_SEPARATOR . 'base',
                            __DIR__ . DIRECTORY_SEPARATOR . 'helpers',
                            __DIR__ . DIRECTORY_SEPARATOR . 'base' . DIRECTORY_SEPARATOR . 'drivers',
                            SERVER_ROOT . APP_DIR . DIRECTORY_SEPARATOR . 'components',
                            SERVER_ROOT . APP_DIR . DIRECTORY_SEPARATOR . 'models',
                            SERVER_ROOT . APP_DIR . DIRECTORY_SEPARATOR . 'controllers',
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