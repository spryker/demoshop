CREATE TABLE dim_next.order_item_status_partition (
  order_item_status_partition_id     SMALLSERIAL PRIMARY KEY,
  order_item_status_perspective_name VARCHAR(126) NOT NULL,
  order_item_status_group_name       VARCHAR(126) NOT NULL,
  UNIQUE (order_item_status_group_name, order_item_status_perspective_name)
);


INSERT INTO dim_next.order_item_status_partition (order_item_status_perspective_name, order_item_status_group_name)
  SELECT
    status_perspective_name,
    status_group_name
  FROM (SELECT
          status_perspective_name,
          status_group_name,
          min(id) AS id -- needed for keeping the original order of the mapping
        FROM tmp.order_item_status_mapping
        GROUP BY status_perspective_name, status_group_name) t
  ORDER BY id;


CREATE TABLE dim_next.order_item_status_mapping (
  order_item_status_fk           SMALLINT NOT NULL,
  order_item_status_partition_fk SMALLINT NOT NULL
);

SELECT
  util.add_fk('dim_next', 'order_item_status_mapping', 'dim_next', 'order_item_status');
SELECT
  util.add_fk('dim_next', 'order_item_status_mapping', 'dim_next', 'order_item_status_partition');


INSERT INTO dim_next.order_item_status_mapping
  SELECT
    s.order_item_status_id,
    p.order_item_status_partition_id
  FROM dim_next.order_item_status s
    JOIN tmp.order_item_status_mapping m
      ON m.status_name = s.order_item_status_name
    JOIN dim_next.order_item_status_partition p
      ON p.order_item_status_perspective_name = m.status_perspective_name
         AND p.order_item_status_group_name = m.status_group_name
  ORDER BY p.order_item_status_partition_id;
