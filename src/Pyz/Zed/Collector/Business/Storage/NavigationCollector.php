<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Criterion\BasicCriterion;
use Propel\Runtime\ActiveQuery\Join;
use PavFeature\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer;
use Pyz\Zed\Collector\Business\Exception\WrongJsonStringException;
use Pyz\Zed\Propel\Business\PropelFacade;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

class NavigationCollector extends AbstractPropelCollectorPlugin
{

    use KeyBuilderTrait;

    /**
     * @var CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @var PropelFacade
     */
    private $propelFacade;

    /**
     * @var CategoryCmsConnectorQueryContainer
     */
    private $categoryCmsQueryContainer;

    /**
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param CategoryCmsConnectorQueryContainer $categoryCmsQueryContainer
     * @param PropelFacade $propelFacade
     */
    public function __construct(
        CategoryQueryContainer $categoryQueryContainer,
        CategoryCmsConnectorQueryContainer $categoryCmsQueryContainer,
        PropelFacade $propelFacade
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->categoryCmsQueryContainer = $categoryCmsQueryContainer;
        $this->propelFacade = $propelFacade;
    }

    /**
     * @return string
     */
    protected function getTouchItemType()
    {
        return 'navigation';
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
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
        $baseQuery = $this->categoryCmsQueryContainer->joinRelatedCategoryQueryWithPageUrls($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryCmsQueryContainer->joinRelatedCategoryQueryWithPageUrls($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryCmsQueryContainer->joinCategoryQueryWithPageUrls($baseQuery, 'rootChildren');
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery, 'rootChildrenAttributes');

        $baseQuery->withColumn(
            'rootChildren.id_category_node',
            'node_id'
        );

        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('node_id');

        $baseQuery = $this->propelFacade->addAggregateToNotGroupedColumns($baseQuery);

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
        $categoryUrls = $this->decodeData($categoryNode['category_urls']);

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

        $ids = $this->decodeData($data[$idsField]);
        $names = $this->decodeData($data[$namesField]);
        $urls = $this->decodeData($data[$urlsField]);
        $nodes = [];
        foreach ($ids as $key => $id) {
            $nodes[$id]['node_id'] = $id;
            $nodes[$id]['name'] = $names[$key];
            $nodes[$id]['url'] = $urls[$key];
        }

        return $nodes;
    }

    /**
     * @param $data
     *
     * @throws WrongJsonStringException
     * @return array
     */
    protected function decodeData($data)
    {
        $encodedData = json_decode($data, true);

        if (json_last_error()) {
            $message = json_last_error_msg() . ': ' . $data;

            throw new WrongJsonStringException($message);
        }

        return $encodedData;
    }

}
