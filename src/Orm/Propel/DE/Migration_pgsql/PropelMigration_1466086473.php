<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1466086473.
 * Generated on 2016-06-16 14:14:33 by vagrant
 */
class PropelMigration_1466086473
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
ALTER TABLE "spy_cms_page"

  ALTER COLUMN "is_active" SET DEFAULT \'f\';

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);
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
ALTER TABLE "spy_cms_page"

  ALTER COLUMN "is_active" SET DEFAULT \'t\';

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(255);
',
);
    }

}