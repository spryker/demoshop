SET NAMES UTF8;

SELECT
  i.id_sales_order_item,
  i.fk_sales_order,
  i.fk_sales_order_item_status,
  i.fk_sales_order_process,
  i.name,
  i.sku,
  i.gross_price,
  i.price_to_pay,
  i.tax_percentage,
  i.created_at,
  p.id_catalog_product
FROM pac_sales_order_item i
  LEFT JOIN pac_catalog_product p
    ON p.sku = i.sku;
