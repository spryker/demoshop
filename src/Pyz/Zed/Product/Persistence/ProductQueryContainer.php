<?php

namespace Pyz\Zed\Product\Persistence;

use Orm\Zed\Product\Persistence\Base\SpyProductQuery;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductToBundleTableMap;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductToBundleQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\SprykerBugfixInterface;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer as SprykerProductQueryContainer;

class ProductQueryContainer extends SprykerProductQueryContainer implements SprykerBugfixInterface
{
    /**
     * @param $idAbstractProduct
     * @return SpyLocalizedAbstractProductAttributesQuery
     */
    public function queryAbstractProductLocalizedAttributeCollection($idAbstractProduct)
    {
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

    /**
     * @param int $idBundleProduct
     * @param int $idBundledProduct
     * @return SpyProductToBundleQuery
     */
    public function queryBundleProductByBundleId($idBundleProduct, $idBundledProduct)
    {
        return SpyProductToBundleQuery::create()
            ->filterByFkProduct($idBundleProduct)
            ->filterByFkRelatedProduct($idBundledProduct);
    }

    /**
     * @param int $idConcreteProduct
     * @return SpyProductToBundleQuery
     */
    public function queryBundledProductsByConcreteProductId($idConcreteProduct)
    {
        return SpyProductToBundleQuery::create()
            ->filterByFkProduct($idConcreteProduct)
            ->joinSpyProductRelatedByFkProduct();
    }

    /**
     * @param $idAbstractProduct
     * @return SpyProductToBundleQuery
     */
    public function queryBundledProductsByAbstractProductId($idAbstractProduct)
    {
        return SpyProductToBundleQuery::create()
            ->addJoin(
                SpyProductToBundleTableMap::COL_FK_PRODUCT,
                SpyProductTableMap::COL_ID_PRODUCT,
                Criteria::INNER_JOIN
            )
            ->addAnd(SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT, $idAbstractProduct, Criteria::EQUAL)
            ;
    }

}
