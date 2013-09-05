<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1378113897.
 * Generated on 2013-09-02 09:24:57 by user
 */
class PropelMigration_1378113897
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

DROP TABLE IF EXISTS `sao_sales_drip_mail_general_blacklist`;

DROP TABLE IF EXISTS `sao_sales_drip_mail_order_blacklist`;

DROP TABLE IF EXISTS `sao_sales_drip_mail_order_run`;

DROP TABLE IF EXISTS `sao_sales_order_item_refund`;

ALTER TABLE `pac_misc_country` CHANGE `postal_code_mandatory` `postal_code_madatory` TINYINT(1) DEFAULT 0;

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

ALTER TABLE `pac_misc_country` CHANGE `postal_code_madatory` `postal_code_mandatory` TINYINT(1) DEFAULT 0;

CREATE TABLE `sao_sales_drip_mail_general_blacklist`
(
    `email` VARCHAR(150) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_drip_mail_order_blacklist`
(
    `id_sales_order` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    CONSTRAINT `sao_sales_drip_mail_order_blacklist_FK_1`
        FOREIGN KEY (`id_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_drip_mail_order_run`
(
    `id_sales_order` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    CONSTRAINT `sao_sales_drip_mail_order_run_FK_1`
        FOREIGN KEY (`id_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order_item_refund`
(
    `id_sales_order_item` INTEGER NOT NULL,
    `refund_code` TINYINT NOT NULL,
    `refund_type` TINYINT NOT NULL,
    `amount` INTEGER,
    `comment` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    CONSTRAINT `sao_sales_order_item_refund_FK_1`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `sao_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}