<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1530708998.
 * Generated on 2018-07-04 12:56:38 by vagrant
 */
class PropelMigration_1530708998
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

ALTER TABLE "spy_company_business_unit"

  ADD "fk_parent_company_business_unit" INTEGER;

ALTER TABLE "spy_company_business_unit" ADD CONSTRAINT "spy_company_business_unit-fk_parent_company_business_unit"
    FOREIGN KEY ("fk_parent_company_business_unit")
    REFERENCES "spy_company_business_unit" ("id_company_business_unit");

ALTER TABLE "spy_company_user"

  ADD "is_default" BOOLEAN DEFAULT \'f\' NOT NULL;

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

ALTER TABLE "spy_company_business_unit" DROP CONSTRAINT "spy_company_business_unit-fk_parent_company_business_unit";

ALTER TABLE "spy_company_business_unit"

  DROP COLUMN "fk_parent_company_business_unit";

ALTER TABLE "spy_company_user"

  DROP COLUMN "is_default";

COMMIT;
',
);
    }

}