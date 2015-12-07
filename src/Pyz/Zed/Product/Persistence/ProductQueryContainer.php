<?php

namespace Pyz\Zed\Product\Persistence;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Product\Persistence\Base\SpyProductQuery;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductToBundleTableMap;
use Orm\Zed\Product\Persistence\SpyAbstractProductQuery;
use Orm\Zed\Product\Persistence\SpyLocalizedAbstractProductAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductToBundleQuery;
use Orm\Zed\ProductDynamic\Persistence\Map\PavAbstractProductDynamicTableMap;
use Orm\Zed\ProductDynamic\Persistence\Map\PavProductDynamicTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\SprykerBugfixInterface;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainer as SprykerProductQueryContainer;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyLocalizedProductAttributesTableMap;

class ProductQueryContainer extends SprykerProductQueryContainer implements SprykerBugfixInterface
{
    const CONFIGURED_PRODUCTS = 'configured_products';
    const CONFIGURED_LOCALIZED_PRODUCT_ATTRIBUTES = 'configured_localized_product_attributes';
    const CONFIGURED_PRODUCT_NAMES = 'configured_product_names';
    const CONFIGURED_PRODUCT_SKUS = 'configured_product_skus';
    const ABSTRACT_PRODUCT_NAME = 'abstract_product_name';

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
     * @param string $concreteSku
     * @return SpyProductQuery
     */
    public function queryConcreteProductByConcreteSku($concreteSku)
    {
        return SpyProductQuery::create()
            ->filterBySku($concreteSku);
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

    /**
     * @param $idConcreteProduct
     * @return SpyAbstractProductQuery
     */
    public function queryAbstractProductByBundleProduct($idConcreteProduct)
    {
        return SpyAbstractProductQuery::create()
            ->addJoin(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::INNER_JOIN
            )
            ->addJoin(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductToBundleTableMap::COL_FK_RELATED_PRODUCT,
                Criteria::INNER_JOIN
            )
            ->addAnd(SpyProductToBundleTableMap::COL_FK_PRODUCT, $idConcreteProduct, Criteria::EQUAL)
            ;
    }

    /**
     * @param LocaleTransfer $localeTransfer
     *
     * @return SpyAbstractProductQuery
     */
    public function queryAbstractProductWithLocalizedValues(LocaleTransfer $localeTransfer)
    {
        return SpyAbstractProductQuery::create()
            ->addJoin(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::INNER_JOIN
            )
            ->addAnd(
                SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
                $localeTransfer->getIdLocale(),
                Criteria::EQUAL
            )
            ->addJoin(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                PavAbstractProductDynamicTableMap::COL_ID_ABSTRACT_PRODUCT_DYNAMIC,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                PavAbstractProductDynamicTableMap::COL_ID_ABSTRACT_PRODUCT_DYNAMIC,
                PavProductDynamicTableMap::COL_FK_ABSTRACT_PRODUCT_DYNAMIC,
                Criteria::LEFT_JOIN
            )
            ->addJoinObject(
                (new Join(
                    PavProductDynamicTableMap::COL_FK_PRODUCT,
                    SpyProductTableMap::COL_ID_PRODUCT,
                    Criteria::LEFT_JOIN
                ))->setRightTableAlias(self::CONFIGURED_PRODUCTS)
            )
            ->addJoinObject(
                (new Join(
                    PavProductDynamicTableMap::COL_FK_PRODUCT,
                    SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
                    Criteria::LEFT_JOIN
                ))->setRightTableAlias(self::CONFIGURED_LOCALIZED_PRODUCT_ATTRIBUTES)
            )
            ->withColumn(
                SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
                self::ABSTRACT_PRODUCT_NAME
            )
            ->withColumn(
                'JSON_AGG(' . self::CONFIGURED_LOCALIZED_PRODUCT_ATTRIBUTES . '.name)',
                self::CONFIGURED_PRODUCT_NAMES
            )
            ->withColumn(
                'JSON_AGG(' . self::CONFIGURED_PRODUCTS . '.sku)',
                self::CONFIGURED_PRODUCT_SKUS
            )
            ->groupBy(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT)
        ;
    }

}
