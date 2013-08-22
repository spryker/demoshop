CREATE TABLE webtrekk_dim_next.conversions_by_date_and_campaign_aggregated (
  day_fk                    INTEGER NOT NULL,
  campaign_fk               INTEGER NOT NULL,

  number_of_campaign_clicks INTEGER DEFAULT NULL,
  number_of_visits          DOUBLE PRECISION DEFAULT NULL,
  number_of_unique_visitors DOUBLE PRECISION DEFAULT NULL,
  number_of_new_visitors    DOUBLE PRECISION DEFAULT NULL,
  number_of_registrations   DOUBLE PRECISION DEFAULT NULL,
  number_of_leads           DOUBLE PRECISION DEFAULT NULL,
  number_of_first_orders    DOUBLE PRECISION DEFAULT NULL,
  number_of_orders          DOUBLE PRECISION DEFAULT NULL,
  net_order_revenue         DOUBLE PRECISION DEFAULT NULL
);


INSERT INTO webtrekk_dim_next.conversions_by_date_and_campaign_aggregated
  SELECT
    campaign_date.day_fk,
    campaign_date.campaign_fk,
    sum(number_of_campaign_clicks),
    sum(number_of_visits),
    sum(number_of_unique_visitors),
    sum(number_of_new_visitors),
    sum(number_of_registrations),
    sum(number_of_leads),
    sum(number_of_first_orders),
    sum(number_of_orders),
    sum(net_order_revenue)

  -- get all existing combinations of campaigns and dates, across all time perspectives
  FROM (SELECT
          day_fk,
          campaign_fk
        FROM webtrekk_dim_next.campaign_click
          JOIN webtrekk_dim_next.campaign_click_date
            ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
        GROUP BY day_fk, campaign_fk
       ) campaign_date

-- clicks
    LEFT JOIN (SELECT
                 day_fk,
                 campaign_fk,
                 count(DISTINCT campaign_click_id) AS number_of_campaign_clicks,
                 count(DISTINCT visit_id)          AS number_of_visits,
                 count(DISTINCT visitor_id)        AS number_of_unique_visitors,
                 count(DISTINCT new_visit_id)      AS number_of_new_visitors
               FROM webtrekk_dim_next.campaign_click
                 JOIN webtrekk_dim_next.campaign_click_date
                   ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
                      AND online_marketing_time_perspective_fk = 1
               GROUP BY day_fk, campaign_fk
              ) clicks

      ON campaign_date.day_fk = clicks.day_fk
         AND campaign_date.campaign_fk = clicks.campaign_fk

-- registrations
    LEFT JOIN (SELECT
                 day_fk,
                 campaign_fk,
                 sum(number_of_registrations) AS number_of_registrations
               FROM webtrekk_dim_next.campaign_click
                 JOIN webtrekk_dim_next.campaign_click_date
                   ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
                 JOIN webtrekk_dim_next.campaign_click_performance
                   ON campaign_click_date.campaign_click_fk = campaign_click_performance.campaign_click_fk
                      AND performance_attribution_model_fk = 4
               WHERE online_marketing_time_perspective_fk = 2
               GROUP BY day_fk, campaign_fk
              ) registrations

      ON campaign_date.day_fk = registrations.day_fk
         AND campaign_date.campaign_fk = registrations.campaign_fk

-- leads
    LEFT JOIN (SELECT
                 day_fk,
                 campaign_fk,
                 sum(number_of_leads) AS number_of_leads
               FROM webtrekk_dim_next.campaign_click
                 JOIN webtrekk_dim_next.campaign_click_date
                   ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
                 JOIN webtrekk_dim_next.campaign_click_performance
                   ON campaign_click_date.campaign_click_fk = campaign_click_performance.campaign_click_fk
                      AND performance_attribution_model_fk = 4
               WHERE online_marketing_time_perspective_fk = 3
               GROUP BY day_fk, campaign_fk
              ) leads

      ON campaign_date.day_fk = leads.day_fk
         AND campaign_date.campaign_fk = leads.campaign_fk

-- first orders
    LEFT JOIN (SELECT
                 day_fk,
                 campaign_fk,
                 sum(number_of_first_orders) AS number_of_first_orders
               FROM webtrekk_dim_next.campaign_click
                 JOIN webtrekk_dim_next.campaign_click_date
                   ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
                 JOIN webtrekk_dim_next.campaign_click_performance
                   ON campaign_click_date.campaign_click_fk = campaign_click_performance.campaign_click_fk
                      AND performance_attribution_model_fk = 4
               WHERE online_marketing_time_perspective_fk = 4
               GROUP BY day_fk, campaign_fk
              ) first_orders

      ON campaign_date.day_fk = first_orders.day_fk
         AND campaign_date.campaign_fk = first_orders.campaign_fk

-- orders
    LEFT JOIN (SELECT
                 day_fk,
                 campaign_fk,
                 sum(number_of_orders)  AS number_of_orders,
                 sum(net_order_revenue) AS net_order_revenue
               FROM webtrekk_dim_next.campaign_click
                 JOIN webtrekk_dim_next.campaign_click_date
                   ON campaign_click.campaign_click_id = campaign_click_date.campaign_click_fk
                 JOIN webtrekk_dim_next.campaign_click_performance
                   ON campaign_click_date.campaign_click_fk = campaign_click_performance.campaign_click_fk
                      AND performance_attribution_model_fk = 4
               WHERE online_marketing_time_perspective_fk = 5
               GROUP BY day_fk, campaign_fk
              ) next_order

      ON campaign_date.day_fk = next_order.day_fk
         AND campaign_date.campaign_fk = next_order.campaign_fk

  GROUP BY campaign_date.day_fk, campaign_date.campaign_fk
  ORDER BY campaign_date.day_fk, campaign_date.campaign_fk;


SELECT
  util.add_index('webtrekk_dim_next', 'conversions_by_date_and_campaign_aggregated', 'day_fk');
SELECT
  util.add_index('webtrekk_dim_next', 'conversions_by_date_and_campaign_aggregated', 'campaign_fk');
