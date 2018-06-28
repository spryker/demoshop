<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1530195375.
 * Generated on 2018-06-28 14:16:15 by vagrant
 */
class PropelMigration_1530195375
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

CREATE SEQUENCE "spy_availability_storage_pk_seq";

CREATE TABLE "spy_availability_storage"
(
    "id_availability_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_availability_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4),
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_availability_storage"),
    CONSTRAINT "spy_availability_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_availability_storage-fk_product_abstract" ON "spy_availability_storage" ("fk_product_abstract");

CREATE INDEX "spy_availability_storage-fk_availability_abstract" ON "spy_availability_storage" ("fk_availability_abstract");

CREATE SEQUENCE "spy_category_node_page_search_pk_seq";

CREATE TABLE "spy_category_node_page_search"
(
    "id_category_node_page_search" INT8 NOT NULL,
    "fk_category_node" INTEGER NOT NULL,
    "structured_data" TEXT NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_category_node_page_search"),
    CONSTRAINT "spy_category_node_page_search-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_category_node_page_search-fk_category_node" ON "spy_category_node_page_search" ("fk_category_node");

CREATE SEQUENCE "spy_cms_block_category_storage_pk_seq";

CREATE TABLE "spy_cms_block_category_storage"
(
    "id_cms_block_category_storage" INT8 NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_block_category_storage"),
    CONSTRAINT "spy_cms_block_category_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_cms_block_category_storage-fk_category" ON "spy_cms_block_category_storage" ("fk_category");

CREATE SEQUENCE "spy_cms_block_product_storage_pk_seq";

CREATE TABLE "spy_cms_block_product_storage"
(
    "id_cms_block_product_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_block_product_storage"),
    CONSTRAINT "spy_cms_block_product_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_cms_block_product_storage-fk_product_abstract" ON "spy_cms_block_product_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_cms_block_storage_pk_seq";

CREATE TABLE "spy_cms_block_storage"
(
    "id_cms_block_storage" INT8 NOT NULL,
    "fk_cms_block" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4),
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_block_storage"),
    CONSTRAINT "spy_cms_block_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_cms_block_storage-fk_cms_block" ON "spy_cms_block_storage" ("fk_cms_block");

CREATE SEQUENCE "spy_cms_page_search_pk_seq";

CREATE TABLE "spy_cms_page_search"
(
    "id_cms_page_search" INT8 NOT NULL,
    "fk_cms_page" INTEGER NOT NULL,
    "structured_data" TEXT NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_page_search"),
    CONSTRAINT "spy_cms_page_search-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_cms_page_search-fk_cms_page" ON "spy_cms_page_search" ("fk_cms_page");

CREATE SEQUENCE "spy_glossary_storage_pk_seq";

CREATE TABLE "spy_glossary_storage"
(
    "id_glossary_storage" INT8 NOT NULL,
    "fk_glossary_key" INTEGER NOT NULL,
    "glossary_key" VARCHAR NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_glossary_storage"),
    CONSTRAINT "spy_glossary_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_glossary_storage-fk_glossary_key" ON "spy_glossary_storage" ("fk_glossary_key");

CREATE SEQUENCE "spy_navigation_storage_pk_seq";

CREATE TABLE "spy_navigation_storage"
(
    "id_navigation_storage" INT8 NOT NULL,
    "fk_navigation" INTEGER NOT NULL,
    "navigation_key" VARCHAR NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_navigation_storage"),
    CONSTRAINT "spy_navigation_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_navigation_storage-fk_navigation" ON "spy_navigation_storage" ("fk_navigation");

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

CREATE SEQUENCE "spy_product_category_filter_storage_pk_seq";

CREATE TABLE "spy_product_category_filter_storage"
(
    "id_product_category_filter_storage" INT8 NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_category_filter_storage"),
    CONSTRAINT "spy_product_category_filter_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_category_filter_storage-fk_category" ON "spy_product_category_filter_storage" ("fk_category");

CREATE SEQUENCE "spy_product_abstract_category_storage_pk_seq";

CREATE TABLE "spy_product_abstract_category_storage"
(
    "id_product_abstract_category_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_category_storage"),
    CONSTRAINT "spy_product_abstract_category_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_category_storage-fk_product_abstract" ON "spy_product_abstract_category_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_abstract_group_storage_pk_seq";

CREATE TABLE "spy_product_abstract_group_storage"
(
    "id_product_abstract_group_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_group_storage"),
    CONSTRAINT "spy_product_abstract_group_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_group_storage-fk_product_abstract" ON "spy_product_abstract_group_storage" ("fk_product_abstract");

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

CREATE SEQUENCE "id_product_measurement_unit_pk_seq";

CREATE TABLE "spy_product_measurement_unit"
(
    "id_product_measurement_unit" INTEGER NOT NULL,
    "default_precision" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "code" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_measurement_unit"),
    CONSTRAINT "spy_product_measurement_unit-code" UNIQUE ("code")
);

CREATE SEQUENCE "id_product_measurement_base_unit_pk_seq";

CREATE TABLE "spy_product_measurement_base_unit"
(
    "id_product_measurement_base_unit" INTEGER NOT NULL,
    "fk_product_measurement_unit" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_measurement_base_unit")
);

CREATE SEQUENCE "id_product_measurement_sales_unit_pk_seq";

CREATE TABLE "spy_product_measurement_sales_unit"
(
    "id_product_measurement_sales_unit" INTEGER NOT NULL,
    "conversion" DOUBLE PRECISION,
    "precision" INTEGER,
    "is_displayed" BOOLEAN NOT NULL,
    "is_default" BOOLEAN NOT NULL,
    "key" VARCHAR(255),
    "fk_product" INTEGER NOT NULL,
    "fk_product_measurement_unit" INTEGER NOT NULL,
    "fk_product_measurement_base_unit" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_measurement_sales_unit")
);

CREATE SEQUENCE "id_product_measurement_sales_unit_store_pk_seq";

CREATE TABLE "spy_product_measurement_sales_unit_store"
(
    "id_product_measurement_sales_unit_store" INTEGER NOT NULL,
    "fk_product_measurement_sales_unit" INTEGER NOT NULL,
    "fk_store" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_measurement_sales_unit_store"),
    CONSTRAINT "spy_product_measurement_sales_unit_store-sales_unit-store" UNIQUE ("fk_product_measurement_sales_unit","fk_store")
);

CREATE SEQUENCE "id_product_measurement_unit_storage_pk_seq";

CREATE TABLE "spy_product_measurement_unit_storage"
(
    "id_product_measurement_unit_storage" INTEGER NOT NULL,
    "fk_product_measurement_unit" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_measurement_unit_storage"),
    CONSTRAINT "spy_product_measurement_unit_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_measurement_unit_storage-fk_product_measurement_uni" ON "spy_product_measurement_unit_storage" ("fk_product_measurement_unit");

CREATE SEQUENCE "id_product_concrete_measurement_unit_storage_pk_seq";

CREATE TABLE "spy_product_concrete_measurement_unit_storage"
(
    "id_product_concrete_measurement_unit_storage" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "data" TEXT,
    "store" VARCHAR NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_concrete_measurement_unit_storage"),
    CONSTRAINT "spy_product_concrete_measurement_unit_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_concrete_measurement_unit_storage-fk_product" ON "spy_product_concrete_measurement_unit_storage" ("fk_product");

CREATE SEQUENCE "spy_product_abstract_option_storage_pk_seq";

CREATE TABLE "spy_product_abstract_option_storage"
(
    "id_product_abstract_option_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_option_storage"),
    CONSTRAINT "spy_product_abstract_option_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_option_storage-fk_product_abstract" ON "spy_product_abstract_option_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_abstract_page_search_pk_seq";

CREATE TABLE "spy_product_abstract_page_search"
(
    "id_product_abstract_page_search" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "structured_data" TEXT NOT NULL,
    "data" TEXT,
    "store" VARCHAR(4) NOT NULL,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_page_search"),
    CONSTRAINT "spy_product_abstract_page_search-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_page_search-fk_product_abstract" ON "spy_product_abstract_page_search" ("fk_product_abstract");

CREATE SEQUENCE "id_product_quantity_pk_seq";

CREATE TABLE "spy_product_quantity"
(
    "id_product_quantity" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "quantity_min" INTEGER NOT NULL,
    "quantity_max" INTEGER,
    "quantity_interval" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_quantity"),
    CONSTRAINT "spy_product_quantity-unique-fk_product" UNIQUE ("fk_product")
);

CREATE SEQUENCE "id_product_quantity_storage_pk_seq";

CREATE TABLE "spy_product_quantity_storage"
(
    "id_product_quantity_storage" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_quantity_storage"),
    CONSTRAINT "spy_product_quantity_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_quantity_storage-fk_product" ON "spy_product_quantity_storage" ("fk_product");

CREATE SEQUENCE "spy_product_abstract_relation_storage_pk_seq";

CREATE TABLE "spy_product_abstract_relation_storage"
(
    "id_product_abstract_relation_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_relation_storage"),
    CONSTRAINT "spy_product_abstract_relation_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_relation_storage-fk_product_abstract" ON "spy_product_abstract_relation_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_review_search_pk_seq";

CREATE TABLE "spy_product_review_search"
(
    "id_product_review_search" INT8 NOT NULL,
    "fk_product_review" INTEGER NOT NULL,
    "structured_data" TEXT NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_review_search"),
    CONSTRAINT "spy_product_review_search-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_review_search-fk_product_review" ON "spy_product_review_search" ("fk_product_review");

CREATE SEQUENCE "spy_product_abstract_review_storage_pk_seq";

CREATE TABLE "spy_product_abstract_review_storage"
(
    "id_product_abstract_review_storage" INT8 NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract_review_storage"),
    CONSTRAINT "spy_product_abstract_review_storage-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_abstract_review_storage-fk_product_abstract" ON "spy_product_abstract_review_storage" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_search_config_storage_pk_seq";

CREATE TABLE "spy_product_search_config_storage"
(
    "id_product_search_config_storage" INT8 NOT NULL,
    "data" TEXT,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_search_config_storage"),
    CONSTRAINT "spy_product_search_config_storage-unique-key" UNIQUE ("key")
);

CREATE SEQUENCE "spy_product_set_page_search_pk_seq";

CREATE TABLE "spy_product_set_page_search"
(
    "id_product_set_page_search" INT8 NOT NULL,
    "fk_product_set" INTEGER NOT NULL,
    "structured_data" TEXT NOT NULL,
    "data" TEXT,
    "locale" VARCHAR(16) NOT NULL,
    "key" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_set_page_search"),
    CONSTRAINT "spy_product_set_page_search-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_product_set_page_search-fk_product_set" ON "spy_product_set_page_search" ("fk_product_set");

ALTER TABLE "spy_category_node_storage"

  ALTER COLUMN "id_category_node_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_category_node_storage-fk_category_node" ON "spy_category_node_storage" ("fk_category_node");

ALTER TABLE "spy_category_tree_storage"

  ALTER COLUMN "id_category_tree_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

ALTER TABLE "spy_cms_page_storage"

  ALTER COLUMN "id_cms_page_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_cms_page_storage-fk_cms_page" ON "spy_cms_page_storage" ("fk_cms_page");

ALTER TABLE "spy_company_business_unit"

  ADD "fk_parent_company_business_unit" INTEGER;

ALTER TABLE "spy_company_business_unit" ADD CONSTRAINT "spy_company_business_unit-fk_parent_company_business_unit"
    FOREIGN KEY ("fk_parent_company_business_unit")
    REFERENCES "spy_company_business_unit" ("id_company_business_unit");

ALTER TABLE "spy_company_user"

  ADD "is_default" BOOLEAN DEFAULT \'f\' NOT NULL;

ALTER TABLE "spy_event_behavior_entity_change"

  ALTER COLUMN "id_event_behavior_entity_change" TYPE INT8 USING NULL;

ALTER TABLE "spy_product_abstract_label_storage"

  ALTER COLUMN "id_product_abstract_label_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_product_abstract_label_storage-fk_product_abstract" ON "spy_product_abstract_label_storage" ("fk_product_abstract");

ALTER TABLE "spy_product_abstract_storage"

  ALTER COLUMN "id_product_abstract_storage" TYPE INT8 USING NULL;

CREATE INDEX "spy_product_abstract_storage-fk_product_abstract" ON "spy_product_abstract_storage" ("fk_product_abstract");

ALTER TABLE "spy_product_concrete_storage"

  ALTER COLUMN "id_product_concrete_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_product_concrete_storage-fk_product" ON "spy_product_concrete_storage" ("fk_product");

ALTER TABLE "spy_product_label_dictionary_storage"

  ALTER COLUMN "id_product_label_dictionary_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

ALTER TABLE "spy_product_set_storage"

  ALTER COLUMN "id_product_set_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_product_set_storage-fk_product_set" ON "spy_product_set_storage" ("fk_product_set");

ALTER TABLE "spy_sales_order_item"

  ADD "amount" INTEGER,

  ADD "amount_measurement_unit_name" VARCHAR(255),

  ADD "amount_measurement_unit_precision" INTEGER,

  ADD "amount_measurement_unit_conversion" DOUBLE PRECISION,

  ADD "quantity_measurement_unit_name" VARCHAR(255),

  ADD "quantity_measurement_unit_precision" INTEGER,

  ADD "quantity_measurement_unit_conversion" DOUBLE PRECISION;

ALTER TABLE "spy_url_redirect_storage"

  ALTER COLUMN "id_url_redirect_storage" TYPE INT8 USING NULL,

  ALTER COLUMN "fk_url_redirect" SET NOT NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_url_redirect_storage-fk_url_redirect" ON "spy_url_redirect_storage" ("fk_url_redirect");

ALTER TABLE "spy_url_storage"

  ALTER COLUMN "id_url_storage" TYPE INT8 USING NULL,

  DROP COLUMN "store";

CREATE INDEX "spy_url_storage-fk_url" ON "spy_url_storage" ("fk_url");

ALTER TABLE "spy_product_measurement_base_unit" ADD CONSTRAINT "spy_product_measurement_base_unit-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_measurement_base_unit" ADD CONSTRAINT "spy_product_measurement_base_unit-fk_product_measurement_unit"
    FOREIGN KEY ("fk_product_measurement_unit")
    REFERENCES "spy_product_measurement_unit" ("id_product_measurement_unit");

ALTER TABLE "spy_product_measurement_sales_unit" ADD CONSTRAINT "spy_product_measurement_sales_unit-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_measurement_sales_unit" ADD CONSTRAINT "spy_product_measurement_sales_unit-fk_measurement_unit"
    FOREIGN KEY ("fk_product_measurement_unit")
    REFERENCES "spy_product_measurement_unit" ("id_product_measurement_unit");

ALTER TABLE "spy_product_measurement_sales_unit" ADD CONSTRAINT "spy_product_measurement_sales_unit-fk_base_unit"
    FOREIGN KEY ("fk_product_measurement_base_unit")
    REFERENCES "spy_product_measurement_base_unit" ("id_product_measurement_base_unit");

ALTER TABLE "spy_product_measurement_sales_unit_store" ADD CONSTRAINT "spy_product_measurement_sales_unit_store-fk_store"
    FOREIGN KEY ("fk_store")
    REFERENCES "spy_store" ("id_store");

ALTER TABLE "spy_product_measurement_sales_unit_store" ADD CONSTRAINT "spy_product_measurement_sales_unit_store-fk_sales_unit"
    FOREIGN KEY ("fk_product_measurement_sales_unit")
    REFERENCES "spy_product_measurement_sales_unit" ("id_product_measurement_sales_unit");

ALTER TABLE "spy_product_quantity" ADD CONSTRAINT "spy_product_quantity-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

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

DROP TABLE IF EXISTS "spy_availability_storage" CASCADE;

DROP SEQUENCE "spy_availability_storage_pk_seq";

DROP TABLE IF EXISTS "spy_category_node_page_search" CASCADE;

DROP SEQUENCE "spy_category_node_page_search_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_category_storage" CASCADE;

DROP SEQUENCE "spy_cms_block_category_storage_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_product_storage" CASCADE;

DROP SEQUENCE "spy_cms_block_product_storage_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_storage" CASCADE;

DROP SEQUENCE "spy_cms_block_storage_pk_seq";

DROP TABLE IF EXISTS "spy_cms_page_search" CASCADE;

DROP SEQUENCE "spy_cms_page_search_pk_seq";

DROP TABLE IF EXISTS "spy_glossary_storage" CASCADE;

DROP SEQUENCE "spy_glossary_storage_pk_seq";

DROP TABLE IF EXISTS "spy_navigation_storage" CASCADE;

DROP SEQUENCE "spy_navigation_storage_pk_seq";

DROP TABLE IF EXISTS "spy_price_product_abstract_storage" CASCADE;

DROP SEQUENCE "spy_price_product_abstract_storage_pk_seq";

DROP TABLE IF EXISTS "spy_price_product_concrete_storage" CASCADE;

DROP SEQUENCE "spy_price_product_concrete_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_category_filter_storage" CASCADE;

DROP SEQUENCE "spy_product_category_filter_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_category_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_category_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_group_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_group_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_image_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_image_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_concrete_image_storage" CASCADE;

DROP SEQUENCE "spy_product_concrete_image_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_measurement_unit" CASCADE;

DROP SEQUENCE "id_product_measurement_unit_pk_seq";

DROP TABLE IF EXISTS "spy_product_measurement_base_unit" CASCADE;

DROP SEQUENCE "id_product_measurement_base_unit_pk_seq";

DROP TABLE IF EXISTS "spy_product_measurement_sales_unit" CASCADE;

DROP SEQUENCE "id_product_measurement_sales_unit_pk_seq";

DROP TABLE IF EXISTS "spy_product_measurement_sales_unit_store" CASCADE;

DROP SEQUENCE "id_product_measurement_sales_unit_store_pk_seq";

DROP TABLE IF EXISTS "spy_product_measurement_unit_storage" CASCADE;

DROP SEQUENCE "id_product_measurement_unit_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_concrete_measurement_unit_storage" CASCADE;

DROP SEQUENCE "id_product_concrete_measurement_unit_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_option_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_option_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_page_search" CASCADE;

DROP SEQUENCE "spy_product_abstract_page_search_pk_seq";

DROP TABLE IF EXISTS "spy_product_quantity" CASCADE;

DROP SEQUENCE "id_product_quantity_pk_seq";

DROP TABLE IF EXISTS "spy_product_quantity_storage" CASCADE;

DROP SEQUENCE "id_product_quantity_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_relation_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_relation_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_review_search" CASCADE;

DROP SEQUENCE "spy_product_review_search_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_review_storage" CASCADE;

DROP SEQUENCE "spy_product_abstract_review_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_search_config_storage" CASCADE;

DROP SEQUENCE "spy_product_search_config_storage_pk_seq";

DROP TABLE IF EXISTS "spy_product_set_page_search" CASCADE;

DROP SEQUENCE "spy_product_set_page_search_pk_seq";

DROP INDEX "spy_category_node_storage-fk_category_node";

ALTER TABLE "spy_category_node_storage"

  ALTER COLUMN "id_category_node_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_category_node_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

ALTER TABLE "spy_category_tree_storage"

  ALTER COLUMN "id_category_tree_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_category_tree_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

DROP INDEX "spy_cms_page_storage-fk_cms_page";

ALTER TABLE "spy_cms_page_storage"

  ALTER COLUMN "id_cms_page_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_cms_page_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

ALTER TABLE "spy_company_business_unit" DROP CONSTRAINT "spy_company_business_unit-fk_parent_company_business_unit";

ALTER TABLE "spy_company_business_unit"

  DROP COLUMN "fk_parent_company_business_unit";

ALTER TABLE "spy_company_user"

  DROP COLUMN "is_default";

ALTER TABLE "spy_event_behavior_entity_change"

  ALTER COLUMN "id_event_behavior_entity_change" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_event_behavior_entity_change" DROP DEFAULT;

DROP INDEX "spy_product_abstract_label_storage-fk_product_abstract";

ALTER TABLE "spy_product_abstract_label_storage"

  ALTER COLUMN "id_product_abstract_label_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_product_abstract_label_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

DROP INDEX "spy_product_abstract_storage-fk_product_abstract";

ALTER TABLE "spy_product_abstract_storage"

  ALTER COLUMN "id_product_abstract_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_product_abstract_storage" DROP DEFAULT;

DROP INDEX "spy_product_concrete_storage-fk_product";

ALTER TABLE "spy_product_concrete_storage"

  ALTER COLUMN "id_product_concrete_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_product_concrete_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

ALTER TABLE "spy_product_label_dictionary_storage"

  ALTER COLUMN "id_product_label_dictionary_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_product_label_dictionary_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

DROP INDEX "spy_product_set_storage-fk_product_set";

ALTER TABLE "spy_product_set_storage"

  ALTER COLUMN "id_product_set_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_product_set_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4) NOT NULL;

ALTER TABLE "spy_sales_order_item"

  DROP COLUMN "amount",

  DROP COLUMN "amount_measurement_unit_name",

  DROP COLUMN "amount_measurement_unit_precision",

  DROP COLUMN "amount_measurement_unit_conversion",

  DROP COLUMN "quantity_measurement_unit_name",

  DROP COLUMN "quantity_measurement_unit_precision",

  DROP COLUMN "quantity_measurement_unit_conversion";

DROP INDEX "spy_url_redirect_storage-fk_url_redirect";

ALTER TABLE "spy_url_redirect_storage"

  ALTER COLUMN "id_url_redirect_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_url_redirect_storage" DROP DEFAULT,

  ALTER COLUMN "fk_url_redirect" DROP NOT NULL,

  ADD "store" VARCHAR(4);

DROP INDEX "spy_url_storage-fk_url";

ALTER TABLE "spy_url_storage"

  ALTER COLUMN "id_url_storage" TYPE INTEGER USING NULL,

  ALTER COLUMN "id_url_storage" DROP DEFAULT,

  ADD "store" VARCHAR(4);

COMMIT;
',
);
    }

}