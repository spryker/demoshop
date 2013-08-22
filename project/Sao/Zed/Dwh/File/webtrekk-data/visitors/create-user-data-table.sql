DROP TABLE IF EXISTS webtrekk_data.user;

CREATE TABLE webtrekk_data.user (
  eid     BIGINT  NOT NULL,
  user_id INTEGER NOT NULL,
  sid     BIGINT  NOT NULL);

DROP FUNCTION IF EXISTS webtrekk_data.index_user();

CREATE FUNCTION webtrekk_data.index_user()
  RETURNS VOID AS $$
SELECT
  util.add_index_if_not_exists('webtrekk_data', 'user', 'sid');
SELECT
  util.add_index_if_not_exists('webtrekk_data', 'user', 'user_id');
$$ LANGUAGE SQL;