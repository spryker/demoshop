<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1450275431.
 * Generated on 2015-12-16 14:17:11 by vagrant
 */
class PropelMigration_1450275431
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
DROP TABLE IF EXISTS "spy_abstract_product";

DROP TABLE IF EXISTS "spy_abstract_product_localized_attributes";

DROP TABLE IF EXISTS "spy_attribute_type";

DROP TABLE IF EXISTS "spy_attribute_type_value";

DROP TABLE IF EXISTS "spy_attributes_metadata";

DROP TABLE IF EXISTS "spy_redirect";

DROP TABLE IF EXISTS "spy_searchable_products";

-- ALTER TABLE "spy_price_product" DROP CONSTRAINT "spy_price_product-fk_abstract_product";

DROP INDEX "spy_price_product-unique-fk_abstract_product" ON "spy_price_product";

ALTER TABLE "spy_price_product"

  CHANGE "fk_abstract_product" "fk_product_abstract" INTEGER;

CREATE UNIQUE INDEX "spy_price_product-unique-fk_product_abstract" ON "spy_price_product" ("fk_product_abstract", "fk_product", "fk_price_type");

ALTER TABLE "spy_price_product" ADD CONSTRAINT "spy_price_product-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product" DROP CONSTRAINT "spy_product-fk_abstract_product";

DROP INDEX "spy_product-fi_abstract_product" ON "spy_product";

ALTER TABLE "spy_product"

  CHANGE "fk_abstract_product" "fk_product_abstract" INTEGER NOT NULL;

CREATE INDEX "spy_product-fi_product_abstract" ON "spy_product" ("fk_product_abstract");

ALTER TABLE "spy_product" ADD CONSTRAINT "spy_product-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_category" DROP CONSTRAINT "spy_product_category-fk_abstract_product";

DROP INDEX "spy_product_category-unique-fk_abstract_product" ON "spy_product_category";

ALTER TABLE "spy_product_category"

  CHANGE "fk_abstract_product" "fk_product_abstract" INTEGER NOT NULL;

CREATE UNIQUE INDEX "spy_product_category-unique-fk_product_abstract" ON "spy_product_category" ("fk_product_abstract", "fk_category");

ALTER TABLE "spy_product_category" ADD CONSTRAINT "spy_product_category-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_localized_attributes"

  DROP PRIMARY KEY,

  CHANGE "id_attributes" "id_product_attributes" INTEGER NOT NULL AUTO_INCREMENT,

  ADD PRIMARY KEY ("id_product_attributes");

ALTER TABLE "spy_product_search_attributes_operation" DROP CONSTRAINT "spy_product_search_attributes_operation-source_attribute_id";

ALTER TABLE "spy_product_search_attributes_operation" ADD CONSTRAINT "spy_product_search_attributes_operation-source_attribute_id"
    FOREIGN KEY ("source_attribute_id")
    REFERENCES "spy_product_attributes_metadata" ("id_product_attributes_metadata")
    ON DELETE CASCADE;

ALTER TABLE "spy_sales_order_item_option"

  CHANGE "tax_percentage" "tax_percentage" DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

ALTER TABLE "spy_tax_rate"

  CHANGE "rate" "rate" DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

ALTER TABLE "spy_url" DROP CONSTRAINT "spy_url-fk_resource_abstract_product";

ALTER TABLE "spy_url" DROP CONSTRAINT "spy_url-fk_resource_redirect";

DROP INDEX "spy_url-fi_resource_abstract_product" ON "spy_url";

ALTER TABLE "spy_url"

  CHANGE "fk_resource_abstract_product" "fk_resource_product_abstract" INTEGER;

