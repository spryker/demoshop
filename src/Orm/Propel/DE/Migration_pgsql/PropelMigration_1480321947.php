<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1480321947.
 * Generated on 2016-11-28 08:32:27 by vagrant
 */
class PropelMigration_1480321947
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

CREATE SEQUENCE "spy_product_bundle_pk_seq";

CREATE TABLE "spy_product_bundle"
(
    "id_product_bundle" INTEGER NOT NULL,
    "fk_bundled_product" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "quantity" INTEGER DEFAULT 1 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_bundle")
);

ALTER TABLE "spy_product_bundle" ADD CONSTRAINT "spy_product_bundle-fk_bundled_product"
    FOREIGN KEY ("fk_bundled_product")
    REFERENCES "spy_product" ("id_product")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_product_bundle" ADD CONSTRAINT "spy_product_bundle-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

DROP TABLE IF EXISTS "spy_sales_order_item_bundle_item" CASCADE;

ALTER TABLE "spy_sales_order_item_bundle"

  DROP COLUMN "tax_rate",

  DROP COLUMN "bundle_type";
  
DROP TABLE IF EXISTS "spy_product_to_bundle" CASCADE; 
  
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
CREATE TABLE "spy_sales_order_item_bundle_item"
(
    "id_sales_order_item_bundle_item" INTEGER NOT NULL,
    "fk_sales_order_item_bundle" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "gross_price" INTEGER NOT NULL,
    "tax_rate" NUMERIC(8,2),
    "variety" INT2 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_item_bundle_item")
);

ALTER TABLE "spy_sales_order_item_bundle"

  ADD "tax_rate" NUMERIC(8,2),

  ADD "bundle_type" INT2 NOT NULL;

ALTER TABLE "spy_sales_order_item_bundle_item" ADD CONSTRAINT "spy_sales_order_item_bundle_item-fk_sales_order_item_bundle"
    FOREIGN KEY ("fk_sales_order_item_bundle")
    REFERENCES "spy_sales_order_item_bundle" ("id_sales_order_item_bundle");
    

CREATE TABLE "spy_product_to_bundle"
(
    "fk_product" INTEGER NOT NULL,
    "fk_related_product" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product","fk_related_product")
);

ALTER TABLE "spy_product_to_bundle" ADD CONSTRAINT "spy_product_to_bundle-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_to_bundle" ADD CONSTRAINT "spy_product_to_bundle-fk_related_product"
    FOREIGN KEY ("fk_related_product")
    REFERENCES "spy_product" ("id_product");    
    
DROP TABLE IF EXISTS "spy_product_bundle" CASCADE;

DROP SEQUENCE "spy_product_bundle_pk_seq";  
    
',
);
    }

}
