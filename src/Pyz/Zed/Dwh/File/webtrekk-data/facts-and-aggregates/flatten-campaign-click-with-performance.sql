CREATE TABLE webtrekk_dim_next.campaign_click_with_performance_flattened (
  campaign_click_id                BIGINT   NOT NULL,
  visit_id                         BIGINT   NOT NULL,
  new_visit_id                     BIGINT,
  visitor_id                       BIGINT   NOT NULL,

  campaign_fk                      BIGINT   NOT NULL,
  user_fk                          INTEGER,
  subsequent_order_fk              INTEGER,

  performance_attribution_model_fk SMALLINT NOT NULL,
  search_phrase_fk                 BIGINT,
  referrer_fk                      BIGINT,

  number_of_registrations          DOUBLE PRECISION,
  number_of_leads                  DOUBLE PRECISION,
  number_of_orders                 DOUBLE PRECISION,
  number_of_first_orders           DOUBLE PRECISION,
  number_of_orders_with_voucher    DOUBLE PRECISION,
  net_order_revenue                DOUBLE PRECISION,

  direct_cost                      DOUBLE PRECISION,
  cost_of_campaigns_without_clicks DOUBLE PRECISION,
  unmatched_cost                   DOUBLE PRECISION,

  visit_duration                   INTEGER DEFAULT NULL
);

INSERT INTO webtrekk_dim_next.campaign_click_with_performance_flattened
  SELECT
    campaign_click_id,
    visit_id,
    new_visit_id,
    visitor_id,
    campaign_fk,
    user_fk,
    subsequent_order_fk,
    performance_attribution_model_id,
    search_phrase_fk,
    referrer_fk,
    number_of_registrations,
    number_of_leads,
    number_of_orders,
    number_of_first_orders,
    number_of_orders_with_voucher,
    net_order_revenue,
    direct_cost,
    cost_of_campaigns_without_clicks,
    unmatched_cost,
    visit_duration

  FROM webtrekk_dim_next.performance_attribution_model
    CROSS JOIN webtrekk_dim_next.campaign_click

    LEFT JOIN webtrekk_dim_next.campaign_click_performance
      ON campaign_click_fk = campaign_click_id
         AND performance_attribution_model_fk = performance_attribution_model_id;


-- speeds up campaign related queries
CREATE INDEX campaign_click_with_performance_flattened__campaign_click_id__campaign_fk
ON webtrekk_dim_next.campaign_click_with_performance_flattened (campaign_click_id, campaign_fk);

CREATE INDEX campaign_click_performance_attribution_model
ON webtrekk_dim_next.campaign_click_with_performance_flattened (campaign_click_id, performance_attribution_model_fk);
