<?php

namespace Pyz\Zed\ProductCategory\Business;

use Pyz\Zed\ProductCategory\ProductCategoryConfig;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Library\Import\ReaderInterface;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryDependencyContainer as SprykerDependencyContainer;

/**
 * @method ProductCategoryConfig getConfig()
 */
class ProductCategoryDependencyContainer extends SprykerDependencyContainer
{
    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductCategoryMappingInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductCategoryMappingInstall(
            $this->createProductCategoryManager(),
            $this->createCategoryFacade(),
            $this->createProductFacade(),
            $this->createLocaleFacade(),
            $this->createCSVReader(),
            $this->getConfig()->getDemoDataCSVPath()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvFileReader();
    }
}
