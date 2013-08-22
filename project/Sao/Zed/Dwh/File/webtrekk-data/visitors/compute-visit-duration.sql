CREATE TABLE webtrekk_tmp.visit_duration AS

  SELECT
    sid,
    EXTRACT(EPOCH FROM (max(timestamp) - min(timestamp)) + INTERVAL '30 second')
      AS duration
  FROM webtrekk_data.content
  WHERE timestamp BETWEEN (SELECT
                             util.import_min_time())
  AND (SELECT
         util.import_max_time())
  GROUP BY sid
  ORDER BY sid;


SELECT
  util.add_index('webtrekk_tmp', 'visit_duration', 'sid');

