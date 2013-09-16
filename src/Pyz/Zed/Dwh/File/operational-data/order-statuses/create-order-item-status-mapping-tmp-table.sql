CREATE TABLE tmp.order_item_status_mapping (
  id                      SERIAL PRIMARY KEY,
  status_perspective_name VARCHAR(126) NOT NULL,
  status_group_name       VARCHAR(126) NOT NULL,
  status_name             VARCHAR(126) NOT NULL
);


