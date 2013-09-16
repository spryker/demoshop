CREATE SEQUENCE mailchimp_tmp.list_activity_id;

INSERT INTO mailchimp_dim_next.list_activity
  SELECT
    nextval('mailchimp_tmp.list_activity_id'),
    lst.list_id,
    r.recipient_id,
    to_char(min(la.confirm_time), 'YYYYMMDD') :: INTEGER,
    min(la.lat),
    min(la.lon),
    min(la.country),
    min(la.region)
  FROM mailchimp_data.list_activity la
    JOIN mailchimp_tmp.list lst
      ON lst.original_id = la.list
    JOIN mailchimp_dim_next.recipient r
      ON r.email = la.email
  GROUP BY lst.list_id, r.recipient_id
  ORDER BY lst.list_id, min(la.confirm_time);


SELECT
  util.add_pk('mailchimp_dim_next', 'list_activity');
SELECT
  util.add_fk('mailchimp_dim_next', 'list_activity', 'mailchimp_dim_next', 'list');
SELECT
  util.add_fk('mailchimp_dim_next', 'list_activity', 'mailchimp_dim_next', 'recipient');
