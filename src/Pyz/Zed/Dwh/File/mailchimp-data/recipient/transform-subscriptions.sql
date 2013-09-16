INSERT INTO mailchimp_tmp.recipient_subscriptions

  SELECT
    la.email,
    count(DISTINCT la.list) - count(DISTINCT c.list_id) AS subscriptions

  FROM mailchimp_data.list_activity la

    LEFT JOIN mailchimp_data.campaign_unsubscriber cu
      ON la.email = cu.email
    LEFT JOIN mailchimp_data.campaign c
      ON c.id = cu.campaign

  GROUP BY la.email

  ORDER BY subscriptions;


INSERT INTO mailchimp_dim_next.recipient_subscriptions
  SELECT
    DISTINCT subscriptions,
    subscriptions || ' Subscriptions'
  FROM mailchimp_tmp.recipient_subscriptions
  ORDER BY subscriptions;
