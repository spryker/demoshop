<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467638246.
 * Generated on 2016-07-04 13:17:26 by vagrant
 */
class PropelMigration_1467638246
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
DROP TABLE IF EXISTS "spy_product_option_group" CASCADE;

DROP SEQUENCE "spy_product_option_group_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_product_option_group" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value" CASCADE;

DROP SEQUENCE "spy_product_option_value_pk_seq";
',
);
    }

}