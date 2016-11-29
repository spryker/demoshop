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
DROP TABLE IF EXISTS "spy_sales_order_item_bundle_item" CASCADE;

ALTER TABLE "spy_product_bundle"

  ADD "quantity" INTEGER NOT NULL;

ALTER TABLE "spy_sales_order_item_bundle"

  DROP COLUMN "tax_rate",

  DROP COLUMN "bundle_type";
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

ALTER TABLE "spy_product_bundle"

  DROP COLUMN "quantity";

ALTER TABLE "spy_sales_order_item_bundle"

  ADD "tax_rate" NUMERIC(8,2),

  ADD "bundle_type" INT2 NOT NULL;

ALTER TABLE "spy_sales_order_item_bundle_item" ADD CONSTRAINT "spy_sales_order_item_bundle_item-fk_sales_order_item_bundle"
    FOREIGN KEY ("fk_sales_order_item_bundle")
    REFERENCES "spy_sales_order_item_bundle" ("id_sales_order_item_bundle");
',
);
    }

}