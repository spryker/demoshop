<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1446806632.
 * Generated on 2015-11-06 10:43:52
 */
class PropelMigration_1446806632
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

ALTER TABLE `spy_discount`

  ADD `collector_logical_operator` VARCHAR(16) AFTER `valid_to`;

ALTER TABLE `spy_discount_decision_rule`

  CHANGE `value` `value` VARCHAR(255);

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`(255));

ALTER TABLE `spy_product_category`

  ADD `product_order` INTEGER DEFAULT 0 AFTER `fk_category`;

ALTER TABLE `spy_sales_discount`

  CHANGE `amount` `amount` DECIMAL(8,2) NOT NULL,

  DROP `scope`,

  DROP `action`,

  DROP `conditions`;

ALTER TABLE `spy_sales_order_item`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2);

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

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

ALTER TABLE `spy_discount`

  DROP `collector_logical_operator`;

ALTER TABLE `spy_discount_decision_rule`

  CHANGE `value` `value` VARCHAR(255) NOT NULL;

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`);

ALTER TABLE `spy_product_category`

  DROP `product_order`;

ALTER TABLE `spy_sales_discount`

  CHANGE `amount` `amount` INTEGER NOT NULL,

  ADD `scope` TINYINT AFTER `display_name`,

  ADD `action` VARCHAR(255) NOT NULL AFTER `scope`,

  ADD `conditions` VARCHAR(1000) AFTER `action`;

ALTER TABLE `spy_sales_order_item`

  CHANGE `tax_percentage` `tax_percentage` INTEGER;

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}
