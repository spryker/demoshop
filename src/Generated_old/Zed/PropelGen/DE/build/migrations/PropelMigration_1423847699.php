<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1423847699.
 * Generated on 2015-02-13 17:14:59 by vagrant
 */
class PropelMigration_1423847699
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

DROP INDEX `pac_abstract_product_localized_attributes_U_1` ON `pac_abstract_product_localized_attributes`;

ALTER TABLE `pac_abstract_product_localized_attributes`
    ADD `locale_id` INTEGER NOT NULL AFTER `abstract_product_id`;

ALTER TABLE `pac_abstract_product_localized_attributes` DROP `locale`;

CREATE UNIQUE INDEX `pac_abstract_product_localized_attributes_U_1` ON `pac_abstract_product_localized_attributes` (`abstract_product_id`,`locale_id`);

DROP INDEX `pac_attribute_type_value_U_1` ON `pac_attribute_type_value`;

ALTER TABLE `pac_attribute_type_value`
    ADD `locale_id` INTEGER AFTER `value`;

ALTER TABLE `pac_attribute_type_value` DROP `locale`;

CREATE UNIQUE INDEX `pac_attribute_type_value_U_1` ON `pac_attribute_type_value` (`locale_id`,`type_id`,`key`);

ALTER TABLE `pac_attribute_type_value` ADD CONSTRAINT `pac_attribute_type_value_FK_1`
    FOREIGN KEY (`locale_id`)
    REFERENCES `pac_locale` (`id_locale`);

ALTER TABLE `pac_category_tree_attribute` DROP FOREIGN KEY `pac_category_tree_attribute_FK_1`;

DROP INDEX `pac_category_tree_attribute_I_1` ON `pac_category_tree_attribute`;

DROP INDEX `pac_category_tree_attribute_FI_1` ON `pac_category_tree_attribute`;

ALTER TABLE `pac_category_tree_attribute`
    ADD `locale_id` INTEGER(5) NOT NULL AFTER `name`;

ALTER TABLE `pac_category_tree_attribute` DROP `locale`;

CREATE INDEX `pac_category_tree_attribute_FI_1` ON `pac_category_tree_attribute` (`locale_id`);

CREATE INDEX `pac_category_tree_attribute_FI_2` ON `pac_category_tree_attribute` (`fk_category`);

ALTER TABLE `pac_category_tree_attribute` ADD CONSTRAINT `pac_category_tree_attribute_FK_1`
    FOREIGN KEY (`locale_id`)
    REFERENCES `pac_locale` (`id_locale`);

DROP INDEX `pac_product_localized_attributes_U_1` ON `pac_product_localized_attributes`;

ALTER TABLE `pac_product_localized_attributes`
    ADD `locale_id` INTEGER NOT NULL AFTER `product_id`;

ALTER TABLE `pac_product_localized_attributes` DROP `locale`;

CREATE UNIQUE INDEX `pac_product_localized_attributes_U_1` ON `pac_product_localized_attributes` (`product_id`,`locale_id`);

CREATE INDEX `pac_product_localized_attributes_FI_3` ON `pac_product_localized_attributes` (`locale_id`);

ALTER TABLE `pac_product_localized_attributes` ADD CONSTRAINT `pac_product_localized_attributes_FK_3`
    FOREIGN KEY (`locale_id`)
    REFERENCES `pac_locale` (`id_locale`);

ALTER TABLE `pac_stock_product` DROP FOREIGN KEY `pac_stock_product_FK_1`;

DROP INDEX `pac_stock_product_FI_1` ON `pac_stock_product`;

DROP INDEX `pac_stock_product_U_1` ON `pac_stock_product`;

ALTER TABLE `pac_stock_product` CHANGE `fk_product_id` `fk_product` INTEGER NOT NULL;

CREATE INDEX `pac_stock_product_FI_1` ON `pac_stock_product` (`fk_product`);

CREATE UNIQUE INDEX `pac_stock_product_U_1` ON `pac_stock_product` (`fk_stock`,`fk_product`);

ALTER TABLE `pac_stock_product` ADD CONSTRAINT `pac_stock_product_FK_1`
    FOREIGN KEY (`fk_product`)
    REFERENCES `pac_product` (`product_id`);

ALTER TABLE `pac_tax`
    ADD `locale_id` INTEGER NOT NULL AFTER `rate`;

