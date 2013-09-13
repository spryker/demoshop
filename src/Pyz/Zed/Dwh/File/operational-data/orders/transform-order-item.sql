CREATE TABLE dim_next.order_item (
  order_item_id                    INTEGER  NOT NULL,
  order_fk                         INTEGER  NOT NULL,
  product_fk                       INTEGER  NOT NULL,
  order_item_status_fk             SMALLINT NOT NULL,
  price_range_fk                   SMALLINT NOT NULL,
  order_process_fk                 INTEGER  NOT NULL,
  option_fk                        INTEGER,
  gross_revenue_item               REAL,
  net_item_price                   REAL,
  vat_amount                       REAL,
  net_shipping_revenue             REAL,
  duties_amount                    REAL,
  gross_revenue_item_option        REAL,
  net_option_price                 REAL,
  net_payment_cost                 REAL,
  net_option_cost                  REAL,
  net_printing_cost                REAL,
  net_voucher_amount_saatchi_share REAL,
  net_voucher_amount_artist_share  REAL,
  artist_commission                REAL,
  artist_royalties                 REAL);


CREATE FUNCTION tmp.index_dim_order_item()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'order_item');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'order');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'product');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'order_item_status');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'price_range');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'order_process');
SELECT
  util.add_fk('dim_next', 'order_item', 'dim_next', 'option');

$$ LANGUAGE SQL;


INSERT INTO dim_next.order_item

  SELECT
    i.order_item_id,
    o.order_id,
    i.product_fk,
    order_item_status_fk,

    CASE
    WHEN (gross_revenue_item < 99.99) THEN 1
    WHEN (gross_revenue_item < 499.99) THEN 2
    WHEN (gross_revenue_item < 999.99) THEN 3
    WHEN (gross_revenue_item < 2499.99) THEN 4
    WHEN (gross_revenue_item < 4999.99) THEN 5
    ELSE 6
    END              AS price_range_fk,
    order_process_fk AS order_process_fk,
    option_fk        AS option_fk,

    gross_revenue_item,
    net_item_price,
    vat_amount,
    net_shipping_revenue,
    duties_amount,
    gross_revenue_item_option,
    net_option_price,

    (net_item_price + coalesce(net_option_price, 0.0) + coalesce(net_shipping_revenue, 0.0) -
     (coalesce(net_voucher_amount_saatchi_share / 100.0, 0) + coalesce(net_voucher_amount_artist_share / 100.0, 0))
     + coalesce(vat_amount, 0.0)
     + coalesce(duties_amount, 0.0)) -- Gross revenue after vouchers
    * (CASE
       WHEN tmp.payment.method = 'paypal' THEN 0.022
       WHEN tmp.payment.method = 'creditcard' THEN 0.029
       ELSE 0.0
       END)
    + (CASE WHEN tmp.payment.method IN ('paypal', 'creditcard') THEN 0.3


       ELSE 0 END)   AS net_payment_cost,

    net_option_cost,
    net_printing_cost,
    net_voucher_amount_saatchi_share,
    net_voucher_amount_artist_share,


    CASE
    WHEN (ctgry.product_category_name = 'original') THEN net_item_price * 0.7 - net_voucher_amount_artist_share
    ELSE 0.0
    END              AS artist_commission,

    CASE
    WHEN (ctgry.product_category_name = 'print') THEN
      net_item_price * 0.3 - net_printing_cost -
      net_voucher_amount_artist_share
    ELSE 0.0
    END              AS artist_royalties


  FROM (SELECT
          i.order_item_id,
          order_fk,
          product_fk,
          order_item_status_fk,
          coalesce(i.price_to_pay / 100.0, 0.0)                 AS gross_revenue_item,
          coalesce(i.gross_price / 100.0, 0.0)                  AS net_item_price,
          SUM(coalesce(tax.gross_price, 0.0)) / 100.0           AS vat_amount,
          SUM(coalesce(shipping.gross_price, 0.0)) / 100.0      AS net_shipping_revenue,
          SUM(coalesce(duties.gross_price, 0.0)) / 100.0        AS duties_amount,
          SUM(tmp.order_item_option.price_to_pay /
              100.0)                                            AS gross_revenue_item_option,
          SUM(tmp.order_item_option.gross_price
              / (100.0 + tmp.order_item_option.tax_percentage)) AS net_option_price,

          0.0                                                   AS net_option_cost,
          0.0                                                   AS net_printing_cost,
          SUM(coalesce(d.saatchi_amount / 100.0, 0.0))          AS net_voucher_amount_saatchi_share,
          SUM(coalesce(d.artist_amount / 100.0, 0.0))           AS net_voucher_amount_artist_share,
          i.order_process_id                                    AS order_process_fk,
          coalesce(opn.option_id, -1)                           AS option_fk


        FROM tmp.order_item i
          LEFT JOIN tmp.sales_expense shipping
            ON shipping.fk_sales_order_item = i.order_item_id
               AND (shipping.type = 'freight' OR shipping.type = 'shipping')
          LEFT JOIN tmp.sales_expense duties
            ON duties.fk_sales_order_item = i.order_item_id
               AND duties.type = 'customs and duties'
          LEFT JOIN tmp.sales_expense tax
            ON tax.fk_sales_order_item = i.order_item_id
               AND tax.type = 'tax'
          LEFT JOIN tmp.order_item_option
            ON tmp.order_item_option.order_item_fk = i.order_item_id
          LEFT JOIN tmp.discount d
            ON d.sales_order_item_fk = i.order_item_id
          LEFT JOIN dim_next.option opn
            ON opn.option_name = tmp.order_item_option.name


        GROUP BY i.order_item_id, order_item_option.order_item_option_id, opn.option_id) i

    JOIN tmp.order o
      ON o.order_id = i.order_fk
    LEFT JOIN tmp.payment
      ON tmp.payment.order_fk = o.order_id
    LEFT JOIN (SELECT
                 product_category_name,
                 pr.product_id AS product_id

               FROM dim_next.product_category ct
                 JOIN dim_next.product pr
                   ON pr.product_category_fk = ct.product_category_id) ctgry
      ON product_id = product_fk

  ORDER BY order_id, i.order_item_id;