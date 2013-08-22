CREATE TABLE dim_next.order_item_status (
  order_item_status_id   SMALLINT     NOT NULL PRIMARY KEY,
  order_item_status_name VARCHAR(126) NOT NULL UNIQUE
);


