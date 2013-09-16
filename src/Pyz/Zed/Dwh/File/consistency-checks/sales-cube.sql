SELECT
  util.assert_equal(
      'Each order must appear in dim.order',
      'SELECT count(*) FROM tmp.order;',
      'SELECT count(DISTINCT order_id) FROM dim.order;');

SELECT
  util.assert_equal(
      'Each order must appear in dim.sales_fact',
      'SELECT count(*) FROM dim.order;',
      'SELECT count(DISTINCT order_id) FROM dim.sales_fact;');

SELECT
  util.assert_equal(
      'Each order item must appear in dim.sales_fact',
      'SELECT count(*) FROM dim.order_item;',
      'SELECT count(*) FROM dim.sales_fact;');

SELECT
  util.assert_almost_equal(
      'Gross revenue from orders must be the same as the sum of gross revenue from items',
      'SELECT sum(grand_total) / 100.0 FROM tmp.order;',
      'SELECT sum(gross_revenue_item) FROM dim.order_item;',
      1);

SELECT
  util.assert_equal(
      'Difference between subtotal and grand_total should be the voucher amount from items',
      'SELECT (sum(saatchi_amount / 100.0) + sum(artist_amount / 100.0))
       FROM tmp.discount
       WHERE sales_order_item_fk IN (SELECT order_item_id FROM tmp.order_item);',
      'SELECT (sum(net_voucher_amount_saatchi_share) + sum(net_voucher_amount_artist_share)) FROM dim.order_item;');

SELECT
  util.assert_equal(
      'For each placed order there should be an entry in order_date',
      'SELECT
         count(*)
       FROM (SELECT
               order_id
             FROM dim.order
               JOIN dim.order_item ON order_fk = order_id
               LEFT JOIN dim.sales_event ON order_item_fk = order_item_id
               LEFT JOIN dim.order_item_status_partition ON order_item_status_partition_id = order_item_status_partition_fk
             WHERE order_item_status_group_name = ''Booked''
                   AND order_item_status_perspective_name = ''Sales''
             GROUP BY order_id
             HAVING count(sales_event_id) = count(order_item_id)) t;',
      'SELECT count(*) from dim.order_date
       JOIN dim.order_date_perspective ON order_date_perspective_id = order_date_perspective_fk
       WHERE order_date_perspective_name = ''Booked''');

SELECT
  util.assert_equal(
      'For each booked order (all items are booked) there should be an entry in order_date',
      'SELECT
         count(*)
       FROM (SELECT
               order_id
             FROM dim.order
               JOIN dim.order_item ON order_fk = order_id
               LEFT JOIN dim.sales_event ON order_item_fk = order_item_id
               LEFT JOIN dim.order_item_status_partition ON order_item_status_partition_id = order_item_status_partition_fk
             WHERE order_item_status_group_name = ''Booked''
                   AND order_item_status_perspective_name = ''Sales''
             GROUP BY order_id
             HAVING count(sales_event_id) = count(order_item_id)) t;',
      'SELECT count(*) from dim.order_date
       JOIN dim.order_date_perspective ON order_date_perspective_id = order_date_perspective_fk
       WHERE order_date_perspective_name = ''Booked''');


SELECT
  util.assert_equal(
      'For each shipped order (all items are shipped) there should be an entry in order_date',
      'SELECT
         count(*)
       FROM (SELECT
               order_id
             FROM dim.order
               JOIN dim.order_item ON order_fk = order_id
               LEFT JOIN dim.sales_event ON order_item_fk = order_item_id
               LEFT JOIN dim.order_item_status_partition ON order_item_status_partition_id = order_item_status_partition_fk
             WHERE order_item_status_group_name = ''Shipped''
                   AND order_item_status_perspective_name = ''Sales''
             GROUP BY order_id
             HAVING count(sales_event_id) = count(order_item_id)) t;',
      'SELECT count(*) from dim.order_date
       JOIN dim.order_date_perspective ON order_date_perspective_id = order_date_perspective_fk
       WHERE order_date_perspective_name = ''Shipped''');

