<?php

namespace Pyz\Zed\Cms\Persistence;
use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryTableMap;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use PavFeature\Zed\Cms\Persistence\CmsQueryContainer as PavCmsQueryContainer;
use Propel\Runtime\ActiveQuery\Criteria;

class CmsQueryContainer extends PavCmsQueryContainer
{
    const ABSTRACT_PRODUCT_SKU = 'abstract_product_sku';
    const ABSTRACT_PRODUCT_NAME = 'abstract_product_name';
    const CATEGORY_IS_ACTIVE = 'category_is_active';
    const CATEGORY_IN_MENU = 'category_in_menu';
    const CATEGORY_KEY = 'category_key';
    const CATEGORY_NAME = 'category_name';
    const ID_ABSTRACT_PRODUCT = 'id_abstract_product';
    const ID_CATEGORY = 'id_category';

    /**
     * @param $idAbstractProduct
     * @return SpyCmsPageQuery
     */
    public function queryPageByAbstractProductId($idAbstractProduct)
    {
        $query = $this->queryPages();
        $query->filterByFkAbstractProduct($idAbstractProduct);
        return $query;
    }

    /**
     * @param LocaleTransfer $localeTransfer
     *
     * @return SpyCmsPageQuery
     */
    public function queryPageWithProductAndCategory(LocaleTransfer $localeTransfer)
    {
        $query = $this->queryPages()
            ->addJoin(
                SpyCmsPageTableMap::COL_FK_ABSTRACT_PRODUCT,
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCmsPageTableMap::COL_FK_ABSTRACT_PRODUCT,
                SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCmsPageTableMap::COL_FK_CATEGORY_NODE,
                SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCategoryNodeTableMap::COL_FK_CATEGORY,
                SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCategoryNodeTableMap::COL_FK_CATEGORY,
                SpyCategoryTableMap::COL_ID_CATEGORY,
                Criteria::LEFT_JOIN
            )
            ->addAnd(
                SpyCategoryAttributeTableMap::COL_FK_LOCALE,
                $localeTransfer->getIdLocale(),
                Criteria::EQUAL
            )
            ->addOr(
                SpyCategoryAttributeTableMap::COL_FK_LOCALE,
                null,
                Criteria::ISNULL
            )
            ->addAnd(
                SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
                $localeTransfer->getIdLocale(),
                Criteria::EQUAL
            )
            ->addOr(
                SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
                null,
                Criteria::ISNULL
            )
            ->leftJoinCmsTemplate()
            ->innerJoinSpyUrl()
            ->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, self::ID_ABSTRACT_PRODUCT)
            ->withColumn(SpyAbstractProductTableMap::COL_SKU, self::ABSTRACT_PRODUCT_SKU)
            ->withColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_NAME, self::ABSTRACT_PRODUCT_NAME)
            ->withColumn(SpyCategoryTableMap::COL_IS_ACTIVE, self::CATEGORY_IS_ACTIVE)
            ->withColumn(SpyCategoryTableMap::COL_IS_IN_MENU, self::CATEGORY_IN_MENU)
            ->withColumn(SpyCategoryTableMap::COL_ID_CATEGORY, self::ID_CATEGORY)
            ->withColumn(SpyCategoryTableMap::COL_CATEGORY_KEY, self::CATEGORY_KEY)
            ->withColumn(SpyCategoryAttributeTableMap::COL_NAME, self::CATEGORY_NAME)
            ->withColumn(self::TEMPLATE_NAME)
            ->withColumn(self::URL)
        ;

        return $query;
    }
}
