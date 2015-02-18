<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1423655186.
 * Generated on 2015-02-11 11:46:26 by vagrant
 */
class PropelMigration_1423655186
{

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

DROP TABLE IF EXISTS `pac_yves_export_touch`;

CREATE TABLE `pac_frontend_exporter_touch`
(
    `id_frontend_exporter_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `export_type` TINYINT DEFAULT 1 NOT NULL,
    `item_id` VARCHAR(255) NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_frontend_exporter_touch`),
    UNIQUE INDEX `pac_frontend_exporter_touch_U_1` (`item_id`, `item_type`, `item_event`, `export_type`),
    INDEX `pac_frontend_exporter_touch_I_1` (`touched`),
    INDEX `pac_frontend_exporter_touch_I_2` (`item_id`),
    INDEX `pac_frontend_exporter_touch_I_3` (`item_type`),
    INDEX `pac_frontend_exporter_touch_I_4` (`item_event`)
) ENGINE=InnoDB;

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

DROP TABLE IF EXISTS `pac_frontend_exporter_touch`;

CREATE TABLE `pac_yves_export_touch`
(
    `id_yves_export_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `export_type` TINYINT DEFAULT 1 NOT NULL,
    `item_id` VARCHAR(255) NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_yves_export_touch`),
    UNIQUE INDEX `pac_yves_export_touch_U_1` (`item_id`(255), `item_type`(255), `item_event`, `export_type`),
    INDEX `pac_yves_export_touch_I_1` (`touched`),
    INDEX `pac_yves_export_touch_I_2` (`item_id`(255)),
    INDEX `pac_yves_export_touch_I_3` (`item_type`(255)),
    INDEX `pac_yves_export_touch_I_4` (`item_event`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}