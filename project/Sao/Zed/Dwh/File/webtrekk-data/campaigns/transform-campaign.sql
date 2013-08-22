-- brand / non-brand dimension
CREATE TABLE webtrekk_dim_next.is_brand (
  is_brand_id   SMALLINT PRIMARY KEY,
  is_brand_name VARCHAR(126) UNIQUE
);

INSERT INTO webtrekk_dim_next.is_brand
  VALUES (1, 'Brand'), (2, 'Non Brand'), (3, 'Other');


-- campaign table
CREATE TABLE webtrekk_dim_next.campaign (
  campaign_id        BIGINT       NOT NULL,
  campaign_name      VARCHAR(126),
  campaign_code      VARCHAR(126) NOT NULL,
  channel_fk         SMALLINT     NOT NULL,
  publication_fk     SMALLINT     NOT NULL,
  adwords_adgroup_fk INTEGER DEFAULT NULL,
  is_brand_fk        SMALLINT     NOT NULL,
  partner_or_adwords_account_name      VARCHAR,
  publication_or_adwords_campaign_name VARCHAR,
  wmc_or_adwords_adgroup_name          VARCHAR
);


CREATE FUNCTION webtrekk_tmp.index_dim_campaign()
  RETURNS VOID AS $$
SELECT
  util.add_pk('webtrekk_dim_next', 'campaign');
SELECT
  util.add_unique('webtrekk_dim_next', 'campaign', 'campaign_code');
SELECT
  util.add_indexes_on_all_fks('webtrekk_dim_next', 'campaign');

SELECT
  util.add_fk('webtrekk_dim_next', 'campaign', 'webtrekk_dim_next', 'is_brand');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign', 'webtrekk_dim_next', 'channel');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign', 'webtrekk_dim_next', 'publication');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign', 'webtrekk_dim_next', 'adwords_adgroup');

ANALYZE webtrekk_dim_next.campaign;
$$ LANGUAGE SQL;


-- self-assigned campaign ids
CREATE SEQUENCE webtrekk_tmp.campaign_id;


-- a campaign for 'Untracked' clicks, which are created for conversions without preceding clicks
INSERT INTO webtrekk_dim_next.campaign
  SELECT
    nextval('webtrekk_tmp.campaign_id'),
    'Untracked',
    '_untracked_',
    2,
    -1,
    NULL,
    3,
    'Untracked',
    'Untracked',
    'Untracked';


-- a campaign for clicks that are created from clicks where the campaign is not known
INSERT INTO webtrekk_dim_next.campaign
  SELECT
    nextval('webtrekk_tmp.campaign_id'),
    'Missing',
    '_missing_',
    3,
    -1,
    NULL,
    3,
    'Missing',
    'Missing',
    'Missing';


-- join dimensions for campaigns that are known in webtrekk
INSERT INTO webtrekk_dim_next.campaign
  SELECT
    nextval('webtrekk_tmp.campaign_id')                                             AS campaign_id,
    substring(campaign.name FROM 0 FOR 30) || ' (' || campaign.campaign_code || ')' AS campaign_name,
    campaign.campaign_code,
    channel_id                                                                      AS channel_fk,
    COALESCE(publication_id, -1)                                                    AS publication_fk,
