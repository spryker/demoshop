<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
