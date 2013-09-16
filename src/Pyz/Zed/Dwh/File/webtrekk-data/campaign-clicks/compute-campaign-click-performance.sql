CREATE TABLE webtrekk_dim_next.performance_attribution_model (
  performance_attribution_model_id   SMALLINT PRIMARY KEY,
  performance_attribution_model_name VARCHAR(126) UNIQUE
);

INSERT INTO webtrekk_dim_next.performance_attribution_model VALUES
(1, '40% 20% 40%'), (2, 'Last click'), (3, 'Linear'), (4, 'Project-A');


CREATE TABLE webtrekk_dim_next.campaign_click_performance (
  campaign_click_fk                BIGINT   NOT NULL,
  performance_attribution_model_fk SMALLINT NOT NULL,
  number_of_registrations          DOUBLE PRECISION,
  number_of_leads                  DOUBLE PRECISION,
  number_of_orders                 DOUBLE PRECISION,
  number_of_first_orders           DOUBLE PRECISION,
  number_of_orders_with_voucher    DOUBLE PRECISION,
  net_order_revenue                DOUBLE PRECISION
);


CREATE FUNCTION webtrekk_tmp.index_dim_campaign_click_performance()
  RETURNS VOID AS $$
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click_performance', 'webtrekk_dim_next', 'campaign_click');
SELECT
  util.add_fk('webtrekk_dim_next', 'campaign_click_performance', 'webtrekk_dim_next', 'performance_attribution_model');
SELECT
  util.add_index('webtrekk_dim_next', 'campaign_click_performance', 'performance_attribution_model_fk');
ANALYZE webtrekk_dim_next.campaign_click_performance;
$$ LANGUAGE SQL;


--- compute attributed measures
INSERT INTO webtrekk_dim_next.campaign_click_performance
  SELECT
    campaign_click_id,
    performance_attribution_model_id,

-- compute attributed performance measure by multiplying wiht attribution factor
    avg(attribution_factor * CASE WHEN conversion_type = 1 THEN 1 END)
      AS number_of_registrations,
    avg(attribution_factor * CASE WHEN conversion_type = 2 THEN 1 END)
      AS number_of_leads,
    avg(attribution_factor * CASE WHEN "order".order_id IS NOT NULL THEN 1 END)
      AS number_of_orders,
    avg(attribution_factor * is_first_order)
      AS  number_of_first_orders,
/*FIXME: avg(attribution_factor * CASE WHEN "order".discount_amount IS NOT NULL THEN 1 END)*/
    0
      AS number_of_orders_with_voucher,
    avg(attribution_factor * net_order_revenue)
      AS net_order_revenue

  -- compute attribution factor per click
  FROM (-- all attribution models except Project-A
        (SELECT
           campaign_click_id,
           conversion_entity_id,
           conversion_type,
           performance_attribution_model_id,
           CASE WHEN performance_attribution_model_id = 1 -- 40 20 40
           THEN CASE WHEN click_chain.number_of_clicks <= 2
             THEN 1.0 / click_chain.number_of_clicks
             WHEN click_chain.position = 1
             THEN 0.4
             WHEN click_chain.position = click_chain.number_of_clicks
             THEN 0.4
             ELSE 0.2 / (click_chain.number_of_clicks - 2)
             END
           WHEN performance_attribution_model_id = 2 -- last click
           THEN CASE WHEN click_chain.position = click_chain.number_of_clicks
           THEN 1
           END
           WHEN performance_attribution_model_id = 3 -- linear
           THEN 1.0 / click_chain.number_of_clicks
           END attribution_factor

         FROM webtrekk_tmp.click_chain

           CROSS JOIN webtrekk_dim_next.performance_attribution_model

         WHERE performance_attribution_model_id != 4
        )

        UNION

        -- calculations for Project-A attribution model
        (SELECT
           campaign_click_id,
           conversion_entity_id,
           conversion_type,
           4   AS performance_attribution_model_id,
           CASE WHEN number_of_clicks <= 2
           THEN 1.0 / number_of_clicks
           WHEN number_of_clicks = 3
           THEN CASE WHEN position = 1 OR position = 3
           THEN 0.4
           ELSE 0.20
           END
           WHEN number_of_clicks = 4
           THEN CASE WHEN position = 1 OR position = 4
           THEN 0.35
           ELSE 0.15
           END
           WHEN number_of_clicks >= 5
           THEN CASE WHEN position = 1 OR position = number_of_clicks
           THEN 0.30
           WHEN position = 2 OR position = number_of_clicks - 1
           THEN 0.15
           ELSE 0.1 / (number_of_clicks - 4)
           END
           END AS attribution_factor

         -- get campaign clicks filtered
         -- We ignore all SEM brand, SEO brand, DTI and Social Media clicks
         -- that are not the first element in the click chain
         FROM (SELECT
                 campaign_click_id,
                 conversion_entity_id,
                 conversion_type,
                 rank()
                 OVER w AS position,
                 count(campaign_click_id)
                 OVER w AS number_of_clicks
               FROM webtrekk_tmp.click_chain
               WHERE (campaign_id NOT IN (SELECT
                                            campaign_id
                                          FROM webtrekk_dim_next.campaign
                                          WHERE is_brand_fk = 1 -- brand
                                                OR campaign_code = 'wt_direct=direct'
                                                OR campaign_code = 'wt_social=*'))
                     OR click_chain.position = 1
               WINDOW w AS (
                 PARTITION BY conversion_entity_id, conversion_type
                 ORDER BY click_timestamp, campaign_click_id
                 ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING )
              ) filtered_click_chain
        )) click

-- orders
    LEFT JOIN (SELECT
                 tmp.order.order_id,
                 CASE WHEN rank()
                           OVER "user" = 1 THEN 1 END AS is_first_order,
                 sum(gross_price / 100)               AS net_order_revenue,
                 "order".user_id,
                 0 -- FIXME: discount_amount
               FROM tmp.order_item
                 JOIN tmp.order ON tmp.order.order_id = order_item.order_fk
               GROUP BY tmp.order.order_id
               WINDOW "user" AS (
                 PARTITION BY user_id
                 ORDER BY "order".timestamp
                 ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING )
              ) "order"
      ON "order".order_id = click.conversion_entity_id
         AND click.conversion_type = 3

  GROUP BY campaign_click_id, performance_attribution_model_id
  ORDER BY campaign_click_id, performance_attribution_model_id;
