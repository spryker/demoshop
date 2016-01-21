<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1452780117.
 * Generated on 2016-01-14 14:01:57 by vagrant
 */
class PropelMigration_1452780117
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
ALTER TABLE "spy_sales_order_item_option"

  CHANGE "tax_percentage" "tax_percentage" DECIMAL(8,2) NOT NULL;

ALTER TABLE "spy_tax_rate"

  CHANGE "rate" "rate" DECIMAL(8,2) NOT NULL;
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
ALTER TABLE "spy_sales_order_item_option"

  CHANGE "tax_percentage" "tax_percentage" DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE "spy_tax_rate"

  CHANGE "rate" "rate" DECIMAL(8,2) DEFAULT 0.00 NOT NULL;
',
);
    }

}
