CREATE TABLE dim_next.order (
  order_id              INTEGER      NOT NULL,
  order_increment_id    VARCHAR(126) NOT NULL,
  order_with_voucher_id INTEGER,
  user_fk               INTEGER      NOT NULL,
  hour_of_day_fk        INTEGER      NOT NULL,
  voucher_fk            INTEGER,
  payment_method_fk     SMALLINT     NOT NULL,
  payment_provider_fk   SMALLINT     NOT NULL,
  country_fk            INTEGER      NOT NULL,
  voucher_amount        DOUBLE PRECISION
);

CREATE FUNCTION tmp.index_dim_order()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'order');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'hour_of_day');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'voucher');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'payment_method');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'payment_provider');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'country');
SELECT
  util.add_fk('dim_next', 'order', 'dim_next', 'user');
$$ LANGUAGE SQL;


INSERT INTO dim_next.order
  SELECT
    order_id,
    increment_id,
    CASE WHEN voucher_fk IS NOT NULL THEN order_id
    ELSE NULL
    END                                                 AS order_with_voucher_id,
    user_id,
    to_char(timestamp, 'HH24') :: INTEGER               AS hour_of_day_fk,
    voucher_fk,
    COALESCE(payment_method_id,
             (SELECT
    payment_method_id
              FROM dim_next.payment_method
              WHERE payment_method_name = 'Unknown'))   AS payment_method_fk,

    COALESCE(payment_provider_id,
             (SELECT
    payment_provider_id
              FROM dim_next.payment_provider
              WHERE payment_provider_name = 'Unknown')) AS payment_provider_fk,
    country_id,
    (subtotal - grand_total) / 100.0


  FROM tmp.order
    LEFT JOIN tmp.payment ON order_fk = order_id
    LEFT JOIN tmp.voucher_usage ON voucher_usage.order_fk = order_id
    LEFT JOIN dim_next.payment_method ON method = payment_method_name
    LEFT JOIN dim_next.payment_provider ON provider = payment_provider_name;