CREATE INDEX "spy_url-fi_resource_product_abstract" ON "spy_url" ("fk_resource_product_abstract");

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_redirect"
    FOREIGN KEY ("fk_resource_redirect")
    REFERENCES "spy_url_redirect" ("id_url_redirect")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_product_abstract"
    FOREIGN KEY ("fk_resource_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON DELETE CASCADE;

ALTER TABLE "spy_wishlist_item" DROP CONSTRAINT "spy_wishlist_item-fk_abstract_product";

DROP INDEX "spy_wishlist_item-fi_abstract_product" ON "spy_wishlist_item";

ALTER TABLE "spy_wishlist_item"

  CHANGE "fk_abstract_product" "fk_product_abstract" INTEGER NOT NULL;

CREATE INDEX "spy_wishlist_item-fi_product_abstract" ON "spy_wishlist_item" ("fk_product_abstract");

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

CREATE TABLE "spy_product_abstract"
(
    "id_product_abstract" INTEGER NOT NULL AUTO_INCREMENT,
    "sku" VARCHAR(255) NOT NULL,
    "attributes" TEXT NOT NULL,
    "fk_tax_set" INTEGER,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    PRIMARY KEY ("id_product_abstract"),
    UNIQUE INDEX "spy_product_abstract-sku" ("sku"),
    INDEX "spy_product_abstract-fi_tax_set" ("fk_tax_set"),
    CONSTRAINT "spy_product_abstract-fk_tax_set"
        FOREIGN KEY ("fk_tax_set")
        REFERENCES "spy_tax_set" ("id_tax_set")
) ENGINE=InnoDB;

CREATE TABLE "spy_product_abstract_localized_attributes"
(
    "id_abstract_attributes" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "attributes" TEXT NOT NULL,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    PRIMARY KEY ("id_abstract_attributes"),
    UNIQUE INDEX "spy_product_abstract_localized_attributes-unique-fk_product_abst" ("fk_product_abstract", "fk_locale"),
    INDEX "spy_product_abstract_localized_attributes-fi_locale" ("fk_locale"),
    CONSTRAINT "spy_product_abstract_localized_attributes-fk_product_abstract"
        FOREIGN KEY ("fk_product_abstract")
        REFERENCES "spy_product_abstract" ("id_product_abstract")
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT "spy_product_abstract_localized_attributes-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale")
) ENGINE=InnoDB;

CREATE TABLE "spy_product_attributes_metadata"
(
    "id_product_attributes_metadata" INTEGER NOT NULL AUTO_INCREMENT,
    "key" VARCHAR(255) NOT NULL,
    "is_editable" TINYINT(1) DEFAULT 1 NOT NULL,
    "fk_type" INTEGER,
    PRIMARY KEY ("id_product_attributes_metadata"),
    INDEX "spy_product_attributes_metadata-fi_type" ("fk_type"),
    CONSTRAINT "spy_product_attributes_metadata-fk_type"
        FOREIGN KEY ("fk_type")
        REFERENCES "spy_product_attribute_type" ("id_product_attribute_type")
) ENGINE=InnoDB;

CREATE TABLE "spy_product_attribute_type"
(
    "id_product_attribute_type" INTEGER NOT NULL AUTO_INCREMENT,
    "name" VARCHAR(255) NOT NULL,
    "fk_product_attribute_type_parent" INTEGER,
    "input_representation" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_product_attribute_type"),
    INDEX "spy_product_attribute_type-fi_product_attribute_type_parent" ("fk_product_attribute_type_parent"),
    CONSTRAINT "spy_product_attribute_type-fk_product_attribute_type_parent"
        FOREIGN KEY ("fk_product_attribute_type_parent")
        REFERENCES "spy_product_attribute_type" ("id_product_attribute_type")
) ENGINE=InnoDB;

CREATE TABLE "spy_product_attribute_type_value"
(
    "id" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_type" INTEGER NOT NULL,
    "key" VARCHAR(255) NOT NULL,
    "value" VARCHAR(255) NOT NULL,
    "fk_locale" INTEGER,
    PRIMARY KEY ("id"),
    UNIQUE INDEX "spy_product_attribute_type_value-unique-fk_locale" ("fk_locale", "fk_type", "key"),
    CONSTRAINT "spy_product_attribute_type_value-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale")
) ENGINE=InnoDB;

CREATE TABLE "spy_product_search"
(
    "id_product_search" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_product" INTEGER,
    "fk_locale" INTEGER,
    "is_searchable" TINYINT(1) DEFAULT 1,
    PRIMARY KEY ("id_product_search"),
    INDEX "spy_product_search-fi_product" ("fk_product"),
    INDEX "spy_product_search-fi_locale" ("fk_locale"),
    CONSTRAINT "spy_product_search-fk_product"
        FOREIGN KEY ("fk_product")
        REFERENCES "spy_product" ("id_product"),
    CONSTRAINT "spy_product_search-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale")
) ENGINE=InnoDB;

CREATE TABLE "spy_url_redirect"
(
    "id_url_redirect" INTEGER NOT NULL AUTO_INCREMENT,
    "to_url" VARCHAR(255) NOT NULL,
    "status" INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY ("id_url_redirect"),
    INDEX "spy_url_redirect-to_url" ("to_url", "status")
) ENGINE=InnoDB;
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
DROP TABLE IF EXISTS "spy_product_abstract";

DROP TABLE IF EXISTS "spy_product_abstract_localized_attributes";

DROP TABLE IF EXISTS "spy_product_attributes_metadata";

DROP TABLE IF EXISTS "spy_product_attribute_type";

