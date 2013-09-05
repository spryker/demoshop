CREATE TABLE dim_next.payment_method (
  payment_method_id   SMALLSERIAL PRIMARY KEY,
  payment_method_name VARCHAR(126) UNIQUE
);

INSERT INTO dim_next.payment_method (payment_method_name)
  SELECT
    DISTINCT method
  FROM tmp.payment;

INSERT INTO dim_next.payment_method (payment_method_name)
  VALUES ('Unknown');