SET NAMES UTF8;

SELECT
  fk_sales_order_item,
  fk_sales_order,
  type,
  name,
  gross_price,
  price_to_pay
FROM pac_sales_expense;
