-- map oids of adwords cost table to campaign codes
CREATE TABLE webtrekk_tmp.adwords_cost AS
  SELECT
    adwords_cost.OID                       AS adwords_cost_oid,
    campaign_code,
    to_char(date, 'YYYYMMDD') :: INTEGER   AS day_id,
    (cost / 1000000.0) :: DOUBLE PRECISION AS cost
  FROM webtrekk_data.adwords_cost
    JOIN webtrekk_data.campaign
      ON campaign.name = keyword || ' (' || match_type || ')'
         AND ad_group = adwords_adgroup
         AND campaign = adwords_campaign
         AND account = adwords_account
  WHERE date BETWEEN (SELECT
                        util.import_min_time())
  AND (SELECT
         util.import_max_time());


SELECT
  util.add_index('webtrekk_tmp', 'adwords_cost', 'adwords_cost_oid');


CREATE VIEW webtrekk_tmp.unmatched_adwords_cost AS
  SELECT
    *
  FROM webtrekk_data.adwords_cost
  WHERE OID NOT IN (SELECT
                      adwords_cost_oid
                    FROM webtrekk_tmp.adwords_cost)
        AND (DATE BETWEEN (SELECT
                             util.import_min_time())
             AND (SELECT
                    util.import_max_time()));


SELECT
  (SELECT
     count(*) AS number_of_unmatched_adwords_cost_entries
   FROM webtrekk_tmp.unmatched_adwords_cost),
  (SELECT
     count(*) AS all_adwords_cost_entries
   FROM webtrekk_data.adwords_cost);
