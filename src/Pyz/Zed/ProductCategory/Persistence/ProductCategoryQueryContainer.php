<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductCategory\Persistence;

use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer as SprykerProductCategoryQueryContainer;

class ProductCategoryQueryContainer extends SprykerProductCategoryQueryContainer implements ProductCategoryQueryContainerInterface
{

    const VIRT_COLUMN_ID_CATEGORY_NODE = 'id_category_node';

    /**
     * @api
     *
     * @param int $idProductAbstract
     * @param array $idsCategoryNode
     *
     * @return \Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery
     */
    public function queryProductCategoryMappingsByIdAbstractProductAndIdsCategoryNode(
        $idProductAbstract,
        array $idsCategoryNode
    ) {
        return $this
            ->queryProductCategoryMappings()
            ->filterByFkProductAbstract($idProductAbstract)
            ->useSpyCategoryQuery()
                ->useNodeQuery()
                    ->withColumn(
                        SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
                        static::VIRT_COLUMN_ID_CATEGORY_NODE
                    )
                    ->filterByIdCategoryNode($idsCategoryNode, Criteria::IN)
                ->endUse()
            ->endUse();
    }

}
