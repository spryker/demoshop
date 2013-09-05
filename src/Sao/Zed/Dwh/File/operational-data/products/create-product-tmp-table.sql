CREATE TABLE tmp.product (
  product_id   INTEGER NOT NULL,
  sku          VARCHAR(126),
  user_id      INTEGER NOT NULL,
  user_art_id  INTEGER NOT NULL,
  edition_type VARCHAR(126),
  substrate    VARCHAR
);

CREATE FUNCTION tmp.index_tmp_product()
  RETURNS VOID AS $$
SELECT
  util.add_pk('tmp', 'product');
$$ LANGUAGE SQL;
