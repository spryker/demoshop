ANALYZE webtrekk_data.search_phrase;


-- fill dimension table
CREATE TABLE webtrekk_dim_next.search_phrase (
  search_phrase_id        BIGSERIAL,
  search_phrase_name      VARCHAR      NOT NULL,
  search_phrase_type_name VARCHAR(126) NOT NULL);

INSERT INTO webtrekk_dim_next.search_phrase (search_phrase_name,
                                             search_phrase_type_name)
  SELECT
    search_phrase AS search_phrase_name,
    CASE WHEN campaign IN (SELECT
                                  campaign
                                FROM webtrekk_dim_next.campaign
                                WHERE is_brand_fk = 1)
    THEN 'Brand'
    ELSE 'Non brand'
    END           AS search_phrase_type_name

  FROM (SELECT
          max(request_id) AS request_id,
          search_phrase
        FROM webtrekk_data.search_phrase
        WHERE search_phrase IS NOT NULL AND search_phrase != ''
        GROUP BY search_phrase
-- we keep only the search phrases with at least 10 clicks
        HAVING count(request_id) >= 10) search_phrase_grouped

    JOIN webtrekk_data.campaign_click
      ON campaign_click.request_id = search_phrase_grouped.request_id

  WHERE click_timestamp BETWEEN (SELECT util.import_min_time())
                            AND (SELECT util.import_max_time())
  ORDER BY search_phrase_name;


SELECT util.add_pk('webtrekk_dim_next', 'search_phrase');
SELECT util.add_unique('webtrekk_dim_next', 'search_phrase', 'search_phrase_name');
ANALYZE webtrekk_dim_next.search_phrase;





-- map request ids to the search phrase dimension
CREATE TABLE webtrekk_tmp.request_id_to_search_phrase (
  request_id       BIGINT NOT NULL,
  search_phrase_fk BIGINT NOT NULL);

INSERT INTO webtrekk_tmp.request_id_to_search_phrase
  SELECT
    DISTINCT ON (request_id)
    request_id,
    search_phrase_id
  FROM webtrekk_data.search_phrase
    JOIN webtrekk_dim_next.search_phrase ON search_phrase_name = search_phrase;

SELECT
  util.add_index('webtrekk_tmp', 'request_id_to_search_phrase', 'request_id');
ANALYZE webtrekk_tmp.request_id_to_search_phrase;
