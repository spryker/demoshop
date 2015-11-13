<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447326727.
 * Generated on 2015-11-12 11:12:07 by vagrant
 */
class PropelMigration_1447326727
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
     *   the keys being the datasources
     */
    public function getUpSQL()
    {
        return [
  'zed' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `spy_category`

  ADD `category_key` VARCHAR(255) NOT NULL AFTER `id_category`;

  UPDATE `spy_category` SET `category_key`= CONCAT(10010, `spy_category`.`id_category`) where `category_key` = "";

CREATE UNIQUE INDEX `spy_category_u_af1589` ON `spy_category` (`category_key`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
];
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *   the keys being the datasources
     */
    public function getDownSQL()
    {
        return [
  'zed' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP INDEX `spy_category_u_af1589` ON `spy_category`;

ALTER TABLE `spy_category`

  DROP `category_key`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
];
    }

}
