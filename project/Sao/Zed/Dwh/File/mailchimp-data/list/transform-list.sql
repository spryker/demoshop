INSERT INTO mailchimp_dim_next.list

  SELECT
    min(list_id),
    min(dl.name),
    to_char(min(dl.created_at), 'YYYYMMDD') :: INTEGER,
    to_char(min(dl.times), 'YYYYMMDD') :: INTEGER

  FROM mailchimp_tmp.list tl

    JOIN mailchimp_data.list dl
      ON dl.id = original_id

  GROUP BY original_id;
