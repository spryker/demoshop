<?php

namespace Zed\Context;

use Behat\Behat\Context\Context;
use Spryker\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap;
use SprykerInitContextTrait;

/**
 * Inits Spryker test environment for Zed
 */
class SprykerInitContext implements Context
{

    use SprykerInitContextTrait;

    /**
     * @BeforeSuite
     */
    public static function initApp()
    {
        self::bootstrapTestApplication(SystemUnderTestBootstrap::APPLICATION_ZED);
    }

}
