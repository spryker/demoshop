CREATE TABLE webtrekk_tmp.campaign_click (
  request_id                 BIGINT    NOT NULL,
  sid                        BIGINT    NOT NULL,
  eid                        BIGINT,
  user_id                    INTEGER,
  click_timestamp            TIMESTAMP NOT NULL,
  day_id                     INTEGER   NOT NULL,
  campaign_id                BIGINT    NOT NULL,
  subsequent_registration_id INTEGER,
  subsequent_confirmation_id INTEGER,
  subsequent_first_order_id  INTEGER,
  subsequent_order_id        INTEGER
);

INSERT INTO webtrekk_tmp.campaign_click
  SELECT
    campaign_click.request_id,
    campaign_click.sid,
    visitor.eid,
    visitor.user_id,
    click_timestamp,
    to_char(click_timestamp, 'YYYYMMDD') :: INTEGER AS day_id,
    campaign_id,

    CASE WHEN click_timestamp <= tmp."user".created_at
    THEN tmp."user".user_id
    ELSE NULL
    END                                             AS subsequent_registration_id,

--CASE WHEN click_timestamp <= tmp."user".confirmed_date
--THEN tmp."user".user_id
--ELSE NULL
--END                                           AS subsequent_confirmation_id,
    NULL                                            AS subsequent_confirmation_id,
    is_first_order_id                               AS subsequent_first_order_id,
    order_id                                        AS subsequent_order_id


  FROM webtrekk_data.campaign_click

    JOIN webtrekk_dim_next.campaign
      ON campaign.campaign_code = COALESCE(campaign_click.keyword, campaign_click.campaign)

    JOIN webtrekk_tmp.visitor ON visitor.sid = campaign_click.sid

    LEFT JOIN tmp.user ON visitor.user_id = tmp."user".user_id

-- get all orders of each user, together with the id and timestamp of the respective previous orders
    LEFT JOIN (SELECT
                 dim.order.user_fk,
                 tmp.order.order_id,
                 CASE WHEN first_value(tmp.order.order_id)
                           OVER "user" = tmp.order.order_id
                 THEN tmp.order.order_id
                 ELSE NULL
                 END               AS is_first_order_id,
                 tmp.order.timestamp AS order_timestamp,
--
                 lag(tmp.order.order_id)
                 OVER "user"       AS previous_order_id,
                 lag(tmp."order".timestamp)
                 OVER "user"       AS previous_order_timestamp
               FROM tmp.order
               JOIN dim.order ON tmp.order.order_id = dim.order.order_id
               WINDOW "user" AS (
                 PARTITION BY dim.order.user_fk
                 ORDER BY tmp."order".timestamp)) "order"
      ON "order".user_fk = tmp."user".user_id
         AND ((click_timestamp > "order".previous_order_timestamp AND click_timestamp <= "order".order_timestamp)
              OR (click_timestamp <= "order".order_timestamp AND "order".previous_order_id IS NULL))

  WHERE click_timestamp
  BETWEEN (SELECT
             util.import_min_time())
  AND (SELECT
         util.import_max_time())

  ORDER BY eid, click_timestamp;


-- sequence for inventing request ids
CREATE SEQUENCE webtrekk_tmp.request_id_seq;
SELECT
  setval('webtrekk_tmp.request_id_seq', MAX(request_id))
FROM webtrekk_tmp.campaign_click;


-- create campaign clicks for known visitors without campaign clicks
INSERT INTO webtrekk_tmp.campaign_click
  SELECT
    nextval('webtrekk_tmp.request_id_seq')          AS campaign_click_id,
    sid,
    eid,
    user_id,
    visit_timestamp,
    to_char(visit_timestamp, 'YYYYMMDD') :: INTEGER AS day_id,
    (SELECT
    campaign_id
     FROM webtrekk_dim_next.campaign
     WHERE campaign_code = '_missing_')             AS campaign_id,
    null,
    null,
    null,
    null
  FROM webtrekk_tmp.visitor
  WHERE visitor.sid NOT IN (SELECT
                              sid
                            FROM webtrekk_data.campaign_click);


-- sequences for creating sids and eids
CREATE SEQUENCE webtrekk_tmp.sid_seq;
CREATE SEQUENCE webtrekk_tmp.eid_seq;
SELECT
  setval('webtrekk_tmp.sid_seq', MAX(sid))
FROM webtrekk_tmp.campaign_click;
SELECT
  setval('webtrekk_tmp.eid_seq', MAX(eid))
FROM webtrekk_tmp.campaign_click;


-- create campaign clicks for untracked registrations
INSERT INTO webtrekk_tmp.campaign_click
  SELECT
    nextval('webtrekk_tmp.request_id_seq')                          AS request_id,
    nextval('webtrekk_tmp.sid_seq')                                 AS visit_id,
    "user".user_id                                                  AS eid,
    "user".user_id,
    "user".created_at + '-1 second'                                 AS click_timestamp,
    to_char("user".created_at + '-1 second', 'YYYYMMDD') :: INTEGER AS day_id,
    (SELECT
    campaign_id
     FROM webtrekk_dim_next.campaign
     WHERE campaign_code = '_untracked_')                           AS campaign_fk,
    "user".user_id                                                  AS subsequent_registration_id,
    NULL,
    NULL,
    NULL

  FROM tmp.user
    LEFT JOIN webtrekk_tmp.campaign_click
      ON "user".user_id = campaign_click.subsequent_registration_id
  WHERE request_id IS NULL;


-- create campaign clicks for the untracked orders
INSERT INTO webtrekk_tmp.campaign_click
  SELECT
    nextval('webtrekk_tmp.request_id_seq')                            AS request_id,
    nextval('webtrekk_tmp.sid_seq')                                   AS visit_id,
    dim.order.user_fk                                                 AS eid,
    dim.order.user_fk                                                 AS user_id,
    tmp.order.timestamp + '-1 second'                                 AS click_timestamp,
    to_char(tmp.order.timestamp + '-1 second', 'YYYYMMDD') :: INTEGER AS day_id,
    (SELECT
    campaign_id
     FROM webtrekk_dim_next.campaign
     WHERE campaign_code = '_untracked_')                             AS campaign_fk,
    null,
    null,
    CASE
      WHEN dim.order.order_id = (SELECT min(o.order_id) FROM dim.order o WHERE o.user_fk = dim.order.user_fk) THEN dim.order.order_id
      ELSE NULL
    END                                                               AS subsequent_first_order_id,
    dim.order.order_id                                                AS subsequent_order_fk

  FROM dim.order
    JOIN tmp.order ON dim.order.order_id = tmp.order.order_id
    LEFT JOIN webtrekk_tmp.campaign_click
      ON dim.order.order_id = campaign_click.subsequent_order_id
  WHERE request_id IS NULL;


SELECT util.add_index('webtrekk_tmp', 'campaign_click', 'user_id');
