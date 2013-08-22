SET NAMES UTF8;

SELECT
  id_sales_order_item_option,
  fk_sales_order_item,
  identifier,
  name,
  description,
  gross_price,
  price_to_pay,
  tax_percentage,
  created_at
FROM pac_sales_order_item_option;
