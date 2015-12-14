<?php

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use SprykerFeature\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;

class ProductCollector extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  GROUP_CONCAT("spy_product"."sku") AS concrete_skus,
  spy_abstract_product.id_abstract_product AS id_abstract_product,
  spy_abstract_product.attributes AS abstract_attributes,
  "spy_abstract_product_localized_attributes"."attributes" AS abstract_localized_attributes,
  GROUP_CONCAT("spy_product"."attributes") AS concrete_attributes,
  GROUP_CONCAT("spy_product_localized_attributes"."attributes") AS concrete_localized_attributes,
  GROUP_CONCAT(product_urls.url) AS product_urls,
  "spy_abstract_product_localized_attributes"."name" AS abstract_name,
  GROUP_CONCAT("spy_product_localized_attributes"."name") AS concrete_names,
  spy_abstract_product.sku AS abstract_sku,
  (SELECT SUM(v.quantity)
  FROM spy_stock_product v
  WHERE v.fk_product = spy_product.id_product) AS quantity,
  abstract_price_table.price AS abstract_price,
  GROUP_CONCAT(concrete_price_table.price) AS concrete_prices,
  GROUP_CONCAT(spy_price_type.name) AS price_types,
  spy_tax_set.name AS tax_set_name,
  GROUP_CONCAT(DISTINCT spy_tax_rate.name) AS tax_rate_names,
  GROUP_CONCAT(DISTINCT spy_tax_rate.rate) AS tax_rate_rates,
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
  GROUP_CONCAT(DISTINCT spy_category_node.id_category_node) AS node_id,
  spy_category_node.fk_category AS category_id,
  "spy_touch"."id_touch" AS %s,
  "spy_touch"."item_id" AS %s
FROM "spy_touch"
  INNER JOIN spy_abstract_product ON ("spy_touch"."item_id" = spy_abstract_product.id_abstract_product)
  LEFT JOIN spy_product
    ON (spy_abstract_product.id_abstract_product = "spy_product"."fk_abstract_product" AND "spy_product"."is_active")
  INNER JOIN spy_abstract_product_localized_attributes
    ON (spy_abstract_product.id_abstract_product = "spy_abstract_product_localized_attributes"."fk_abstract_product")
  INNER JOIN spy_locale ON ("spy_abstract_product_localized_attributes"."fk_locale" = spy_locale.id_locale)
  LEFT JOIN spy_url product_urls
    ON (spy_abstract_product.id_abstract_product = product_urls.fk_resource_abstract_product AND
        product_urls.fk_locale = spy_locale.id_locale)
  INNER JOIN spy_product_localized_attributes
    ON ("spy_product"."id_product" = "spy_product_localized_attributes"."fk_product" AND
        "spy_product_localized_attributes"."fk_locale" = spy_locale.id_locale)
  LEFT JOIN spy_price_product abstract_price_table
    ON (spy_abstract_product.id_abstract_product = abstract_price_table.fk_abstract_product)
  LEFT JOIN spy_price_product concrete_price_table
    ON ("spy_product"."id_product" = concrete_price_table.fk_product AND concrete_price_table.fk_price_type = 1)
  LEFT JOIN spy_price_type spy_price_type ON (concrete_price_table.fk_price_type = spy_price_type.id_price_type)
  LEFT JOIN spy_tax_set ON (spy_abstract_product.fk_tax_set = spy_tax_set.id_tax_set)
  LEFT JOIN spy_tax_set_tax ON (spy_tax_set.id_tax_set = spy_tax_set_tax.fk_tax_set)
  LEFT JOIN spy_tax_rate ON (spy_tax_set_tax.fk_tax_rate = spy_tax_rate.id_tax_rate)
  LEFT JOIN spy_product_category ON ("spy_touch"."item_id" = spy_product_category.fk_abstract_product)
  INNER JOIN spy_category_attribute ON (spy_product_category.fk_category = spy_category_attribute.fk_category)
  INNER JOIN spy_category_node ON (spy_product_category.fk_category = spy_category_node.fk_category)
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
WHERE "spy_touch"."item_type" = :spy_touch_item_type AND "spy_touch"."item_event" = :spy_touch_item_event
    AND "spy_touch"."touched" >= :spy_touch_touched AND
      spy_locale.id_locale = :fk_locale AND spy_locale.is_active = true
GROUP BY abstract_sku, abstract_sku, abstract_sku, spy_abstract_product.id_abstract_product,
  spy_abstract_product.attributes, "spy_abstract_product_localized_attributes"."attributes",
  "spy_abstract_product_localized_attributes"."name", abstract_price_table.price, spy_tax_set.name,
  spy_category_attribute.name, spy_category_attribute.meta_title, spy_category_attribute.meta_description,
  spy_category_attribute.meta_keywords, spy_category_attribute.category_image_name,
  spy_category_closure_table.fk_category_node_descendant, spy_category_closure_table.depth,
  spy_category_node.fk_category, "spy_touch"."id_touch", spy_product.id_product
';
        $this->criteriaBuilder
            ->sql($sql)
            ->setOrderBy([
                'depth' => 'DESC',
                'descendant_id' => 'DESC',
            ])
            ->setParameter('fk_locale', $this->locale->getIdLocale());
    }

}
