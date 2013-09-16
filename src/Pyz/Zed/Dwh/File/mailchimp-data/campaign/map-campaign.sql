CREATE SEQUENCE mailchimp_tmp.campaign_id;

INSERT INTO mailchimp_tmp.campaign
  SELECT
    nextval('mailchimp_tmp.campaign_id'),
    id
  FROM mailchimp_data.campaign;
