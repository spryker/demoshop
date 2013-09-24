CREATE TABLE dim_next.substrate (
  substrate_id   SERIAL PRIMARY KEY,
  substrate_name VARCHAR(126)
);

INSERT INTO dim_next.substrate (substrate_name)
  SELECT
    DISTINCT substrate
  FROM tmp.product
  WHERE substrate IS NOT NULL;

