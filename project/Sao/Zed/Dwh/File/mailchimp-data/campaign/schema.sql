CREATE TABLE mailchimp_tmp.campaign (
  campaign_id SERIAL PRIMARY KEY,
  original_id VARCHAR(126) NOT NULL
);

CREATE TABLE mailchimp_dim_next.campaign (
  campaign_id   INTEGER      NOT NULL,
  campaign_name VARCHAR(126) NOT NULL,
  list_fk       INTEGER      NOT NULL,
  day_fk        INTEGER      NOT NULL
);


CREATE TABLE mailchimp_dim_next.activity (
  activity_id   SERIAL PRIMARY KEY,
  activity_name VARCHAR(126)
);

CREATE TABLE mailchimp_dim_next.campaign_activity (
  newsletter_email_fk BIGINT  NOT NULL,
  recipient_fk        INTEGER NOT NULL,
  campaign_fk         INTEGER NOT NULL,
  activity_fk         INTEGER NOT NULL,
  day_fk              INTEGER NOT NULL
);


CREATE TABLE mailchimp_dim_next.campaign_status (
  campaign_status_id   SERIAL PRIMARY KEY,
  campaign_status_name VARCHAR(126)
);

CREATE TABLE mailchimp_dim_next.campaign_recipient (
  recipient_fk       INTEGER NOT NULL,
  campaign_fk        INTEGER NOT NULL,
  campaign_status_fk INTEGER NOT NULL
);
