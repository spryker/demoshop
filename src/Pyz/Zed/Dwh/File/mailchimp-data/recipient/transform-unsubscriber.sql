INSERT INTO mailchimp_dim_next.unsubscribe_reason (unsubscribe_reason_name)
  SELECT
    DISTINCT reason
  FROM mailchimp_data.campaign_unsubscriber;


INSERT INTO mailchimp_dim_next.campaign_unsubscriber
  SELECT
    r.recipient_id,
    ur.unsubscribe_reason_id,
    tc.campaign_id,
    min(u.times)
  FROM mailchimp_data.campaign_unsubscriber u
    JOIN mailchimp_tmp.campaign tc
      ON tc.original_id = u.campaign
    JOIN mailchimp_dim_next.recipient r
      ON r.email = u.email
    LEFT JOIN mailchimp_dim_next.unsubscribe_reason ur
      ON ur.unsubscribe_reason_name = u.reason
  GROUP BY r.recipient_id, ur.unsubscribe_reason_id, tc.campaign_id
  ORDER BY ur.unsubscribe_reason_id, tc.campaign_id, r.recipient_id;
