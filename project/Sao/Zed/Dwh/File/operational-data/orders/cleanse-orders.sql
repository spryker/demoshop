-- on developer machines, process only data within a specific period
DELETE FROM tmp.order
WHERE timestamp NOT BETWEEN (SELECT
                               util.import_min_time()) AND (SELECT
                                                              util.import_max_time());
DELETE FROM tmp.order
WHERE NOT EXISTS(SELECT
                   *
                 FROM tmp.order_item
                 WHERE order_item.order_fk = "order".order_id);
DELETE FROM tmp.order_item
WHERE order_fk NOT IN (SELECT
                         order_id
                       FROM tmp.order);

-- delete test orders
DELETE FROM tmp.order
WHERE is_test IS TRUE;

-- delete 'invalid' and 'canceled' order items
DELETE FROM tmp.order_item
WHERE order_item_status_fk IN (SELECT
                                 order_item_status_id
                               FROM dim_next.order_item_status
                               WHERE order_item_status_name IN ('invalid', 'canceled'));

-- delete orders without items
DELETE FROM tmp.order
WHERE NOT EXISTS(SELECT
                   *
                 FROM tmp.order_item
                 WHERE order_item.order_fk = "order".order_id);

-- delete items without orders
DELETE FROM tmp.order_item
WHERE order_fk NOT IN (SELECT
                         order_id
                       FROM tmp.order);
