<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467667967.
 * Generated on 2016-07-04 21:32:47 by vagrant
 */
class PropelMigration_1467667967
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
CREATE SEQUENCE "spy_product_management_attribute_type_pk_seq";

CREATE TABLE "spy_product_management_attribute_type"
(
    "id_product_management_attribute_type" INTEGER NOT NULL,
    "type" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_type"),
    CONSTRAINT "spy_product_management_attribute_type-unique-type" UNIQUE ("type")
);

CREATE SEQUENCE "spy_product_management_attribute_input_pk_seq";

CREATE TABLE "spy_product_management_attribute_input"
(
    "id_product_management_attribute_input" INTEGER NOT NULL,
    "input" VARCHAR(128) NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_input"),
    CONSTRAINT "spy_product_management_attribute_input-unique-input" UNIQUE ("input")
);

CREATE SEQUENCE "spy_product_management_attribute_metadata_pk_seq";

CREATE TABLE "spy_product_management_attribute_metadata"
(
    "id_product_management_attribute_metadata" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    "fk_type" INTEGER,
    PRIMARY KEY ("id_product_management_attribute_metadata")
);

CREATE SEQUENCE "spy_product_management_attribute_pk_seq";

CREATE TABLE "spy_product_management_attribute"
(
    "id_product_management_attribute" INTEGER NOT NULL,
    "fk_metadata" INTEGER NOT NULL,
    "fk_input" INTEGER NOT NULL,
    "multi" BOOLEAN DEFAULT \'f\' NOT NULL,
    "allow_input" BOOLEAN DEFAULT \'t\' NOT NULL,
    "is_localized" BOOLEAN DEFAULT \'f\' NOT NULL,
    PRIMARY KEY ("id_product_management_attribute")
);

CREATE SEQUENCE "spy_product_management_attribute_localized_pk_seq";

CREATE TABLE "spy_product_management_attribute_localized"
(
    "id_product_management_attribute_localized" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_attribute" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_localized")
);

CREATE SEQUENCE "spy_product_management_attribute_value_pk_seq";

CREATE TABLE "spy_product_management_attribute_value"
(
    "id_product_management_attribute_value" INTEGER NOT NULL,
    "fk_locale" INTEGER,
    "fk_attribute" INTEGER NOT NULL,
    "value" VARCHAR(255) NOT NULL,
    "min_value" VARCHAR(255),
    "max_value" VARCHAR(255),
    PRIMARY KEY ("id_product_management_attribute_value"),
    CONSTRAINT "spy_product_management_attribute_type_value-unique-locale_attri" UNIQUE ("fk_attribute","fk_locale","value")
);

ALTER TABLE "spy_product_abstract_localized_attributes"

  ADD "description" TEXT,

  ADD "meta_title" VARCHAR(255),

  ADD "meta_keywords" TEXT,

  ADD "meta_description" TEXT;

ALTER TABLE "spy_product_localized_attributes"

  ADD "description" TEXT;

ALTER TABLE "spy_product_management_attribute_metadata" ADD CONSTRAINT "spy_product_management_attribute_metadata-fk_type"
    FOREIGN KEY ("fk_type")
    REFERENCES "spy_product_management_attribute_type" ("id_product_management_attribute_type");

ALTER TABLE "spy_product_management_attribute" ADD CONSTRAINT "spy_product_management_attribute-fk_metadata"
    FOREIGN KEY ("fk_metadata")
    REFERENCES "spy_product_management_attribute_metadata" ("id_product_management_attribute_metadata");

ALTER TABLE "spy_product_management_attribute" ADD CONSTRAINT "spy_product_management_attribute-fk_input"
    FOREIGN KEY ("fk_input")
    REFERENCES "spy_product_management_attribute_input" ("id_product_management_attribute_input");

ALTER TABLE "spy_product_management_attribute_localized" ADD CONSTRAINT "spy_product_management_attribute_localized-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_management_attribute_localized" ADD CONSTRAINT "spy_product_management_attribute_localized-fk_attribute"
    FOREIGN KEY ("fk_attribute")
    REFERENCES "spy_product_management_attribute" ("id_product_management_attribute");

ALTER TABLE "spy_product_management_attribute_value" ADD CONSTRAINT "spy_product_management_attribute_value-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_management_attribute_value" ADD CONSTRAINT "spy_product_management_attribute_value-fk_attribute"
    FOREIGN KEY ("fk_attribute")
    REFERENCES "spy_product_management_attribute" ("id_product_management_attribute");
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
DROP TABLE IF EXISTS "spy_product_management_attribute_type" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_type_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_input" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_input_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_metadata" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_metadata_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_localized" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_localized_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_value" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_value_pk_seq";

ALTER TABLE "spy_product_abstract_localized_attributes"

  DROP COLUMN "description",

  DROP COLUMN "meta_title",

  DROP COLUMN "meta_keywords",

  DROP COLUMN "meta_description";

ALTER TABLE "spy_product_localized_attributes"

  DROP COLUMN "description";
',
);
    }

}