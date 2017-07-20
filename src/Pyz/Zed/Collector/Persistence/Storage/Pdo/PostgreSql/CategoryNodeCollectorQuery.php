<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class CategoryNodeCollectorQuery extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
  WITH RECURSIVE
      tree AS
    (
      SELECT
        n.id_category_node,
        n.fk_parent_category_node,
        n.fk_category,
        n.node_order,
        c.fk_category_template
      FROM spy_category_node n
        INNER JOIN spy_category c ON c.id_category = n.fk_category AND c.is_active = TRUE
      WHERE n.is_root = TRUE

      UNION

      SELECT
        n.id_category_node,
        n.fk_parent_category_node,
        n.fk_category,
        n.node_order,
        c.fk_category_template
      FROM tree
        INNER JOIN spy_category_node n ON n.fk_parent_category_node = tree.id_category_node
        INNER JOIN spy_category c ON c.id_category = n.fk_category AND c.is_active = TRUE
    )
  SELECT
    t.id_touch AS %s,
    t.item_id AS %s,
    spy_touch_storage.id_touch_storage AS %s,
    tree.*,
    u.url,
    ca.name,
    ca.meta_title,
    ca.meta_description,
    ca.meta_keywords,
    ca.category_image_name,
    ct.template_path,
    \'\' AS "children",
    \'\' AS "parents"
  FROM tree
    INNER JOIN spy_category_template ct ON ct.id_category_template = tree.fk_category_template
    INNER JOIN spy_url u ON (u.fk_resource_categorynode = tree.id_category_node AND u.fk_locale = :fk_locale_1)
    INNER JOIN spy_category_attribute ca ON (ca.fk_category = tree.fk_category AND ca.fk_locale = :fk_locale_2)
    INNER JOIN spy_touch t ON (
    tree.id_category_node = t.item_id
        AND t.item_event = :spy_touch_item_event
        AND t.touched >= :spy_touch_touched
        AND t.item_type = :spy_touch_item_type
    )
    LEFT JOIN spy_touch_storage ON spy_touch_storage.fk_touch = t.id_touch AND spy_touch_storage.fk_locale = :fk_locale_3
';
        $this->criteriaBuilder
            ->sql($sql)
            ->setOrderBy([
                'tree.fk_parent_category_node' => 'ASC',
                'tree.node_order' => 'DESC',
            ])
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale())
            ->setParameter('fk_locale_3', $this->locale->getIdLocale());
    }

}
