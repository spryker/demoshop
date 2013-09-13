SET NAMES UTF8;

SELECT
  i.id_sales_order_item AS item_id,
  p.name                AS name

FROM pac_sales_order_process p
  JOIN pac_sales_order_item i
    ON i.fk_sales_order_process = p.id_sales_order_process
;