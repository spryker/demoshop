INSERT INTO mailchimp_dim_next.campaign_status (campaign_status_name)
  SELECT
    DISTINCT status
  FROM mailchimp_data.campaign_receiver;


INSERT INTO mailchimp_dim_next.campaign_recipient
  SELECT
    r.recipient_id,
    tc.campaign_id,
    cs.campaign_status_id
  FROM mailchimp_data.campaign_receiver cr
    JOIN mailchimp_tmp.campaign tc
      ON tc.original_id = cr.campaign
    JOIN mailchimp_dim_next.recipient r
      ON r.email = cr.email
    JOIN mailchimp_dim_next.campaign_status cs
      ON cs.campaign_status_name = cr.status;


SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'recipient');
SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'campaign');
