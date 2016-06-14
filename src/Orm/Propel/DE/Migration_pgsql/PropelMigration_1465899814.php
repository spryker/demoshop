<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1465899814.
 * Generated on 2016-06-14 10:23:34 by vagrant
 */
class PropelMigration_1465899814
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
ALTER TABLE "spy_discount"

  ADD "discount_type" VARCHAR(255);

CREATE INDEX "spy_discount-index-discount_type" ON "spy_discount" ("discount_type");
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
DROP INDEX "spy_discount-index-discount_type";

ALTER TABLE "spy_discount"

  DROP COLUMN "discount_type";
',
);
    }

}