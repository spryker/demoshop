<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1506344400.
 * Generated on 2017-09-25 13:00:00 by vagrant
 */
class PropelMigration_1506344400
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

CREATE SEQUENCE "spy_coefficient_pk_seq";

CREATE TABLE "spy_coefficient"
(
    "id_coefficient" INTEGER NOT NULL,
    "fk_coefficient_type" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "value" NUMERIC NOT NULL,
    PRIMARY KEY ("id_coefficient")
);

CREATE SEQUENCE "spy_coefficient_type_pk_seq";

CREATE TABLE "spy_coefficient_type"
(
    "id_coefficient_type" INTEGER NOT NULL,
    "type" VARCHAR NOT NULL,
    PRIMARY KEY ("id_coefficient_type")
);

CREATE SEQUENCE "spy_customer_coefficient_pk_seq";

CREATE TABLE "spy_customer_coefficient"
(
    "id_customer_coefficient" INTEGER NOT NULL,
    "fk_customer" INTEGER NOT NULL,
    "types" VARCHAR NOT NULL,
    "value" NUMERIC NOT NULL,
    PRIMARY KEY ("id_customer_coefficient")
);

ALTER TABLE "spy_coefficient" ADD CONSTRAINT "spy_coefficient_fk_2e2b9f"
    FOREIGN KEY ("fk_coefficient_type")
    REFERENCES "spy_coefficient_type" ("id_coefficient_type");

ALTER TABLE "spy_customer_coefficient" ADD CONSTRAINT "spy_customer_coefficient_fk_29a8ca"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");

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

DROP TABLE IF EXISTS "spy_coefficient" CASCADE;

DROP SEQUENCE "spy_coefficient_pk_seq";

DROP TABLE IF EXISTS "spy_coefficient_type" CASCADE;

DROP SEQUENCE "spy_coefficient_type_pk_seq";

DROP TABLE IF EXISTS "spy_customer_coefficient" CASCADE;

DROP SEQUENCE "spy_customer_coefficient_pk_seq";

COMMIT;
',
);
    }

}