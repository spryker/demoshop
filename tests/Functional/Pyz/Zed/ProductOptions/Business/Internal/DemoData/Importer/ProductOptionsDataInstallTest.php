<?php

namespace Functional\Pyz\ProductOptions\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOptions\Business\ProductOptionsFacade;
use Codeception\TestCase\Test;
use SprykerEngine\Zed\Kernel\Business\Factory;
use SprykerEngine\Zed\Kernel\Locator;
use Generated\Zed\Ide\AutoCompletion;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOptions
 * @group ProductOptionsInstallerTest
 */
class ProductOptionsInstallerTest extends Test
{
    /**
     * @var ProductOptionsFacade
     */
    private $facade;

    /**
     * @var AutoCompletion $locator
     */
    protected $locator;

    public function setUp()
    {
        parent::setUp();

        $this->locator = Locator::getInstance();
        $this->facade = new ProductOptionsFacade(new Factory('ProductOptions'), $this->locator);
    }

    public function testImportXmlOptions()
    {
        $stub = $this->getMockBuilder('SprykerFeature\Zed\Console\Business\Model\ConsoleMessenger')
            ->disableOriginalConstructor()
            ->getMock();

        $this->facade->installDemoData($stub);
    }
}
