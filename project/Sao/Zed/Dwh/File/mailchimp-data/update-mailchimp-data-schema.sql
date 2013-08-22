DROP SCHEMA IF EXISTS mailchimp_data CASCADE;
CREATE SCHEMA mailchimp_data;


CREATE TABLE mailchimp_data.list (
  id         VARCHAR(126)             NOT NULL,
  name       VARCHAR(126)             NOT NULL,
  created_at TIMESTAMP WITH TIME ZONE NOT NULL,
  times      TIMESTAMP WITH TIME ZONE NOT NULL
);

SELECT
  util.add_index('mailchimp_data', 'list', 'id');


CREATE TABLE mailchimp_data.campaign (
  id        VARCHAR(126)             NOT NULL,
  list_id   VARCHAR(126)             NOT NULL,
  title     VARCHAR(126)             NOT NULL,
  send_time TIMESTAMP WITH TIME ZONE NOT NULL
);

SELECT
  util.add_index('mailchimp_data', 'campaign', 'id');


CREATE TABLE mailchimp_data.campaign_activity (
  campaign VARCHAR(126)             NOT NULL,
  email    VARCHAR(126)             NOT NULL,
  action   VARCHAR(126)             NOT NULL,
  times    TIMESTAMP WITH TIME ZONE NOT NULL
);

SELECT
  util.add_index('mailchimp_data', 'campaign_activity', 'campaign');
SELECT
  util.add_index('mailchimp_data', 'campaign_activity', 'email');
SELECT
  util.add_index('mailchimp_data', 'campaign_activity', 'action');



CREATE TABLE mailchimp_data.campaign_receiver (
  campaign VARCHAR(126) NOT NULL,
  email    VARCHAR(126) NOT NULL,
  status   VARCHAR(126) NOT NULL
);

SELECT
  util.add_index('mailchimp_data', 'campaign_receiver', 'campaign');
SELECT
  util.add_index('mailchimp_data', 'campaign_receiver', 'email');
SELECT
  util.add_index('mailchimp_data', 'campaign_receiver', 'status');


CREATE TABLE mailchimp_data.campaign_unsubscriber (
  campaign VARCHAR(126)             NOT NULL,
  email    VARCHAR(126)             NOT NULL,
  reason   VARCHAR(126)             NOT NULL,
  times    TIMESTAMP WITH TIME ZONE NOT NULL
);

SELECT
  util.add_index('mailchimp_data', 'campaign_unsubscriber', 'campaign');
SELECT
  util.add_index('mailchimp_data', 'campaign_unsubscriber', 'email');
SELECT
  util.add_index('mailchimp_data', 'campaign_unsubscriber', 'reason');


CREATE TABLE mailchimp_data.list_activity (
  list         VARCHAR(126) NOT NULL,
  email        VARCHAR(126) NOT NULL,
  first_name   VARCHAR(126),
  last_name    VARCHAR(126),
  optin_time   VARCHAR(126),
  confirm_time TIMESTAMP WITH TIME ZONE,
  lat          VARCHAR(126),
  lon          VARCHAR(126),
  country      VARCHAR(126),
  region       VARCHAR(126),
  last_changed TIMESTAMP WITH TIME ZONE
);

SELECT
  util.add_index('mailchimp_data', 'list_activity', 'list');
SELECT
  util.add_index('mailchimp_data', 'list_activity', 'email');
SELECT
  util.add_index('mailchimp_data', 'list_activity', 'country');
SELECT
  util.add_index('mailchimp_data', 'list_activity', 'region');
