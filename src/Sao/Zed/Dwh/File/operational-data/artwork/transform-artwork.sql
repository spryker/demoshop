CREATE TABLE dim_next.artwork (
  artwork_id INTEGER NOT NULL,
  artist_fk  INTEGER NOT NULL,
  title      VARCHAR NOT NULL
);


INSERT INTO dim_next.artwork
  SELECT
    artwork_id,
    user_id,
    CASE WHEN title = ''
    THEN 'unknown {artist ' || user_id || ', id ' || id || '}'
    ELSE title END
      AS title
  FROM tmp.artwork;


CREATE FUNCTION tmp.index_dim_artwork()
  RETURNS VOID AS $$
SELECT
  util.add_pk('dim_next', 'artwork');
ALTER TABLE dim_next.artwork ADD FOREIGN KEY (artist_fk) REFERENCES dim_next.user (user_id);
$$ LANGUAGE SQL;