<?php

namespace Fram;

/**
 * Class Config
 * @package Fram
 */
class Config
{
    /**
     * @var null|object
     */
    private static $config = null;

    /**
     * Protect constructor
     */
    private function __construct()
    {
        //
    }

    /**
     * Protect clone method
     */
    private function __clone()
    {
        //
    }

    /**
     * Protect wakeup method
     */
    private function __wakeup()
    {
        //
    }

    /**
     * Parse the config file
     */
    private static function parse()
    {
        $ini = parse_ini_file(DOC_ROOT.'/../config.ini', true);
        foreach ($ini as $section => $values) {
            if ($section == $_SERVER['HTTP_HOST'].':default') {
                self::$config = json_decode(json_encode(array_merge($ini['default'], $values)));
                break;
            }
        }
    }

    /**
     * @return object
     */
    public static function getConfig()
    {
        if (self::$config === null) {
            self::parse();
        }
        return self::$config;
    }
}
