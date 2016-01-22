<?php

namespace Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;

class ProductCollector extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  spy_touch.id_touch                                        AS %s,
  spy_touch.item_id                                         AS %s,
  spy_touch_search.id_touch_search                          AS %s,
  spy_touch.touched,
  spy_product_abstract.id_product_abstract                  AS id_product_abstract,
  spy_product_abstract.sku                                  AS abstract_sku,
  spy_product_abstract_localized_attributes.name            AS abstract_name,
  spy_product_abstract.attributes                           AS abstract_attributes,
  spy_product_abstract_localized_attributes.attributes      AS abstract_localized_attributes,
  GROUP_CONCAT(spy_product.sku)                             AS concrete_skus,
  GROUP_CONCAT(spy_product.attributes)                      AS concrete_attributes,
  GROUP_CONCAT(spy_product_localized_attributes.attributes) AS concrete_localized_attributes,
  spy_stock_product.quantity                                AS quantity,
  spy_stock_product.is_never_out_of_stock                   AS is_never_out_of_stock,
  spy_category_attribute.name                               AS category_name,
  spy_category_attribute.meta_title                         AS category_meta_title,
  spy_category_attribute.meta_description                   AS category_meta_description,
  spy_category_attribute.meta_keywords                      AS category_meta_keywords,
  spy_category_node.fk_category                             AS category_id,
  spy_category_closure_table.fk_category_node_descendant    AS descendant_id,
  spy_category_closure_table.depth                          AS depth,
  GROUP_CONCAT(product_urls.url)                            AS product_urls,
  GROUP_CONCAT(spy_product_localized_attributes.name)       AS concrete_names,
  GROUP_CONCAT(categoryUrls.url)                            AS category_urls,
  GROUP_CONCAT(categoryChildren.id_category_node)           AS category_child_ids,
  GROUP_CONCAT(categoryChildrenAttributes.name)             AS category_child_names,
  GROUP_CONCAT(categoryChildrenUrls.url)                    AS category_child_urls,
  GROUP_CONCAT(categoryParents.id_category_node)            AS category_parent_ids,
  GROUP_CONCAT(categoryParentsAttributes.name)              AS category_parent_names,
  GROUP_CONCAT(categoryParentsUrls.url)                     AS category_parent_urls,
  GROUP_CONCAT(DISTINCT spy_category_node.id_category_node) AS node_id
FROM spy_touch
  INNER JOIN spy_product_abstract
    ON (spy_touch.item_id = spy_product_abstract.id_product_abstract)
  LEFT JOIN spy_product
    ON (spy_product_abstract.id_product_abstract = spy_product.fk_product_abstract AND spy_product.is_active)
  INNER JOIN spy_product_abstract_localized_attributes
    ON (spy_product_abstract.id_product_abstract = spy_product_abstract_localized_attributes.fk_product_abstract)
  INNER JOIN spy_locale
    ON (spy_product_abstract_localized_attributes.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_url product_urls
    ON (spy_product_abstract.id_product_abstract = product_urls.fk_resource_product_abstract AND product_urls.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_product_localized_attributes
    ON (spy_product.id_product = spy_product_localized_attributes.fk_product AND spy_product_localized_attributes.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_product_search
    ON (spy_product.id_product = spy_product_search.fk_product AND spy_product_search.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_stock_product
    ON (spy_product.id_product = spy_stock_product.fk_product)
  LEFT JOIN spy_product_category
    ON (spy_touch.item_id = spy_product_category.fk_product_abstract)
  INNER JOIN spy_category_node
    ON (spy_product_category.fk_category = spy_category_node.id_category_node)
  INNER JOIN spy_category_attribute
    ON (spy_category_node.fk_category = spy_category_attribute.fk_category AND spy_category_attribute.fk_locale = :fk_locale_1)
  LEFT JOIN spy_url categoryUrls
    ON (spy_category_node.id_category_node = categoryUrls.fk_resource_categorynode AND categoryUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_category_node categoryChildren
    ON (spy_category_node.id_category_node = categoryChildren.fk_parent_category_node)
  LEFT JOIN spy_category_attribute categoryChildrenAttributes
    ON (categoryChildren.fk_category = categoryChildrenAttributes.fk_category)
  LEFT JOIN spy_url categoryChildrenUrls
    ON (categoryChildren.id_category_node = categoryChildrenUrls.fk_resource_categorynode AND categoryChildrenUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_category_closure_table
    ON (spy_category_node.id_category_node = spy_category_closure_table.fk_category_node_descendant)
  INNER JOIN spy_category_node categoryParents
    ON (spy_category_closure_table.fk_category_node = categoryParents.id_category_node AND categoryParents.is_root = FALSE)
  LEFT JOIN spy_category_attribute categoryParentsAttributes
    ON (categoryParents.fk_category = categoryParentsAttributes.fk_category)
  LEFT JOIN spy_url categoryParentsUrls
    ON (categoryParents.id_category_node = categoryParentsUrls.fk_resource_categorynode AND categoryParentsUrls.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_touch_search ON spy_touch_search.fk_touch = spy_touch.id_touch AND spy_touch_search.fk_locale = :fk_locale_2
WHERE
  spy_touch.item_event = :spy_touch_item_event
  AND spy_touch.touched >= :spy_touch_touched
  AND spy_touch.item_type = :spy_touch_item_type
  AND spy_product_search.is_searchable = TRUE
';
        $this->criteriaBuilder
            ->sql($sql)
            ->setOrderBy([
                'depth' => 'DESC',
                'descendant_id' => 'DESC',
            ])
            ->setGroupBy('
              abstract_sku,
              abstract_name,
              id_product_abstract,
              collector_resource_id,
              collector_touch_id,
              collector_search_key,
              quantity,
              is_never_out_of_stock,
              category_name,
              category_meta_title,
              category_meta_description,
              category_meta_keywords,
              abstract_attributes,
              abstract_localized_attributes,
              category_id,
              descendant_id,
              depth
            ')
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale());
    }

}
