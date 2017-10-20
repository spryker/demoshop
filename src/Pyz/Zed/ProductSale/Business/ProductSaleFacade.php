<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Business;

use Spryker\Zed\Product\Business\ProductFacade as SprykerProductFacade;

/**
 * @method \Pyz\Zed\ProductSale\Business\ProductSaleBusinessFactory getFactory()
 */
class ProductSaleFacade extends SprykerProductFacade implements ProductSaleFacadeInterface
{
    /**
     * @return \Generated\Shared\Transfer\ProductLabelProductAbstractRelationsTransfer[]
     */
    public function findProductLabelProductAbstractRelationChanges()
    {
        return $this->getFactory()
            ->createProductAbstractRelationReader()
            ->findProductLabelProductAbstractRelationChanges();
    }
}
