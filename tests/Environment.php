<?php

namespace Test;

class Environment
{

    public static function initialize()
    {
        defined('APPLICATION_ROOT_DIR')
            || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

        defined('APPLICATION')
            || define('APPLICATION', 'ZED');

        \ProjectA\Shared\Library\Application\Environment::initialize();
    }
}
