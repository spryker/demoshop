<?php

namespace Functional\Pyz\ProductOption\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use Codeception\TestCase\Test;
use SprykerEngine\Zed\Kernel\Business\Factory;
use SprykerEngine\Zed\Kernel\Locator;
use Generated\Zed\Ide\AutoCompletion;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOption
 * @group ProductOptionInstallerTest
 */
class ProductOptionInstallerTest extends Test
{
    /**
     * @var ProductOptionFacade
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
        $this->facade = new ProductOptionFacade(new Factory('ProductOption'), $this->locator);
    }

    public function testImportXmlOptions()
    {
        $stub = $this->getMockBuilder('SprykerFeature\Zed\Console\Business\Model\ConsoleMessenger')
            ->disableOriginalConstructor()
            ->getMock();

        $this->facade->installDemoData($stub);
    }
}
