CREATE TABLE dim_next.sales_fact AS
  SELECT
    order_item.*,
    "order".*,
    product.sku,
    product.product_category_fk,
    product.substrate_fk,
    artwork_id AS artwork_fk,
    artwork.title,
    user_id    AS artist_id,
    user_name  AS artist_name
  FROM dim_next.order_item
    JOIN dim_next.order ON order_fk = order_id
    JOIN dim_next.product ON product_id = product_fk
    LEFT JOIN dim_next.artwork ON artwork_fk = artwork_id
    LEFT JOIN dim_next.user ON user_id = artist_fk
  ORDER BY order_item_id;


SELECT
  util.add_indexes_on_all_ids('dim_next', 'sales_fact');
SELECT
  util.add_indexes_on_all_fks('dim_next', 'sales_fact');


CREATE TABLE dim_next.order_item_status_group AS
  SELECT
    order_item_status_partition_id,
    order_item_status_perspective_name,
    order_item_status_group_name,
    order_item_status_id,
    order_item_status_name
  FROM dim_next.order_item_status_partition
    LEFT JOIN dim_next.order_item_status_mapping ON order_item_status_partition_fk = order_item_status_partition_id
    LEFT JOIN dim_next.order_item_status ON order_item_status_fk = order_item_status_id
  ORDER BY order_item_status_partition_id;
