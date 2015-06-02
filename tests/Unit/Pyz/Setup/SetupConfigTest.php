<?php

namespace Unit\Pyz\Setup;

use Pyz\Zed\Setup\SetupConfig;
use SprykerEngine\Shared\Config;
use SprykerEngine\Zed\Kernel\Locator;

/**
 * @group Pyz
 * @group Zed
 * @group Setup
 * @group SetupConfig
 */
class SetupConfigTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return SetupConfig
     */
    private function getConfig()
    {
        return new SetupConfig(Config::getInstance(), Locator::getInstance());
    }

    public function testGetPropelSchemaPathPatterShouldReturnArrayWithOnePatternToSchemaDirectories()
    {
        $pathPatterns = $this->getConfig()->getPropelSchemaPathPattern();
        $this->assertTrue(is_array($pathPatterns));
        $this->assertCount(1, $pathPatterns);
    }

}
