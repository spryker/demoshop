CREATE TABLE webtrekk_dim_next.publication (
  publication_id   INTEGER PRIMARY KEY,
  publication_name VARCHAR(126) NOT NULL,
  partner_name     VARCHAR(126) NOT NULL
);

-- a N/A publication for a all campaigns where a publication is not known
INSERT INTO webtrekk_dim_next.publication VALUES
(-1, 'N/A', 'N/A');


INSERT INTO webtrekk_dim_next.publication
  SELECT
    DISTINCT publication_id,
    publication_name,
    partner_name
  FROM webtrekk_tmp.mcm_campaign
  WHERE 'wmc=' || wmc IN (SELECT
                            campaign_code
                          FROM webtrekk_tmp.campaigns_in_use)
  ORDER BY publication_name, partner_name;


SELECT
  util.add_index('webtrekk_dim_next', 'publication', 'publication_name');
SELECT
  util.add_index('webtrekk_dim_next', 'publication', 'partner_name');

