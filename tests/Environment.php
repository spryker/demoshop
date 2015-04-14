<?php

namespace Test;

class Environment
{
    public static function initialize($application)
    {
        self::setApplicationRootDir();

        \ProjectA\Shared\Library\Application\Environment::initialize($application);
    }

    private static function setApplicationRootDir()
    {
        defined('APPLICATION_ROOT_DIR')
        || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));
    }
}
