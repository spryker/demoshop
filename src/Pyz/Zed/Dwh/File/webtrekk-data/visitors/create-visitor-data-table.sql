DROP TABLE IF EXISTS webtrekk_data.visitor;

CREATE TABLE webtrekk_data.visitor (
  sid             BIGINT    NOT NULL,
  eid             BIGINT    NOT NULL,
  visit_timestamp TIMESTAMP NOT NULL);


