CREATE TABLE webtrekk_tmp.campaigns_in_use (
  campaign_code VARCHAR(126) NOT NULL
);


INSERT INTO webtrekk_tmp.campaigns_in_use

-- all campaigns that have clicks
  SELECT
    DISTINCT COALESCE(keyword, campaign) AS campaign_code
  FROM webtrekk_data.campaign_click
  WHERE click_timestamp BETWEEN (SELECT
                                   util.import_min_time())
  AND (SELECT
         util.import_max_time())

  UNION

  -- all campaigns that have adwords cost entries
  SELECT
    DISTINCT campaign_code
  FROM webtrekk_tmp.adwords_cost
  WHERE campaign_code IS NOT NULL

  ORDER BY campaign_code;


