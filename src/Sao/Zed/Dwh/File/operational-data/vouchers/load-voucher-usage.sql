SET NAMES UTF8;

SELECT
  fk_sales_order,
  fk_salesrule_codepool
FROM pac_salesrule_code_usage
  JOIN pac_salesrule_code
    ON fk_salesrule_code = id_salesrule_code
ORDER BY fk_sales_order;
