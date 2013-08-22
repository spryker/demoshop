INSERT INTO mailchimp_tmp.country_mapping (country_name)
  SELECT
    DISTINCT country
  FROM mailchimp_data.list_activity;

INSERT INTO mailchimp_tmp.region_mapping (region_name)
  SELECT
    DISTINCT region
  FROM mailchimp_data.list_activity;


INSERT INTO mailchimp_dim_next.recipient_location (country_id, country_name, region_id, region_name)
  SELECT
    DISTINCT ON (cm.country_name,
    rm.region_name)
    cm.country_id,
    cm.country_name,
    rm.region_id,
    rm.region_name
  FROM mailchimp_data.list_activity la
    JOIN mailchimp_tmp.country_mapping cm
      ON cm.country_name = la.country
    JOIN mailchimp_tmp.region_mapping rm
      ON rm.region_name = la.region
  ORDER BY cm.country_name, rm.region_name;


INSERT INTO mailchimp_dim_next.recipient_location VALUES
(-1, -1, 'Unknown', -1, 'Unknown');
