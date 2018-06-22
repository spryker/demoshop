<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1529418265.
 * Generated on 2018-06-19 14:24:25 by vagrant
 */
class PropelMigration_1529418265
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
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
BEGIN;

CREATE SEQUENCE "spy_price_product_abstract_storage_pk_seq";

CREATE TABLE "spy_price_product_abstract_storage"
(
    "id_price_product_abstract_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4),
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_price_product_abstract_storage"),
    CONSTRAINT "spy_price_product_abstract_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_price_product_abstract_storage-fk_product_abstract" ON "spy_price_product_abstract_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_price_product_concrete_storage_pk_seq";

CREATE TABLE "spy_price_product_concrete_storage"
(
    "id_price_product_concrete_storage" INT8 NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4),
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_price_product_concrete_storage"),
    CONSTRAINT "spy_price_product_concrete_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_price_product_concrete_storage-fk_product" ON "spy_price_product_concrete_storage" ("fk_product");

CREATE SEQUENCE "spy_product_abstract_image_storage_pk_seq";

CREATE TABLE "spy_product_abstract_image_storage"
(
    "id_product_abstract_image_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_image_storage"),
    CONSTRAINT "spy_product_abstract_image_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_image_storage-fk_product_abstract" ON "spy_product_abstract_image_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_concrete_image_storage_pk_seq";

CREATE TABLE "spy_product_concrete_image_storage"
(
    "id_product_concrete_image_storage" INT8 NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_concrete_image_storage"),
    CONSTRAINT "spy_product_concrete_image_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_concrete_image_storage-fk_product" ON "spy_product_concrete_image_storage" ("fk_product");

COMMIT;
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
BEGIN;

DROP TABLE IF EXISTS "spy_price_product_abstract_storage" CASCADE;

DROP SEQUENCE "spy_price_product_abstract_storage_pk_seq";

DROP TABLE IF EXISTS "spy_price_product_concrete_storage" CASCADE;

DROP SEQUENCE "spy_price_product_concrete_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_image_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_image_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_concrete_image_storage" CASCADE;

DROP SEQUENCE "spy_product_concrete_image_storage_pk_seq";

COMMIT;
',
);
    }

}