DROP TABLE IF EXISTS "spy_product_attribute_type_value";

DROP TABLE IF EXISTS "spy_product_search";

DROP TABLE IF EXISTS "spy_url_redirect";

ALTER TABLE "spy_price_product" DROP CONSTRAINT "spy_price_product-fk_product_abstract";

DROP INDEX "spy_price_product-unique-fk_product_abstract" ON "spy_price_product";

ALTER TABLE "spy_price_product"

  CHANGE "fk_product_abstract" "fk_abstract_product" INTEGER;

CREATE UNIQUE INDEX "spy_price_product-unique-fk_abstract_product" ON "spy_price_product" ("fk_abstract_product", "fk_product", "fk_price_type");

ALTER TABLE "spy_price_product" ADD CONSTRAINT "spy_price_product-fk_abstract_product"
    FOREIGN KEY ("fk_abstract_product")
    REFERENCES "spy_abstract_product" ("id_abstract_product");

ALTER TABLE "spy_product" DROP CONSTRAINT "spy_product-fk_product_abstract";

DROP INDEX "spy_product-fi_product_abstract" ON "spy_product";

ALTER TABLE "spy_product"

  CHANGE "fk_product_abstract" "fk_abstract_product" INTEGER NOT NULL;

CREATE INDEX "spy_product-fi_abstract_product" ON "spy_product" ("fk_abstract_product");

ALTER TABLE "spy_product" ADD CONSTRAINT "spy_product-fk_abstract_product"
    FOREIGN KEY ("fk_abstract_product")
    REFERENCES "spy_abstract_product" ("id_abstract_product");

ALTER TABLE "spy_product_category" DROP CONSTRAINT "spy_product_category-fk_product_abstract";

DROP INDEX "spy_product_category-unique-fk_product_abstract" ON "spy_product_category";

ALTER TABLE "spy_product_category"

  CHANGE "fk_product_abstract" "fk_abstract_product" INTEGER NOT NULL;

CREATE UNIQUE INDEX "spy_product_category-unique-fk_abstract_product" ON "spy_product_category" ("fk_abstract_product", "fk_category");

ALTER TABLE "spy_product_category" ADD CONSTRAINT "spy_product_category-fk_abstract_product"
    FOREIGN KEY ("fk_abstract_product")
    REFERENCES "spy_abstract_product" ("id_abstract_product");

ALTER TABLE "spy_product_localized_attributes"

  DROP PRIMARY KEY,

  CHANGE "id_product_attributes" "id_attributes" INTEGER NOT NULL AUTO_INCREMENT,

  ADD PRIMARY KEY ("id_attributes");

ALTER TABLE "spy_product_search_attributes_operation" DROP CONSTRAINT "spy_product_search_attributes_operation-source_attribute_id";

ALTER TABLE "spy_product_search_attributes_operation" ADD CONSTRAINT "spy_product_search_attributes_operation-source_attribute_id"
    FOREIGN KEY ("source_attribute_id")
    REFERENCES "spy_attributes_metadata" ("id_attributes_metadata")
    ON DELETE CASCADE;

ALTER TABLE "spy_sales_order_item_option"

  CHANGE "tax_percentage" "tax_percentage" DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE "spy_tax_rate"

  CHANGE "rate" "rate" DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE "spy_url" DROP CONSTRAINT "spy_url-fk_resource_product_abstract";

ALTER TABLE "spy_url" DROP CONSTRAINT "spy_url-fk_resource_redirect";

DROP INDEX "spy_url-fi_resource_product_abstract" ON "spy_url";

ALTER TABLE "spy_url"

  CHANGE "fk_resource_product_abstract" "fk_resource_abstract_product" INTEGER;

CREATE INDEX "spy_url-fi_resource_abstract_product" ON "spy_url" ("fk_resource_abstract_product");

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_redirect"
    FOREIGN KEY ("fk_resource_redirect")
    REFERENCES "spy_redirect" ("id_redirect")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_abstract_product"
    FOREIGN KEY ("fk_resource_abstract_product")
    REFERENCES "spy_abstract_product" ("id_abstract_product")
    ON DELETE CASCADE;

ALTER TABLE "spy_wishlist_item" DROP CONSTRAINT "spy_wishlist_item-fk_product_abstract";

DROP INDEX "spy_wishlist_item-fi_product_abstract" ON "spy_wishlist_item";

ALTER TABLE "spy_wishlist_item"

  CHANGE "fk_product_abstract" "fk_abstract_product" INTEGER NOT NULL;

