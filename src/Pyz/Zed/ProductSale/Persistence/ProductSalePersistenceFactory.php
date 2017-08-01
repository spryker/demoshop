<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Persistence;

use Pyz\Zed\ProductSale\ProductSaleDependencyProvider;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Spryker\Zed\ProductNew\ProductNewConfig getConfig()
 * @method \Spryker\Zed\ProductNew\Persistence\ProductNewQueryContainer getQueryContainer()
 */
class ProductSalePersistenceFactory extends AbstractPersistenceFactory
{

    /**
     * @return \Spryker\Zed\ProductLabel\Persistence\ProductLabelQueryContainerInterface
     */
    public function getProductLabelQueryContainer()
    {
        return $this->getProvidedDependency(ProductSaleDependencyProvider::QUERY_CONTAINER_PRODUCT_LABEL);
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    public function getProductQueryContainer()
    {
        return $this->getProvidedDependency(ProductSaleDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

}
