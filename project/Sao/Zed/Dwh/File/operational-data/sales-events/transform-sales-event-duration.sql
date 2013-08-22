CREATE TABLE dim_next.sales_event_duration_perspective (
  sales_event_duration_perspective_id   SMALLINT PRIMARY KEY,
  sales_event_duration_perspective_name VARCHAR(30) NOT NULL UNIQUE
);

INSERT INTO dim_next.sales_event_duration_perspective VALUES
(1, 'Time order to event'), (2, 'Time since last event'), (3, 'Time to next event');


CREATE TABLE dim_next.sales_event_duration (
  sales_event_fk                      BIGINT   NOT NULL,
  duration_fk                         INTEGER  NOT NULL,
  sales_event_duration_perspective_fk SMALLINT NOT NULL
);


-- Time order to event
INSERT INTO dim_next.sales_event_duration
  SELECT
    event_id,
    EXTRACT(DAY FROM event_timestamp - order_timestamp) + 1,
    1
  FROM tmp.sales_event;


-- Time since last event
INSERT INTO dim_next.sales_event_duration
  SELECT
    event_id,
    (seconds_since_last_event / 86400) + 1,
    2
  FROM tmp.sales_event;


-- Time to next event
INSERT INTO dim_next.sales_event_duration
  SELECT
    event_id,
    (seconds_to_next_event / 86400) + 1,
    3
  FROM tmp.sales_event;


CREATE FUNCTION tmp.index_dim_sales_event_duration()
  RETURNS VOID AS $$
SELECT
  util.add_index('dim_next', 'sales_event_duration', 'sales_event_fk');
SELECT
  util.add_fk('dim_next', 'sales_event_duration', 'dim_next', 'sales_event');
SELECT
  util.add_fk('dim_next', 'sales_event_duration', 'dim_next', 'duration');
SELECT
  util.add_fk('dim_next', 'sales_event_duration', 'dim_next', 'sales_event_duration_perspective');
ANALYZE dim_next.sales_event_duration;
$$ LANGUAGE SQL;
