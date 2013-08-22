CREATE TABLE webtrekk_dim_next.adwords_adgroup (
  adwords_adgroup_id    SERIAL       NOT NULL,
  adwords_adgroup_name  VARCHAR(126) NOT NULL,
  adwords_campaign_name VARCHAR(126),
  adwords_account_name  VARCHAR(126)
);


INSERT INTO webtrekk_dim_next.adwords_adgroup (adwords_adgroup_name, adwords_campaign_name, adwords_account_name)

  SELECT
    DISTINCT adwords_adgroup,
    adwords_campaign,
    adwords_account
  FROM webtrekk_data.campaign,
    webtrekk_tmp.campaigns_in_use
  WHERE campaign.campaign_code = campaigns_in_use.campaign_code
        AND adwords_adgroup IS NOT NULL
  ORDER BY adwords_account, adwords_campaign, adwords_adgroup;


SELECT
  util.add_pk('webtrekk_dim_next', 'adwords_adgroup');

SELECT
  util.add_index('webtrekk_dim_next', 'adwords_adgroup', 'adwords_adgroup_name');
SELECT
  util.add_index('webtrekk_dim_next', 'adwords_adgroup', 'adwords_campaign_name');
SELECT
  util.add_index('webtrekk_dim_next', 'adwords_adgroup', 'adwords_account_name');

ANALYZE webtrekk_dim_next.adwords_adgroup;
