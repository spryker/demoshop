SET NAMES UTF8;

SELECT

  s.id_sales_discount,
  p.fk_sales_order,
  p.fk_sales_order_item,
  s.saatchi_amount,
  s.artist_amount

FROM sao_sales_discount s
  LEFT JOIN pac_sales_discount p
    ON p.id_sales_discount = s.id_sales_discount
GROUP BY id_sales_discount;