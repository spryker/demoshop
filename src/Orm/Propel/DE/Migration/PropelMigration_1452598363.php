<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1452598363.
 * Generated on 2016-01-12 11:32:43 by vagrant
 */
class PropelMigration_1452598363
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
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `spy_sales_expense`

  ADD `tax_rate` DECIMAL(8,2) AFTER `gross_price`,

  DROP `price_to_pay`,

  DROP `tax_percentage`;

ALTER TABLE `spy_sales_order_item`

  ADD `canceled_amount` INTEGER DEFAULT 0 NOT NULL AFTER `gross_price`,

  ADD `tax_rate` DECIMAL(8,2) AFTER `canceled_amount`,

  DROP `price_to_pay`,

  DROP `tax_percentage`;

ALTER TABLE `spy_sales_order_item_bundle`

  ADD `tax_rate` DECIMAL(8,2) AFTER `gross_price`,

  DROP `price_to_pay`,

  DROP `tax_percentage`;

ALTER TABLE `spy_sales_order_item_bundle_item`

  ADD `tax_rate` DECIMAL(8,2) AFTER `gross_price`,

  DROP `tax_percentage`;

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `price_to_pay` `canceled_amount` INTEGER DEFAULT 0 NOT NULL,

  ADD `tax_rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL AFTER `canceled_amount`,

  DROP `tax_percentage`;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
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
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `spy_sales_expense`

  ADD `price_to_pay` INTEGER NOT NULL AFTER `gross_price`,

  ADD `tax_percentage` DECIMAL(8,2) AFTER `price_to_pay`,

  DROP `tax_rate`;

ALTER TABLE `spy_sales_order_item`

  ADD `price_to_pay` INTEGER NOT NULL AFTER `gross_price`,

  ADD `tax_percentage` DECIMAL(8,2) AFTER `price_to_pay`,

  DROP `canceled_amount`,

  DROP `tax_rate`;

ALTER TABLE `spy_sales_order_item_bundle`

  ADD `price_to_pay` INTEGER NOT NULL AFTER `gross_price`,

  ADD `tax_percentage` DECIMAL(8,2) AFTER `price_to_pay`,

  DROP `tax_rate`;

ALTER TABLE `spy_sales_order_item_bundle_item`

  ADD `tax_percentage` DECIMAL(8,2) AFTER `gross_price`,

  DROP `tax_rate`;

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `canceled_amount` `price_to_pay` INTEGER DEFAULT 0 NOT NULL,

  ADD `tax_percentage` DECIMAL(8,2) DEFAULT 0.00 NOT NULL AFTER `price_to_pay`,

  DROP `tax_rate`;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}