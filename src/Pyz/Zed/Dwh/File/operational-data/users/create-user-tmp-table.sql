CREATE TABLE tmp.user (
  user_id       INTEGER      NOT NULL,
  email         VARCHAR(126) NOT NULL,
  first_name    VARCHAR(126) NOT NULL,
  last_name     VARCHAR(126) NOT NULL,
  created_at    TIMESTAMP,
  last_modified TIMESTAMP
);

CREATE FUNCTION tmp.index_tmp_user()
  RETURNS VOID AS $$
SELECT
  util.add_pk('tmp', 'user');
$$ LANGUAGE SQL;
