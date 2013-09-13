CREATE TABLE dim_next.option (
  option_id   SERIAL PRIMARY KEY,
  option_name VARCHAR(126) NOT NULL

);

INSERT INTO dim_next.option (option_name)
  SELECT
    DISTINCT name
  FROM tmp.order_item_option
;

INSERT INTO dim_next.option VALUES
(-1, '{NO OPTION}');