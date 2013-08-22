CREATE TABLE dim_next.sales_event_fact AS
  SELECT
    sales_event_id,
    order_id      AS order_id,
    order_item_id AS order_item_id,
    order_increment_id,
    order_item_current_status_fk,
    "order".user_fk,
    order_item_status_partition_fk,
    product_fk,
    hours_since_order,
    hours_since_last_event,
    hours_to_next_event

  FROM dim_next.sales_event
    JOIN dim_next.order_item ON order_item_fk = order_item_id
    JOIN dim_next.order ON order_fk = order_id
    LEFT JOIN dim_next.user ON user_fk = user_id
    LEFT JOIN dim_next.product ON product_fk = product_id;


CREATE FUNCTION tmp.index_dim_sales_event_fact_1()
  RETURNS VOID AS $$
SELECT
  util.add_indexes_on_all_fks('dim_next', 'sales_event_fact', 1, 4);
$$ LANGUAGE SQL;

CREATE FUNCTION tmp.index_dim_sales_event_fact_2()
  RETURNS VOID AS $$
SELECT
  util.add_indexes_on_all_fks('dim_next', 'sales_event_fact', 2, 4);
$$ LANGUAGE SQL;

CREATE FUNCTION tmp.index_dim_sales_event_fact_3()
  RETURNS VOID AS $$
SELECT
  util.add_indexes_on_all_fks('dim_next', 'sales_event_fact', 3, 4);
$$ LANGUAGE SQL;

CREATE FUNCTION tmp.index_dim_sales_event_fact_4()
  RETURNS VOID AS $$
SELECT
  util.add_indexes_on_all_fks('dim_next', 'sales_event_fact', 4, 4);
$$ LANGUAGE SQL;
