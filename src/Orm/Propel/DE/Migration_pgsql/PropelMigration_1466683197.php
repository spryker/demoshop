<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1466683197.
 * Generated on 2016-06-23 11:59:57 by vagrant
 */
class PropelMigration_1466683197
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
ALTER TABLE "spy_tax_rate"

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;

ALTER TABLE "spy_tax_set"

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;
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
ALTER TABLE "spy_tax_rate"

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

ALTER TABLE "spy_tax_set"

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";
',
);
    }

}