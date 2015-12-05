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
    protected $categoryQueryContainer;

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
        $sql = '
WITH RECURSIVE
    tree AS
  (
    SELECT
      n.id_category_node,
      n.fk_parent_category_node,
      n.fk_category,
      n.node_order
    FROM spy_category_node n
      INNER JOIN spy_category c ON c.id_category = n.fk_category AND c.is_active = true
    WHERE n.is_root = true

    UNION

    SELECT
      n.id_category_node,
      n.fk_parent_category_node,
      n.fk_category,
      n.node_order
    FROM tree
       INNER JOIN spy_category_node n ON n.fk_parent_category_node = tree.id_category_node
       INNER JOIN spy_category c ON c.id_category = tree.fk_category AND c.is_active = true
  )
SELECT
  t.id_touch AS %s,
  tree.*,
  u.url,
  ca.name,
  ca.meta_title,
  ca.meta_description,
  ca.meta_keywords,
  ca.category_image_name
FROM tree
  INNER JOIN spy_url u ON (u.fk_resource_categorynode = tree.id_category_node AND u.fk_locale = :fk_locale_1)
  INNER JOIN spy_category_attribute ca ON (ca.fk_category = tree.fk_category AND ca.fk_locale = :fk_locale_2)
  INNER JOIN spy_touch t ON (
    tree.id_category_node = t.item_id
    AND t.item_event = :spy_touch_item_event
    AND t.touched >= :spy_touch_touched
    AND t.item_type = :spy_touch_item_type
  )
';
        $sql = sprintf($sql, self::TOUCH_EXPORTER_ID);

        $this->getCriteriaBuilder()
            ->sql($sql)
            ->setOrderBy([
                'tree.fk_parent_category_node' => 'ASC',
                'tree.node_order' => 'DESC',
            ])
            ->setExtraParameter('fk_locale_1', $locale->getIdLocale())
            ->setExtraParameter('fk_locale_2', $locale->getIdLocale());
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
            $categoryKey = $this->generateKey($categoryNode['id_category_node'], $locale->getLocaleName());
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
