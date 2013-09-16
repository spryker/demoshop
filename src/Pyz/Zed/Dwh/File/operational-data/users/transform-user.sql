CREATE TABLE dim_next.user (
  user_id    INTEGER NOT NULL,
  user_name  VARCHAR NOT NULL,
  email      VARCHAR NOT NULL,
  created_at TIMESTAMP
);


INSERT INTO dim_next.user
  SELECT
    user_id,
    first_name || ' ' || last_name,
    email,
    created_at
  FROM tmp.user;


INSERT INTO dim_next.user VALUES
(-1, 'Unknown', 'Unknown', now());


CREATE FUNCTION tmp.index_dim_user()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'user');
$$ LANGUAGE SQL;
