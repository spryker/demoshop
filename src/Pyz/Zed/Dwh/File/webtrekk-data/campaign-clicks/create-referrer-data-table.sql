DROP TABLE IF EXISTS webtrekk_data.referrer;

CREATE TABLE webtrekk_data.referrer (
  request_id BIGINT       NOT NULL,
  referrer   VARCHAR      NOT NULL,
  type       VARCHAR      NOT NULL);
