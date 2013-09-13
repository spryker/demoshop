CREATE TABLE dim_next.product (
  product_id          INTEGER      NOT NULL,
  sku                 VARCHAR(126) NOT NULL,
  artwork_fk          INTEGER,
  product_category_fk INTEGER      NOT NULL,
  substrate_fk        INTEGER
);


INSERT INTO dim_next.product
  SELECT
    product_id,
    sku,
    artwork_id,
    product_category_id,
    substrate_id
  FROM tmp.product
    LEFT JOIN tmp.artwork ON product.user_id = artwork.user_id AND artwork.id = product.user_art_id
    LEFT JOIN dim_next.product_category
      ON tmp.product.edition_type = dim_next.product_category.edition_type
    LEFT JOIN dim_next.substrate
      ON substrate_name = substrate;


CREATE FUNCTION tmp.index_dim_product()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'product');
SELECT
  util.add_fk('dim_next', 'product', 'dim_next', 'product_category');
SELECT
  util.add_fk('dim_next', 'product', 'dim_next', 'substrate');
SELECT
  util.add_fk('dim_next', 'product', 'dim_next', 'artwork');
SELECT
  util.add_index('dim_next', 'product', 'product_category_fk');
SELECT
  util.add_index('dim_next', 'product', 'artwork_fk');

$$ LANGUAGE SQL;
