DROP TABLE IF EXISTS webtrekk_data.campaign_click;

CREATE TABLE webtrekk_data.campaign_click (
  sid             BIGINT                   NOT NULL,
  request_id      BIGINT                   NOT NULL,
  click_timestamp TIMESTAMP WITH TIME ZONE NOT NULL,
  campaign        VARCHAR(126)             NOT NULL,
  keyword         VARCHAR(126)
);

