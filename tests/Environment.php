<?php

namespace Test;

use Propel\Runtime\Propel;

class Environment
{
    public static function initialize($application)
    {
        self::setApplicationRootDir();

        \SprykerFeature\Shared\Library\Application\Environment::initialize($application);

        Propel::disableInstancePooling();
    }

    private static function setApplicationRootDir()
    {
        defined('APPLICATION_ROOT_DIR')
            || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/..'));
    }
}
