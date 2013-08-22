CREATE TABLE webtrekk_dim_next.campaign_click (
  campaign_click_id                BIGINT NOT NULL,
  visit_id                         BIGINT NOT NULL,
  new_visit_id                     BIGINT,
  visitor_id                       BIGINT NOT NULL,

  campaign_fk                      BIGINT NOT NULL,
  search_phrase_fk                 BIGINT DEFAULT NULL,
  referrer_fk                      BIGINT DEFAULT NULL,
  user_fk                          INTEGER,
  subsequent_registration_fk       INTEGER,
  subsequent_confirmation_fk       INTEGER,
  subsequent_first_order_fk        INTEGER,
  subsequent_order_fk              INTEGER,

  direct_cost                      DOUBLE PRECISION,
  cost_of_campaigns_without_clicks DOUBLE PRECISION,
  unmatched_cost                   DOUBLE PRECISION,

  visit_duration                   INTEGER DEFAULT NULL
);


INSERT INTO webtrekk_dim_next.campaign_click
  SELECT
    campaign_click.request_id AS campaign_click_id,
    campaign_click.sid        AS visit_id,
    CASE WHEN campaign_click.sid = first_value(campaign_click.sid)
    OVER (PARTITION BY eid
      ORDER BY click_timestamp)
    THEN campaign_click.sid
    ELSE NULL
    END                       AS new_visit_id,
    eid                       AS visitor_id,

    campaign_id,
    search_phrase_fk,
    referrer_fk,
    user_id,
    subsequent_registration_id,
    subsequent_confirmation_id,
    subsequent_first_order_id,
    subsequent_order_id,

    direct_cost,
    cost_of_campaigns_without_clicks,
    unmatched_cost,

    duration

  FROM webtrekk_tmp.campaign_click
    LEFT JOIN webtrekk_tmp.request_id_to_referrer ON request_id_to_referrer.request_id = campaign_click.request_id
    LEFT JOIN webtrekk_tmp.request_id_to_search_phrase ON request_id_to_search_phrase.request_id = campaign_click.request_id
    LEFT JOIN webtrekk_tmp.click_cost ON click_cost.request_id = campaign_click.request_id
    LEFT JOIN webtrekk_tmp.visit_duration ON visit_duration.sid = campaign_click.sid

  ORDER BY click_timestamp;


SELECT
  util.add_pk('webtrekk_dim_next', 'campaign_click');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click', 'dim', 'user');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click', 'webtrekk_dim_next', 'campaign');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click', 'webtrekk_dim_next', 'search_phrase');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click', 'webtrekk_dim_next', 'referrer');

ALTER TABLE webtrekk_dim_next.campaign_click
ADD FOREIGN KEY (subsequent_registration_fk) REFERENCES dim.user (user_id);
ALTER TABLE webtrekk_dim_next.campaign_click
ADD FOREIGN KEY (subsequent_confirmation_fk) REFERENCES dim.user (user_id);
ALTER TABLE webtrekk_dim_next.campaign_click
ADD FOREIGN KEY (subsequent_first_order_fk) REFERENCES dim.order (order_id);
ALTER TABLE webtrekk_dim_next.campaign_click
ADD FOREIGN KEY (subsequent_order_fk) REFERENCES dim.order (order_id);
