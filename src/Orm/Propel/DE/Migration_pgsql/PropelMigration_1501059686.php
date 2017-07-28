<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1501059686.
 * Generated on 2017-07-26 11:01:26 by daniel
 */
class PropelMigration_1501059686
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

ALTER TABLE "spy_cms_page"

  ADD "page_key" VARCHAR(32);

CREATE INDEX "spy_cms_page_i_615cb5" ON "spy_cms_page" ("page_key");

ALTER TABLE "spy_discount"

  ADD "discount_key" VARCHAR(32);

CREATE INDEX "spy_discount_i_862ce6" ON "spy_discount" ("discount_key");

ALTER TABLE "spy_navigation_node"

  ADD "node_key" VARCHAR(32);

CREATE INDEX "spy_navigation_node_i_576b1b" ON "spy_navigation_node" ("node_key");

ALTER TABLE "spy_product_group"

  ADD "product_group_key" VARCHAR(32);

CREATE INDEX "spy_product_group_i_55ec34" ON "spy_product_group" ("product_group_key");

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

DROP INDEX "spy_cms_page_i_615cb5";

ALTER TABLE "spy_cms_page"

  DROP COLUMN "page_key";

DROP INDEX "spy_discount_i_862ce6";

ALTER TABLE "spy_discount"

  DROP COLUMN "discount_key";

DROP INDEX "spy_navigation_node_i_576b1b";

ALTER TABLE "spy_navigation_node"

  DROP COLUMN "node_key";

DROP INDEX "spy_product_group_i_55ec34";

ALTER TABLE "spy_product_group"

  DROP COLUMN "product_group_key";

COMMIT;
',
);
    }

}