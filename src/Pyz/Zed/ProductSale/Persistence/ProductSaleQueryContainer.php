<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSale\Persistence;

use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Shared\ProductSale\ProductSaleConfig;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Pyz\Zed\ProductSale\Persistence\ProductSalePersistenceFactory getFactory()
 */
class ProductSaleQueryContainer extends AbstractQueryContainer implements ProductSaleQueryContainerInterface
{

    /**
     * @api
     *
     * @param string $labelName
     *
     * @return \Orm\Zed\ProductLabel\Persistence\SpyProductLabelQuery
     */
    public function queryProductLabelByName($labelName)
    {
        return $this->getFactory()
            ->getProductLabelQueryContainer()
            ->queryProductLabelByName($labelName);
    }

    /**
     * @api
     *
     * @param int $idProductLabel
     *
     * @return \Orm\Zed\ProductLabel\Persistence\SpyProductLabelProductAbstractQuery
     */
    public function queryRelationsBecomingInactive($idProductLabel)
    {
        return $this->getFactory()
            ->getProductLabelQueryContainer()
            ->queryProductAbstractRelationsByIdProductLabel($idProductLabel)
            ->useSpyProductAbstractQuery(null, Criteria::LEFT_JOIN)
                ->usePriceProductQuery(null, Criteria::LEFT_JOIN)
                    ->joinPriceType('priceType', Criteria::LEFT_JOIN)
                    ->addJoinCondition('priceType', 'priceType.name = ?', ProductSaleConfig::PRICE_TYPE_ORIGINAL)
                    ->filterByPrice(null, Criteria::ISNULL)
                ->endUse()
            ->endUse();
    }

    /**
     * @api
     *
     * @param int $idProductLabel
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstractQuery
     */
    public function queryRelationsBecomingActive($idProductLabel)
    {
        return $this->getFactory()
            ->getProductQueryContainer()
            ->queryProductAbstract()
            ->usePriceProductQuery()
                ->joinPriceType('priceType', Criteria::INNER_JOIN)
                ->addJoinCondition('priceType', 'priceType.name = ?', ProductSaleConfig::PRICE_TYPE_ORIGINAL)
                ->filterByPrice(null, Criteria::ISNOTNULL)
            ->endUse()
            ->useSpyProductLabelProductAbstractQuery('rel', Criteria::LEFT_JOIN)
                ->filterByFkProductLabel(null, Criteria::ISNULL)
            ->endUse()
            ->addJoinCondition('rel', sprintf('rel.fk_product_label = %d', $idProductLabel));
    }

}
