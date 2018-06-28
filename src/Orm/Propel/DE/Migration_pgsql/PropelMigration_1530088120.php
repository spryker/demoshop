<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1530088120.
 * Generated on 2018-06-27 08:28:40 by vagrant
 */
class PropelMigration_1530088120
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

CREATE SEQUENCE "spy_shopping_list_pk_seq";

CREATE TABLE "spy_shopping_list"
(
    "id_shopping_list" INTEGER NOT NULL,
    "customer_reference" VARCHAR(255) NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_shopping_list")
);

CREATE SEQUENCE "spy_shopping_list_item_pk_seq";

CREATE TABLE "spy_shopping_list_item"
(
    "id_shopping_list_item" INTEGER NOT NULL,
    "fk_shopping_list" INTEGER NOT NULL,
    "sku" VARCHAR(255),
    "quantity" INTEGER DEFAULT 1 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_shopping_list_item")
);

CREATE SEQUENCE "spy_shopping_list_company_user_pk_seq";

CREATE TABLE "spy_shopping_list_company_user"
(
    "id_shopping_list_company_user" INTEGER NOT NULL,
    "fk_company_user" INTEGER NOT NULL,
    "fk_shopping_list" INTEGER,
    "fk_shopping_list_permission_group" INTEGER NOT NULL,
    PRIMARY KEY ("id_shopping_list_company_user")
);

CREATE SEQUENCE "spy_shopping_list_company_business_unit_pk_seq";

CREATE TABLE "spy_shopping_list_company_business_unit"
(
    "id_shopping_list_company_business_unit" INTEGER NOT NULL,
    "fk_company_business_unit" INTEGER NOT NULL,
    "fk_shopping_list" INTEGER NOT NULL,
    "fk_shopping_list_permission_group" INTEGER NOT NULL,
    PRIMARY KEY ("id_shopping_list_company_business_unit")
);

CREATE SEQUENCE "spy_shopping_list_permission_group_pk_seq";

CREATE TABLE "spy_shopping_list_permission_group"
(
    "id_shopping_list_permission_group" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_shopping_list_permission_group")
);

CREATE SEQUENCE "spy_shopping_list_permission_group_to_permission_pk_seq";

CREATE TABLE "spy_shopping_list_permission_group_to_permission"
(
    "id_shopping_list_permission_group_to_permission" INTEGER NOT NULL,
    "fk_shopping_list_permission_group" INTEGER NOT NULL,
    "fk_permission" INTEGER NOT NULL,
    PRIMARY KEY ("id_shopping_list_permission_group_to_permission")
);

ALTER TABLE "spy_shopping_list_item" ADD CONSTRAINT "spy_shopping_list_item-fk_shopping_list"
    FOREIGN KEY ("fk_shopping_list")
    REFERENCES "spy_shopping_list" ("id_shopping_list");

ALTER TABLE "spy_shopping_list_company_user" ADD CONSTRAINT "spy_shopping_list_company_user-fk_company_user"
    FOREIGN KEY ("fk_company_user")
    REFERENCES "spy_company_user" ("id_company_user");

ALTER TABLE "spy_shopping_list_company_user" ADD CONSTRAINT "spy_shopping_list_company_user-fk_shopping_list"
    FOREIGN KEY ("fk_shopping_list")
    REFERENCES "spy_shopping_list" ("id_shopping_list");

ALTER TABLE "spy_shopping_list_company_user" ADD CONSTRAINT "spy_shopping_list_company_user-fk_shopping_list_perm_grp"
    FOREIGN KEY ("fk_shopping_list_permission_group")
    REFERENCES "spy_shopping_list_permission_group" ("id_shopping_list_permission_group");

ALTER TABLE "spy_shopping_list_company_business_unit" ADD CONSTRAINT "spy_shopping_list_business_unit-fk_company_business_unit"
    FOREIGN KEY ("fk_company_business_unit")
    REFERENCES "spy_company_business_unit" ("id_company_business_unit");

ALTER TABLE "spy_shopping_list_company_business_unit" ADD CONSTRAINT "spy_shopping_list_company_business_unit-fk_shopping_list"
    FOREIGN KEY ("fk_shopping_list")
    REFERENCES "spy_shopping_list" ("id_shopping_list");

ALTER TABLE "spy_shopping_list_company_business_unit" ADD CONSTRAINT "spy_shopping_list_business_unit-fk_shopping_list_perm_group"
    FOREIGN KEY ("fk_shopping_list_permission_group")
    REFERENCES "spy_shopping_list_permission_group" ("id_shopping_list_permission_group");

ALTER TABLE "spy_shopping_list_permission_group_to_permission" ADD CONSTRAINT "spy_shopping_list_perm_grp_to_perm-fk_shopping_list_perm_grp"
    FOREIGN KEY ("fk_shopping_list_permission_group")
    REFERENCES "spy_shopping_list_permission_group" ("id_shopping_list_permission_group");

ALTER TABLE "spy_shopping_list_permission_group_to_permission" ADD CONSTRAINT "spy_shopping_list_permission_group_to_permission-fk_permission"
    FOREIGN KEY ("fk_permission")
    REFERENCES "spy_permission" ("id_permission");

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

DROP TABLE IF EXISTS "spy_shopping_list" CASCADE;

DROP SEQUENCE "spy_shopping_list_pk_seq";

DROP TABLE IF EXISTS "spy_shopping_list_item" CASCADE;

DROP SEQUENCE "spy_shopping_list_item_pk_seq";

DROP TABLE IF EXISTS "spy_shopping_list_company_user" CASCADE;

DROP SEQUENCE "spy_shopping_list_company_user_pk_seq";

DROP TABLE IF EXISTS "spy_shopping_list_company_business_unit" CASCADE;

DROP SEQUENCE "spy_shopping_list_company_business_unit_pk_seq";

DROP TABLE IF EXISTS "spy_shopping_list_permission_group" CASCADE;

DROP SEQUENCE "spy_shopping_list_permission_group_pk_seq";

DROP TABLE IF EXISTS "spy_shopping_list_permission_group_to_permission" CASCADE;

DROP SEQUENCE "spy_shopping_list_permission_group_to_permission_pk_seq";

COMMIT;
',
);
    }

}