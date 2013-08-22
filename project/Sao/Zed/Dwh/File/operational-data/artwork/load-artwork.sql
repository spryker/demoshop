SET NAMES UTF8;


SELECT
  @artwork_id := @artwork_id + 1,
  id,
  user_id,
  REPLACE(title, '\r\n', ' ')
FROM user_art,
  (SELECT
     @artwork_id := 0) t
WHERE deleted = 0;