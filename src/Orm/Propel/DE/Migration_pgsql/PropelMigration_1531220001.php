<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1531220001.
 * Generated on 2018-07-10 10:53:21 by vagrant
 */
class PropelMigration_1531220001
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

ALTER TABLE "spy_availability_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_cms_block_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_price_product_abstract_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_price_product_concrete_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_product_abstract_option_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_product_abstract_page_search"

  ALTER COLUMN "store" TYPE VARCHAR(128);

ALTER TABLE "spy_product_abstract_storage"

  ALTER COLUMN "store" TYPE VARCHAR(128);

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

ALTER TABLE "spy_availability_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_cms_block_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_price_product_abstract_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_price_product_concrete_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_product_abstract_option_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_product_abstract_page_search"

  ALTER COLUMN "store" TYPE VARCHAR(4);

ALTER TABLE "spy_product_abstract_storage"

  ALTER COLUMN "store" TYPE VARCHAR(4);

COMMIT;
',
);
    }

}