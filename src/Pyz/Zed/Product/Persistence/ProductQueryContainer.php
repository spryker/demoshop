<?php

namespace Pyz\Zed\Product\Persistence;
use Orm\Zed\Product\Persistence\Base\SpyProductQuery;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributesQuery;
use Pyz\SprykerBugfixInterface;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer as SprykerProductQueryContainer;


class ProductQueryContainer extends SprykerProductQueryContainer implements SprykerBugfixInterface
{

    /**
     * @param $idAbstractProduct
     * @return SpyLocalizedAbstractProductAttributesQuery
     */
    public function queryAbstractProductLocalizedAttributeCollection($idAbstractProduct) {
        $query = SpyLocalizedAbstractProductAttributesQuery::create();
        $query->filterByFkAbstractProduct($idAbstractProduct);
        return $query;
    }

    /**
     * @param $idConcreteProduct
     * @return SpyProductQuery
     */
    public function queryConcreteProductById($idConcreteProduct)
    {
        $query = SpyProductQuery::create();
        $query->filterByIdProduct($idConcreteProduct);
        return $query;
    }

}
