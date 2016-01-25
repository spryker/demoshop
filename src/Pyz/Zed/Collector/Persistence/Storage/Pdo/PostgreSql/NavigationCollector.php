<?php

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;

class NavigationCollector extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  GROUP_CONCAT(rootChildren.id_category_node)            AS category_rootChild_ids,
  GROUP_CONCAT(rootChildrenAttributes.name)              AS category_rootChild_names,
  GROUP_CONCAT(categoryChildren.id_category_node)        AS category_child_ids,
  GROUP_CONCAT(categoryChildrenAttributes.name)          AS category_child_names,
  GROUP_CONCAT(categoryParents.id_category_node)         AS category_parent_ids,
  spy_category_closure_table.fk_category_node_descendant AS descendant_id,
  spy_category_closure_table.depth                       AS depth,
  GROUP_CONCAT(categoryParentsAttributes.name)           AS category_parent_names,
  GROUP_CONCAT(categoryChildrenUrls.url)                 AS category_child_urls,
  GROUP_CONCAT(categoryParentsUrls.url)                  AS category_parent_urls,
  GROUP_CONCAT(categoryUrls.url)                         AS category_urls,
  rootChildrenAttributes.name                            AS category_name,
  rootChildrenAttributes.meta_title                      AS category_meta_title,
  rootChildrenAttributes.meta_description                AS category_meta_description,
  rootChildrenAttributes.meta_keywords                   AS category_meta_keywords,
  rootChildrenAttributes.category_image_name             AS category_image_name,
  rootChildren.id_category_node                          AS node_id,
  spy_touch.id_touch AS %s,
  spy_touch.item_id AS %s,
  spy_touch_storage.id_touch_storage AS %s
FROM spy_touch
  LEFT JOIN spy_touch_storage ON (spy_touch.id_touch = spy_touch_storage.fk_touch)
  INNER JOIN spy_category_node ON is_root = TRUE
  LEFT JOIN spy_category_attribute
    ON (spy_category_node.fk_category = spy_category_attribute.fk_category AND spy_category_attribute.fk_locale = :fk_locale_1)
  LEFT JOIN spy_category_node rootChildren
    ON (spy_category_node.id_category_node = rootChildren.fk_parent_category_node)
  LEFT JOIN spy_category_attribute rootChildrenAttributes
    ON (rootChildren.fk_category = rootChildrenAttributes.fk_category AND
        rootChildrenAttributes.fk_locale = :fk_locale_2)
  LEFT JOIN spy_category_node categoryChildren
    ON (rootChildren.id_category_node = categoryChildren.fk_parent_category_node)
  LEFT JOIN spy_category_attribute categoryChildrenAttributes
    ON (categoryChildren.fk_category = categoryChildrenAttributes.fk_category AND
        categoryChildrenAttributes.fk_locale = :fk_locale_3)
  LEFT JOIN spy_category_closure_table
    ON (rootChildren.id_category_node = spy_category_closure_table.fk_category_node_descendant)
  INNER JOIN spy_category_node categoryParents
    ON (spy_category_closure_table.fk_category_node = categoryParents.id_category_node)
  LEFT JOIN spy_category_attribute categoryParentsAttributes
    ON (categoryParents.fk_category = categoryParentsAttributes.fk_category AND
        categoryParentsAttributes.fk_locale = :fk_locale_4)
  LEFT JOIN spy_url categoryChildrenUrls
    ON (categoryChildren.id_category_node = categoryChildrenUrls.fk_resource_categorynode AND
        categoryChildrenUrls.fk_locale = :fk_locale_5)
  LEFT JOIN spy_url categoryParentsUrls
    ON (categoryParents.id_category_node = categoryParentsUrls.fk_resource_categorynode AND
        categoryParentsUrls.fk_locale = :fk_locale_6)
  LEFT JOIN spy_url categoryUrls ON (rootChildren.id_category_node = categoryUrls.fk_resource_categorynode AND
                                     categoryUrls.fk_locale = :fk_locale_7)
WHERE
    spy_touch.item_event = :spy_touch_item_event
    AND spy_touch.touched >= :spy_touch_touched
    AND spy_touch.item_type = :spy_touch_item_type
    AND spy_category_closure_table.depth > 0
GROUP BY node_id, spy_touch.id_touch, spy_touch.item_type, spy_touch.item_event, spy_touch.item_id,
  spy_touch.touched, spy_touch.id_touch, spy_touch.item_id, spy_touch_storage.id_touch_storage,
  spy_category_closure_table.fk_category_node_descendant, spy_category_closure_table.depth, rootChildrenAttributes.name,
  rootChildrenAttributes.meta_title, rootChildrenAttributes.meta_description, rootChildrenAttributes.meta_keywords,
  rootChildrenAttributes.category_image_name
        ';
        $this->criteriaBuilder
            ->sql($sql)
            ->setOrderBy([
                'depth' => 'DESC',
                'descendant_id' => 'DESC',
            ])
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale())
            ->setParameter('fk_locale_3', $this->locale->getIdLocale())
            ->setParameter('fk_locale_4', $this->locale->getIdLocale())
            ->setParameter('fk_locale_5', $this->locale->getIdLocale())
            ->setParameter('fk_locale_6', $this->locale->getIdLocale())
            ->setParameter('fk_locale_7', $this->locale->getIdLocale());
    }

}
