<?php

namespace Pyz\Zed\ProductCategory\Persistence;

use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use SprykerFeature\Zed\ProductCategory\Persistence\ProductCategoryDependencyContainer;
use SprykerFeature\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer as SprykerProductCategoryQueryContainer;


/**
 * @method ProductCategoryDependencyContainer getDependencyContainer()
 */
class ProductCategoryQueryContainer extends SprykerProductCategoryQueryContainer implements ProductCategoryQueryContainerInterface
{

    /**
     * @param $idAbstractProduct
     * @return SpyProductCategoryQuery
     */
    public function queryProductCategoryMappingsByProductId($idAbstractProduct)
    {
        return $this->getDependencyContainer()
            ->createProductCategoryQuery()
            ->filterByFkAbstractProduct($idAbstractProduct);
    }
}
