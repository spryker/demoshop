<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1471267929.
 * Generated on 2016-07-04 13:17:26 by vagrant
 */
class PropelMigration_1471267929
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'zed' => '
DROP TABLE IF EXISTS "spy_product_option_configuration_preset" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_configuration_preset_value" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_type" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_type_translation" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_type_usage" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_type_usage_exclusion" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value_price" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value_translation" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value_usage" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value_usage_constraint" CASCADE;

DROP SEQUENCE "spy_product_option_value_pk_seq";  
  
CREATE SEQUENCE "spy_product_option_group_pk_seq";

CREATE TABLE "spy_product_option_group"
(
    "id_product_option_group" INTEGER NOT NULL,
    "fk_tax_set" INTEGER,
    "name" VARCHAR(255),
    "active" BOOLEAN,
    PRIMARY KEY ("id_product_option_group")
);

CREATE TABLE "spy_product_abstract_product_option_group"
(
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_product_option_group" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_abstract","fk_product_option_group")
);

CREATE SEQUENCE "spy_product_option_value_pk_seq";

CREATE TABLE "spy_product_option_value"
(
    "id_product_option_value" INTEGER NOT NULL,
    "price" INTEGER,
    "sku" VARCHAR(255) NOT NULL,
    "value" VARCHAR(255) NOT NULL,
    "fk_product_option_group" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_option_value")
);

CREATE INDEX "spy_product_option_value-sku" ON "spy_product_option_value" ("sku");

ALTER TABLE "spy_product_option_group" ADD CONSTRAINT "spy_product_option_group-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set")
    ON DELETE SET NULL;

ALTER TABLE "spy_product_abstract_product_option_group" ADD CONSTRAINT "spy_product_abstract-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract_product_option_group" ADD CONSTRAINT "spy_product_abstract-fk_product_option_group"
    FOREIGN KEY ("fk_product_option_group")
    REFERENCES "spy_product_option_group" ("id_product_option_group");

ALTER TABLE "spy_product_option_value" ADD CONSTRAINT "spy_product_option_value-fk_product_option_group"
    FOREIGN KEY ("fk_product_option_group")
    REFERENCES "spy_product_option_group" ("id_product_option_group");
    
ALTER TABLE "spy_product_option_group"

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;

DROP INDEX "spy_product_option_value-sku";

ALTER TABLE "spy_product_option_value"

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;

CREATE UNIQUE INDEX "spy_product_option_value-sku" ON "spy_product_option_value" ("sku");

ALTER TABLE "spy_sales_order_item_option" RENAME COLUMN "label_option_type" TO "group_name";

ALTER TABLE "spy_sales_order_item_option" RENAME COLUMN "label_option_value" TO "value";   
 
ALTER TABLE "spy_sales_order_item_option"

ADD "sku" VARCHAR(255) NOT NULL;
    
',

);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'zed' => '

CREATE TABLE "spy_product_option_configuration_preset"
(
    "id_product_option_configuration_preset" INTEGER NOT NULL,
    "is_default" BOOLEAN NOT NULL,
    "sequence" INTEGER,
    "fk_product" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_option_configuration_preset")
);

CREATE TABLE "spy_product_option_configuration_preset_value"
(
    "fk_product_option_configuration_preset" INTEGER NOT NULL,
    "fk_product_option_value_usage" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_option_configuration_preset","fk_product_option_value_usage")
);

CREATE TABLE "spy_product_option_type"
(
    "id_product_option_type" INTEGER NOT NULL,
    "import_key" VARCHAR,
    "fk_tax_set" INTEGER,
    PRIMARY KEY ("id_product_option_type"),
    CONSTRAINT "spy_product_option_type-import_key" UNIQUE ("import_key")
);

CREATE TABLE "spy_product_option_type_translation"
(
    "name" VARCHAR NOT NULL,
    "fk_product_option_type" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_option_type","fk_locale")
);

CREATE TABLE "spy_product_option_type_usage"
(
    "id_product_option_type_usage" INTEGER NOT NULL,
    "is_optional" INTEGER NOT NULL,
    "sequence" INTEGER,
    "fk_product" INTEGER NOT NULL,
    "fk_product_option_type" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_option_type_usage")
);

CREATE TABLE "spy_product_option_type_usage_exclusion"
(
    "fk_product_option_type_usage_a" INTEGER NOT NULL,
    "fk_product_option_type_usage_b" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_option_type_usage_a","fk_product_option_type_usage_b")
);

CREATE TABLE "spy_product_option_value"
(
    "id_product_option_value" INTEGER NOT NULL,
    "import_key" VARCHAR,
    "fk_product_option_type" INTEGER NOT NULL,
    "fk_product_option_value_price" INTEGER,
    PRIMARY KEY ("id_product_option_value"),
    CONSTRAINT "spy_product_option_value-import_key" UNIQUE ("import_key")
);

CREATE TABLE "spy_product_option_value_price"
(
    "id_product_option_value_price" INTEGER NOT NULL,
    "price" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_option_value_price")
);

CREATE TABLE "spy_product_option_value_translation"
(
    "name" VARCHAR NOT NULL,
    "fk_product_option_value" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_option_value","fk_locale")
);

