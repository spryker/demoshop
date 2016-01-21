<?php

namespace Pyz\Zed\Collector\Persistence\Search\Propel;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryClosureTableTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\ProductSearch\Persistence\Map\SpyProductSearchTableMap;
use Orm\Zed\Stock\Persistence\Map\SpyStockProductTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Exception\PropelException;
use Spryker\Zed\Category\Persistence\CategoryQueryContainer;
use Spryker\Zed\Collector\Persistence\Exporter\AbstractPropelCollectorQuery;

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
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoinObject(
            new Join(
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyProductTableMap::COL_FK_PRODUCT_ABSTRACT,
                Criteria::LEFT_JOIN
            ),
            'productConcreteJoin'
        );
        $this->touchQuery->addJoinCondition(
            'productConcreteJoin',
            SpyProductTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );
        $this->touchQuery->withColumn(
            "string_agg(spy_product.sku, ',')",
            'concrete_skus'
        );
        $this->touchQuery->addJoin(
            SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_PRODUCT_ABSTRACT,
            Criteria::INNER_JOIN
        );
        $this->touchQuery->addJoin(
            SpyProductAbstractLocalizedAttributesTableMap::COL_FK_LOCALE,
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
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyUrlTableMap::COL_FK_RESOURCE_PRODUCT_ABSTRACT,
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
                SpyProductLocalizedAttributesTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'productAttributesJoin'
        );
        $this->touchQuery->addJoinCondition(
            'productAttributesJoin',
            SpyProductLocalizedAttributesTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );
        $this->touchQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, 'id_product_abstract');
        $this->touchQuery->withColumn(
            SpyProductAbstractTableMap::COL_ATTRIBUTES,
            'abstract_attributes'
        );
        $this->touchQuery->withColumn(
            SpyProductAbstractLocalizedAttributesTableMap::COL_ATTRIBUTES,
            'abstract_localized_attributes'
        );
        $this->touchQuery->withColumn(
            "string_agg(spy_product.attributes, '$%')",
            'concrete_attributes'
        );
        $this->touchQuery->withColumn(
            "string_agg(spy_product_localized_attributes.attributes, '$%')",
            'concrete_localized_attributes'
        );
        $this->touchQuery->withColumn(
            "string_agg(product_urls.url, ',')",
            'product_urls'
        );
        $this->touchQuery->withColumn(
            SpyProductAbstractLocalizedAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $this->touchQuery->withColumn(
            "string_agg(spy_product_localized_attributes.name, ',')",
            'concrete_names'
        );
        $this->touchQuery->withColumn(SpyProductAbstractTableMap::COL_SKU, 'abstract_sku');
        $this->touchQuery->withColumn(SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT, 'id_product_abstract');
        $this->touchQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductSearchTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'searchableJoin'
        );
        $this->touchQuery->addJoinCondition(
            'searchableJoin',
            SpyProductSearchTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );
        $this->touchQuery->addAnd(
            SpyProductSearchTableMap::COL_IS_SEARCHABLE,
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
            SpyProductCategoryTableMap::COL_FK_PRODUCT_ABSTRACT,
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

        $this->touchQuery = $this->joinCategoryQueryWithUrls($this->touchQuery);
        $this->touchQuery = $this->selectCategoryAttributeColumns($this->touchQuery);
        $this->touchQuery = $this->joinCategoryQueryWithChildrenCategories($this->touchQuery);
        $this->touchQuery = $this->joinLocalizedRelatedCategoryQueryWithAttributes($this->touchQuery, 'categoryChildren', 'child');
        $this->touchQuery = $this->joinRelatedCategoryQueryWithUrls($this->touchQuery, 'categoryChildren', 'child');
        $this->touchQuery = $this->joinCategoryQueryWithParentCategories($this->touchQuery, $excludeDirectParent, $excludeRoot);
        $this->touchQuery = $this->joinLocalizedRelatedCategoryQueryWithAttributes($this->touchQuery, 'categoryParents', 'parent');
        $this->touchQuery = $this->joinRelatedCategoryQueryWithUrls($this->touchQuery, 'categoryParents', 'parent');
        $this->touchQuery->withColumn(
            "string_agg(DISTINCT spy_category_node.id_category_node::text, ',')",
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


    /**
     * @param ModelCriteria $expandableQuery
     * @param string $rightTableAlias
     * @param string $fieldIdentifier
     * @param string $leftTableAlias
     *
     * @return ModelCriteria
     */
    public function joinCategoryQueryWithChildrenCategories(
        ModelCriteria $expandableQuery,
        $rightTableAlias = 'categoryChildren',
        $fieldIdentifier = 'child',
        $leftTableAlias = SpyCategoryNodeTableMap::TABLE_NAME
    ) {
        $expandableQuery
            ->addJoinObject(
                (new Join(
                    $leftTableAlias . '.id_category_node',
                    SpyCategoryNodeTableMap::COL_FK_PARENT_CATEGORY_NODE,
                    Criteria::LEFT_JOIN
                ))->setRightTableAlias($rightTableAlias)
            );

        $expandableQuery->withColumn(
            "string_agg(" . $rightTableAlias . ".id_category_node::text, ',')",
            'category_' . $fieldIdentifier . '_ids'
        );

        return $expandableQuery;
    }

    /**
     * @param ModelCriteria $expandableQuery
     * @param bool $excludeDirectParent
     * @param bool $excludeRoot
     * @param string $leftTableAlias
     * @param string $relationTableAlias
     * @param string $fieldIdentifier
     *
     * @throws PropelException
     *
     * @return ModelCriteria
     */
    public function joinCategoryQueryWithParentCategories(
        ModelCriteria $expandableQuery,
        $excludeDirectParent = true,
        $excludeRoot = true,
        $leftTableAlias = SpyCategoryNodeTableMap::TABLE_NAME,
        $relationTableAlias = 'categoryParents',
        $fieldIdentifier = 'parent'
    ) {
        $expandableQuery
            ->addJoinObject(
                (new Join(
                    $leftTableAlias . '.id_category_node',
                    SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT,
                    Criteria::LEFT_JOIN
                ))
            );

        $expandableQuery
            ->addJoinObject(
                (new Join(
                    SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE,
                    SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
                    Criteria::INNER_JOIN
                ))->setRightTableAlias($relationTableAlias),
                $relationTableAlias . 'Join'
            );

        if ($excludeDirectParent) {
            $expandableQuery->addAnd(
                SpyCategoryClosureTableTableMap::COL_DEPTH,
                0,
                Criteria::GREATER_THAN
            );
        }

        if ($excludeRoot) {
            $expandableQuery->addJoinCondition(
                $relationTableAlias . 'Join',
                $relationTableAlias . '.is_root = false'
            );
        }

        $expandableQuery->withColumn(
            "string_agg(" . $relationTableAlias . ".id_category_node::text, ',')",
            'category_' . $fieldIdentifier . '_ids'
        );
        $expandableQuery->withColumn(
            SpyCategoryClosureTableTableMap::COL_FK_CATEGORY_NODE_DESCENDANT,
            'descendant_id'
        );
        $expandableQuery->withColumn(
            SpyCategoryClosureTableTableMap::COL_DEPTH,
            'depth'
        );

        return $expandableQuery;
    }

    /**
     * @param ModelCriteria $expandableQuery
     * @param string $leftAlias
     *
     * @return ModelCriteria
     */
    public function joinCategoryQueryWithUrls(
        ModelCriteria $expandableQuery,
        $leftAlias = SpyCategoryNodeTableMap::TABLE_NAME
    ) {
        $expandableQuery
            ->addJoinObject(
                (new Join(
                    $leftAlias . '.id_category_node',
                    SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE,
                    Criteria::LEFT_JOIN
                ))->setRightTableAlias('categoryUrls'),
                'categoryUrlJoin'
            );

        $expandableQuery->addJoinCondition(
            'categoryUrlJoin',
            'categoryUrls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $expandableQuery->withColumn(
            "string_agg(categoryUrls.url, ',')",
            'category_urls'
        );

        return $expandableQuery;
    }

    /**
     * @param ModelCriteria $expandableQuery
     * @param string $relationTableAlias
     * @param string $fieldIdentifier
     *
     * @return ModelCriteria
     */
    public function joinLocalizedRelatedCategoryQueryWithAttributes(
        ModelCriteria $expandableQuery,
        $relationTableAlias,
        $fieldIdentifier
    ) {
        $expandableQuery->addJoinObject(
            (new Join(
                $relationTableAlias . '.fk_category',
                SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias($relationTableAlias . 'Attributes'),
            $relationTableAlias . 'AttributesJoin'
        );

        $expandableQuery->addCond(
            $relationTableAlias . 'AttributesJoin',
            SpyCategoryAttributeTableMap::COL_FK_LOCALE . '=' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $expandableQuery->withColumn(
            "string_agg(" . $relationTableAlias . "Attributes.name, ',')",
            'category_' . $fieldIdentifier . '_names'
        );

        return $expandableQuery;
    }

    /**
     * @param ModelCriteria $expandableQuery
     * @param string $relationTableAlias
     * @param string $fieldIdentifier
     *
     * @throws PropelException
     *
     * @return ModelCriteria
     */
    public function joinRelatedCategoryQueryWithUrls(
        ModelCriteria $expandableQuery,
        $relationTableAlias,
        $fieldIdentifier
    ) {
        $expandableQuery->addJoinObject(
            (new Join(
                $relationTableAlias . '.id_category_node',
                SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias($relationTableAlias . 'Urls'),
            $relationTableAlias . 'UrlJoin'
        );

        $expandableQuery->addJoinCondition(
            $relationTableAlias . 'UrlJoin',
            $relationTableAlias . 'Urls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $expandableQuery->withColumn(
            "string_agg(" . $relationTableAlias . "Urls.url, ',')",
            'category_' . $fieldIdentifier . '_urls'
        );

        return $expandableQuery;
    }


    /**
     * @param ModelCriteria $expandableQuery
     * @param string $tableAlias
     *
     * @return ModelCriteria
     */
    public function selectCategoryAttributeColumns(
        ModelCriteria $expandableQuery,
        $tableAlias = SpyCategoryAttributeTableMap::TABLE_NAME
    ) {
        $expandableQuery->withColumn(
            $tableAlias . '.name',
            'category_name'
        );
        $expandableQuery->withColumn(
            $tableAlias . '.meta_title',
            'category_meta_title'
        );
        $expandableQuery->withColumn(
            $tableAlias . '.meta_description',
            'category_meta_description'
        );
        $expandableQuery->withColumn(
            $tableAlias . '.meta_keywords',
            'category_meta_keywords'
        );
        $expandableQuery->withColumn(
            $tableAlias . '.category_image_name',
            'category_image_name'
        );

        return $expandableQuery;
    }

}
