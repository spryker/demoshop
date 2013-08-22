-- cost per day and a campaign / partner / publication / channel level (only one level per row !)
CREATE TABLE webtrekk_tmp.cost (
  day_id                           INTEGER NOT NULL,
  campaign_id                      INTEGER,
  publication_id                   INTEGER,
  partner_in_channel_id            INTEGER,
  channel_id                       SMALLINT,
  direct_cost                      DOUBLE PRECISION,
  cost_of_campaigns_without_clicks DOUBLE PRECISION,
  unmatched_cost                   DOUBLE PRECISION
);


-- adwords: direct cost
INSERT INTO webtrekk_tmp.cost (day_id, campaign_id, direct_cost)
  SELECT
    adwords_cost.day_id,
    campaign.campaign_id,
    cost
  FROM webtrekk_tmp.adwords_cost,
    webtrekk_dim_next.campaign

  WHERE campaign.campaign_code = adwords_cost.campaign_code
        AND EXISTS(SELECT
                     *
                   FROM webtrekk_tmp.campaign_click
                   WHERE campaign_click.campaign_id = campaign.campaign_id
                         AND campaign_click.day_id = adwords_cost.day_id)
  ORDER BY adwords_cost.day_id;


-- adwords: cost of campaigns without clicks (all put on SEM channel)
INSERT INTO webtrekk_tmp.cost (day_id, channel_id, cost_of_campaigns_without_clicks)
  SELECT
    day_id,
    (SELECT
    channel_id
     FROM webtrekk_dim_next.channel
     WHERE channel_name = 'SEM') AS channel_id,
    sum(cost)

  FROM webtrekk_tmp.adwords_cost
    JOIN webtrekk_dim_next.campaign ON campaign.campaign_code = adwords_cost.campaign_code
-- adwords cost units without clicks
    WHERE NOT EXISTS(SELECT
                       *
                     FROM webtrekk_tmp.cost
                     WHERE cost.campaign_id = campaign.campaign_id
                           AND cost.day_id = adwords_cost.day_id)
    GROUP BY day_id
  ORDER BY day_id;

-- unmatched adwords cost
INSERT INTO webtrekk_tmp.cost (day_id, channel_id, unmatched_cost)
  SELECT
    to_char(date, 'YYYYMMDD') :: INTEGER AS day_id,
    (SELECT
    channel_id
     FROM webtrekk_dim_next.channel
     WHERE channel_name = 'SEM')         AS channel_id,
    sum(cost) / 1000000.0
  FROM webtrekk_tmp.unmatched_adwords_cost
  GROUP BY date
  ORDER BY date;


-- click cost
CREATE TABLE webtrekk_tmp.click_cost (
  request_id                       BIGINT NOT NULL,
  direct_cost                      DOUBLE PRECISION, -- cost entries for which clicks exist
  cost_of_campaigns_without_clicks DOUBLE PRECISION, -- cost for which no clicks exist, populated to the next higher level with clicks
  unmatched_cost                   DOUBLE PRECISION -- cost where the concrete campaign can not be determined, populated to the next known level
);


INSERT INTO webtrekk_tmp.click_cost
  SELECT
    *
  FROM
    (SELECT
       request_id,
       coalesce(sum(campaign_cost.direct_cost_per_click), 0.0)
       + coalesce(sum(channel_cost.direct_cost_per_click), 0.0)
         AS direct_cost,
       coalesce(sum(channel_cost.cost_of_campaigns_without_clicks_per_click), 0.0)
         AS cost_of_campaigns_without_clicks,
       coalesce(sum(channel_cost.unmatched_cost_per_click), 0.0)
         AS unmatched_cost

     FROM webtrekk_tmp.campaign_click
       JOIN webtrekk_dim_next.campaign ON campaign_click.campaign_id = campaign.campaign_id
-- cost per day per campaign
       LEFT JOIN (SELECT
                    cost_per_campaign.day_id,
                    cost_per_campaign.campaign_id,
                    direct_cost / number_of_clicks AS direct_cost_per_click
                  FROM (SELECT
                          cost.day_id,
                          cost.campaign_id,
                          sum(direct_cost) AS direct_cost
                        FROM webtrekk_tmp.cost
                        WHERE cost.campaign_id IS NOT NULL
                        GROUP BY cost.day_id, cost.campaign_id) cost_per_campaign
                    JOIN (SELECT
                            day_id,
                            campaign_id,
                            count(*) AS number_of_clicks
                          FROM webtrekk_tmp.campaign_click
                          GROUP BY day_id, campaign_id) clicks_per_campaign
                      ON cost_per_campaign.day_id = clicks_per_campaign.day_id
                         AND cost_per_campaign.campaign_id = clicks_per_campaign.campaign_id) campaign_cost
         ON campaign_cost.day_id = campaign_click.day_id
            AND campaign_cost.campaign_id = campaign_click.campaign_id
-- cost per day per channel
       LEFT JOIN (SELECT
                    cost_per_channel.day_id,
                    cost_per_channel.channel_id,
                    direct_cost / number_of_clicks                      AS direct_cost_per_click,
                    cost_of_campaigns_without_clicks / number_of_clicks AS cost_of_campaigns_without_clicks_per_click,
                    unmatched_cost / number_of_clicks                   AS unmatched_cost_per_click
                  FROM (SELECT
                          cost.day_id,
                          cost.channel_id,
                          sum(direct_cost)                      AS direct_cost,
                          sum(cost_of_campaigns_without_clicks) AS cost_of_campaigns_without_clicks,
                          sum(unmatched_cost)                   AS unmatched_cost
                        FROM webtrekk_tmp.cost
                        WHERE cost.channel_id IS NOT NULL
                        GROUP BY cost.day_id, cost.channel_id) cost_per_channel
                    JOIN (SELECT
                            day_id,
                            channel_fk AS channel_id,
                            count(*)   AS number_of_clicks
                          FROM webtrekk_tmp.campaign_click
                            JOIN webtrekk_dim_next.campaign ON campaign.campaign_id = campaign_click.campaign_id
                          GROUP BY day_id, channel_id) clicks_per_channel
                      ON cost_per_channel.day_id = clicks_per_channel.day_id
                         AND cost_per_channel.channel_id = clicks_per_channel.channel_id) channel_cost
         ON channel_cost.day_id = campaign_click.day_id
            AND channel_cost.channel_id = campaign.channel_fk


     GROUP BY request_id) click_cost

  WHERE direct_cost > 0 OR cost_of_campaigns_without_clicks > 0 OR unmatched_cost > 0
  ORDER BY request_id;


SELECT
  util.add_index('webtrekk_tmp', 'click_cost', 'request_id');

