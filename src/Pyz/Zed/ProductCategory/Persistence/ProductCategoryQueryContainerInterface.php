<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
