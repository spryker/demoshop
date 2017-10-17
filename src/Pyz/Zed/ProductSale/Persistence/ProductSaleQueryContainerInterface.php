<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Persistence;

/**
 * @method \Pyz\Zed\ProductSale\Persistence\ProductSalePersistenceFactory getFactory()
 */
interface ProductSaleQueryContainerInterface
{
    /**
     * @api
     *
     * @param string $labelName
     *
     * @return \Orm\Zed\ProductLabel\Persistence\SpyProductLabelQuery
     */
    public function queryProductLabelByName($labelName);

    /**
     * @api
     *
     * @param int $idProductLabel
     *
     * @return \Orm\Zed\ProductLabel\Persistence\SpyProductLabelProductAbstractQuery
     */
    public function queryRelationsBecomingInactive($idProductLabel);

    /**
     * @api
     *
     * @param int $idProductLabel
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryRelationsBecomingActive($idProductLabel);
}
