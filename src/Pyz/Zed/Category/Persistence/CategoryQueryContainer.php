<?php

namespace Pyz\Zed\Category\Persistence;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryClosureTableTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryClosureTableQuery;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Exception\PropelException;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer as SprykerCategoryQueryContainer;

class CategoryQueryContainer extends SprykerCategoryQueryContainer
{
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
            'JSON_AGG(DISTINCT ' . $rightTableAlias . '.id_category_node)',
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
            'JSON_AGG(DISTINCT ' . $relationTableAlias . '.id_category_node)',
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

        $expandableQuery->addJoinObject(
            (new Join(
                $leftAlias . '.id_category_node',
                SpyCmsPageTableMap::COL_FK_CATEGORY_NODE,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('categoryPages'),
            'CategoryPagesJoin'
        );

        $expandableQuery->addJoinObject(
            (new Join(
                'categoryPages.id_cms_page',
                SpyUrlTableMap::COL_FK_RESOURCE_PAGE,
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
            'JSON_AGG(DISTINCT categoryUrls.url)',
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
            'JSON_AGG(DISTINCT ' . $relationTableAlias . 'Attributes.name)',
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
                SpyCmsPageTableMap::COL_FK_CATEGORY_NODE,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias($relationTableAlias.'categoryPages'),
            $relationTableAlias . 'CategoryPagesJoin'
        );

        $expandableQuery->addJoinObject(
            (new Join(
                $relationTableAlias.'categoryPages.id_cms_page',
                SpyUrlTableMap::COL_FK_RESOURCE_PAGE,
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
            'JSON_AGG(DISTINCT ' . $relationTableAlias . 'Urls.url)',
            'category_' . $fieldIdentifier . '_urls'
        );

        return $expandableQuery;
    }

    /**
     * @TODO: parent method uses non-existent COL_URL_KEY
     *
     * @param int $idChildNode
     * @param bool $excludeRoot
     *
     * @return SpyCategoryClosureTableQuery
     */
    public function getParentPath($idChildNode, $excludeRoot = true)
    {
        $query = new SpyCategoryClosureTableQuery();
        $query->filterByFkCategoryNodeDescendant($idChildNode)
            ->innerJoinNode()
            ->useNodeQuery()
            ->innerJoinCategory()
            ->useCategoryQuery()
            ->innerJoinAttribute()
            ->endUse()
            ->endUse()
            ->withColumn(SpyCategoryAttributeTableMap::COL_NAME, 'name')
            //->withColumn(SpyCategoryAttributeTableMap::COL_URL_KEY, 'url_key')
            ->orderBy(SpyCategoryClosureTableTableMap::COL_DEPTH, 'DESC');

        if ($excludeRoot) {
            $query->where(SpyCategoryNodeTableMap::COL_IS_ROOT . ' = false');
        }

        return $query;
    }

    /**
     * @param $idAbstractProduct
     * @return SpyCategoryQuery
     */
    public function queryCategoryByAbstractProductId($idAbstractProduct) {
        $query = SpyCategoryQuery::create();

        $query
            ->joinSpyProductCategory()
            ->where('SpyProductCategory.FkAbstractProduct = ?', $idAbstractProduct)
            ->orderBy('SpyProductCategory.ProductOrder')
        ;
        return $query;
    }

    /**
     * @param $keys
     * @return SpyCategoryQuery
     */
    public function queryCategoryByKeys($keys)
    {
        $query = SpyCategoryQuery::create();
        $query->filterByCategoryKey($keys);
        return $query;
    }
}
