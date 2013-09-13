CREATE TABLE mailchimp_tmp.country_mapping (
  country_id   SERIAL,
  country_name VARCHAR(126)
);

CREATE TABLE mailchimp_tmp.region_mapping (
  region_id   SERIAL,
  region_name VARCHAR(126)
);


CREATE TABLE mailchimp_dim_next.recipient_location (
  recipient_location_id SERIAL PRIMARY KEY,
  country_id            INTEGER,
  country_name          VARCHAR(126),
  region_id             INTEGER,
  region_name           VARCHAR(126)
);


CREATE TABLE mailchimp_tmp.recipient_subscriptions (
  email         VARCHAR(126),
  subscriptions SMALLINT
);

CREATE TABLE mailchimp_dim_next.recipient_subscriptions (
  recipient_subscriptions_id   SMALLINT PRIMARY KEY,
  recipient_subscriptions_name VARCHAR(126)
);

CREATE TABLE mailchimp_dim_next.recipient (
  recipient_id     INTEGER      NOT NULL,
  email            VARCHAR(126) NOT NULL,
  first_name       VARCHAR(126) NOT NULL,
  last_name        VARCHAR(126) NOT NULL,
  subscriptions_fk SMALLINT     NOT NULL,
  location_fk      INTEGER,
  latitude         VARCHAR(126),
  longitude        VARCHAR(126)
);


CREATE TABLE mailchimp_dim_next.unsubscribe_reason (
  unsubscribe_reason_id   SERIAL PRIMARY KEY,
  unsubscribe_reason_name VARCHAR(126)
);

CREATE TABLE mailchimp_dim_next.campaign_unsubscriber (
  recipient_fk INTEGER                  NOT NULL,
  reason_fk    INTEGER                  NOT NULL,
  campaign_fk  INTEGER                  NOT NULL,
  times        TIMESTAMP WITH TIME ZONE NOT NULL
);
