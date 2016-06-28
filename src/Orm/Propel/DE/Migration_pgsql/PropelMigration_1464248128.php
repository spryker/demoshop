<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1464248128.
 * Generated on 2016-05-26 07:35:28 by vagrant
 */
class PropelMigration_1464248128
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
DROP INDEX "spy_oms_state_machine_lock-identifier";

CREATE UNIQUE INDEX "spy_oms_state_machine_lock-identifier" ON "spy_oms_state_machine_lock" ("identifier");
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
    ALTER TABLE "spy_oms_state_machine_lock" DROP CONSTRAINT "spy_oms_state_machine_lock-identifier";
    
CREATE INDEX "spy_oms_state_machine_lock-identifier" ON "spy_oms_state_machine_lock" ("identifier");
',
);
    }

}