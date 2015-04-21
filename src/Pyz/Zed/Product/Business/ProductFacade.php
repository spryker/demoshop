<?php


namespace Pyz\Zed\Product\Business;

use SprykerFeature\Zed\Product\Business\ProductFacade as CoreProductFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use SprykerFeature\Zed\ProductFrontendExporterConnector\Dependency\Facade\ProductFrontendExporterToProductInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use SprykerFeature\Zed\Stock\Dependency\Facade\StockToProductInterface;
use Psr\Log\LoggerInterface;

class ProductFacade extends CoreProductFacade implements
    ProductFrontendExporterToProductInterface,
    ProductSearchToProductInterface,
    StockToProductInterface,
    ProductCategoryToProductInterface
{
    /**
     * @return ProductDependencyContainer
     */
    protected function getDependencyContainer()
    {
        return $this->dependencyContainer;
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->getDependencyContainer()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->getDependencyContainer()->createProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
