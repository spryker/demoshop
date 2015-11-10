
-- TAXES

INSERT INTO "spy_tax_rate" ("id_tax_rate", "name", "rate") VALUES ('1', 'normal', '19');
INSERT INTO "spy_tax_set" ("id_tax_set", "name") VALUES ('1', 'default');
INSERT INTO "spy_tax_set_tax" ("fk_tax_rate", "fk_tax_set") VALUES ('1', '1');

INSERT INTO "spy_tax_rate" ("id_tax_rate", "name", "rate") VALUES ('2', 'reduziert', '7');
INSERT INTO "spy_tax_set" ("id_tax_set", "name") VALUES ('2', 'reduziert');
INSERT INTO "spy_tax_set_tax" ("fk_tax_rate", "fk_tax_set") VALUES ('2', '2');


UPDATE "spy_abstract_product" SET "fk_tax_set" = 1;


-- PRODUCT GROUPS

INSERT INTO "pav_product_group" ("id_product_group", "key") VALUES 
('1', 'weight'), 
('2', 'carbon');

INSERT INTO "pav_abstract_product_product_group" ("id_abstract_product_product_group", "fk_abstract_product", "fk_product_group") VALUES
('1', '1', '1'),
('2', '1', '2');


-- PRODUCT GROUP VALUES

INSERT INTO "pav_product_group_value" ("id_product_group_value", "fk_product_group", "sequence", "value") VALUES 
('1', '1', '1', '250g'),
('2', '1', '2', '500g'),
('3', '2', '1', 'yes'),
('4', '2', '2', 'no');

INSERT INTO "pav_product_product_group_value" ("id_product_product_group_value", "fk_product", "fk_product_group_value") VALUES
('1', '1', '1'),
('2', '1', '3');


-- PRODUCT DYNAMIC

INSERT INTO "pav_abstract_product_dynamic" ("id_abstract_product_dynamic", "total_quantity") VALUES
('1', '10');

INSERT INTO "pav_product_dynamic" ("id_product_dynamic", "fk_abstract_product_dynamic", "fk_product", "sequence", "quantity") VALUES
('1', '1', '1', '1', '10');


UPDATE "spy_abstract_product" SET "type" = 'dynamic'
WHERE id_abstract_product = 1;
