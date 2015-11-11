INSERT INTO "public"."pav_product_group_set" ("id_product_group_set", "name", "description") VALUES 
('1', 'testGroupSet', 'testGroupSet');

INSERT INTO "public"."pav_product_group_key" ("id_product_group_key", "key") VALUES 
('1', 'weight');

INSERT INTO "public"."pav_product_group_set_element" ("id_product_group_set_element", "fk_product_group_key", "fk_product_group_set") VALUES 
('1', '1', '1');

INSERT INTO "public"."pav_product_group_value" ("id_product_group_value", "fk_product_group_key", "value", "sequence") VALUES 
('1', '1', '500g', '1');

INSERT INTO "public"."pav_product_group_value_set" ("id_product_group_value_set", "name") VALUES 
('1', 'valueSet1');

INSERT INTO "public"."pav_product_group_value_set_element" ("id_product_group_value_set_element", "fk_product_group_value", "fk_product_group_value_set") VALUES 
('1', '1', '1');

INSERT INTO "public"."pav_configurable_product" ("id_configurable_product", "fk_abstract_product", "fk_contained_abstract_product", "fk_product_group_value_set", "sequence", "quantity") VALUES 
('1', '1', '2', '1', '1', '5');



UPDATE "public"."spy_product" SET "weight"='500g', "fk_product_group_value_set"='1' WHERE ("id_product"='1');

UPDATE "public"."spy_abstract_product" SET "fk_product_group_set"='1', "type"='dynamic' WHERE ("id_abstract_product"='1');
