CREATE TABLE mailchimp_dim_next.newsletter_email_date_flattened AS

  SELECT
    newsletter_email_fk,
    newsletter_time_perspective.*,
    day.*

  FROM mailchimp_dim_next.newsletter_email_date,
    mailchimp_dim_next.newsletter_time_perspective,
    dim.day

  WHERE day_fk = day_id AND newsletter_time_perspective_id = newsletter_time_perspective_fk

  ORDER BY newsletter_time_perspective_id, day_id;


SELECT
  util.add_index('mailchimp_dim_next', 'newsletter_email_date_flattened', 'newsletter_email_fk');
SELECT
  util.add_index('mailchimp_dim_next', 'newsletter_email_date_flattened', 'day_id');
