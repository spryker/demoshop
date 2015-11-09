<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447165525.
 * Generated on 2015-11-10 14:25:25 by vagrant
 */
class PropelMigration_1447165525
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

ALTER TABLE `spy_oms_order_item_state_history`

  DROP `updated_at`;

ALTER TABLE `spy_oms_transition_log`

  CHANGE `error` `is_error` TINYINT(1),

  ADD `quantity` INTEGER AFTER `fk_sales_order`,

  ADD `path` VARCHAR(256) AFTER `hostname`,

  ADD `command` VARCHAR(255) AFTER `target_state`,

  ADD `condition` VARCHAR(255) AFTER `command`,

  DROP `module`,

  DROP `controller`,

  DROP `action`,

  DROP `commands`,

  DROP `conditions`,

  DROP `updated_at`;

ALTER TABLE `spy_payment_payolution`

  DROP `bank_account_holder`,

  DROP `bank_account_bic`,

  DROP `bank_account_iban`,

  DROP `installment_amount`,

  DROP `installment_duration`;

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`(255));

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

ALTER TABLE `spy_oms_order_item_state_history`

  ADD `updated_at` DATETIME AFTER `created_at`;

ALTER TABLE `spy_oms_transition_log`

  CHANGE `is_error` `error` TINYINT(1),

  ADD `module` VARCHAR(128) NOT NULL AFTER `hostname`,

  ADD `controller` VARCHAR(128) NOT NULL AFTER `module`,

  ADD `action` VARCHAR(128) NOT NULL AFTER `controller`,

  ADD `commands` TEXT AFTER `target_state`,

  ADD `conditions` TEXT AFTER `commands`,

  ADD `updated_at` DATETIME AFTER `created_at`,

  DROP `quantity`,

  DROP `path`,

  DROP `command`,

  DROP `condition`;

ALTER TABLE `spy_payment_payolution`

  ADD `bank_account_holder` VARCHAR(100) AFTER `currency_iso3_code`,

  ADD `bank_account_bic` VARCHAR(100) AFTER `bank_account_holder`,

  ADD `bank_account_iban` VARCHAR(100) AFTER `bank_account_bic`,

  ADD `installment_amount` INTEGER AFTER `bank_account_iban`,

  ADD `installment_duration` INTEGER AFTER `installment_amount`;

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`);

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