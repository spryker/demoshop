CREATE TABLE webtrekk_dim_next.channel (
  channel_id   SERIAL PRIMARY KEY,
  channel_name VARCHAR(126) UNIQUE
);

-- channels for 'Unknown' and 'Untracked'
INSERT INTO webtrekk_dim_next.channel (channel_name)
  VALUES ('Unknown'), ('Untracked'), ('Missing');

-- get all channels from the existing campaigns
INSERT INTO webtrekk_dim_next.channel (channel_name)
  SELECT
    DISTINCT channel
  FROM webtrekk_data.campaign
  ORDER BY channel;

