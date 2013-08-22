INSERT INTO mailchimp_dim_next.activity (activity_name)
  SELECT
    DISTINCT action
  FROM mailchimp_data.campaign_activity;


INSERT INTO mailchimp_dim_next.campaign_activity
  SELECT
    ne.newsletter_email_id,
    mdnr.recipient_id,
    mtc.campaign_id,
    mdna.activity_id,
    to_char(mdca.times, 'YYYYMMDD') :: INTEGER AS day_fk
  FROM mailchimp_data.campaign_activity mdca
    JOIN mailchimp_dim_next.recipient mdnr
      ON mdnr.email = mdca.email
    JOIN mailchimp_tmp.campaign mtc
      ON mtc.original_id = mdca.campaign
    JOIN mailchimp_dim_next.activity mdna
      ON mdna.activity_name = mdca.action
    JOIN mailchimp_dim_next.newsletter_email ne
      ON ne.recipient_fk = mdnr.recipient_id
         AND ne.campaign_fk = mtc.campaign_id

  ORDER BY mtc.campaign_id, mdnr.recipient_id;


SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'newsletter_email');
SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'recipient');
SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'campaign');
SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'mailchimp_dim_next', 'activity');
SELECT
  util.add_fk('mailchimp_dim_next', 'campaign_activity', 'dim', 'day');
