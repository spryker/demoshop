DROP TABLE IF EXISTS webtrekk_data.search_phrase;

CREATE TABLE webtrekk_data.search_phrase (
  request_id        BIGINT    NOT NULL,
  search_phrase     VARCHAR DEFAULT NULL);