-- publication_id or 'N/A'
    adwords_adgroup_id                                                              AS adwords_adgroup_fk,
    CASE -- brand / non-brand logic, currently broken
    WHEN campaign.campaign_code = 'wt_seo_brand=*'
    THEN 1 -- brand
    WHEN channel = 'SEO' OR channel = 'SEM'
    THEN 2 -- non brand
    ELSE 3 -- other
    END                                                                             AS is_brand_fk,
    CASE
      WHEN campaign_code LIKE 'wmc=%' THEN partner_name
      WHEN adwords_adgroup_name IS NOT NULL THEN adwords_account_name
      WHEN campaign_code = 'wt_direct=direct' THEN 'DTI'
      WHEN campaign_code = 'wt_referrer=*' THEN 'Other referrer'
      WHEN campaign_code = 'wt_social=*' THEN 'Social media referrer'
      WHEN campaign.campaign_code = 'wt_seo_brand=*' THEN 'SEO Brand'
      WHEN campaign.campaign_code = 'wt_seo_non_brand=*' THEN 'SEO Non Brand'
      ELSE channel_name
    END                                                                             AS partner_or_adwords_account_name,
    CASE
      WHEN campaign_code LIKE 'wmc=%' THEN publication_name
      WHEN adwords_adgroup_name IS NOT NULL THEN adwords_campaign_name
      WHEN campaign_code = 'wt_direct=direct' THEN 'DTI'
      WHEN campaign_code = 'wt_referrer=*' THEN 'Other referrer'
      WHEN campaign_code = 'wt_social=*' THEN 'Social media referrer'
      WHEN campaign.campaign_code = 'wt_seo_brand=*' THEN 'SEO Brand'
      WHEN campaign.campaign_code = 'wt_seo_non_brand=*' THEN 'SEO Non Brand'
      ELSE channel_name
    END                                                                             AS publication_or_adwords_campaign_name,
    CASE
      WHEN campaign_code LIKE 'wmc=%' THEN campaign_code
      WHEN adwords_adgroup_name IS NOT NULL THEN adwords_adgroup_name
      WHEN campaign_code = 'wt_direct=direct' THEN 'DTI'
      WHEN campaign_code = 'wt_referrer=*' THEN 'Other referrer'
      WHEN campaign_code = 'wt_social=*' THEN 'Social media referrer'
      WHEN campaign.campaign_code = 'wt_seo_brand=*' THEN 'SEO Brand'
      WHEN campaign.campaign_code = 'wt_seo_non_brand=*' THEN 'SEO Non Brand'
      ELSE channel_name
    END                                                                             AS wmc_or_adwords_adgroup_name

  FROM webtrekk_data.campaign
    JOIN webtrekk_dim_next.channel ON channel_name = channel
    LEFT JOIN webtrekk_dim_next.adwords_adgroup
      ON adwords_adgroup_name = adwords_adgroup
         AND adwords_campaign_name = adwords_campaign
         AND adwords_account_name = adwords_account
    LEFT JOIN (SELECT
                 'wmc=' || CAST(wmc AS VARCHAR) AS wmc,
                 partner_id, partner_name, publication_id, publication_name
               FROM webtrekk_tmp.mcm_campaign) mcm_campaign
      ON mcm_campaign.wmc = campaign.campaign_code

  WHERE campaign_code IN (SELECT
                            campaign_code
                          FROM webtrekk_tmp.campaigns_in_use)

  ORDER BY campaign_code;


-- create campaigns for clicks that don't have matching campaign codes in webtrekk_data.campaign
INSERT INTO webtrekk_dim_next.campaign
  SELECT
    nextval('webtrekk_tmp.campaign_id'),
    'Unknown campaign (' || campaign_code || ')' AS campaign_name,
    campaign_code,
    1                                            AS channel_fk,
-- 'Unknown'
    -1                                           AS publication_fk,
-- 'N/A'
    NULL                                         AS adgroup_fk,
    3                                            AS is_brand_fk,
    'Unknown',
    'Unknown',
    'Unknown'
  FROM webtrekk_tmp.campaigns_in_use
  WHERE campaign_code NOT IN (SELECT
                                campaign_code
                              FROM webtrekk_data.campaign)
  ORDER BY campaign_code;


-- add foreign keys and indexes
SELECT
  webtrekk_tmp.index_dim_campaign();


CREATE INDEX campaign__campaign_id__channel_fk
ON webtrekk_dim_next.campaign (campaign_id, channel_fk);

CREATE INDEX campaign__campaign_id__publication_fk
ON webtrekk_dim_next.campaign (campaign_id, publication_fk);

CREATE INDEX campaign__campaign_id__is_brand_fk
ON webtrekk_dim_next.campaign (campaign_id, is_brand_fk);
