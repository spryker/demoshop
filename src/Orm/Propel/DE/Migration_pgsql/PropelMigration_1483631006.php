<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1483631006.
 * Generated on 2017-01-05 15:43:26 by vagrant
 */
class PropelMigration_1483631006
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

CREATE SEQUENCE "spy_cms_page_localized_attributes_pk_seq";

CREATE TABLE "spy_cms_page_localized_attributes"
(
    "id_cms_page_localized_attributes" INTEGER NOT NULL,
    "fk_cms_page" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "meta_title" VARCHAR(255),
    "meta_keywords" TEXT,
    "meta_description" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_page_localized_attributes"),
    CONSTRAINT "spy_cms_page_localized_attributes-unique-fk_cms_page" UNIQUE ("fk_cms_page","fk_locale")
);

ALTER TABLE "spy_cms_page"

  ADD "is_searchable" BOOLEAN DEFAULT \'f\' NOT NULL;

ALTER TABLE "spy_cms_page_localized_attributes" ADD CONSTRAINT "spy_cms_page_localized_attributes-fk_cms_page"
    FOREIGN KEY ("fk_cms_page")
    REFERENCES "spy_cms_page" ("id_cms_page")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_page_localized_attributes" ADD CONSTRAINT "spy_cms_page_localized_attributes-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

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

DROP TABLE IF EXISTS "spy_cms_page_localized_attributes" CASCADE;

DROP SEQUENCE "spy_cms_page_localized_attributes_pk_seq";

ALTER TABLE "spy_cms_page"

  DROP COLUMN "is_searchable";

COMMIT;
',
);
    }

}