CREATE INDEX "spy_wishlist_item-fi_abstract_product" ON "spy_wishlist_item" ("fk_abstract_product");

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-fk_abstract_product"
    FOREIGN KEY ("fk_abstract_product")
    REFERENCES "spy_abstract_product" ("id_abstract_product");

CREATE TABLE "spy_abstract_product"
(
    "id_abstract_product" INTEGER NOT NULL AUTO_INCREMENT,
    "sku" VARCHAR(255) NOT NULL,
    "attributes" TEXT NOT NULL,
    "fk_tax_set" INTEGER,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    PRIMARY KEY ("id_abstract_product"),
    UNIQUE INDEX "spy_abstract_product-sku" ("sku"),
    INDEX "spy_abstract_product-fi_tax_set" ("fk_tax_set"),
    CONSTRAINT "spy_abstract_product-fk_tax_set"
        FOREIGN KEY ("fk_tax_set")
        REFERENCES "spy_tax_set" ("id_tax_set")
) ENGINE=InnoDB;

CREATE TABLE "spy_abstract_product_localized_attributes"
(
    "id_abstract_attributes" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_abstract_product" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "attributes" TEXT NOT NULL,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    PRIMARY KEY ("id_abstract_attributes"),
    UNIQUE INDEX "spy_abstract_product_localized_attributes-unique-fk_abstract_pro" ("fk_abstract_product", "fk_locale"),
    INDEX "spy_abstract_product_localized_attributes-fi_locale" ("fk_locale"),
    CONSTRAINT "spy_abstract_product_localized_attributes-fk_abstract_product"
        FOREIGN KEY ("fk_abstract_product")
        REFERENCES "spy_abstract_product" ("id_abstract_product")
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT "spy_abstract_product_localized_attributes-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale")
) ENGINE=InnoDB;

CREATE TABLE "spy_attribute_type"
(
    "id_type" INTEGER NOT NULL AUTO_INCREMENT,
    "name" VARCHAR(255) NOT NULL,
    "fk_parent_type" INTEGER,
    "input_representation" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_type"),
    INDEX "spy_attribute_type-fi_parent_type" ("fk_parent_type"),
    CONSTRAINT "spy_attribute_type-fk_parent_type"
        FOREIGN KEY ("fk_parent_type")
        REFERENCES "spy_attribute_type" ("id_type")
) ENGINE=InnoDB;

CREATE TABLE "spy_attribute_type_value"
(
    "id" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_type" INTEGER NOT NULL,
    "key" VARCHAR(255) NOT NULL,
    "value" VARCHAR(255) NOT NULL,
    "fk_locale" INTEGER,
    PRIMARY KEY ("id"),
    UNIQUE INDEX "spy_attribute_type_value-unique-fk_locale" ("fk_locale", "fk_type", "key"),
    CONSTRAINT "spy_attribute_type_value-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale")
) ENGINE=InnoDB;

CREATE TABLE "spy_attributes_metadata"
(
    "id_attributes_metadata" INTEGER NOT NULL AUTO_INCREMENT,
    "key" VARCHAR(255) NOT NULL,
    "is_editable" TINYINT(1) DEFAULT 1 NOT NULL,
    "fk_type" INTEGER,
    PRIMARY KEY ("id_attributes_metadata"),
    INDEX "spy_attributes_metadata-fi_type" ("fk_type"),
    CONSTRAINT "spy_attributes_metadata-fk_type"
        FOREIGN KEY ("fk_type")
        REFERENCES "spy_attribute_type" ("id_type")
) ENGINE=InnoDB;

CREATE TABLE "spy_redirect"
(
    "id_redirect" INTEGER NOT NULL AUTO_INCREMENT,
    "to_url" VARCHAR(255) NOT NULL,
    "status" INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY ("id_redirect"),
    INDEX "spy_redirect-to_url" ("to_url", "status")
) ENGINE=InnoDB;

CREATE TABLE "spy_searchable_products"
(
    "searchable_id" INTEGER NOT NULL AUTO_INCREMENT,
    "fk_product" INTEGER,
    "fk_locale" INTEGER,
    "is_searchable" TINYINT(1) DEFAULT 1,
    PRIMARY KEY ("searchable_id"),
    INDEX "spy_searchable_products-fi_product" ("fk_product"),
    INDEX "spy_searchable_products-fi_locale" ("fk_locale"),
    CONSTRAINT "spy_searchable_products-fk_locale"
        FOREIGN KEY ("fk_locale")
        REFERENCES "spy_locale" ("id_locale"),
    CONSTRAINT "spy_searchable_products-fk_product"
        FOREIGN KEY ("fk_product")
        REFERENCES "spy_product" ("id_product")
) ENGINE=InnoDB;
',
);
    }

}
