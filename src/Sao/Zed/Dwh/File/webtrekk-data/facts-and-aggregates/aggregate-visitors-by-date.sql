CREATE TABLE webtrekk_dim_next.visitors_by_date_aggregated (
  day_fk                 INTEGER NOT NULL,
  number_of_clicks       INTEGER NOT NULL,
  number_of_visits       INTEGER NOT NULL,
  number_of_new_visits   INTEGER NOT NULL,
  number_of_visitors     INTEGER NOT NULL,
  average_visit_duration REAL
);

INSERT INTO webtrekk_dim_next.visitors_by_date_aggregated
  SELECT
    day_fk,
    count(DISTINCT campaign_click_id),
    count(DISTINCT visit_id),
    count(DISTINCT new_visit_id),
    count(DISTINCT visitor_id),
    avg(visit_duration)
  FROM webtrekk_dim_next.campaign_click
    JOIN webtrekk_dim_next.campaign_click_date
      ON campaign_click_date.campaign_click_fk = campaign_click_id
  WHERE online_marketing_time_perspective_fk = 1
  GROUP BY day_fk
  ORDER BY day_fk;


SELECT
  util.add_index('webtrekk_dim_next', 'visitors_by_date_aggregated', 'day_fk');