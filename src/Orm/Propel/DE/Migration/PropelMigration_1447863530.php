<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447863530.
 * Generated on 2015-11-18 16:18:50 by vagrant
 */
class PropelMigration_1447863530
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

CREATE TABLE `spy_product_country`
(
    `id_product_country` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER NOT NULL,
    `fk_country` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_country`),
    INDEX `spy_product_country_fi_28d90b` (`fk_country`),
    INDEX `spy_product_country_fi_865cc9` (`fk_product`),
    CONSTRAINT `spy_product_country_fk_28d90b`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_product_country_fk_865cc9`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

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

DROP TABLE IF EXISTS `spy_product_country`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
];
    }

}
