CREATE SEQUENCE mailchimp_tmp.newsletter_email_id;

INSERT INTO mailchimp_dim_next.newsletter_email
  SELECT
    nextval('mailchimp_tmp.newsletter_email_id'),

    c.list_fk,
    cr.campaign_fk,
    cr.recipient_fk,
    c.day_fk            AS sent_day_fk,

    CASE WHEN cr.campaign_status_fk = (SELECT
                                         campaign_status_id
                                       FROM mailchimp_dim_next.campaign_status
                                       WHERE campaign_status_name = 'sent') THEN currval(
        'mailchimp_tmp.newsletter_email_id')
    ELSE NULL END       AS sent,
    CASE WHEN cr.campaign_status_fk = (SELECT
                                         campaign_status_id
                                       FROM mailchimp_dim_next.campaign_status
                                       WHERE campaign_status_name = 'soft') THEN currval(
        'mailchimp_tmp.newsletter_email_id')
    ELSE NULL END       AS soft,
    CASE WHEN cr.campaign_status_fk = (SELECT
                                         campaign_status_id
                                       FROM mailchimp_dim_next.campaign_status
                                       WHERE campaign_status_name = 'hard') THEN currval(
        'mailchimp_tmp.newsletter_email_id')
    ELSE NULL END       AS hard,

    la.list_activity_id AS subscription_fk,
    CASE WHEN u.reason_fk IS NOT NULL THEN currval('mailchimp_tmp.newsletter_email_id')
    ELSE NULL END       AS unsubscribe,
    u.reason_fk

  FROM mailchimp_dim_next.campaign_recipient cr
    JOIN mailchimp_dim_next.campaign c
      ON c.campaign_id = cr.campaign_fk
    LEFT JOIN mailchimp_dim_next.list_activity la
      ON la.list_fk = c.list_fk AND cr.recipient_fk = la.recipient_fk
    LEFT JOIN mailchimp_dim_next.campaign_unsubscriber u
      ON cr.campaign_fk = u.campaign_fk AND cr.recipient_fk = u.recipient_fk

  ORDER BY c.list_fk, cr.campaign_fk;


SELECT
  util.add_pk('mailchimp_dim_next', 'newsletter_email');
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email', 'mailchimp_dim_next', 'list');
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email', 'mailchimp_dim_next', 'campaign');
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email', 'mailchimp_dim_next', 'recipient');
