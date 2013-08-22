CREATE TABLE dim_next.price_range (
  price_range_id   SMALLINT     NOT NULL PRIMARY KEY,
  price_range_name VARCHAR(126) NOT NULL

);

INSERT INTO dim_next.price_range (price_range_id, price_range_name) VALUES
('1', 'Under $99.9'),
('2', '$100 - $499,99'),
('3', '$500 - $999,99'),
('4', '$1,000 - $2,999,99'),
('5', '$2,500 - $4,999,99'),
('6', '>= $5,000');