<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1424164075.
 * Generated on 2015-02-17 09:07:55 by vagrant
 */
class PropelMigration_1424164075
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

CREATE TABLE `pac_searchable_products`
(
    `searchable_id` VARCHAR(255) NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_locale` INTEGER,
    `is_searchable` TINYINT(1),
    PRIMARY KEY (`searchable_id`),
    INDEX `pac_searchable_products_FI_1` (`fk_product`),
    INDEX `pac_searchable_products_FI_2` (`fk_locale`),
    CONSTRAINT `pac_searchable_products_FK_1`
        FOREIGN KEY (`fk_product`)
        REFERENCES `pac_product` (`product_id`),
    CONSTRAINT `pac_searchable_products_FK_2`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `pac_locale` (`id_locale`)
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

DROP TABLE IF EXISTS `pac_searchable_products`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}