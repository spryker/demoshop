<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1461942725.
 * Generated on 2016-04-29 15:12:05 by vagrant
 */
class PropelMigration_1461942725
{
    public $comment = '';

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
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
CREATE SEQUENCE "spy_state_machine_transition_log_pk_seq";

CREATE TABLE "spy_state_machine_transition_log"
(
    "id_state_machine_transition_log" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "locked" BOOLEAN,
    "event" VARCHAR(100),
    "hostname" VARCHAR(128) NOT NULL,
    "path" VARCHAR(256),
    "params" TEXT,
    "source_state" VARCHAR(128),
    "target_state" VARCHAR(128),
    "command" VARCHAR,
    "condition" VARCHAR,
    "is_error" BOOLEAN,
    "error_message" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_transition_log")
);

CREATE SEQUENCE "spy_state_machine_process_pk_seq";

CREATE TABLE "spy_state_machine_process"
(
    "id_state_machine_process" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "state_machine_name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_process"),
    CONSTRAINT "spy_state_machine_process-name" UNIQUE ("name","state_machine_name")
);

CREATE INDEX "spy_state_machine_process-state_machine_name" ON "spy_state_machine_process" ("state_machine_name");

CREATE SEQUENCE "spy_state_machine_lock_pk_seq";

CREATE TABLE "spy_state_machine_lock"
(
    "id_state_machine_lock" INTEGER NOT NULL,
    "identifier" VARCHAR(255) NOT NULL,
    "expires" TIMESTAMP NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_lock")
);

CREATE UNIQUE INDEX "spy_state_machine_lock-identifier" ON "spy_state_machine_lock" ("identifier");

CREATE SEQUENCE "spy_state_machine_item_state_pk_seq";

CREATE TABLE "spy_state_machine_item_state"
(
    "id_state_machine_item_state" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(255),
    PRIMARY KEY ("id_state_machine_item_state"),
    CONSTRAINT "spy_state_machine_item_state-name" UNIQUE ("name","fk_state_machine_process")
);

CREATE SEQUENCE "spy_state_machine_item_state_history_pk_seq";

CREATE TABLE "spy_state_machine_item_state_history"
(
    "id_state_machine_item_state_history" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_item_state_history")
);

CREATE INDEX "spy_state_machine_item_state_history-identifier" ON "spy_state_machine_item_state_history" ("identifier");

CREATE SEQUENCE "spy_state_machine_event_timeout_pk_seq";

CREATE TABLE "spy_state_machine_event_timeout"
(
    "id_state_machine_event_timeout" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "timeout" TIMESTAMP NOT NULL,
    "event" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_event_timeout"),
    CONSTRAINT "spy_state_machine_item_state-unique-identifier" UNIQUE ("identifier","fk_state_machine_item_state")
);

CREATE INDEX "spy_state_machine_event_timeout-timeout" ON "spy_state_machine_event_timeout" ("timeout");

CREATE SEQUENCE "pyz_state_machine_example_item_pk_seq";

CREATE TABLE "pyz_state_machine_example_item"
(
    "id_state_machine_example_item" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER,
    "name" VARCHAR,
    PRIMARY KEY ("id_state_machine_example_item")
);

ALTER TABLE "spy_state_machine_transition_log" ADD CONSTRAINT "spy_state_machine_transition_log-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "spy_state_machine_item_state" ADD CONSTRAINT "spy_state_machine_item_state-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "spy_state_machine_item_state_history" ADD CONSTRAINT "spy_state_machine_item_state_h-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");

ALTER TABLE "spy_state_machine_event_timeout" ADD CONSTRAINT "spy_state_machine_event_timeout-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");

ALTER TABLE "spy_state_machine_event_timeout" ADD CONSTRAINT "spy_state_machine_event_timeout-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "pyz_state_machine_example_item" ADD CONSTRAINT "pyz_state_machine_example_item-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");
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
DROP TABLE IF EXISTS "spy_state_machine_transition_log" CASCADE;

DROP SEQUENCE "spy_state_machine_transition_log_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_process" CASCADE;

DROP SEQUENCE "spy_state_machine_process_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_lock" CASCADE;

DROP SEQUENCE "spy_state_machine_lock_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_item_state" CASCADE;

DROP SEQUENCE "spy_state_machine_item_state_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_item_state_history" CASCADE;

DROP SEQUENCE "spy_state_machine_item_state_history_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_event_timeout" CASCADE;

DROP SEQUENCE "spy_state_machine_event_timeout_pk_seq";

DROP TABLE IF EXISTS "pyz_state_machine_example_item" CASCADE;

DROP SEQUENCE "pyz_state_machine_example_item_pk_seq";
',
);
    }

}
