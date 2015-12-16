<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1450270500.
 * Generated on 2015-12-16 12:55:00 by vagrant
 */
class PropelMigration_1450270500
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
                SET FOREIGN_KEY_CHECKS = 0;

                ALTER TABLE `spy_payment_payolution_transaction_request_log`
                    DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d`;

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
                SET FOREIGN_KEY_CHECKS = 0;

                ALTER TABLE `spy_payment_payolution_transaction_request_log`
                    ADD UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` (`transaction_id`(255));


                SET FOREIGN_KEY_CHECKS = 1;
            ',
        );
    }

}
