CREATE SEQUENCE mailchimp_tmp.list_id;

INSERT INTO mailchimp_tmp.list
  SELECT
    DISTINCT nextval('mailchimp_tmp.list_id'),
    id
  FROM mailchimp_data.list
  GROUP BY id;
