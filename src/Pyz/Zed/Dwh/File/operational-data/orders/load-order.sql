SET NAMES UTF8;

SELECT
  id_sales_order,
  increment_id,
  user_id,
  grand_total,
  subtotal,
  is_test,
  pso.created_at,
  COUNT(psoi.id_sales_order_item),
  psoa.fk_misc_country

FROM pac_sales_order pso
  JOIN sao_legacy_sales_order ON id_legacy_sales_order = id_sales_order
  JOIN pac_sales_order_item psoi
    ON pso.id_sales_order = psoi.fk_sales_order
  LEFT JOIN pac_sales_order_address psoa
    ON psoa.id_sales_order_address = pso.fk_sales_order_address_shipping
GROUP BY id_sales_order;