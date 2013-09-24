CREATE TABLE webtrekk_dim_next.online_marketing_time_perspective (
  online_marketing_time_perspective_id   SMALLINT PRIMARY KEY,
  online_marketing_time_perspective_name VARCHAR(126) UNIQUE
);

INSERT INTO webtrekk_dim_next.online_marketing_time_perspective VALUES
(1, 'Click'), (2, 'Subsequent registration'), (3, 'Subsequent confirmation'),
(4, 'Subsequent first order'), (5, 'Next order');


CREATE TABLE webtrekk_dim_next.campaign_click_date (
  campaign_click_fk                    BIGINT   NOT NULL,
  day_fk                               INTEGER  NOT NULL,
  online_marketing_time_perspective_fk SMALLINT NOT NULL
);

CREATE FUNCTION webtrekk_tmp.index_dim_campaign_click_date()
  RETURNS VOID AS $$
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click_date', 'webtrekk_dim_next', 'campaign_click');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click_date', 'dim', 'day');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click_date', 'webtrekk_dim_next', 'online_marketing_time_perspective');

SELECT
  util.add_index('webtrekk_dim_next', 'campaign_click_date', 'online_marketing_time_perspective_fk');
CREATE INDEX campaign_click_date__day_fk__campaign_click_fk
ON webtrekk_dim_next.campaign_click_date (day_fk, campaign_click_fk);

CREATE INDEX campaign_click_date__day_fk__online_marketing_time_perspective_fk
ON webtrekk_dim_next.campaign_click_date (day_fk, online_marketing_time_perspective_fk);

ANALYZE webtrekk_dim_next.campaign_click_date;
$$ LANGUAGE SQL;


-- Click
INSERT INTO webtrekk_dim_next.campaign_click_date
  SELECT
    request_id AS campaign_click_fk,
    day_id,
    1          AS online_marketing_time_perspective_fk
  FROM webtrekk_tmp.campaign_click;


-- Subsequent registration
INSERT INTO webtrekk_dim_next.campaign_click_date
  SELECT
    request_id                                 AS campaign_click_fk,
    to_char(created_at, 'YYYYMMDD') :: INTEGER AS day_fk,
    2                                          AS online_marketing_time_perspective_fk
  FROM webtrekk_tmp.campaign_click
    JOIN tmp.user ON subsequent_registration_id = "user".user_id
  ORDER BY request_id;


-- Subsequent confirmation
INSERT INTO webtrekk_dim_next.campaign_click_date
  SELECT
    request_id                                      AS campaign_click_fk,
    to_char(click_timestamp, 'YYYYMMDD') :: INTEGER AS day_fk,
    3                                               AS online_marketing_time_perspective_fk
  FROM webtrekk_tmp.campaign_click
    JOIN tmp.user ON subsequent_confirmation_id = "user".user_id
  ORDER BY request_id;


-- Subsequent first order
INSERT INTO webtrekk_dim_next.campaign_click_date
  SELECT
    request_id                                  AS campaign_click_fk,
    to_char("timestamp", 'YYYYMMDD') :: INTEGER AS day_fk,
    4                                           AS online_marketing_time_perspective_fk
  FROM webtrekk_tmp.campaign_click
    JOIN tmp.order ON subsequent_first_order_id = order_id
  ORDER BY request_id;


-- Next order
INSERT INTO webtrekk_dim_next.campaign_click_date
  SELECT
    request_id                                  AS campaign_click_fk,
    to_char("timestamp", 'YYYYMMDD') :: INTEGER AS day_fk,
    5                                           AS online_marketing_time_perspective_fk
  FROM webtrekk_tmp.campaign_click
    JOIN tmp.order ON subsequent_order_id = order_id
  ORDER BY request_id;


CREATE INDEX campaign_click_date_perspective
ON webtrekk_dim_next.campaign_click_date (campaign_click_fk, online_marketing_time_perspective_fk);
