-- Sent
INSERT INTO mailchimp_dim_next.newsletter_email_date
  SELECT
    newsletter_email_id AS newsletter_email_fk,
    sent_day_fk,
    1                   AS newsletter_time_perspective
  FROM mailchimp_dim_next.newsletter_email;


-- Open
INSERT INTO mailchimp_dim_next.newsletter_email_date
  SELECT
    newsletter_email_fk,
    day_fk,
    2 AS newsletter_time_perspective
  FROM mailchimp_dim_next.campaign_activity
  WHERE activity_fk = (SELECT
                         activity_id
                       FROM mailchimp_dim_next.activity
                       WHERE activity_name = 'open');


-- Click
INSERT INTO mailchimp_dim_next.newsletter_email_date
  SELECT
    newsletter_email_fk,
    day_fk,
    3 AS newsletter_time_perspective
  FROM mailchimp_dim_next.campaign_activity
  WHERE activity_fk = (SELECT
                         activity_id
                       FROM mailchimp_dim_next.activity
                       WHERE activity_name = 'click');
