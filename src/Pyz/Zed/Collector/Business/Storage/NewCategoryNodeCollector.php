<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Category\CategoryConfig;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Collector\Business\Exporter\NewAbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

class NewCategoryNodeCollector extends NewAbstractPropelCollectorPlugin
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
     * @return string
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        //$params = $baseQuery->getParams();
        //$sql = $baseQuery->createSelectSql($params);

        $sql = "
WITH RECURSIVE
    tree AS
  (
    SELECT
      n.id_category_node,
      n.fk_parent_category_node,
      n.fk_category
    FROM spy_category_node n
      INNER JOIN spy_category c ON c.id_category = n.fk_category AND c.is_active = 't'
    WHERE n.fk_parent_category_node = %d

    UNION

    SELECT
      n.id_category_node,
      n.fk_parent_category_node,
      n.fk_category
    FROM tree
       INNER JOIN spy_category_node n ON n.fk_parent_category_node = tree.id_category_node
       INNER JOIN spy_category c ON c.id_category = n.fk_category AND c.is_active = 't'
  )
SELECT
  t.id_touch as %s,
  tree.*,
  u.url,
  ca.name,
  ca.meta_title,
  ca.meta_description,
  ca.meta_keywords,
  ca.category_image_name
FROM tree
  INNER JOIN spy_url u ON (u.fk_resource_categorynode = tree.id_category_node AND u.fk_locale = %d)
  INNER JOIN spy_category_attribute ca ON (ca.fk_category = tree.fk_category AND ca.fk_locale = %d)
  INNER JOIN spy_touch t ON (
    tree.id_category_node = t.item_id
    AND t.item_event = %d
    AND t.touched >= '%s'
    AND t.item_type = '%s'
  )
ORDER BY tree.id_category_node
        ";

        $idRoot = 1;
        $idLocale = 46;
        $touchEvent = 0;
        $touchItemType = 'categorynode';
        $touchedWhen = '2015-12-03 19:26:53';

        $sql = sprintf($sql, $idRoot, self::TOUCH_EXPORTER_ID, $idLocale, $idLocale, $touchEvent, $touchedWhen, $touchItemType);

        $conn = $this->touchQueryContainer->getConnection();
        $st = $conn->prepare($sql);

        $st->execute([

        ]);

        $results = $st->fetchAll(\PDO::FETCH_ASSOC);

        dump($results);
        die;

        /*
        $connection = Propel::getConnection();
        $query = 'SELECT MAX(?) AS max FROM ?';
        $statement = $connection->prepareStatement($query);
        $statement->setString(1, ArticlePeer::CREATED_AT);
        $statement->setString(2, ArticlePeer::TABLE_NAME);
        $resultset = $statement->executeQuery();
        $resultset->next();
        $max = $resultset->getInt('max');
        */
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
            $touchUpdaterSet->add($categoryKey, $categoryNode[self::TOUCH_EXPORTER_ID]);
        }

        return $processedResultSet;
    }

    /**
     * @param array $categoryNode
     *
     * @return array
     */
    protected function formatCategoryNode(array $categoryNode)
    {
        return [
            'node_id' => $categoryNode['id_category_node'],
            'name' => $categoryNode['name'],
            'url' => $categoryNode['url'],
            'image' => $categoryNode['category_image_name'],
            'children' => [],
            'parents' => [],
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

}
