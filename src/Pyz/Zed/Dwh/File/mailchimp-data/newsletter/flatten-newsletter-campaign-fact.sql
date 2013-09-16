INSERT INTO mailchimp_dim_next.newsletter_campaign_fact

  SELECT
    ne.newsletter_email_id,
    ne.list_fk,
    ne.campaign_fk,
    ne.recipient_fk,
    r.location_fk,
    ne.sent_day_fk,

    ne.sent,
    ne.soft,
    ne.hard,

    ne.subscription_fk,
    ne.unsubscribe,
    ne.reason_fk,

    CASE WHEN ca.activity_fk = (SELECT
                                  activity_id
                                FROM mailchimp_dim_next.activity
                                WHERE activity_name = 'open') THEN 1
    ELSE 0 END AS open,
    CASE WHEN ca.activity_fk = (SELECT
                                  activity_id
                                FROM mailchimp_dim_next.activity
                                WHERE activity_name = 'open') THEN ne.newsletter_email_id
    ELSE 0 END AS open_fk,
    CASE WHEN ca.activity_fk = (SELECT
                                  activity_id
                                FROM mailchimp_dim_next.activity
                                WHERE activity_name = 'click') THEN 1
    ELSE 0 END AS click,
    CASE WHEN ca.activity_fk = (SELECT
                                  activity_id
                                FROM mailchimp_dim_next.activity
                                WHERE activity_name = 'click') THEN ne.newsletter_email_id
    ELSE 0 END AS click_fk

  FROM mailchimp_dim_next.newsletter_email ne
    JOIN mailchimp_dim_next.recipient r
      ON ne.recipient_fk = r.recipient_id
    LEFT JOIN mailchimp_dim_next.campaign_activity ca
      ON ca.newsletter_email_fk = ne.newsletter_email_id;


-- Insert subscribers who have not yet received an email
INSERT INTO mailchimp_dim_next.newsletter_campaign_fact (list_fk, recipient_fk, recipient_location_fk, subscription_fk)

  SELECT
    la.list_fk,
    la.recipient_fk,
    -1,
    la.list_activity_id
  FROM mailchimp_dim_next.list_activity la
    LEFT JOIN mailchimp_dim_next.newsletter_email ne
      ON subscription_fk = list_activity_id
  WHERE newsletter_email_id IS NULL;
