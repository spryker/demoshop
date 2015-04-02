<?php

namespace Test;

class Environment
{

    public static function initialize()
    {
        self::setApplicationRootDir();
        //self::setApplication();

        \ProjectA\Shared\Library\Application\Environment::initialize();
    }

    private static function setApplication()
    {
        if (isset($_SERVER['APPLICATION'])) {
            define('APPLICATION', $_SERVER['APPLICATION']);
        } else {
            defined('APPLICATION') || define('APPLICATION', 'ZED');
        }
    }

    private static function setApplicationRootDir()
    {
        defined('APPLICATION_ROOT_DIR')
        || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));
    }
}
