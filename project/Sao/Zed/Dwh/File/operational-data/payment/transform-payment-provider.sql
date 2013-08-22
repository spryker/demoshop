CREATE TABLE dim_next.payment_provider (
  payment_provider_id   SMALLSERIAL PRIMARY KEY,
  payment_provider_name VARCHAR(126) UNIQUE
);

INSERT INTO dim_next.payment_provider (payment_provider_name)
  SELECT
    DISTINCT provider
  FROM tmp.payment;

INSERT INTO dim_next.payment_provider (payment_provider_name)
  VALUES ('Unknown');
