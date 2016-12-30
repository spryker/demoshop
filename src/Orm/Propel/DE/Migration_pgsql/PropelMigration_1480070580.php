<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1480070580.
 * Generated on 2016-11-25 10:43:00 by vagrant
 */
class PropelMigration_1480070580
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

ALTER TABLE "spy_customer"

  ADD "fk_locale" INTEGER;

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_payment_ratepay"

  ALTER COLUMN "transaction_id" SET NOT NULL,

  ALTER COLUMN "transaction_short_id" SET NOT NULL,

  ALTER COLUMN "result_code" SET NOT NULL;

ALTER TABLE "spy_payment_ratepay_log"

  DROP COLUMN "item_count";

ALTER TABLE "spy_sales_order"

  ADD "fk_locale" INTEGER;

ALTER TABLE "spy_sales_order" ADD CONSTRAINT "spy_sales_order-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

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

ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-fk_locale";

ALTER TABLE "spy_customer"

  DROP COLUMN "fk_locale";

ALTER TABLE "spy_payment_ratepay"

  ALTER COLUMN "transaction_id" DROP NOT NULL,

  ALTER COLUMN "transaction_short_id" DROP NOT NULL,

  ALTER COLUMN "result_code" DROP NOT NULL;

ALTER TABLE "spy_payment_ratepay_log"

  ADD "item_count" INTEGER;

ALTER TABLE "spy_sales_order" DROP CONSTRAINT "spy_sales_order-fk_locale";

ALTER TABLE "spy_sales_order"

  DROP COLUMN "fk_locale";

COMMIT;
',
);
    }

}