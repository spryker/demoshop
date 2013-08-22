CREATE TABLE dim_next.product_category (
  product_category_id   SERIAL PRIMARY KEY,
  edition_type          VARCHAR(126) NOT NULL,
  product_category_name VARCHAR

);

INSERT INTO dim_next.product_category (edition_type, product_category_name)
  SELECT
    DISTINCT edition_type AS edition_type,
             CASE
             WHEN (edition_type LIKE 'open%' OR edition_type LIKE 'limited%') THEN 'print'
             ELSE edition_type
             END              AS product_category_name

  FROM tmp.product;


