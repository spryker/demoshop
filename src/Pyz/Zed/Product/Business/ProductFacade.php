<?php


namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\ProductFacade as CoreProductFacade;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use ProjectA\Zed\ProductFrontendExporterConnector\Dependency\Facade\ProductFrontendExporterToProductInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use ProjectA\Zed\Stock\Dependency\Facade\StockToProductInterface;
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
