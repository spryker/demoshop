<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467630796.
 * Generated on 2016-07-04 11:13:16 by vagrant
 */
class PropelMigration_1467630796
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
ALTER TABLE "spy_refund"

  DROP COLUMN "adjustment_fee";

ALTER TABLE "spy_sales_expense" DROP CONSTRAINT "spy_sales_expense-fk_refund";

ALTER TABLE "spy_sales_expense"

  DROP COLUMN "fk_refund";

ALTER TABLE "spy_sales_order_item" DROP CONSTRAINT "spy_sales_order_item-fk_refund";

ALTER TABLE "spy_sales_order_item"

  DROP COLUMN "fk_refund";
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
ALTER TABLE "spy_refund"

  ADD "adjustment_fee" INTEGER;

ALTER TABLE "spy_sales_expense"

  ADD "fk_refund" INTEGER;

ALTER TABLE "spy_sales_expense" ADD CONSTRAINT "spy_sales_expense-fk_refund"
    FOREIGN KEY ("fk_refund")
    REFERENCES "spy_refund" ("id_refund");

ALTER TABLE "spy_sales_order_item"

  ADD "fk_refund" INTEGER;

ALTER TABLE "spy_sales_order_item" ADD CONSTRAINT "spy_sales_order_item-fk_refund"
    FOREIGN KEY ("fk_refund")
    REFERENCES "spy_refund" ("id_refund");
',
);
    }

}