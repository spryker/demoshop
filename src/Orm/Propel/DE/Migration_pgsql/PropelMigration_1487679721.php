<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1487679721.
 * Generated on 2017-02-21 12:22:01 by vagrant
 */
class PropelMigration_1487679721
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

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);

COMMIT;
',
);
    }

}