ALTER TABLE `pac_tax` DROP `locale`;

CREATE INDEX `pac_tax_FI_1` ON `pac_tax` (`locale_id`);

ALTER TABLE `pac_tax` ADD CONSTRAINT `pac_tax_FK_1`
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

DROP INDEX `pac_abstract_product_localized_attributes_U_1` ON `pac_abstract_product_localized_attributes`;

ALTER TABLE `pac_abstract_product_localized_attributes`
    ADD `locale` VARCHAR(5) NOT NULL AFTER `abstract_product_id`;

ALTER TABLE `pac_abstract_product_localized_attributes` DROP `locale_id`;

CREATE UNIQUE INDEX `pac_abstract_product_localized_attributes_U_1` ON `pac_abstract_product_localized_attributes` (`abstract_product_id`,`locale`);

ALTER TABLE `pac_attribute_type_value` DROP FOREIGN KEY `pac_attribute_type_value_FK_1`;

DROP INDEX `pac_attribute_type_value_U_1` ON `pac_attribute_type_value`;

ALTER TABLE `pac_attribute_type_value`
    ADD `locale` VARCHAR(5) AFTER `value`;

ALTER TABLE `pac_attribute_type_value` DROP `locale_id`;

CREATE UNIQUE INDEX `pac_attribute_type_value_U_1` ON `pac_attribute_type_value` (`locale`,`type_id`,`key`);

ALTER TABLE `pac_category_tree_attribute` DROP FOREIGN KEY `pac_category_tree_attribute_FK_1`;

DROP INDEX `pac_category_tree_attribute_FI_2` ON `pac_category_tree_attribute`;

DROP INDEX `pac_category_tree_attribute_FI_1` ON `pac_category_tree_attribute`;

ALTER TABLE `pac_category_tree_attribute`
    ADD `locale` VARCHAR(5) NOT NULL AFTER `name`;

ALTER TABLE `pac_category_tree_attribute` DROP `locale_id`;

CREATE INDEX `pac_category_tree_attribute_FI_1` ON `pac_category_tree_attribute` (`fk_category`);

CREATE INDEX `pac_category_tree_attribute_I_1` ON `pac_category_tree_attribute` (`locale`);

ALTER TABLE `pac_category_tree_attribute` ADD CONSTRAINT `pac_category_tree_attribute_FK_1`
    FOREIGN KEY (`fk_category`)
    REFERENCES `pac_category_tree` (`id_category`);

ALTER TABLE `pac_product_localized_attributes` DROP FOREIGN KEY `pac_product_localized_attributes_FK_3`;

DROP INDEX `pac_product_localized_attributes_FI_3` ON `pac_product_localized_attributes`;

DROP INDEX `pac_product_localized_attributes_U_1` ON `pac_product_localized_attributes`;

ALTER TABLE `pac_product_localized_attributes`
    ADD `locale` VARCHAR(5) NOT NULL AFTER `product_id`;

ALTER TABLE `pac_product_localized_attributes` DROP `locale_id`;

CREATE UNIQUE INDEX `pac_product_localized_attributes_U_1` ON `pac_product_localized_attributes` (`product_id`,`locale`);

ALTER TABLE `pac_stock_product` DROP FOREIGN KEY `pac_stock_product_FK_1`;

DROP INDEX `pac_stock_product_FI_1` ON `pac_stock_product`;

DROP INDEX `pac_stock_product_U_1` ON `pac_stock_product`;

ALTER TABLE `pac_stock_product` CHANGE `fk_product` `fk_product_id` INTEGER NOT NULL;

CREATE INDEX `pac_stock_product_FI_1` ON `pac_stock_product` (`fk_product_id`);

CREATE UNIQUE INDEX `pac_stock_product_U_1` ON `pac_stock_product` (`fk_stock`,`fk_product_id`);

ALTER TABLE `pac_stock_product` ADD CONSTRAINT `pac_stock_product_FK_1`
    FOREIGN KEY (`fk_product_id`)
    REFERENCES `pac_product` (`product_id`);

ALTER TABLE `pac_tax` DROP FOREIGN KEY `pac_tax_FK_1`;

DROP INDEX `pac_tax_FI_1` ON `pac_tax`;

ALTER TABLE `pac_tax`
    ADD `locale` VARCHAR(5) NOT NULL AFTER `rate`;

ALTER TABLE `pac_tax` DROP `locale_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}