<?php

namespace Pyz\Zed\ProductCategory\Persistence;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use SprykerFeature\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface as SprykerProductCategoryQueryContainerInterface;


interface ProductCategoryQueryContainerInterface extends SprykerProductCategoryQueryContainerInterface
{
    /**
     * @param $idAbstractProduct
     * @return SpyProductCategoryQuery
     */
    public function queryProductCategoryMappingsByProductId($idAbstractProduct);

}
