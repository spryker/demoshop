CREATE TABLE tmp.order_item_option (
  order_item_option_id INTEGER      NOT NULL,
  order_item_fk        INTEGER      NOT NULL,
  identifier           VARCHAR(126) NOT NULL,
  name                 VARCHAR(126) NOT NULL,
  description          TEXT,
  gross_price          INTEGER      NOT NULL,
  price_to_pay         INTEGER      NOT NULL,
  tax_percentage       INTEGER      NOT NULL,
  created_at           TIMESTAMP WITH TIME ZONE
);

CREATE FUNCTION tmp.index_tmp_order_item_option()
  RETURNS VOID AS $$
SELECT
  util.add_pk('tmp', 'order_item_option');

ANALYZE tmp.order_item_option;
$$ LANGUAGE SQL;
