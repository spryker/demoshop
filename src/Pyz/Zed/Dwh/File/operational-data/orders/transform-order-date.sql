CREATE TABLE dim_next.order_date_perspective (
  order_date_perspective_id   SMALLINT PRIMARY KEY,
  order_date_perspective_name VARCHAR(126) NOT NULL UNIQUE
);

INSERT INTO dim_next.order_date_perspective (order_date_perspective_id, order_date_perspective_name)
  VALUES
  (1, 'Placed'),
  (2, 'Booked'),
  (3, 'Shipped');


CREATE TABLE dim_next.order_date (
  day_fk                    INTEGER  NOT NULL,
  order_fk                  INTEGER  NOT NULL,
  order_date_perspective_fk SMALLINT NOT NULL
);

-- Placed
INSERT INTO dim_next.order_date
  SELECT
    to_char(timestamp, 'YYYYMMDD') :: INTEGER AS day_fk,
    tmp.order.order_id                        AS order_fk,
    1                                         AS order_date_perspective_fk
  FROM tmp.order;


-- Booked
INSERT INTO dim_next.order_date
  SELECT
    max(date.day_fk),
    dim_next.order.order_id AS order_fk,
    CASE WHEN order_item_status_group_name = 'Booked' THEN 2
    ELSE 3 END              AS order_date_perspective_fk

  FROM dim_next.order
    JOIN dim_next.order_item i
      ON order_fk = order_id
    JOIN dim_next.sales_event e
      ON order_item_fk = order_item_id
    JOIN dim_next.sales_event_date date
      ON sales_event_fk = sales_event_id
    JOIN dim_next.order_item_status_partition
      ON order_item_status_partition_fk = order_item_status_partition_id
  WHERE order_item_status_group_name IN ('Booked', 'Shipped')
        AND order_item_status_perspective_name = 'Sales'
        AND sales_event_date_perspective_fk = 2
  GROUP BY order_id, order_item_status_group_name

  HAVING (count(DISTINCT order_item_fk) = count((e.order_item_fk)))
  ORDER BY order_id;


SELECT
  util.add_fk('dim_next', 'order_date', 'dim_next', 'day');
SELECT
  util.add_fk('dim_next', 'order_date', 'dim_next', 'order_date_perspective');
SELECT
  util.add_fk('dim_next', 'order_date', 'dim_next', 'order');