CREATE TABLE "spy_product_option_value_usage"
(
    "id_product_option_value_usage" INTEGER NOT NULL,
    "sequence" INTEGER,
    "fk_product_option_type_usage" INTEGER NOT NULL,
    "fk_product_option_value" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_option_value_usage")
);

CREATE TABLE "spy_product_option_value_usage_constraint"
(
    "fk_product_option_value_usage_a" INTEGER NOT NULL,
    "fk_product_option_value_usage_b" INTEGER NOT NULL,
    "operator" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("fk_product_option_value_usage_a","fk_product_option_value_usage_b")
);

ALTER TABLE "spy_product_option_configuration_preset" ADD CONSTRAINT "spy_product_option_configuration_preset-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_configuration_preset_value" ADD CONSTRAINT "spy_product_option_config_value-fk_product_option_config"
    FOREIGN KEY ("fk_product_option_configuration_preset")
    REFERENCES "spy_product_option_configuration_preset" ("id_product_option_configuration_preset")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_configuration_preset_value" ADD CONSTRAINT "spy_product_option_config_value-fk_product_option_value_usage"
    FOREIGN KEY ("fk_product_option_value_usage")
    REFERENCES "spy_product_option_value_usage" ("id_product_option_value_usage")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_type" ADD CONSTRAINT "spy_product_option_type-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set")
    ON DELETE SET NULL;

ALTER TABLE "spy_product_option_type_translation" ADD CONSTRAINT "spy_product_option_type_translation-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_type_translation" ADD CONSTRAINT "spy_product_option_type_translation-fk_product_option_type"
    FOREIGN KEY ("fk_product_option_type")
    REFERENCES "spy_product_option_type" ("id_product_option_type")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_type_usage" ADD CONSTRAINT "spy_product_option_type_usage-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_type_usage" ADD CONSTRAINT "spy_product_option_type_usage-fk_product_option_type"
    FOREIGN KEY ("fk_product_option_type")
    REFERENCES "spy_product_option_type" ("id_product_option_type");

ALTER TABLE "spy_product_option_type_usage_exclusion" ADD CONSTRAINT "spy_product_option_type_usage_exc-fk_product_option_type_usage1"
    FOREIGN KEY ("fk_product_option_type_usage_a")
    REFERENCES "spy_product_option_type_usage" ("id_product_option_type_usage")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_type_usage_exclusion" ADD CONSTRAINT "spy_product_option_type_usage_exc-fk_product_option_type_usage2"
    FOREIGN KEY ("fk_product_option_type_usage_b")
    REFERENCES "spy_product_option_type_usage" ("id_product_option_type_usage")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value" ADD CONSTRAINT "spy_product_option_value-fk_product_option_type"
    FOREIGN KEY ("fk_product_option_type")
    REFERENCES "spy_product_option_type" ("id_product_option_type")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value" ADD CONSTRAINT "spy_product_option_value-fk_product_option_value_price"
    FOREIGN KEY ("fk_product_option_value_price")
    REFERENCES "spy_product_option_value_price" ("id_product_option_value_price")
    ON DELETE SET NULL;

ALTER TABLE "spy_product_option_value_translation" ADD CONSTRAINT "spy_product_option_value_translation-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value_translation" ADD CONSTRAINT "spy_product_option_value_translation-fk_product_option_value"
    FOREIGN KEY ("fk_product_option_value")
    REFERENCES "spy_product_option_value" ("id_product_option_value")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value_usage" ADD CONSTRAINT "spy_product_option_value_usage-fk_product_option_type_usage"
    FOREIGN KEY ("fk_product_option_type_usage")
    REFERENCES "spy_product_option_type_usage" ("id_product_option_type_usage")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value_usage" ADD CONSTRAINT "spy_product_option_value_usage-fk_product_option_value"
    FOREIGN KEY ("fk_product_option_value")
    REFERENCES "spy_product_option_value" ("id_product_option_value");

ALTER TABLE "spy_product_option_value_usage_constraint" ADD CONSTRAINT "spy_product_option_value_usage_c-fk_product_option_value_usage1"
    FOREIGN KEY ("fk_product_option_value_usage_a")
    REFERENCES "spy_product_option_value_usage" ("id_product_option_value_usage")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_option_value_usage_constraint" ADD CONSTRAINT "spy_product_option_value_usage_c-fk_product_option_value_usage2"
    FOREIGN KEY ("fk_product_option_value_usage_b")
    REFERENCES "spy_product_option_value_usage" ("id_product_option_value_usage")
    ON DELETE CASCADE;

DROP TABLE IF EXISTS "spy_product_option_group" CASCADE;

DROP SEQUENCE "spy_product_option_group_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_product_option_group" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value" CASCADE;

DROP SEQUENCE "spy_product_option_value_pk_seq";

ALTER TABLE "spy_product_option_group"

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

    ALTER TABLE "spy_product_option_value" DROP CONSTRAINT "spy_product_option_value-sku";
    
ALTER TABLE "spy_product_option_value"

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

CREATE INDEX "spy_product_option_value-sku" ON "spy_product_option_value" ("sku");

ALTER TABLE "spy_sales_order_item_option" RENAME COLUMN "group_name" TO "label_option_type";


ALTER TABLE "spy_sales_order_item_option" RENAME COLUMN "value" TO "label_option_value";

ALTER TABLE "spy_sales_order_item_option"

  DROP COLUMN "sku";

',
);
    }

}
