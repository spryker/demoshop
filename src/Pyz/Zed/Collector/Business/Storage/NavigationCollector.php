<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Criterion\BasicCriterion;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\CategoryExporter\Business\CategoryExporterFacade;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryAttributeTableMap;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\BatchIterator;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;

class NavigationCollector
{

    use KeyBuilderTrait;

    /**
     * @var CategoryExporterFacade
     */
    private $categoryExporterFacade;

    /**
     * @var CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @param CategoryExporterFacade $categoryExporterFacade
     * @param CategoryQueryContainer $categoryQueryContainer
     */
    public function __construct(CategoryExporterFacade $categoryExporterFacade, CategoryQueryContainer $categoryQueryContainer)
    {
        $this->categoryExporterFacade = $categoryExporterFacade;
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param $result
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $query = $this->createQuery($baseQuery, $locale);

        $resultSets = $this->getBatchIterator($query);

        $result->setTotalCount($resultSets->count());

        foreach ($resultSets as $resultSet) {
            $collectedData = $this->processData($resultSet, $locale);

            $dataWriter->write($collectedData, 'navigation');
            $result->increaseProcessedCount(count(current($collectedData)));
        }
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    private function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->clearSelectColumns();

        $join = new Join();
        $join
            ->setLeftTableName(SpyTouchTableMap::TABLE_NAME)
            ->setRightTableName(SpyCategoryNodeTableMap::TABLE_NAME)
            ->setJoinCondition(new BasicCriterion(new Criteria(), 'is_root', '1'))
        ;
        $baseQuery->addJoinObject($join);


        $baseQuery->addJoin(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::LEFT_JOIN
        );

        $baseQuery
            ->addJoin(
                SpyCategoryAttributeTableMap::COL_FK_LOCALE,
                SpyLocaleTableMap::COL_ID_LOCALE,
                Criteria::INNER_JOIN
            );

        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $locale->getIdLocale(),
            Criteria::EQUAL
        );

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery, 'rootChildren', 'rootChild');
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'rootChildren', 'rootChild');
        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery, 'categoryChildren', 'child', 'rootChildren');
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, true, false, 'rootChildren');
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($baseQuery, 'rootChildren');
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery, 'rootChildrenAttributes');

        $baseQuery->withColumn(
            'rootChildren.id_category_node',
            'node_id'
        );

        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('node_id');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale)
    {
        $navigationKey = $this->generateKey('', $locale->getLocaleName());

        $formattedCategoryNodes = [];

        foreach ($resultSet as $categoryNode) {
            $formattedCategoryNodes[] = $this->formatCategoryNode($categoryNode);
        }

        return [$navigationKey => $formattedCategoryNodes];
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
     * @param string $data
     *
     * @return string
     */
    protected function buildKey($data)
    {
        return 'navigation';
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'category';
    }


    /**
     * @param $baseQuery
     * @param int $chunkSize
     *
     * @return BatchIterator
     */
    public function getBatchIterator($baseQuery, $chunkSize = 1000)
    {
        return new BatchIterator($baseQuery, $chunkSize);
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