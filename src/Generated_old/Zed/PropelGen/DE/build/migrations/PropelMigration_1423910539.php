<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1423910539.
 * Generated on 2015-02-14 10:42:19 by vagrant
 */
class PropelMigration_1423910539
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

CREATE INDEX `pac_abstract_product_localized_attributes_FI_2` ON `pac_abstract_product_localized_attributes` (`locale_id`);

ALTER TABLE `pac_abstract_product_localized_attributes` ADD CONSTRAINT `pac_abstract_product_localized_attributes_FK_2`
    FOREIGN KEY (`locale_id`)
    REFERENCES `pac_locale` (`id_locale`);

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

ALTER TABLE `pac_abstract_product_localized_attributes` DROP FOREIGN KEY `pac_abstract_product_localized_attributes_FK_2`;

DROP INDEX `pac_abstract_product_localized_attributes_FI_2` ON `pac_abstract_product_localized_attributes`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}