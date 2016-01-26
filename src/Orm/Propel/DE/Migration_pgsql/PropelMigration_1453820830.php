<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1453820830.
 * Generated on 2016-01-26 15:07:10 by vagrant
 */
class PropelMigration_1453820830
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
ALTER TABLE "spy_payment_payolution_transaction_status_log" DROP CONSTRAINT "spy_payolution_transaction_status_log-transactionid";

ALTER TABLE "spy_payment_payolution_transaction_request_log" DROP CONSTRAINT "spy_payment_payolution_transaction_request_log_u_63355d";

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
ALTER TABLE "spy_payment_payolution_transaction_status_log" ADD CONSTRAINT "spy_payolution_transaction_status_log-transactionid"
    FOREIGN KEY ("identification_transactionid")
    REFERENCES "spy_payment_payolution_transaction_request_log" ("transaction_id");

CREATE INDEX "spy_payment_payolution_transaction_request_log_u_63355d" ON "spy_payment_payolution_transaction_request_log" ("transaction_id");
',
);
    }

}
