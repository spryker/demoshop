<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1506366715.
 * Generated on 2017-09-25 19:11:55 by vagrant
 */
class PropelMigration_1506366715
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

CREATE SEQUENCE "spy_customer_pricing_factor_pk_seq";

CREATE TABLE "spy_customer_pricing_factor"
(
    "id_customer_pricing_factor" INTEGER NOT NULL,
    "fk_customer" INTEGER NOT NULL,
    "fk_pricing_factor" INTEGER NOT NULL,
    PRIMARY KEY ("id_customer_pricing_factor")
);

CREATE SEQUENCE "spy_pricing_factor_pk_seq";

CREATE TABLE "spy_pricing_factor"
(
    "id_pricing_factor" INTEGER NOT NULL,
    "fk_pricing_factor_type" INTEGER NOT NULL,
    "value" VARCHAR NOT NULL,
    "percentage" NUMERIC NOT NULL,
    PRIMARY KEY ("id_pricing_factor")
);

CREATE SEQUENCE "spy_pricing_factor_type_pk_seq";

CREATE TABLE "spy_pricing_factor_type"
(
    "id_pricing_factor_type" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    PRIMARY KEY ("id_pricing_factor_type")
);

ALTER TABLE "spy_customer_pricing_factor" ADD CONSTRAINT "spy_customer_pricing_factor_fk_29a8ca"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");

ALTER TABLE "spy_customer_pricing_factor" ADD CONSTRAINT "spy_customer_pricing_factor_fk_8ffa48"
    FOREIGN KEY ("fk_pricing_factor")
    REFERENCES "spy_pricing_factor" ("id_pricing_factor");

ALTER TABLE "spy_pricing_factor" ADD CONSTRAINT "spy_pricing_factor_fk_c28357"
    FOREIGN KEY ("fk_pricing_factor_type")
    REFERENCES "spy_pricing_factor_type" ("id_pricing_factor_type");

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

DROP TABLE IF EXISTS "spy_customer_pricing_factor" CASCADE;

DROP SEQUENCE "spy_customer_pricing_factor_pk_seq";

DROP TABLE IF EXISTS "spy_pricing_factor" CASCADE;

DROP SEQUENCE "spy_pricing_factor_pk_seq";

DROP TABLE IF EXISTS "spy_pricing_factor_type" CASCADE;

DROP SEQUENCE "spy_pricing_factor_type_pk_seq";

COMMIT;
',
);
    }

}