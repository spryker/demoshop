<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1471439824.
 * Generated on 2016-08-17 13:17:04 by vagrant
 */
class PropelMigration_1471439824
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
CREATE SEQUENCE "spy_product_attribute_key_pk_seq";

CREATE TABLE "spy_product_attribute_key"
(
    "id_product_attribute_key" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    PRIMARY KEY ("id_product_attribute_key"),
    CONSTRAINT "spy_product_attribute_key-unique-key" UNIQUE ("key")
);

CREATE SEQUENCE "spy_product_management_attribute_pk_seq";

CREATE TABLE "spy_product_management_attribute"
(
    "id_product_management_attribute" INTEGER NOT NULL,
    "fk_product_attribute_key" INTEGER NOT NULL,
    "allow_input" BOOLEAN DEFAULT \'t\' NOT NULL,
    "input_type" VARCHAR NOT NULL,
    "is_multiple" BOOLEAN DEFAULT \'f\' NOT NULL,
    PRIMARY KEY ("id_product_management_attribute"),
    CONSTRAINT "spy_product_management_attribute-unique-fk_product_attribute_ke" UNIQUE ("fk_product_attribute_key")
);

CREATE SEQUENCE "spy_product_management_attribute_value_pk_seq";

CREATE TABLE "spy_product_management_attribute_value"
(
    "id_product_management_attribute_value" INTEGER NOT NULL,
    "fk_product_management_attribute" INTEGER NOT NULL,
    "value" TEXT NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_value")
);

CREATE SEQUENCE "spy_product_management_attribute_value_translation_pk_seq";

CREATE TABLE "spy_product_management_attribute_value_translation"
(
    "id_product_management_attribute_value_translation" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_product_management_attribute_value" INTEGER NOT NULL,
    "translation" TEXT NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_value_translation"),
    CONSTRAINT "spy_product_management_attribute_value_translation-unique-local" UNIQUE ("fk_locale","fk_product_management_attribute_value")
);

ALTER TABLE "spy_product_abstract_localized_attributes"

  ADD "description" TEXT,

  ADD "meta_title" VARCHAR(255),

  ADD "meta_keywords" TEXT,

  ADD "meta_description" TEXT;

ALTER TABLE "spy_product_image_set"

  ALTER COLUMN "fk_locale" DROP NOT NULL;

ALTER TABLE "spy_product_image_set_to_product_image" RENAME COLUMN "sort" TO "sort_order";

ALTER TABLE "spy_product_image_set_to_product_image"

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

ALTER TABLE "spy_product_localized_attributes"

  ADD "description" TEXT;

ALTER TABLE "spy_product_search_attribute_map" DROP CONSTRAINT "spy_product_search_attribute_map-source_attribute_id";

DROP INDEX "spy_product_search_attribute_map-k_product_attributes_metadata";


ALTER TABLE "spy_product_search_attribute_map" RENAME COLUMN "fk_product_attributes_metadata" TO "fk_product_attribute_key";

ALTER TABLE "spy_product_search_attribute_map"

  DROP CONSTRAINT "spy_product_search_attribute_map_pkey",

  ADD PRIMARY KEY ("fk_product_attribute_key","target_field");

CREATE INDEX "spy_product_search_attribute_map-fk_product_attribute_key" ON "spy_product_search_attribute_map" ("fk_product_attribute_key");

ALTER TABLE "spy_product_search_attribute_map" ADD CONSTRAINT "spy_product_search_attribute_map-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_management_attribute" ADD CONSTRAINT "spy_product_management_attribute-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key");

ALTER TABLE "spy_product_management_attribute_value" ADD CONSTRAINT "spy_product_management_attribute_value-fk_product_management_attribute"
    FOREIGN KEY ("fk_product_management_attribute")
    REFERENCES "spy_product_management_attribute" ("id_product_management_attribute");

ALTER TABLE "spy_product_management_attribute_value_translation" ADD CONSTRAINT "spy_product_management_attribute_value-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_management_attribute_value_translation" ADD CONSTRAINT "spy_product_management_attribute_value_translation-fk_product_management_attribute_value"
    FOREIGN KEY ("fk_product_management_attribute_value")
    REFERENCES "spy_product_management_attribute_value" ("id_product_management_attribute_value");
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
DROP TABLE IF EXISTS "spy_product_attribute_key" CASCADE;

DROP SEQUENCE "spy_product_attribute_key_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_value" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_value_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_value_translation" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_value_translation_pk_seq";

ALTER TABLE "spy_product_abstract_localized_attributes"

  DROP COLUMN "description",

  DROP COLUMN "meta_title",

  DROP COLUMN "meta_keywords",

  DROP COLUMN "meta_description";

ALTER TABLE "spy_product_image_set"

  ALTER COLUMN "fk_locale" SET NOT NULL;

ALTER TABLE "spy_product_image_set_to_product_image" RENAME COLUMN "sort_order" TO "sort";

ALTER TABLE "spy_product_image_set_to_product_image"

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;

ALTER TABLE "spy_product_localized_attributes"

  DROP COLUMN "description";

ALTER TABLE "spy_product_search_attribute_map" DROP CONSTRAINT "spy_product_search_attribute_map-fk_product_attribute_key";

DROP INDEX "spy_product_search_attribute_map-fk_product_attribute_key";


ALTER TABLE "spy_product_search_attribute_map" RENAME COLUMN "fk_product_attribute_key" TO "fk_product_attributes_metadata";

ALTER TABLE "spy_product_search_attribute_map"

  DROP CONSTRAINT "spy_product_search_attribute_map_pkey",

  ADD PRIMARY KEY ("fk_product_attributes_metadata","target_field");

CREATE INDEX "spy_product_search_attribute_map-k_product_attributes_metadata" ON "spy_product_search_attribute_map" ("fk_product_attributes_metadata");

ALTER TABLE "spy_product_search_attribute_map" ADD CONSTRAINT "spy_product_search_attribute_map-source_attribute_id"
    FOREIGN KEY ("fk_product_attributes_metadata")
    REFERENCES "spy_product_attributes_metadata" ("id_product_attributes_metadata")
    ON DELETE CASCADE;
',
);
    }

}