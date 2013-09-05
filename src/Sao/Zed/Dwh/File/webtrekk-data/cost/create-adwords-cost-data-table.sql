DROP TABLE IF EXISTS webtrekk_data.adwords_cost;

CREATE TABLE webtrekk_data.adwords_cost (
  account    VARCHAR(126) NOT NULL,
  date       DATE         NOT NULL,
  keyword    VARCHAR(126) NOT NULL,
  match_type CHAR(7)      NOT NULL,
  campaign   VARCHAR(126) NOT NULL,
  ad_group   VARCHAR(126) NOT NULL,
  clicks     INTEGER      NOT NULL,
  cost       INTEGER      NOT NULL,
  currency   VARCHAR(126) NOT NULL
) WITH (OIDS);

