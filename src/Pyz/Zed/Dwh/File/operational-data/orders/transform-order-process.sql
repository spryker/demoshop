CREATE TABLE dim_next.order_process (
  order_process_id   INTEGER      NOT NULL PRIMARY KEY,
  checkout_type      VARCHAR(126) NOT NULL,
  fulfillment_type   VARCHAR(126) NOT NULL,
  order_process_name VARCHAR(126) NOT NULL UNIQUE
);


INSERT INTO dim_next.order_process
  SELECT
    order_process_id,
    CASE
    WHEN order_process_name LIKE 'manual%'
    THEN 'Manual checkout'
    ELSE 'Regular checkout'
    END AS checkout_type_fk,
    CASE
    WHEN order_process_name LIKE '%marketplace' THEN 'Marketplace'
    ELSE 'Manufactured'
    END AS fulfillment_type,
    order_process_name
  FROM
    tmp.order_process;

