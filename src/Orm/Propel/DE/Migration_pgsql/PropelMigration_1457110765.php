<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1457110765.
 * Generated on 2016-03-04 16:59:25 by vagrant
 */
class PropelMigration_1457110765
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
ALTER TABLE "spy_sales_discount"

  ALTER COLUMN "amount" TYPE NUMERIC(8,2);

ALTER TABLE "spy_sales_expense"

  ADD "tax_rate" NUMERIC(8,2),

  ADD "canceled_amount" INTEGER DEFAULT 0,

  DROP COLUMN "price_to_pay",

  DROP COLUMN "tax_percentage";

ALTER TABLE "spy_sales_order"

  DROP COLUMN "grand_total",

  DROP COLUMN "subtotal";

ALTER TABLE "spy_sales_order_item"

  ADD "canceled_amount" INTEGER DEFAULT 0,

  ADD "tax_rate" NUMERIC(8,2),

  DROP COLUMN "price_to_pay",

  DROP COLUMN "tax_percentage";

ALTER TABLE "spy_sales_order_item_bundle"

  ADD "tax_rate" NUMERIC(8,2),

  DROP COLUMN "price_to_pay",

  DROP COLUMN "tax_percentage";

ALTER TABLE "spy_sales_order_item_bundle_item"

  ADD "tax_rate" NUMERIC(8,2),

  DROP COLUMN "tax_percentage";

ALTER TABLE "spy_sales_order_item_option"

  ADD "canceled_amount" INTEGER DEFAULT 0,

  ADD "tax_rate" NUMERIC(8,2) NOT NULL,

  DROP COLUMN "price_to_pay",

  DROP COLUMN "tax_percentage";

ALTER TABLE "spy_shipment_carrier"

  DROP COLUMN "glossary_key_name";

ALTER TABLE "spy_shipment_method" RENAME COLUMN "price" TO "default_price";

ALTER TABLE "spy_shipment_method"

  ADD "price_plugin" VARCHAR(255),

  DROP COLUMN "glossary_key_name",

  DROP COLUMN "glossary_key_description",

  DROP COLUMN "price_calculation_plugin",

  DROP COLUMN "tax_calculation_plugin";
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
ALTER TABLE "spy_sales_discount"

  ALTER COLUMN "amount" TYPE INTEGER;

ALTER TABLE "spy_sales_expense"

  ADD "price_to_pay" INTEGER NOT NULL,

  ADD "tax_percentage" NUMERIC(8,2),

  DROP COLUMN "tax_rate",

  DROP COLUMN "canceled_amount";

ALTER TABLE "spy_sales_order"

  ADD "grand_total" INTEGER NOT NULL,

  ADD "subtotal" INTEGER NOT NULL;

ALTER TABLE "spy_sales_order_item"

  ADD "price_to_pay" INTEGER NOT NULL,

  ADD "tax_percentage" NUMERIC(8,2),

  DROP COLUMN "canceled_amount",

  DROP COLUMN "tax_rate";

ALTER TABLE "spy_sales_order_item_bundle"

  ADD "price_to_pay" INTEGER NOT NULL,

  ADD "tax_percentage" NUMERIC(8,2),

  DROP COLUMN "tax_rate";

ALTER TABLE "spy_sales_order_item_bundle_item"

  ADD "tax_percentage" NUMERIC(8,2),

  DROP COLUMN "tax_rate";

ALTER TABLE "spy_sales_order_item_option"

  ADD "price_to_pay" INTEGER DEFAULT 0 NOT NULL,

  ADD "tax_percentage" NUMERIC(8,2) NOT NULL,

  DROP COLUMN "canceled_amount",

  DROP COLUMN "tax_rate";

ALTER TABLE "spy_shipment_carrier"

  ADD "glossary_key_name" VARCHAR(255);

ALTER TABLE "spy_shipment_method" RENAME COLUMN "default_price" TO "price";

ALTER TABLE "spy_shipment_method"

  ADD "glossary_key_name" VARCHAR(255),

  ADD "glossary_key_description" VARCHAR(255),

  ADD "price_calculation_plugin" VARCHAR(255),

  ADD "tax_calculation_plugin" VARCHAR(255),

  DROP COLUMN "price_plugin";
',
);
    }

}