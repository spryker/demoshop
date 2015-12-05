<?php

namespace Pyz\Zed\Collector\Business\Storage\QueryBuilder\MySql;

use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPdoCollectorQuery;

class CategoryNodeCollector extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    public function prepareQuery()
    {
        $sql = '
SELECT
  `spy_touch`.`id_touch`  AS %s,
  `spy_touch`.`item_type`,
  `spy_touch`.`item_event`,
  `spy_touch`.`item_id`  AS %s,
  `spy_touch`.`touched`,
  GROUP_CONCAT(categoryUrls.url) AS category_urls,
  spy_category_attribute.name AS category_name,
  spy_category_attribute.meta_title AS category_meta_title,
  spy_category_attribute.meta_description AS category_meta_description,
  spy_category_attribute.meta_keywords AS category_meta_keywords,
  spy_category_attribute.category_image_name AS category_image_name,
  GROUP_CONCAT(categoryChildren.id_category_node) AS category_child_ids,
  GROUP_CONCAT(categoryChildrenAttributes.name) AS category_child_names,
  GROUP_CONCAT(categoryChildrenUrls.url) AS category_child_urls,
  GROUP_CONCAT(categoryParents.id_category_node) AS category_parent_ids,
  spy_category_closure_table.fk_category_node_descendant AS descendant_id,
  spy_category_closure_table.depth AS depth,
  GROUP_CONCAT(categoryParentsAttributes.name) AS category_parent_names,
  GROUP_CONCAT(categoryParentsUrls.url) AS category_parent_urls,
  spy_category_node.id_category_node AS node_id,
  spy_category_node.fk_category AS category_id
FROM `spy_touch`
  LEFT JOIN spy_category_node ON (`spy_touch`.`item_id` = spy_category_node.id_category_node)
  INNER JOIN spy_category_attribute ON (spy_category_node.fk_category = spy_category_attribute.fk_category)
  INNER JOIN spy_locale ON (spy_category_attribute.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_url categoryUrls ON (spy_category_node.id_category_node = categoryUrls.fk_resource_categorynode AND
                                     categoryUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_category_node categoryChildren
    ON (spy_category_node.id_category_node = categoryChildren.fk_parent_category_node)
  LEFT JOIN spy_category_attribute categoryChildrenAttributes
    ON (categoryChildren.fk_category = categoryChildrenAttributes.fk_category)
  LEFT JOIN spy_url categoryChildrenUrls
    ON (categoryChildren.id_category_node = categoryChildrenUrls.fk_resource_categorynode AND
        categoryChildrenUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_category_closure_table
    ON (spy_category_node.id_category_node = spy_category_closure_table.fk_category_node_descendant)
  INNER JOIN spy_category_node categoryParents
    ON (spy_category_closure_table.fk_category_node = categoryParents.id_category_node)
  LEFT JOIN spy_category_attribute categoryParentsAttributes
    ON (categoryParents.fk_category = categoryParentsAttributes.fk_category)
  LEFT JOIN spy_url categoryParentsUrls
    ON (categoryParents.id_category_node = categoryParentsUrls.fk_resource_categorynode AND
        categoryParentsUrls.fk_locale = spy_locale.id_locale)
WHERE `spy_touch`.`item_type` = :spy_touch_item_type AND `spy_touch`.`item_event` = :spy_touch_item_event AND
      `spy_touch`.`touched` >= :spy_touch_touched AND spy_locale.id_locale = :fk_locale AND
      spy_category_closure_table.depth > 0
';
        $sql = sprintf($sql, static::COLLECTOR_TOUCH_ID, static::COLLECTOR_RESOURCE_ID);

        dump($sql);
        exit();

        $this->criteriaBuilder
            ->sql($sql . ' %s')
            ->setOrderBy([
                'depth' => 'DESC',
                'descendant_id' => 'DESC',
            ])
            ->setGroupBy('category_id')
            ->setExtraParameter('fk_locale', $this->locale->getIdLocale());
    }

}
