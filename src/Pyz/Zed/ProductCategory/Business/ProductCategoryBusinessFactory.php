<?php

namespace Pyz\Zed\ProductCategory\Business;

use Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface;
use Spryker\Zed\ProductCategory\Business\TransferGenerator;
use Spryker\Zed\ProductCategory\Business\ProductCategoryManager;
use Pyz\Zed\ProductCategory\ProductCategoryConfig;
use Spryker\Zed\Library\Import\Reader\CsvFileReader;
use Spryker\Zed\Library\Import\ReaderInterface;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall;
use Spryker\Zed\ProductCategory\Business\ProductCategoryBusinessFactory as SprykerBusinessFactory;
use Spryker\Zed\ProductCategory\Business\TransferGeneratorInterface;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer;
use Spryker\Zed\ProductCategory\ProductCategoryDependencyProvider;

/**
 * @method \Pyz\Zed\ProductCategory\ProductCategoryConfig getConfig()
 * @method \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer getQueryContainer()
 */
class ProductCategoryBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\ProductCategory\Business\Internal\DemoData\ProductCategoryMappingInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new ProductCategoryMappingInstall(
            $this->createProductCategoryManager(),
            $this->getCategoryFacade(),
            $this->getProductFacade(),
            $this->getLocaleFacade(),
            $this->createCSVReader(),
            $this->getConfig()->getDemoDataCSVPath()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return \Spryker\Zed\Library\Import\ReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvFileReader();
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Business\ProductCategoryManagerInterface
     */
    public function createProductCategoryManager()
    {
        return new ProductCategoryManager(
            $this->getCategoryQueryContainer(),
            $this->getQueryContainer(),
            $this->getProductFacade(),
            $this->getCategoryFacade(),
            $this->getTouchFacade(),
            $this->getCmsFacade(),
            $this->getProvidedDependency(ProductCategoryDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Business\TransferGeneratorInterface
     */
    public function createProductCategoryTransferGenerator()
    {
        return new TransferGenerator();
    }

}
