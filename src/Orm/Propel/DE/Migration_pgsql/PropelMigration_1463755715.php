<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1463755715.
 * Generated on 2016-05-20 14:48:35 by vagrant
 */
class PropelMigration_1463755715
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
CREATE SEQUENCE "spy_oms_state_machine_lock_pk_seq";

CREATE TABLE "spy_oms_state_machine_lock"
(
    "id_oms_state_machine_lock" INTEGER NOT NULL,
    "identifier" VARCHAR(255) NOT NULL,
    "expires" TIMESTAMP NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_state_machine_lock")
);

CREATE INDEX "spy_oms_state_machine_lock-identifier" ON "spy_oms_state_machine_lock" ("identifier");
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
DROP TABLE IF EXISTS "spy_oms_state_machine_lock" CASCADE;

DROP SEQUENCE "spy_oms_state_machine_lock_pk_seq";
',
);
    }

}