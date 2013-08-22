CREATE TABLE tmp.order_item (
  order_item_id        INTEGER          NOT NULL,
  order_fk             INTEGER          NOT NULL,
  order_item_status_fk INTEGER          NOT NULL,
  order_process_id     INTEGER          NOT NULL,
  name                 TEXT             NOT NULL,
  sku                  VARCHAR(126)     NOT NULL,
  gross_price          INTEGER          NOT NULL,
  price_to_pay         INTEGER          NOT NULL,
  tax_percentage       DOUBLE PRECISION NOT NULL,
  created_at           TIMESTAMP WITH TIME ZONE,
  product_fk           INTEGER
);


CREATE FUNCTION tmp.index_tmp_order_item()
  RETURNS VOID AS $$
SELECT
  util.add_pk('tmp', 'order_item');

ANALYZE tmp.order_item;
$$ LANGUAGE SQL;
