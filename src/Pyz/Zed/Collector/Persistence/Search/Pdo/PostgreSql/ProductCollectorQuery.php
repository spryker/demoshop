<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;

class ProductCollectorQuery extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  GROUP_CONCAT("spy_product"."sku")                             AS concrete_skus,
  MIN(spy_product_abstract.id_product_abstract)                 AS id_product_abstract,
  MIN(spy_product_abstract.attributes)                          AS abstract_attributes,
  MIN("spy_product_abstract_localized_attributes"."attributes") AS abstract_localized_attributes,
  GROUP_CONCAT("spy_product"."attributes")                      AS concrete_attributes,
  GROUP_CONCAT("spy_product_localized_attributes"."attributes") AS concrete_localized_attributes,
  GROUP_CONCAT(product_urls.url)                                AS product_urls,
  MIN("spy_product_abstract_localized_attributes"."name")       AS abstract_name,
  GROUP_CONCAT("spy_product_localized_attributes"."name")       AS concrete_names,
  spy_product_abstract.sku                                      AS abstract_sku,
  spy_stock_product.quantity                                    AS quantity,
  spy_stock_product.is_never_out_of_stock                       AS is_never_out_of_stock,
  "spy_touch"."id_touch"                                        AS exporter_touch_id,
  GROUP_CONCAT(categoryUrls.url)                                AS category_urls,
  MIN(spy_category_attribute.name)                              AS category_name,
  MIN(spy_category_attribute.meta_title)                        AS category_meta_title,
  MIN(spy_category_attribute.meta_description)                  AS category_meta_description,
  MIN(spy_category_attribute.meta_keywords)                     AS category_meta_keywords,
  MIN(spy_category_attribute.category_image_name)               AS category_image_name,
  GROUP_CONCAT(categoryChildren.id_category_node)               AS category_child_ids,
  GROUP_CONCAT(categoryChildrenAttributes.name)                 AS category_child_names,
  GROUP_CONCAT(categoryChildrenUrls.url)                        AS category_child_urls,
  GROUP_CONCAT(categoryParents.id_category_node)                AS category_parent_ids,
  MIN(spy_category_closure_table.fk_category_node_descendant)   AS descendant_id,
  MIN(spy_category_closure_table.depth)                         AS depth,
  GROUP_CONCAT(categoryParentsAttributes.name)                  AS category_parent_names,
  GROUP_CONCAT(categoryParentsUrls.url)                         AS category_parent_urls,
  GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)     AS node_id,
  MIN(spy_category_node.fk_category)                            AS category_id,
  GROUP_CONCAT(spy_product_category.product_order)              AS product_order,
  spy_touch.id_touch                                            AS %s,
  spy_touch.item_id                                             AS %s,
  spy_touch_search.id_touch_search                              AS %s
FROM "spy_touch"
  INNER JOIN spy_product_abstract ON ("spy_touch"."item_id" = spy_product_abstract.id_product_abstract)
  LEFT JOIN spy_product
    ON (spy_product_abstract.id_product_abstract = "spy_product"."fk_product_abstract" AND "spy_product"."is_active")
  INNER JOIN spy_product_abstract_localized_attributes
    ON (spy_product_abstract.id_product_abstract = "spy_product_abstract_localized_attributes"."fk_product_abstract")
  INNER JOIN spy_locale ON ("spy_product_abstract_localized_attributes"."fk_locale" = spy_locale.id_locale)
  LEFT JOIN spy_url product_urls
    ON (spy_product_abstract.id_product_abstract = product_urls.fk_resource_product_abstract AND
        product_urls.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_product_localized_attributes
    ON ("spy_product"."id_product" = "spy_product_localized_attributes"."fk_product" AND
        "spy_product_localized_attributes"."fk_locale" = spy_locale.id_locale)
    INNER JOIN spy_product_search ON (spy_product.id_product = spy_product_search.fk_product AND
                                    spy_product_search.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_stock_product ON (spy_product.id_product = spy_stock_product.fk_product)
  LEFT JOIN spy_product_category ON ("spy_touch"."item_id" = spy_product_category.fk_product_abstract)
  INNER JOIN spy_category ON (spy_product_category.fk_category = spy_category.id_category)
  INNER JOIN spy_category_attribute ON (spy_category.id_category = spy_category_attribute.fk_category)
  INNER JOIN spy_category_node ON (spy_category.id_category = spy_category_node.fk_category)
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
    ON (spy_category_closure_table.fk_category_node = categoryParents.id_category_node AND
        categoryParents.is_root = FALSE)
  LEFT JOIN spy_category_attribute categoryParentsAttributes
    ON (categoryParents.fk_category = categoryParentsAttributes.fk_category)
  LEFT JOIN spy_url categoryParentsUrls
    ON (categoryParents.id_category_node = categoryParentsUrls.fk_resource_categorynode AND
        categoryParentsUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_touch_search ON spy_touch_search.fk_touch = spy_touch.id_touch AND spy_touch_search.fk_locale = :fk_locale_1
WHERE
  spy_touch.item_event = :spy_touch_item_event
  AND spy_touch.touched >= :spy_touch_touched
  AND spy_touch.item_type = :spy_touch_item_type
  AND spy_product_search.is_searchable = TRUE
  AND spy_locale.is_active = TRUE
';
        $this->criteriaBuilder->sql($sql)->setOrderBy([
                'depth' => 'DESC',
                'descendant_id' => 'DESC',
            ])->setGroupBy('
                abstract_sku,
                spy_touch.id_touch,
                spy_stock_product.quantity,
                spy_stock_product.is_never_out_of_stockc,
                spy_touch_search.id_touch_search
            ')->setParameter('fk_locale_1', $this->locale->getIdLocale());
    }

}
