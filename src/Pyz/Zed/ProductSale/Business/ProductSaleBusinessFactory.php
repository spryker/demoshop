<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Business;

use Pyz\Zed\ProductSale\Business\Label\ProductAbstractRelationReader;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\ProductSale\Persistence\ProductSaleQueryContainer getQueryContainer()
 * @method \Pyz\Zed\ProductSale\ProductSaleConfig getConfig()
 */
class ProductSaleBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\ProductSale\Business\Label\ProductAbstractRelationReaderInterface
     */
    public function createProductAbstractRelationReader()
    {
        return new ProductAbstractRelationReader($this->getQueryContainer(), $this->getConfig());
    }
}
