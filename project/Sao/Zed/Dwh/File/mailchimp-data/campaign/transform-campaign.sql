INSERT INTO mailchimp_dim_next.campaign
  SELECT
    campaign_id,
    title,
    mtl.list_id                               AS list_fk,
    to_char(send_time, 'YYYYMMDD') :: INTEGER AS day_fk
  FROM mailchimp_data.campaign c
    JOIN mailchimp_tmp.campaign mtc
      ON mtc.original_id = c.id
    JOIN mailchimp_tmp.list mtl
      ON mtl.original_id = c.list_id;


SELECT
  util.add_pk('mailchimp_dim_next', 'campaign');
