<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1465294472.
 * Generated on 2016-06-07 10:14:32 by vagrant
 */
class PropelMigration_1465294472
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
ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-default_billing_address";

ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-default_shipping_address";

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_billing_address"
    FOREIGN KEY ("default_billing_address")
    REFERENCES "spy_customer_address" ("id_customer_address")
    ON DELETE SET NULL;

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_shipping_address"
    FOREIGN KEY ("default_shipping_address")
    REFERENCES "spy_customer_address" ("id_customer_address")
    ON DELETE SET NULL;

ALTER TABLE "spy_customer_address" DROP CONSTRAINT "spy_customer_address-fk_customer";

ALTER TABLE "spy_customer_address" ADD CONSTRAINT "spy_customer_address-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer")
    ON DELETE CASCADE;
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
ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-default_billing_address";

ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-default_shipping_address";

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_billing_address"
    FOREIGN KEY ("default_billing_address")
    REFERENCES "spy_customer_address" ("id_customer_address");

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_shipping_address"
    FOREIGN KEY ("default_shipping_address")
    REFERENCES "spy_customer_address" ("id_customer_address");

ALTER TABLE "spy_customer_address" DROP CONSTRAINT "spy_customer_address-fk_customer";

ALTER TABLE "spy_customer_address" ADD CONSTRAINT "spy_customer_address-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");
',
);
    }

}