-- for each click that leads to a conversion and each conversion type (registration, confirmation, order),
-- compute conversion a entity (member or order) and the position of the click in the chain to the conversion

CREATE TABLE webtrekk_tmp.click_chain (
  campaign_click_id    BIGINT    NOT NULL,
  click_timestamp      TIMESTAMP NOT NULL,
  campaign_id          INTEGER   NOT NULL,
  conversion_type      SMALLINT  NOT NULL, -- 1: registration, 2: lead, 3: order
  conversion_entity_id INTEGER   NOT NULL, -- id of order or member
  position             SMALLINT  NOT NULL, -- position in the click chain
  number_of_clicks     SMALLINT  NOT NULL -- length of click chain
);


INSERT INTO webtrekk_tmp.click_chain
  SELECT
    request_id,
    click_timestamp,
    campaign_id,
    conversion_type,
    conversion_entity_id,
    rank()
    OVER w AS position,
    count(request_id)
    OVER w AS number_of_clicks
  FROM (SELECT
          *

        -- get all clicks that lead to a conversion
        FROM (SELECT
                request_id,
                campaign_id,
                conversion_type,
-- 1: registration, 2: lead, 3: order
                CASE WHEN conversion_type = 1 THEN subsequent_registration_id
                WHEN conversion_type = 2 THEN subsequent_confirmation_id
                WHEN conversion_type = 3 THEN subsequent_order_id
                END AS conversion_entity_id,
                click_timestamp
              FROM webtrekk_tmp.campaign_click
                CROSS JOIN generate_series(1, 3) AS conversion_type) click_with_conversion
        WHERE conversion_entity_id IS NOT NULL) click

  WINDOW w AS (
    PARTITION BY conversion_entity_id, conversion_type
    ORDER BY click_timestamp, request_id
    ROWS BETWEEN UNBOUNDED PRECEDING AND UNBOUNDED FOLLOWING )

  ORDER BY click_timestamp DESC;



