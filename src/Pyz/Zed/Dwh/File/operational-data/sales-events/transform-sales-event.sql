CREATE TABLE dim_next.sales_event (
  sales_event_id                 BIGINT   NOT NULL,
  order_item_fk                  INTEGER  NOT NULL,
  order_item_current_status_fk   SMALLINT NOT NULL,
  order_item_status_partition_fk SMALLINT NOT NULL,
  hours_since_order              REAL     NOT NULL,
  hours_since_last_event         REAL     NOT NULL,
  hours_to_next_event            REAL     NOT NULL
);


INSERT INTO dim_next.sales_event

  SELECT
    event_id,
    order_item_fk,
    order_item_current_status_fk,
    order_item_status_partition_fk,
    date_part('epoch', event_timestamp - order_timestamp) / 3600.0 AS hours_since_order,
    seconds_since_last_event / 3600.0                              AS hours_since_last_event,
    seconds_to_next_event / 3600.0                                 AS hours_to_next_event
  FROM tmp.sales_event;


CREATE FUNCTION tmp.index_dim_sales_event()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'sales_event');
SELECT
  util.add_index('dim_next', 'sales_event', 'order_item_fk');
SELECT
  util.add_fk('dim_next', 'sales_event', 'dim_next', 'order_item');
SELECT
  util.add_fk('dim_next', 'sales_event', 'dim_next', 'order_item_status_partition');
$$ LANGUAGE SQL;

ALTER TABLE dim_next.sales_event ADD FOREIGN KEY (order_item_current_status_fk) REFERENCES dim_next.order_item_status (order_item_status_id);
