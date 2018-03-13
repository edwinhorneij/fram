<?php

namespace Fram;

/**
 * Class Loader
 * @package Fram
 */
class Loader
{
    /**
     * Register
     */
    public static function register()
    {
        spl_autoload_register('self::autoload');
    }

    /**
     * Autoload function
     * @param $classname
     */
    private static function autoload($classname)
    {
        if (strpos($classname, 'Fram\\') !== false) {
            $filepath = LIB_DIR.DS.str_replace('\\', '/', $classname).'.php';
        } elseif (preg_match('/Controller$/', $classname)) {
            $filepath = APP_DIR.DS.'controllers'.DS.$classname.'.php';
        } elseif (preg_match('/Helper$/', $classname)) {
            $filepath = APP_DIR.DS.'helpers'.DS.$classname.'.php';
        } else {
            $filepath = APP_DIR.DS.'models'.DS.$classname.'.php';
        }

        if (file_exists($filepath)) {
            require_once $filepath;
        }
    }
}
