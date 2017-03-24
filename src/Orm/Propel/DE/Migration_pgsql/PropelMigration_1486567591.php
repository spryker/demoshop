<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1486567591.
 * Generated on 2017-02-08 15:26:31 by vagrant
 */
class PropelMigration_1486567591
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

CREATE SEQUENCE "spy_product_relation_type_pk_seq";

CREATE TABLE "spy_product_relation_type"
(
    "id_product_relation_type" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation_type")
);

CREATE SEQUENCE "spy_product_relation_pk_seq";

CREATE TABLE "spy_product_relation"
(
    "id_product_relation" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_product_relation_type" INTEGER NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation")
);

CREATE SEQUENCE "spy_product_rel_prod_abs_type_pk_seq";

CREATE TABLE "spy_product_relation_product_abstract"
(
    "id_product_relation_product_abstract" INTEGER NOT NULL,
    "fk_product_relation" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "order" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation_product_abstract")
);

ALTER TABLE "spy_product_relation"

  ADD "query_set_data" TEXT;
  
ALTER TABLE "spy_product_relation"

  ADD "is_rebuild_scheduled" BOOLEAN DEFAULT \'f\' NOT NULL;

CREATE UNIQUE INDEX "spy_product-relation-unique-fk_product_abstract" ON "spy_product_relation" ("fk_product_abstract","fk_product_relation_type");

ALTER TABLE "spy_product_relation" ADD CONSTRAINT "spy_product-relation-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_relation" ADD CONSTRAINT "spy_product-relation-type-fk_product_abstract"
    FOREIGN KEY ("fk_product_relation_type")
    REFERENCES "spy_product_relation_type" ("id_product_relation_type");

ALTER TABLE "spy_product_relation_product_abstract" ADD CONSTRAINT "spy_product-rel-prod-rel-fk_product_relation"
    FOREIGN KEY ("fk_product_relation")
    REFERENCES "spy_product_relation" ("id_product_relation");

ALTER TABLE "spy_product_relation_product_abstract" ADD CONSTRAINT "spy_product-rel-prod-abs-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

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

DROP TABLE IF EXISTS "spy_product_relation_type" CASCADE;

DROP SEQUENCE "spy_product_relation_type_pk_seq";

DROP TABLE IF EXISTS "spy_product_relation" CASCADE;

DROP SEQUENCE "spy_product_relation_pk_seq";

DROP TABLE IF EXISTS "spy_product_relation_product_abstract" CASCADE;

DROP SEQUENCE "spy_product_rel_prod_abs_type_pk_seq";

ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);

COMMIT;
',
);
    }

}
