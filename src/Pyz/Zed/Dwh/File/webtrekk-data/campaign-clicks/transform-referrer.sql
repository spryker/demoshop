
ANALYZE webtrekk_data.referrer;
-- Get all clicks and their referrers that are from the relevant channels
--
-- Map referrer strings to referrers shortened to
-- the last three parts (e.g. x12.foo.bar.baz.com becomes
-- bar.baz.com).
CREATE TABLE webtrekk_tmp.referrer (
  request_id         BIGINT       NOT NULL,
  referrer           VARCHAR      NOT NULL,
  referrer_shortened VARCHAR(126),
  referrer_type      SMALLINT     NOT NULL
);

INSERT INTO webtrekk_tmp.referrer
  SELECT
    referrer.request_id,
    referrer,
    coalesce(substring(referrer, '(([a-z0-9\-]*\.)?[a-z0-9\-]*\.[a-z]*)$'),
             '{ other }') AS referrer_shortened,
    CASE WHEN type = '1' THEN 2
    WHEN type = '2' THEN 3
    ELSE 1
    END
  FROM webtrekk_data.campaign_click
    JOIN webtrekk_data.referrer ON referrer.request_id = campaign_click.request_id
  WHERE (campaign = 'wt_referrer=*'
         OR campaign = 'wt_seo_non_brand=*'
         OR campaign = 'wt_seo_brand=*'
         OR campaign = 'wt_social=*')
        AND click_timestamp BETWEEN (SELECT util.import_min_time())
                                AND (SELECT util.import_max_time());





-- fill dimension table
CREATE TABLE webtrekk_dim_next.referrer (
  referrer_id        BIGSERIAL,
  referrer_name      VARCHAR(126) NOT NULL,
  referrer_type_name VARCHAR(126) NOT NULL);

INSERT INTO webtrekk_dim_next.referrer (referrer_name, referrer_type_name)
  SELECT
    DISTINCT ON (referrer_shortened)
    referrer_shortened,
    CASE WHEN referrer_type = '1' THEN 'Referrer'
    WHEN referrer_type = '2' THEN 'SEO'
    WHEN referrer_type = '3' THEN 'Social media'
    END AS referrer_type_name

  FROM webtrekk_tmp.referrer
  ORDER BY referrer_shortened;


SELECT
  util.add_pk('webtrekk_dim_next', 'referrer');
SELECT
  util.add_unique('webtrekk_dim_next', 'referrer', 'referrer_name');
ANALYZE webtrekk_dim_next.referrer;






-- map request ids to referrers
CREATE TABLE webtrekk_tmp.request_id_to_referrer (
  request_id  BIGINT NOT NULL,
  referrer_fk BIGINT NOT NULL);

INSERT INTO webtrekk_tmp.request_id_to_referrer
  SELECT
    request_id,
    referrer_id
  FROM webtrekk_tmp.referrer
    JOIN webtrekk_dim_next.referrer ON referrer_name = referrer_shortened
  ORDER BY request_id;

SELECT util.add_index('webtrekk_tmp', 'request_id_to_referrer', 'request_id');
ANALYZE webtrekk_tmp.request_id_to_referrer;
