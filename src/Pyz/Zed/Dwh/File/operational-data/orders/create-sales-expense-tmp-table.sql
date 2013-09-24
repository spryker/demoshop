CREATE TABLE tmp.sales_expense (
  fk_sales_order_item INTEGER      NOT NULL,
  fk_sales_order      INTEGER,
  type                VARCHAR(126) NOT NULL,
  name                VARCHAR(126) NOT NULL,
  gross_price         INTEGER      NOT NULL,
  price_to_pay        INTEGER      NOT NULL
);


ANALYZE tmp.sales_expense;
