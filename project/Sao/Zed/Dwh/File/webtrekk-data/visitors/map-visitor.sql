-- map sessions from webtrekk_data.user to users
CREATE TABLE webtrekk_tmp.sid_to_user_id AS
  SELECT
    m.sid,
    m.eid,
    t.user_id
  FROM (SELECT
          user_id
        FROM tmp.user) t
    JOIN webtrekk_data.user m
-- because sometimes "user ids" and sometimes "user numbers"
-- are passed to webtrekk, we need to compare both
      ON m.user_id = t.user_id;


-- add all sessions from the visitor table
--   * that have cookies of known users
--   * but that don't have a matching entry in webtrekk_data.user
--
-- this happens when people visit the site without logging in
--
-- when there are multiple "user" ids for a cookie, take the one that is closest
-- in terms of distance between sessions
--
INSERT INTO webtrekk_tmp.sid_to_user_id
  SELECT
    sid,
    eid,
    min(user_id) AS user_id
  FROM (SELECT
          abs(sid_to_user_id.sid - unmapped_session.sid) AS sid_distance,
-- the closest sid in the mapping to the visitor session
          min(abs(sid_to_user_id.sid - unmapped_session.sid))
                                                            OVER ( PARTITION BY unmapped_session.sid, unmapped_session.eid)
AS min_sid_distance,
unmapped_session.sid,
unmapped_session.eid,
user_id
-- all sessions that match a cookie in the mapping and that are not in there yet
FROM (SELECT sid, eid
FROM webtrekk_data.visitor
WHERE eid IN (SELECT eid FROM webtrekk_tmp.sid_to_user_id)
AND sid NOT IN (SELECT sid FROM webtrekk_tmp.sid_to_user_id)
AND visit_timestamp BETWEEN (SELECT util.import_min_time())
AND (SELECT util.import_max_time())) unmapped_session
JOIN webtrekk_tmp.sid_to_user_id
ON unmapped_session.eid = sid_to_user_id.eid) combinations
WHERE sid_distance = min_sid_distance -- take the closest session
GROUP BY sid, eid;


--
-- problem 1:
-- many users have multiple cookies, sometimes even hundreds
--
SELECT
  user_id,
  count(DISTINCT eid) AS number_of_eids_per_user
FROM webtrekk_tmp.sid_to_user_id
GROUP BY user_id
ORDER BY number_of_eids_per_user DESC
LIMIT 5;

--
-- problem 2:
-- some cookies belong to multiple users
--
SELECT
  eid,
  count(DISTINCT user_id) AS number_of_users_per_eid
FROM webtrekk_tmp.sid_to_user_id
GROUP BY eid
ORDER BY number_of_users_per_eid DESC
LIMIT 5;


--
-- solution:
-- we use the "user" ids as unique visitor ids, because the mapping above is otherwise quite good
--
CREATE TABLE webtrekk_tmp.visitor AS

  SELECT
    visitor.sid,
    COALESCE(sid_to_user_id.user_id, visitor.eid) AS eid,
    user_id,
    visit_timestamp
  FROM webtrekk_data.visitor
    LEFT JOIN webtrekk_tmp.sid_to_user_id
      ON sid_to_user_id.sid = visitor.sid
  ORDER BY visitor.sid;


-- for some bizarre reason this query is extremely slow when
-- this restriction is included in the query above
DELETE FROM webtrekk_tmp.visitor
WHERE visit_timestamp NOT BETWEEN (SELECT
                                     util.import_min_time())
AND (SELECT
       util.import_max_time());

