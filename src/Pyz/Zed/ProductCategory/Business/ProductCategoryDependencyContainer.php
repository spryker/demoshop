<?php

namespace Pyz\Zed\ProductCategory\Business;

use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use SprykerFeature\Zed\ProductCategory\Business\TransferGenerator;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryManager;
use Pyz\Zed\ProductCategory\ProductCategoryConfig;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Library\Import\ReaderInterface;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall;
use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryDependencyContainer as SprykerDependencyContainer;
use SprykerFeature\Zed\ProductCategory\Business\TransferGeneratorInterface;
use SprykerFeature\Zed\ProductCategory\ProductCategoryDependencyProvider;

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
        $installer = new ProductCategoryMappingInstall(
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

    /**
     * @return ProductCategoryManagerInterface
     */
    public function createProductCategoryManager()
    {
        return new ProductCategoryManager(
                    $this->createCategoryQueryContainer(),
                    $this->createProductCategoryQueryContainer(),
                    $this->createProductFacade(),
                    $this->createCategoryFacade(),
                    $this->createTouchFacade(),
                    $this->createCmsFacade(),
                    $this->getLocator(),
                    $this->getProvidedDependency(ProductCategoryDependencyProvider::PLUGIN_PROPEL_CONNECTION)
                );
    }

    /**
     * @return TransferGeneratorInterface
     */
    public function createProductCategoryTransferGenerator()
    {
        return new TransferGenerator();
    }

}
