<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Communication\Plugin;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductLabel\Dependency\Plugin\ProductLabelRelationUpdaterPluginInterface;

/**
 * @method \Pyz\Zed\ProductSale\Business\ProductSaleFacadeInterface getFacade()
 */
class ProductSaleLabelUpdaterPlugin extends AbstractPlugin implements ProductLabelRelationUpdaterPluginInterface
{
    /**
     * @return \Generated\Shared\Transfer\ProductLabelProductAbstractRelationsTransfer[]
     */
    public function findProductLabelProductAbstractRelationChanges()
    {
        return $this->getFacade()->findProductLabelProductAbstractRelationChanges();
    }
}
