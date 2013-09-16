DROP TABLE IF EXISTS webtrekk_data.campaign;

CREATE TABLE webtrekk_data.campaign (
  campaign_code    VARCHAR(126) NOT NULL,
  channel          VARCHAR(126),
  adwords_account  VARCHAR(126),
  adwords_campaign VARCHAR(126),
  adwords_adgroup  VARCHAR(126),
  name             VARCHAR(126)
);

DROP FUNCTION IF EXISTS webtrekk_data.index_campaign();

CREATE FUNCTION webtrekk_data.index_campaign()
  RETURNS VOID AS $$
ANALYZE webtrekk_data.campaign;
SELECT
  util.add_unique('webtrekk_data', 'campaign', 'campaign_code');
SELECT
  util.add_index('webtrekk_data', 'campaign', 'channel');
$$ LANGUAGE SQL;


DROP FUNCTION IF EXISTS webtrekk_data.truncate_campaign();

CREATE FUNCTION webtrekk_data.truncate_campaign()
  RETURNS VOID AS $$
DROP INDEX IF EXISTS webtrekk_data.campaign__campaign_code_unique;
DROP INDEX IF EXISTS webtrekk_data.campaign__channel;
TRUNCATE webtrekk_data.campaign;
$$ LANGUAGE SQL;
