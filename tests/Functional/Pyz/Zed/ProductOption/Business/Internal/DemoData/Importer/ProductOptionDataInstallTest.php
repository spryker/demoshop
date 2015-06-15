<?php

namespace Functional\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer;

use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;

/**
 * @group Pyz
 * @group Zed
 * @group ProductOption
 * @group ProductOptionInstallerTest
 *
 * @method ProductOptionFacade getFacade()
 */
class ProductOptionInstallerTest extends AbstractFunctionalTest
{

    public function testImportXmlOptions()
    {
        $stub = $this->getMockBuilder('SprykerFeature\Zed\Console\Business\Model\ConsoleMessenger')
            ->disableOriginalConstructor()
            ->getMock();

        $this->getFacade()->installDemoData($stub);
    }

}
