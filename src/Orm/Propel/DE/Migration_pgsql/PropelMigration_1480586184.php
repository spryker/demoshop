<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1480586184.
 * Generated on 2016-12-01 09:56:24 by vagrant
 */
class PropelMigration_1480586184
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

DROP TABLE IF EXISTS "spy_product_to_bundle" CASCADE;

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

CREATE TABLE "spy_product_to_bundle"
(
    "fk_product" INTEGER NOT NULL,
    "fk_related_product" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product","fk_related_product")
);

ALTER TABLE "spy_product_to_bundle" ADD CONSTRAINT "spy_product_to_bundle-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_to_bundle" ADD CONSTRAINT "spy_product_to_bundle-fk_related_product"
    FOREIGN KEY ("fk_related_product")
    REFERENCES "spy_product" ("id_product");

COMMIT;
',
);
    }

}