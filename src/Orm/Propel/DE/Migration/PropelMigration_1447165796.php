<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447165796.
 * Generated on 2015-11-10 14:29:56 by vagrant
 */
class PropelMigration_1447165796
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