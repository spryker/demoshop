<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1490339794.
 * Generated on 2017-03-24 07:16:34 by vagrant
 */
class PropelMigration_1490339794
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

CREATE SEQUENCE "spy_navigation_pk_seq";

CREATE TABLE "spy_navigation"
(
    "id_navigation" INTEGER NOT NULL,
    "key" VARCHAR(255) NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_navigation"),
    CONSTRAINT "spy_navigation_key-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_navigation-index-key" ON "spy_navigation" ("key");

CREATE INDEX "spy_navigation-index-is_active" ON "spy_navigation" ("is_active");

CREATE SEQUENCE "spy_navigation_node_pk_seq";

CREATE TABLE "spy_navigation_node"
(
    "id_navigation_node" INTEGER NOT NULL,
    "fk_navigation" INTEGER NOT NULL,
    "fk_parent_navigation_node" INTEGER,
    "node_type" VARCHAR(255),
    "position" INTEGER,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    PRIMARY KEY ("id_navigation_node")
);

CREATE INDEX "spy_navigation_node_i_ba7161" ON "spy_navigation_node" ("position");

CREATE SEQUENCE "spy_navigation_node_localized_attributes_pk_seq";

CREATE TABLE "spy_navigation_node_localized_attributes"
(
    "id_navigation_node_localized_attributes" INTEGER NOT NULL,
    "fk_navigation_node" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_url" INTEGER,
    "title" VARCHAR(255) NOT NULL,
    "link" VARCHAR(255),
    "external_url" VARCHAR(255),
    "css_class" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_navigation_node_localized_attributes")
);

CREATE SEQUENCE "spy_queue_process_pk_seq";

CREATE TABLE "spy_queue_process"
(
    "id_queue_process" INTEGER NOT NULL,
    "server_id" VARCHAR(255) NOT NULL,
    "process_pid" INTEGER NOT NULL,
    "worker_pid" INTEGER NOT NULL,
    "queue_name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_queue_process"),
    CONSTRAINT "spy_queue_process-unique-key" UNIQUE ("server_id","process_pid","queue_name")
);

CREATE INDEX "spy_queue_process-index-key" ON "spy_queue_process" ("server_id","queue_name");

ALTER TABLE "spy_navigation_node" ADD CONSTRAINT "spy_navigation_node_fk_07636b"
    FOREIGN KEY ("fk_parent_navigation_node")
    REFERENCES "spy_navigation_node" ("id_navigation_node")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node" ADD CONSTRAINT "spy_navigation_node_fk_6f985c"
    FOREIGN KEY ("fk_navigation")
    REFERENCES "spy_navigation" ("id_navigation")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_43843f"
    FOREIGN KEY ("fk_navigation_node")
    REFERENCES "spy_navigation_node" ("id_navigation_node")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_12b6d0"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_76593a"
    FOREIGN KEY ("fk_url")
    REFERENCES "spy_url" ("id_url");

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

DROP TABLE IF EXISTS "spy_navigation" CASCADE;

DROP SEQUENCE "spy_navigation_pk_seq";

DROP TABLE IF EXISTS "spy_navigation_node" CASCADE;

DROP SEQUENCE "spy_navigation_node_pk_seq";

DROP TABLE IF EXISTS "spy_navigation_node_localized_attributes" CASCADE;

DROP SEQUENCE "spy_navigation_node_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_queue_process" CASCADE;

DROP SEQUENCE "spy_queue_process_pk_seq";

COMMIT;
',
);
    }

}