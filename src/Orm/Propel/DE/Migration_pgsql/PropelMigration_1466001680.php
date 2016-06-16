<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1466001680.
 * Generated on 2016-06-15 14:41:20 by vagrant
 */
class PropelMigration_1466001680
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
ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(1024);

ALTER TABLE "spy_tax_rate"

  ADD "fk_country" INTEGER;

ALTER TABLE "spy_tax_rate" ADD CONSTRAINT "spy_tax_rate-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");
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
ALTER TABLE "spy_state_machine_lock"

  ALTER COLUMN "identifier" TYPE VARCHAR(255);

ALTER TABLE "spy_tax_rate" DROP CONSTRAINT "spy_tax_rate-fk_country";

ALTER TABLE "spy_tax_rate"

  DROP COLUMN "fk_country";
',
);
    }

}