<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Pyz\Zed\ProductSearch\Business\Map\ProductDataPageMapBuilder;
use Pyz\Zed\ProductSearch\ProductSearchDependencyProvider;
use Spryker\Zed\ProductSearch\Business\ProductSearchBusinessFactory as SprykerProductSearchBusinessFactory;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @return \Pyz\Zed\ProductSearch\Business\Map\ProductDataPageMapBuilder
     */
    public function createProductDataPageMapBuilder()
    {
        return new ProductDataPageMapBuilder(
            $this->getProductSearchFacade(),
            $this->getPriceFacade()
        );
    }

    /**
     * @return \Pyz\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    public function getProductSearchFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    public function getPriceFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_PRICE);
    }

}
