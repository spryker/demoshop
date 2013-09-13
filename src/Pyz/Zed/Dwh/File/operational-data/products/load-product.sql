SET NAMES UTF8;

SELECT
  DISTINCT product.id_catalog_product,
  product.sku,
  user_id.value         AS user_id,
  user_art_id.value     AS user_art_id,
  product_category.name AS edition_type,
  substrate.value       AS substrate

-- load only products for which orders exist
FROM pac_sales_order_item item

  JOIN pac_catalog_product product
    ON item.sku = product.sku

  JOIN pac_catalog_product_simple simple
    ON simple.id_catalog_product = product.id_catalog_product

  LEFT JOIN pac_catalog_value_integer user_id
    ON user_id.fk_catalog_product = simple.fk_catalog_product_config
       AND user_id.fk_catalog_attribute = (SELECT
                                             id_catalog_attribute
                                           FROM pac_catalog_attribute
                                           WHERE name = 'user_id')

  LEFT JOIN pac_catalog_value_integer user_art_id
    ON user_art_id.fk_catalog_product = simple.fk_catalog_product_config
       AND user_art_id.fk_catalog_attribute = (SELECT
                                                 id_catalog_attribute
                                               FROM pac_catalog_attribute
                                               WHERE name = 'user_art_id')

  LEFT JOIN pac_catalog_value_option_single product_category_option
    ON product_category_option.fk_catalog_product = product.id_catalog_product
       AND product_category_option.fk_catalog_attribute = (SELECT
                                                             id_catalog_attribute
                                                           FROM pac_catalog_attribute
                                                           WHERE name = 'product_category')

  LEFT JOIN pac_catalog_value_option product_category
    ON product_category_option.fk_catalog_value_option = product_category.id_catalog_value_option

  LEFT JOIN pac_catalog_value_text substrate
    ON substrate.fk_catalog_product = product.id_catalog_product
       AND substrate.fk_catalog_attribute = (SELECT
                                               id_catalog_attribute
                                             FROM pac_catalog_attribute
                                             WHERE name = 'product_type')

