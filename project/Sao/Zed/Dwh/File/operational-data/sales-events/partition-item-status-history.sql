CREATE TABLE tmp.sales_event (
  event_id                       BIGINT    NOT NULL,
  order_item_fk                  INTEGER   NOT NULL,
  order_item_current_status_fk   SMALLINT  NOT NULL,
  order_item_status_partition_fk SMALLINT  NOT NULL,
  event_timestamp                TIMESTAMP NOT NULL,
  order_timestamp                TIMESTAMP NOT NULL,
  seconds_since_last_event       REAL      NOT NULL,
  seconds_to_next_event          REAL      NOT NULL
);


CREATE TEMPORARY SEQUENCE event_id START 1;


INSERT INTO tmp.sales_event

  SELECT
    nextval('event_id')          AS event_id,
    order_item_fk,
    "order".order_item_status_fk AS order_item_current_status_fk,
    order_item_status_partition_fk,
    history.timestamp            AS event_timestamp,
    "order".timestamp            AS order_timestamp,
    date_part('epoch', history.timestamp
                       - COALESCE(lag(history.timestamp)
                                  OVER history_window,
                                  history.timestamp))
                                 AS seconds_since_last_event,
    date_part('epoch', COALESCE(lead(history.timestamp)
                                OVER history_window,
                                now())
                       - history.timestamp)
                                 AS seconds_to_next_event

  -- for each perspective, find those history entries that are the first within a group
  FROM (SELECT
          history_id,
          order_item_fk,
          timestamp,
          order_item_status_partition_fk,
          order_item_status_perspective_name,
          CASE WHEN rank()
                    OVER (PARTITION BY order_item_fk, order_item_status_partition_fk
                      ORDER BY history_id) = 1 AND rank()
                                                   OVER perspective = 1 THEN TRUE
          WHEN lag(order_item_status_group_name)
               OVER perspective = order_item_status_group_name THEN FALSE
          WHEN rank()
               OVER (PARTITION BY order_item_fk, order_item_status_partition_fk
                 ORDER BY history_id) = 1 THEN TRUE
          ELSE FALSE
          END AS new_event_started
        FROM tmp.order_item_status_history h
          JOIN dim_next.order_item_status_mapping m
            ON m.order_item_status_fk = h.order_item_status_fk
          JOIN dim_next.order_item_status_partition
            ON order_item_status_partition_id = order_item_status_partition_fk
        WHERE timestamp BETWEEN (SELECT
                                   util.import_min_time()) AND (SELECT
                                                                  util.import_max_time())
        WINDOW perspective AS (
          PARTITION BY order_item_status_perspective_name, order_item_fk
          ORDER BY history_id )
       ) history

-- get the timestamps of the corresponding orders
    JOIN (SELECT
            order_item_id,
            order_item_status_fk,
            timestamp
          FROM tmp.order_item
            JOIN tmp.order ON order_fk = order_id) "order"
      ON order_item_id = order_item_fk

  WHERE new_event_started = TRUE

  WINDOW history_window
  AS (
    PARTITION BY order_item_status_perspective_name, order_item_fk
    ORDER BY history.history_id );

ANALYZE tmp.sales_event;
