CREATE SEQUENCE mailchimp_tmp.recipient_id;

INSERT INTO mailchimp_dim_next.recipient
  SELECT
    nextval('mailchimp_tmp.recipient_id'),
    t.email,
    t.first_name,
    t.last_name,
    COALESCE(rs.subscriptions, 0),
    CASE WHEN rl.country_name = '' OR rl.recipient_location_id IS NULL THEN -1
    ELSE rl.recipient_location_id
    END,
    lat,
    lon
  FROM
      (SELECT
         email,
         first_name,
         last_name,
         country,
         region,
         lat,
         lon,
         row_number()
         OVER (PARTITION BY email
           ORDER BY first_name DESC) AS row_number
       FROM mailchimp_data.list_activity) t

      LEFT JOIN mailchimp_dim_next.recipient_location rl
        ON rl.country_name = t.country AND rl.region_name = t.region
      LEFT JOIN mailchimp_tmp.recipient_subscriptions rs
        ON rs.email = t.email

  WHERE t.row_number = 1;


SELECT
  util.add_pk('mailchimp_dim_next', 'recipient');
