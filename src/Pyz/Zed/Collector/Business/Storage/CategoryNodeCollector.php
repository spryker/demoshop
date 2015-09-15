<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Category\CategoryConfig;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryAttributeTableMap;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

class CategoryNodeCollector extends AbstractPropelCollectorPlugin
{

    use KeyBuilderTrait;

    /**
     * @var CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @param CategoryQueryContainer $categoryQueryContainer
     */
    public function __construct(CategoryQueryContainer $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    protected function getTouchItemType()
    {
        return 'categorynode';
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
            Criteria::LEFT_JOIN
        );

        $baseQuery->addJoin(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyCategoryAttributeTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $locale->getIdLocale(),
            Criteria::EQUAL
        );

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($baseQuery);
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery);

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryChildren', 'child');

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, true, false);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');

        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
            'node_id'
        );
        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );

        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('category_id');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $processedResultSet = [];

        foreach ($resultSet as $index => $categoryNode) {
            $categoryKey = $this->generateKey($categoryNode['node_id'], $locale->getLocaleName());
            $processedResultSet[$categoryKey] = $this->formatCategoryNode($categoryNode);
        }

        return $processedResultSet;
    }

    /**
     * @param array $categoryNode
     *
     * @return array
     */
    private function formatCategoryNode(array $categoryNode)
    {
        $categoryUrls = explode(',', $categoryNode['category_urls']);

        return [
            'node_id' => $categoryNode['node_id'],
            'name' => $categoryNode['category_name'],
            'url' => $categoryUrls[0],
            'image' => $categoryNode['category_image_name'],
            'children' => $this->explodeGroupedNodes(
                $categoryNode,
                'category_child_ids',
                'category_child_names',
                'category_child_urls'
            ),
            'parents' => $this->explodeGroupedNodes(
                $categoryNode,
                'category_parent_ids',
                'category_parent_names',
                'category_parent_urls'
            ),
        ];
    }


    /**
     * @param string $identifier
     *
     * @return string
     */
    protected function buildKey($identifier)
    {
        return $this->getResourceType() . '.' . $identifier;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'resource';
    }

    /**
     * @return string
     */
    protected function getResourceType()
    {
        return CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE;
    }

    /**
     * @param array $data
     * @param string $idsField
     * @param string $namesField
     * @param string $urlsField
     *
     * @return array
     */
    public function explodeGroupedNodes(array $data, $idsField, $namesField, $urlsField)
    {
        if (!$data[$idsField]) {
            return [];
        }

        $ids = explode(',', $data[$idsField]);
        $names = explode(',', $data[$namesField]);
        $urls = explode(',', $data[$urlsField]);
        $nodes = [];
        foreach ($ids as $key => $id) {
            $nodes[$id]['node_id'] = $id;
            $nodes[$id]['name'] = $names[$key];
            $nodes[$id]['url'] = $urls[$key];
        }

        return $nodes;
    }

}
