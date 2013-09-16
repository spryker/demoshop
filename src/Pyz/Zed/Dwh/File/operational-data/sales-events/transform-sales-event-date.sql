CREATE TABLE dim_next.sales_event_date_perspective (
  sales_event_date_perspective_id   SMALLINT PRIMARY KEY,
  sales_event_date_perspective_name VARCHAR(126) NOT NULL UNIQUE
);

INSERT INTO dim_next.sales_event_date_perspective VALUES
(1, 'Event date'), (2, 'Order date');


CREATE TABLE dim_next.sales_event_date (
  sales_event_fk                  BIGINT   NOT NULL,
  day_fk                          INTEGER  NOT NULL,
  sales_event_date_perspective_fk SMALLINT NOT NULL
);


-- perspective 'Event'
INSERT INTO dim_next.sales_event_date
  SELECT
    event_id,
    to_char(event_timestamp, 'YYYYMMDD') :: INTEGER AS day_fk,
    1                                               AS perspective
  FROM tmp.sales_event
  ORDER BY event_timestamp;


-- perspective 'Order'
INSERT INTO dim_next.sales_event_date
  SELECT
    event_id,
    to_char(order_timestamp, 'YYYYMMDD') :: INTEGER AS day_fk,
    2                                               AS perspective
  FROM tmp.sales_event
  ORDER BY order_timestamp;


CREATE FUNCTION tmp.index_dim_sales_event_date()
  RETURNS VOID AS $$
SELECT
  util.add_index('dim_next', 'sales_event_date', 'day_fk');
SELECT
  util.add_fk('dim_next', 'sales_event_date', 'dim_next', 'sales_event');
SELECT
  util.add_fk('dim_next', 'sales_event_date', 'dim_next', 'day');
SELECT
  util.add_fk('dim_next', 'sales_event_date', 'dim_next', 'sales_event_date_perspective');
ANALYZE dim_next.sales_event_date;
$$ LANGUAGE SQL;
