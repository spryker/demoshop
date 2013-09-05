DROP TABLE IF EXISTS webtrekk_data.content;

CREATE TABLE webtrekk_data.content (
  request_id BIGINT                   NOT NULL,
  sid        BIGINT                   NOT NULL,
  timestamp  TIMESTAMP WITH TIME ZONE NOT NULL
);



