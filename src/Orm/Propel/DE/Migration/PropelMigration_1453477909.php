<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1453477909.
 * Generated on 2016-02-05 09:03:42 by vagrant
 */
class PropelMigration_1453477909
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

ALTER TABLE `spy_sales_discount`

  CHANGE `amount` `amount` DECIMAL(8,2) NOT NULL;

ALTER TABLE `spy_sales_expense`

  ADD `tax_rate` DECIMAL(8,2) AFTER `gross_price`,

  ADD `canceled_amount` INTEGER DEFAULT 0 AFTER `tax_rate`,

  DROP `price_to_pay`,

  DROP `tax_percentage`;

ALTER TABLE `spy_sales_order`

  DROP `grand_total`,

  DROP `subtotal`;

ALTER TABLE `spy_sales_order_item`

  ADD `canceled_amount` INTEGER DEFAULT 0 AFTER `gross_price`,

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

  ADD `canceled_amount` INTEGER DEFAULT 0 AFTER `gross_price`,

  ADD `tax_rate` DECIMAL(8,2) NOT NULL AFTER `canceled_amount`,

  DROP `price_to_pay`,

  DROP `tax_percentage`;

ALTER TABLE `spy_shipment_carrier`

  DROP `glossary_key_name`;

ALTER TABLE `spy_shipment_method`

  CHANGE `price` `default_price` INTEGER,

  ADD `price_plugin` VARCHAR(255) AFTER `availability_plugin`,

  DROP `glossary_key_name`,

  DROP `glossary_key_description`,

  DROP `price_calculation_plugin`,

  DROP `tax_calculation_plugin`;

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

ALTER TABLE `spy_sales_discount`

  CHANGE `amount` `amount` INTEGER NOT NULL;

ALTER TABLE `spy_sales_expense`

  ADD `price_to_pay` INTEGER NOT NULL AFTER `gross_price`,

  ADD `tax_percentage` DECIMAL(8,2) AFTER `price_to_pay`,

  DROP `tax_rate`,

  DROP `canceled_amount`;

ALTER TABLE `spy_sales_order`

  ADD `grand_total` INTEGER NOT NULL AFTER `order_reference`,

  ADD `subtotal` INTEGER NOT NULL AFTER `grand_total`;

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

  ADD `price_to_pay` INTEGER DEFAULT 0 NOT NULL AFTER `gross_price`,

  ADD `tax_percentage` DECIMAL(8,2) NOT NULL AFTER `price_to_pay`,

  DROP `canceled_amount`,

  DROP `tax_rate`;

ALTER TABLE `spy_shipment_carrier`

  ADD `glossary_key_name` VARCHAR(255) AFTER `id_shipment_carrier`;

ALTER TABLE `spy_shipment_method`

  CHANGE `default_price` `price` INTEGER,

  ADD `glossary_key_name` VARCHAR(255) AFTER `fk_tax_set`,

  ADD `glossary_key_description` VARCHAR(255) AFTER `glossary_key_name`,

  ADD `price_calculation_plugin` VARCHAR(255) AFTER `availability_plugin`,

  ADD `tax_calculation_plugin` VARCHAR(255) AFTER `delivery_time_plugin`,

  DROP `price_plugin`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}
