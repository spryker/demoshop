<?php

namespace Pyz\Zed\Product\Persistence;

use Orm\Zed\Product\Persistence\SpyAbstractProduct;
use Orm\Zed\Product\Persistence\SpyAbstractProductQuery;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer as SprykerProductQueryContainer;

class ProductQueryContainer extends SprykerProductQueryContainer
{

    /**
     * @return SpyAbstractProductQuery
     */
    public function queryAbstractProducts()
    {
        return SpyAbstractProductQuery::create();
    }
}
