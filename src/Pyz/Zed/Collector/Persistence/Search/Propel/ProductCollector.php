<?php

namespace Pyz\Zed\Collector\Persistence\Search\Propel;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\ProductSearch\Persistence\Map\SpySearchableProductsTableMap;
use Orm\Zed\Stock\Persistence\Map\SpyStockProductTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Collector\Persistence\Exporter\AbstractPropelCollectorQuery;

class ProductCollector extends AbstractPropelCollectorQuery
{

    /**
     * @var CategoryQueryContainer
     */
    protected $categoryQueryContainer;

    /**
     * @return CategoryQueryContainer
     */
    public function getCategoryQueryContainer()
    {
        return $this->categoryQueryContainer;
    }

    /**
     * @param CategoryQueryContainer $categoryQueryContainer
     */
    public function setCategoryQueryContainer($categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $this->touchQuery->clearSelectColumns();

        // Abstract & concrete product - including localized attributes & url
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoinObject(
            new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ),
            'concreteProductJoin'
        );

        $this->touchQuery->addJoinCondition(
            'concreteProductJoin',
            SpyProductTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $this->touchQuery->withColumn(
            'GROUP_CONCAT(spy_product.sku)',
            'concrete_skus'
        );

        $this->touchQuery->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addJoin(
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $this->touchQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $this->locale->getIdLocale(),
            Criteria::EQUAL
        );
        $this->touchQuery->addAnd(
            SpyLocaleTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $this->touchQuery->addJoinObject(
            (new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('product_urls'),
            'productUrlsJoin'
        );

        $this->touchQuery->addJoinCondition(
            'productUrlsJoin',
            'product_urls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $this->touchQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'productAttributesJoin'
        );

        $this->touchQuery->addJoinCondition(
            'productAttributesJoin',
            SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $this->touchQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');

        $this->touchQuery->withColumn(
            SpyAbstractProductTableMap::COL_ATTRIBUTES,
            'abstract_attributes'
        );
        $this->touchQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES,
            'abstract_localized_attributes'
        );
        $this->touchQuery->withColumn(
            "GROUP_CONCAT(spy_product.attributes SEPARATOR '$%')",
            'concrete_attributes'
        );
        $this->touchQuery->withColumn(
            "GROUP_CONCAT(spy_product_localized_attributes.attributes SEPARATOR '$%')",
            'concrete_localized_attributes'
        );
        $this->touchQuery->withColumn(
            'GROUP_CONCAT(product_urls.url)',
            'product_urls'
        );
        $this->touchQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $this->touchQuery->withColumn(
            'GROUP_CONCAT(spy_product_localized_attributes.name)',
            'concrete_names'
        );

        $this->touchQuery->withColumn(SpyAbstractProductTableMap::COL_SKU, 'abstract_sku');
        $this->touchQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');

        $this->touchQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpySearchableProductsTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'searchableJoin'
        );
        $this->touchQuery->addJoinCondition(
            'searchableJoin',
            SpySearchableProductsTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );
        $this->touchQuery->addAnd(
            SpySearchableProductsTableMap::COL_IS_SEARCHABLE,
            true,
            Criteria::EQUAL
        );

        // Product availability
        $this->touchQuery->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyStockProductTableMap::COL_FK_PRODUCT,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->withColumn(SpyStockProductTableMap::COL_QUANTITY, 'quantity');
        $this->touchQuery->withColumn(SpyStockProductTableMap::COL_IS_NEVER_OUT_OF_STOCK, 'is_never_out_of_stock');

        // Category
        $this->touchQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );
        $this->touchQuery->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );

        $excludeDirectParent = false;
        $excludeRoot = true;

        $this->touchQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($this->touchQuery);
        $this->touchQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($this->touchQuery);

        $this->touchQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($this->touchQuery);
        $this->touchQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($this->touchQuery, 'categoryChildren', 'child');
        $this->touchQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($this->touchQuery, 'categoryChildren', 'child');

        $this->touchQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($this->touchQuery, $excludeDirectParent, $excludeRoot);
        $this->touchQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($this->touchQuery, 'categoryParents', 'parent');
        $this->touchQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($this->touchQuery, 'categoryParents', 'parent');

        $this->touchQuery->withColumn(
            'GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)',
            'node_id'
        );
        $this->touchQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );

        $this->touchQuery->orderBy('depth', Criteria::DESC);
        $this->touchQuery->orderBy('descendant_id', Criteria::DESC);
        $this->touchQuery->groupBy('abstract_sku');
    }

}
