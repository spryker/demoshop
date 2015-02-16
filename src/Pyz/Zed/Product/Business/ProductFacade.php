<?php


namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\ProductFacade as CoreProductFacade;
use ProjectA\Zed\ProductFrontendExporterConnector\Dependency\Facade\ProductFrontendExporterToProductInterface;
use ProjectA\Zed\ProductSearch\Business\Builder\ProductSearchToProductInterface;

/**
 * Class ProductFacadeFrontend
 *
 * @package Pyz\Zed\Product\Business
 *
 * @property \Pyz\Zed\Product\Business\ProductDependencyContainer $dependencyContainer
 */
class ProductFacade extends CoreProductFacade implements
    ProductFrontendExporterToProductInterface,
    ProductSearchToProductInterface
{
    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildProducts(array $productsData)
    {
        return $this->dependencyContainer->getProductBuilder()->buildProducts($productsData);
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    public function buildSearchProducts(array $productsData)
    {
        return $this->dependencyContainer->getProductBuilder()->buildProducts($productsData);
    }
}