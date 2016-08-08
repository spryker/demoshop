<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1470657010.
 * Generated on 2016-08-08 11:50:10 by vagrant
 */
class PropelMigration_1470657010
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
',
);
    }

}