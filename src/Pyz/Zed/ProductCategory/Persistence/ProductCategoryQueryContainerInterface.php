<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductCategory\Persistence;

use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface as SprykerProductCategoryQueryContainerInterface;

interface ProductCategoryQueryContainerInterface extends SprykerProductCategoryQueryContainerInterface
{
    /**
     * @api
     *
     * @param int $idProductAbstract
     * @param int[] $idsCategoryNode
     *
     * @return \Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery
     */
    public function queryProductCategoryMappingsByIdAbstractProductAndIdsCategoryNode(
        $idProductAbstract,
        array $idsCategoryNode
    );
}
