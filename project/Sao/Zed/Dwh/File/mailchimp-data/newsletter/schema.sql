CREATE TABLE mailchimp_dim_next.newsletter_email (
  newsletter_email_id BIGINT  NOT NULL,

  list_fk             INTEGER NOT NULL,
  campaign_fk         INTEGER NOT NULL,
  recipient_fk        INTEGER NOT NULL,
  sent_day_fk         INTEGER NOT NULL,

  sent                INTEGER,
  soft                INTEGER,
  hard                INTEGER,

  subscription_fk     INTEGER,
  unsubscribe         INTEGER,
  reason_fk           SMALLINT
);


CREATE TABLE mailchimp_dim_next.newsletter_time_perspective (
  newsletter_time_perspective_id   SMALLINT PRIMARY KEY,
  newsletter_time_perspective_name VARCHAR(126) UNIQUE
);

INSERT INTO mailchimp_dim_next.newsletter_time_perspective VALUES
(1, 'Sent'), (2, 'Open'), (3, 'Click');


CREATE TABLE mailchimp_dim_next.newsletter_email_date (
  newsletter_email_fk            BIGINT   NOT NULL,
  day_fk                         INTEGER  NOT NULL,
  newsletter_time_perspective_fk SMALLINT NOT NULL
);

CREATE FUNCTION mailchimp_tmp.index_dim_newsletter_email_date()
  RETURNS VOID AS $$
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email_date', 'mailchimp_dim_next', 'newsletter_email');
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email_date', 'dim', 'day');
SELECT
  util.add_fk('mailchimp_dim_next', 'newsletter_email_date', 'mailchimp_dim_next', 'newsletter_time_perspective');
SELECT
  util.add_index('mailchimp_dim_next', 'newsletter_email_date', 'newsletter_time_perspective_fk');
ANALYZE mailchimp_dim_next.newsletter_email_date;
$$ LANGUAGE SQL;


CREATE TABLE mailchimp_dim_next.newsletter_campaign_fact (
  newsletter_email_id   BIGINT,
  list_fk               INTEGER NOT NULL,
  campaign_fk           INTEGER,
  recipient_fk          INTEGER NOT NULL,
  recipient_location_fk INTEGER NOT NULL,
  sent_day_fk           INTEGER,

  sent                  INTEGER,
  soft                  INTEGER,
  hard                  INTEGER,

  subscription_fk       INTEGER,
  unsubscribe           INTEGER,
  reason_fk             SMALLINT,

  open                  SMALLINT,
  open_fk               INTEGER,
  click                 SMALLINT,
  click_fk              INTEGER
);


CREATE TABLE mailchimp_dim_next.newsletter_recipient_fact (
  list_activity_id      INTEGER  NOT NULL,
  list_fk               INTEGER  NOT NULL,
  recipient_fk          INTEGER  NOT NULL,
  recipient_location_fk INTEGER  NOT NULL,
  day_fk                INTEGER  NOT NULL,
  subscriptions_fk      SMALLINT NOT NULL,
  subscribed            INTEGER
);
