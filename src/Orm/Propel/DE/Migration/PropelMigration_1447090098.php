<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447090098.
 * Generated on 2015-11-09 17:28:18 by vagrant
 */
class PropelMigration_1447090098
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
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `spy_oms_order_item_state_history`

  DROP `updated_at`;

ALTER TABLE `spy_oms_transition_log`

  CHANGE `params` `params` TEXT,

  CHANGE `error` `is_error` TINYINT(1),

  ADD `quantity` INTEGER AFTER `fk_sales_order`,

  ADD `path` VARCHAR(256) AFTER `hostname`,

  ADD `command` VARCHAR(255) AFTER `target_state`,

  ADD `condition` VARCHAR(255) AFTER `command`,

  DROP `module`,

  DROP `controller`,

  DROP `action`,

  DROP `commands`,

  DROP `conditions`,

  DROP `updated_at`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
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
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `spy_oms_order_item_state_history`

  ADD `updated_at` DATETIME AFTER `created_at`;

ALTER TABLE `spy_oms_transition_log`

  CHANGE `params` `params` TEXT NOT NULL,

  CHANGE `is_error` `error` TINYINT(1),

  ADD `module` VARCHAR(128) NOT NULL AFTER `hostname`,

  ADD `controller` VARCHAR(128) NOT NULL AFTER `module`,

  ADD `action` VARCHAR(128) NOT NULL AFTER `controller`,

  ADD `commands` TEXT AFTER `target_state`,

  ADD `conditions` TEXT AFTER `commands`,

  ADD `updated_at` DATETIME AFTER `created_at`,

  DROP `quantity`,

  DROP `path`,

  DROP `command`,

  DROP `condition`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}
