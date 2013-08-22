SET NAMES 'utf8';

SELECT
  id,
  email,
  REPLACE(first_name, '\r\n', ' '),
  REPLACE(last_name, '\r\n', ' '),
  date_created,
  last_modified
FROM users;
