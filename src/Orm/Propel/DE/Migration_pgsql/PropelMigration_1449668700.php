<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1449668700.
 * Generated on 2015-12-09 13:45:00 by vagrant
 */
class PropelMigration_1449668700
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
                -- ALTER TABLE "spy_payment_payolution" ADD "pre_check_id" VARCHAR(255);

                -- ALTER TABLE "spy_payment_payolution" ADD "installment_calculation_id" VARCHAR(255);

                -- ALTER TABLE "spy_payment_payolution_transaction_request_log" DROP INDEX "spy_payment_payolution_transaction_request_log_u_052e1d";
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
                ALTER TABLE "spy_payment_payolution"
                    DROP "pre_check_id";

                ALTER TABLE "spy_payment_payolution"
                    DROP "installment_calculation_id";

                ALTER TABLE "spy_payment_payolution_transaction_request_log"
                    ADD UNIQUE INDEX "spy_payment_payolution_transaction_request_log_u_052e1d" ("transaction_id"(255));
            ',
        );
    }

}
