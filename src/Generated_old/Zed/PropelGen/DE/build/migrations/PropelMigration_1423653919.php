<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1423653919.
 * Generated on 2015-02-11 11:25:19 by vagrant
 */
class PropelMigration_1423653919
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

CREATE TABLE `pac_customer2`
(
    `id_customer` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `increment_id` VARCHAR(45),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `company` VARCHAR(100),
    `gender` TINYINT,
    `date_of_birth` DATE,
    `password` VARCHAR(255) NOT NULL,
    `restore_password_key` VARCHAR(150),
    `restore_password_date` DATETIME,
    `registered` DATE,
    `registration_key` VARCHAR(150),
    `default_billing_address` INTEGER,
    `default_shipping_address` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer`),
    UNIQUE INDEX `pac_customer2_U_1` (`email`),
    UNIQUE INDEX `pac_customer2_U_2` (`increment_id`),
    INDEX `pac_customer2_FI_1` (`default_billing_address`),
    INDEX `pac_customer2_FI_2` (`default_shipping_address`),
    CONSTRAINT `pac_customer2_FK_1`
        FOREIGN KEY (`default_billing_address`)
        REFERENCES `pac_customer2_address` (`id_customer_address`),
    CONSTRAINT `pac_customer2_FK_2`
        FOREIGN KEY (`default_shipping_address`)
        REFERENCES `pac_customer2_address` (`id_customer_address`)
) ENGINE=InnoDB;

CREATE TABLE `pac_customer2_address`
(
    `id_customer_address` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER NOT NULL,
    `fk_misc_country` INTEGER NOT NULL,
    `fk_misc_region` INTEGER,
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255) NOT NULL,
    `address2` VARCHAR(255),
    `address3` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `comment` VARCHAR(255),
    `is_deleted` SMALLINT DEFAULT 0 NOT NULL,
    `deleted_at` DATETIME,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_address`),
    INDEX `pac_customer2_address_I_1` (`fk_customer`),
    INDEX `pac_customer2_address_FI_2` (`fk_misc_country`),
    INDEX `pac_customer2_address_FI_3` (`fk_misc_region`),
    CONSTRAINT `pac_customer2_address_FK_1`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer2` (`id_customer`),
    CONSTRAINT `pac_customer2_address_FK_2`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `pac_customer2_address_FK_3`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `pac_misc_region` (`id_misc_region`)
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

DROP TABLE IF EXISTS `pac_customer2`;

DROP TABLE IF EXISTS `pac_customer2_address`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}