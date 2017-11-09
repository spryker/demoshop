<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1510247677.
 * Generated on 2017-11-09 17:14:37 by vagrant
 */
class PropelMigration_1510247677
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

ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-fk_user";

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user")
    ON DELETE NO ACTION;

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

ALTER TABLE "spy_customer" DROP CONSTRAINT "spy_customer-fk_user";

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user");

COMMIT;
',
);
    }

}