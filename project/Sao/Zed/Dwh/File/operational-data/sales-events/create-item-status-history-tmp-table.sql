CREATE TABLE tmp.order_item_status_history (
  history_id           BIGINT    NOT NULL,
  order_item_fk        INTEGER   NOT NULL,
  order_item_status_fk SMALLINT  NOT NULL,
  timestamp            TIMESTAMP NOT NULL
);

CREATE FUNCTION tmp.index_tmp_order_item_status_history()
  RETURNS VOID AS $$
ALTER TABLE tmp.order_item_status_history ADD PRIMARY KEY (history_id);
ANALYZE tmp.order_item_status_history;
$$ LANGUAGE SQL;
