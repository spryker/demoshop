<?php

namespace Pyz\Zed\Product\Business;

use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use Spryker\Zed\Stock\Dependency\Facade\StockToProductInterface;
use Spryker\Zed\TaxProductConnector\Dependency\Facade\TaxProductConnectorToProductInterface;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use Spryker\Zed\ProductOptionExporter\Dependency\Facade\ProductOptionExporterToProductInterface;
use Psr\Log\LoggerInterface;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 */
class ProductFacade extends SprykerProductFacade implements
    ProductSearchToProductInterface,
    StockToProductInterface,
    ProductCategoryToProductInterface,
    TaxProductConnectorToProductInterface,
    ProductOptionToProductInterface,
    ProductOptionExporterToProductInterface
{

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
