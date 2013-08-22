INSERT INTO mailchimp_dim_next.newsletter_recipient_fact

  SELECT
    la.list_activity_id,
    la.list_fk,
    la.recipient_fk,
    r.location_fk,
    la.confirm_time,
    r.subscriptions_fk,
    CASE WHEN r.subscriptions_fk > 0 THEN r.recipient_id
    ELSE NULL END

  FROM mailchimp_dim_next.list_activity la
    JOIN mailchimp_dim_next.recipient r
      ON la.recipient_fk = r.recipient_id;
