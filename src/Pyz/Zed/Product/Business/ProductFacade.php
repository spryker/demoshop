<?php

namespace Pyz\Zed\Product\Business;

use SprykerFeature\Zed\Product\Business\ProductFacade as SprykerProductFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToProductInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToProductInterface;
use SprykerFeature\Zed\Stock\Dependency\Facade\StockToProductInterface;
use SprykerFeature\Zed\TaxProductConnector\Dependency\Facade\TaxProductConnectorToProductInterface;
use SprykerFeature\Zed\ProductOption\Dependency\Facade\ProductOptionToProductInterface;
use SprykerFeature\Zed\ProductOptionExporter\Dependency\Facade\ProductOptionExporterToProductInterface;
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
