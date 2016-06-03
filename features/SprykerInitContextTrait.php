<?php

use Spryker\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap;

trait SprykerInitContextTrait
{

    public static function bootstrapTestApplication($application)
    {
        defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/..'));

        $bootstrap = SystemUnderTestBootstrap::getInstance();
        $bootstrap->bootstrap($application);
    }

}