CREATE TABLE tmp.order (
  order_id     INTEGER                  NOT NULL,
  increment_id VARCHAR(126)             NOT NULL,
  user_id      INTEGER                  NOT NULL,
  grand_total  INTEGER,
  subtotal     INTEGER,
  is_test      BOOLEAN                  NOT NULL,
  timestamp    TIMESTAMP WITH TIME ZONE NOT NULL,
  item_qty     INTEGER,
  country_id   INTEGER
);


CREATE FUNCTION tmp.index_tmp_order()
  RETURNS VOID AS $$
SELECT
  util.add_pk('tmp', 'order');
ANALYZE tmp.order;
$$ LANGUAGE SQL;
