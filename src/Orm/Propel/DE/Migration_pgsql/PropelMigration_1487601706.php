<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1487601706.
 * Generated on 2017-02-20 14:41:46 by vagrant
 */
class PropelMigration_1487601706
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
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
BEGIN;

DROP TABLE IF EXISTS "spy_payment_ratepay" CASCADE;

DROP TABLE IF EXISTS "spy_payment_ratepay_log" CASCADE;

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(255);

COMMIT;
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
BEGIN;

CREATE TABLE "spy_payment_ratepay"
(
    "id_payment_ratepay" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "payment_type" INT2 NOT NULL,
    "transaction_id" VARCHAR(50),
    "transaction_short_id" VARCHAR(50),
    "result_code" INTEGER,
    "gender" INT2 NOT NULL,
    "date_of_birth" DATE NOT NULL,
    "phone" VARCHAR(32) NOT NULL,
    "ip_address" VARCHAR(50) NOT NULL,
    "customer_allow_credit_inquiry" INTEGER NOT NULL,
    "currency_iso3" VARCHAR(3) NOT NULL,
    "device_fingerprint" VARCHAR(50),
    "debit_pay_type" INT2,
    "installment_total_amount" INTEGER,
    "installment_interest_amount" INTEGER,
    "installment_interest_rate" DOUBLE PRECISION,
    "installment_last_rate" DOUBLE PRECISION,
    "installment_rate" DOUBLE PRECISION,
    "installment_payment_first_day" INTEGER,
    "installment_month" INTEGER,
    "installment_number_rates" INTEGER,
    "installment_calculation_start" VARCHAR(50),
    "installment_service_charge" DOUBLE PRECISION,
    "installment_annual_percentage_rate" DOUBLE PRECISION,
    "installment_month_allowed" INTEGER,
    "bank_account_holder" VARCHAR,
    "bank_account_bic" VARCHAR(100),
    "bank_account_iban" VARCHAR(50),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_ratepay")
);

CREATE TABLE "spy_payment_ratepay_log"
(
    "id_payment_ratepay_log" INTEGER NOT NULL,
    "fk_sales_order" INTEGER,
    "message" VARCHAR,
    "payment_method" INT2,
    "request_type" INT2 NOT NULL,
    "request_transaction_id" VARCHAR(50),
    "request_transaction_short_id" VARCHAR(50),
    "request_body" TEXT,
    "response_type" VARCHAR,
    "response_result_code" INTEGER,
    "response_result_text" VARCHAR,
    "response_transaction_id" VARCHAR,
    "response_transaction_short_id" VARCHAR,
    "response_reason_code" INTEGER,
    "response_reason_text" VARCHAR,
    "response_status_code" INTEGER,
    "response_status_text" VARCHAR,
    "response_customer_message" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "item_count" INTEGER,
    PRIMARY KEY ("id_payment_ratepay_log")
);

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);

ALTER TABLE "spy_payment_ratepay" ADD CONSTRAINT "spy_payment_ratepay-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_payment_ratepay_log" ADD CONSTRAINT "spy_payment_ratepay_log-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

COMMIT;
',
);
    }

}