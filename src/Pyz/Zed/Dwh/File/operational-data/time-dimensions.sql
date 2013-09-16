CREATE TABLE dim_next.day (
  day_id               INTEGER PRIMARY KEY,
  day_reversed_id      INTEGER      NOT NULL,
  day_name             VARCHAR(126) NOT NULL UNIQUE,
  year_id              SMALLINT     NOT NULL,
  year_reversed_id     SMALLINT     NOT NULL,
  iso_year_id          SMALLINT     NOT NULL,
  iso_year_reversed_id SMALLINT     NOT NULL,
  quarter_id           INTEGER      NOT NULL,
  quarter_reversed_id  INTEGER      NOT NULL,
  quarter_name         VARCHAR(126) NOT NULL,
  month_id             INTEGER      NOT NULL,
  month_reversed_id    INTEGER      NOT NULL,
  month_name           VARCHAR(126) NOT NULL,
  week_id              INTEGER      NOT NULL,
  week_reversed_id     INTEGER      NOT NULL,
  week_name            VARCHAR(126) NOT NULL,
  day_of_the_week_id   SMALLINT     NOT NULL,
  day_of_the_week_name VARCHAR(126) NOT NULL
);

CREATE TABLE dim_next.duration (
  duration_id   INTEGER      NOT NULL,
  days          SMALLINT     NOT NULL,
  days_name     VARCHAR(126) NOT NULL,
  weeks         SMALLINT     NOT NULL,
  weeks_name    VARCHAR(126) NOT NULL,
  months        SMALLINT     NOT NULL,
  months_name   VARCHAR(126) NOT NULL,
  quarters      SMALLINT     NOT NULL,
  quarters_name VARCHAR(126) NOT NULL
);

CREATE TABLE dim_next.hour_of_day (
  hour_of_day_id   SMALLINT PRIMARY KEY,
  hour_of_day_name VARCHAR(126) NOT NULL UNIQUE
);

INSERT INTO dim_next.hour_of_day
  SELECT
    h AS hour_of_day_id,
    h || '-' || h + 1
  FROM generate_series(0, 23) h;


--
-- compute all date values from start_date to now,
-- compute all durations for the date range
--
CREATE FUNCTION tmp.populate_time_dimensions(start_day DATE)
  RETURNS VOID AS $$
INSERT INTO dim_next.day
  SELECT
    to_char(d, 'YYYYMMDD') :: INTEGER             AS day_id,
    100000000 - to_char(d, 'YYYYMMDD') :: INTEGER AS day_reversed_id,
    to_char(d, 'Dy, Mon DD YYYY')                 AS day_name,
    extract('year' FROM d)                        AS year_id,
    10000 - extract('year' FROM d)                AS year_reversed_id,
    extract('isoyear' FROM d)                     AS iso_year_id,
    10000 - extract('isoyear' FROM d)             AS iso_year_reversed_id,
    to_char(d, 'YYYYQ') :: INTEGER                AS quarter_id,
    100000 - to_char(d, 'YYYYQ') :: INTEGER       AS quarter_reversed_id,
    to_char(d, 'YYYY "Q"Q')                       AS quarter_name,
    to_char(d, 'YYYYMM') :: INTEGER               AS month_id,
    1000000 - to_char(d, 'YYYYMM') :: INTEGER     AS month_reversed_id,
    to_char(d, 'YYYY Mon')                        AS month_name,
    to_char(d, 'IYYYIW') :: INTEGER               AS week_id,
    1000000 - to_char(d, 'IYYYIW') :: INTEGER     AS week_reversed_id,
    to_char(d, 'IYYY "CW" IW')                    AS week_name,
    to_char(d, 'ID') :: INTEGER                   AS day_of_the_week_id,
    to_char(d, 'Dy')                              AS day_of_the_week_name
  FROM generate_series($1, (SELECT
                              util.import_max_time()) - INTERVAL '1 second', '1 day') AS d;

SELECT
  util.add_index('dim_next', 'day', 'year_id');
SELECT
  util.add_index('dim_next', 'day', 'iso_year_id');
SELECT
  util.add_index('dim_next', 'day', 'quarter_id');
SELECT
  util.add_index('dim_next', 'day', 'month_id');
SELECT
  util.add_index('dim_next', 'day', 'week_id');
SELECT
  util.add_index('dim_next', 'day', 'year_reversed_id');
SELECT
  util.add_index('dim_next', 'day', 'iso_year_reversed_id');
SELECT
  util.add_index('dim_next', 'day', 'quarter_reversed_id');
SELECT
  util.add_index('dim_next', 'day', 'month_reversed_id');
SELECT
  util.add_index('dim_next', 'day', 'week_reversed_id');
SELECT
  util.add_index('dim_next', 'day', 'day_of_the_week_id');


INSERT INTO dim_next.duration
  SELECT
    n + 1                                           AS duration_id,
    n                                               AS days,
    n || ' days'                                    AS days_name,
    floor(n / 7)                                    AS weeks,
    n - n % 7 || '-' || n + 6 - n % 7 || ' days'    AS weeks_name,
    floor(n / 30)                                   AS months,
    n - n % 30 || '-' || n + 29 - n % 30 || ' days' AS months_name,
    floor((n - 89) / 90)                            AS quarters,
    n - n % 90 || '-' || n + 89 - n % 90 || ' days' AS quarters_name
  FROM generate_series(0, current_date - $1 + 1, 1) AS n;

SELECT
  util.add_pk('dim_next', 'duration');
SELECT
  util.add_index('dim_next', 'duration', 'weeks');
SELECT
  util.add_index('dim_next', 'duration', 'months');
SELECT
  util.add_index('dim_next', 'duration', 'quarters');

$$ LANGUAGE SQL;