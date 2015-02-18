<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1423653393.
 * Generated on 2015-02-11 11:16:33 by vagrant
 */
class PropelMigration_1423653393
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

CREATE TABLE `pac_acl_role`
(
    `id_acl_role` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_deletable` TINYINT(1) DEFAULT 1 NOT NULL,
    `is_admin` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    UNIQUE INDEX `pac_acl_role_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_user`
(
    `id_acl_user` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_role` INTEGER NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `restore_password_key` VARCHAR(255),
    `last_login` DATETIME,
    `failed_logins` INTEGER,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_default` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_new` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_user`),
    UNIQUE INDEX `pac_acl_user_U_1` (`username`),
    UNIQUE INDEX `pac_acl_user_U_2` (`email`),
    INDEX `pac_acl_user_FI_1` (`fk_acl_role`),
    CONSTRAINT `pac_acl_user_FK_1`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `pac_acl_role` (`id_acl_role`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_resource`
(
    `id_acl_resource` INTEGER NOT NULL AUTO_INCREMENT,
    `pattern` VARCHAR(255) NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    `black_list` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_resource`),
    INDEX `pac_acl_resource_FI_1` (`fk_acl_group`),
    CONSTRAINT `pac_acl_resource_FK_1`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `pac_acl_group` (`id_acl_group`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_group_privilege`
(
    `id_acl_group_privilege` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_role` INTEGER NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_acl_group_privilege`),
    INDEX `pac_acl_group_privilege_FI_1` (`fk_acl_role`),
    INDEX `pac_acl_group_privilege_FI_2` (`fk_acl_group`),
    CONSTRAINT `pac_acl_group_privilege_FK_1`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `pac_acl_role` (`id_acl_role`),
    CONSTRAINT `pac_acl_group_privilege_FK_2`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `pac_acl_group` (`id_acl_group`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_group`
(
    `id_acl_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_group`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cart`
(
    `id_cart` INTEGER NOT NULL AUTO_INCREMENT,
    `cart_hash` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cart`),
    INDEX `pac_cart_I_1` (`cart_hash`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cart_item`
(
    `id_cart_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cart` INTEGER NOT NULL,
    `unique_identifier` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `quantity` INTEGER DEFAULT 0,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `delete_cause` TINYINT DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cart_item`),
    INDEX `pac_cart_item_FI_1` (`fk_cart`),
    CONSTRAINT `pac_cart_item_FK_1`
        FOREIGN KEY (`fk_cart`)
        REFERENCES `pac_cart` (`id_cart`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cart_item_option`
(
    `id_cart_item_option` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cart_item` INTEGER NOT NULL,
    `identifier` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cart_item_option`),
    INDEX `pac_cart_item_option_FI_1` (`fk_cart_item`),
    CONSTRAINT `pac_cart_item_option_FK_1`
        FOREIGN KEY (`fk_cart_item`)
        REFERENCES `pac_cart_item` (`id_cart_item`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_cart_user`
(
    `id_cart_user` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cart` INTEGER NOT NULL,
    `fk_customer` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cart_user`),
    INDEX `pac_cart_user_FI_1` (`fk_cart`),
    INDEX `pac_cart_user_FI_2` (`fk_customer`),
    CONSTRAINT `pac_cart_user_FK_1`
        FOREIGN KEY (`fk_cart`)
        REFERENCES `pac_cart` (`id_cart`),
    CONSTRAINT `pac_cart_user_FK_2`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cart_user_step`
(
    `id_cart_user_step` INTEGER NOT NULL,
    `step` VARCHAR(30) NOT NULL COMMENT \'Explicit no FK to step table. As so you will be able to use other step tools later.\',
    `current_position` INTEGER DEFAULT 1,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cart_user_step`),
    INDEX `pac_cart_user_step_I_1` (`step`),
    CONSTRAINT `pac_cart_user_step_FK_1`
        FOREIGN KEY (`id_cart_user_step`)
        REFERENCES `pac_cart_user` (`id_cart_user`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product`
(
    `id_catalog_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `is_item` TINYINT(1) NOT NULL,
    `status` ENUM(\'new\',\'approved\',\'changed\',\'deleted\') DEFAULT \'new\' NOT NULL,
    `variety` ENUM(\'Single\',\'Config\',\'Simple\',\'Bundle\') NOT NULL,
    `fk_catalog_attribute_set` INTEGER NOT NULL,
    `cache` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_product`),
    UNIQUE INDEX `pac_catalog_product_U_1` (`sku`),
    INDEX `pac_catalog_product_FI_1` (`fk_catalog_attribute_set`),
    CONSTRAINT `pac_catalog_product_FK_1`
        FOREIGN KEY (`fk_catalog_attribute_set`)
        REFERENCES `pac_catalog_attribute_set` (`id_catalog_attribute_set`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_bundle`
(
    `id_catalog_product` INTEGER NOT NULL,
    `bundle_type` ENUM(\'NonSplitBundle\',\'SplitBundle\') NOT NULL,
    PRIMARY KEY (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_bundle_FK_1`
        FOREIGN KEY (`id_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_bundle_product`
(
    `id_catalog_product_bundle_product` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_product_bundle` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product_bundle_product`),
    UNIQUE INDEX `pac_catalog_product_bundle_product_U_1` (`fk_catalog_product_bundle`, `fk_catalog_product`),
    INDEX `pac_catalog_product_bundle_product_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_product_bundle_product_FK_1`
        FOREIGN KEY (`fk_catalog_product_bundle`)
        REFERENCES `pac_catalog_product_bundle` (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_bundle_product_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_single`
(
    `id_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_single_FK_1`
        FOREIGN KEY (`id_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_config`
(
    `id_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_config_FK_1`
        FOREIGN KEY (`id_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_simple`
(
    `id_catalog_product` INTEGER NOT NULL,
    `fk_catalog_product_config` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product`),
    INDEX `pac_catalog_product_simple_FI_2` (`fk_catalog_product_config`),
    CONSTRAINT `pac_catalog_product_simple_FK_1`
        FOREIGN KEY (`id_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_simple_FK_2`
        FOREIGN KEY (`fk_catalog_product_config`)
        REFERENCES `pac_catalog_product_config` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_attribute_set`
(
    `id_catalog_attribute_set` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_catalog_attribute_set`),
    UNIQUE INDEX `pac_catalog_attribute_set_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_attribute`
(
    `id_catalog_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_catalog_attribute`),
    UNIQUE INDEX `pac_catalog_attribute_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_group`
(
    `id_catalog_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_catalog_group`),
    UNIQUE INDEX `pac_catalog_group_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_type`
(
    `id_catalog_value_type` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_attribute_set` INTEGER NOT NULL,
    `variety` ENUM(\'Text\',\'Integer\',\'Boolean\',\'OptionSingle\',\'OptionMulti\',\'Decimal\',\'Timestamp\') NOT NULL,
    PRIMARY KEY (`id_catalog_value_type`),
    UNIQUE INDEX `pac_catalog_value_type_U_1` (`fk_catalog_attribute`, `fk_catalog_attribute_set`),
    INDEX `pac_catalog_value_type_FI_2` (`fk_catalog_attribute_set`),
    CONSTRAINT `pac_catalog_value_type_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_type_FK_2`
        FOREIGN KEY (`fk_catalog_attribute_set`)
        REFERENCES `pac_catalog_attribute_set` (`id_catalog_attribute_set`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_attribute_group`
(
    `id_catalog_attribute_group` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_group` INTEGER NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_attribute_group`),
    UNIQUE INDEX `pac_catalog_attribute_group_U_1` (`fk_catalog_group`, `fk_catalog_attribute`),
    INDEX `pac_catalog_attribute_group_FI_2` (`fk_catalog_attribute`),
    CONSTRAINT `pac_catalog_attribute_group_FK_1`
        FOREIGN KEY (`fk_catalog_group`)
        REFERENCES `pac_catalog_group` (`id_catalog_group`)
        ON DELETE CASCADE,
    CONSTRAINT `pac_catalog_attribute_group_FK_2`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_attribute_set_group`
(
    `id_catalog_attribute_set_group` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_group` INTEGER NOT NULL,
    `fk_catalog_value_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_attribute_set_group`),
    UNIQUE INDEX `pac_catalog_attribute_set_group_U_1` (`fk_catalog_group`, `fk_catalog_value_type`),
    INDEX `pac_catalog_attribute_set_group_FI_2` (`fk_catalog_value_type`),
    CONSTRAINT `pac_catalog_attribute_set_group_FK_1`
        FOREIGN KEY (`fk_catalog_group`)
        REFERENCES `pac_catalog_group` (`id_catalog_group`)
        ON DELETE CASCADE,
    CONSTRAINT `pac_catalog_attribute_set_group_FK_2`
        FOREIGN KEY (`fk_catalog_value_type`)
        REFERENCES `pac_catalog_value_type` (`id_catalog_value_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_option`
(
    `id_catalog_value_option` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_catalog_value_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_option`),
    UNIQUE INDEX `pac_catalog_value_option_U_1` (`fk_catalog_value_type`, `name`),
    CONSTRAINT `pac_catalog_value_option_FK_1`
        FOREIGN KEY (`fk_catalog_value_type`)
        REFERENCES `pac_catalog_value_type` (`id_catalog_value_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_option_multi`
(
    `id_catalog_value_option_multi` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_value_option` INTEGER NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_option_multi`),
    UNIQUE INDEX `pac_catalog_value_option_multi_U_1` (`fk_catalog_product`, `fk_catalog_attribute`, `fk_catalog_value_option`),
    INDEX `pac_catalog_value_option_multi_FI_1` (`fk_catalog_value_option`),
    INDEX `pac_catalog_value_option_multi_FI_2` (`fk_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_option_multi_FK_1`
        FOREIGN KEY (`fk_catalog_value_option`)
        REFERENCES `pac_catalog_value_option` (`id_catalog_value_option`),
    CONSTRAINT `pac_catalog_value_option_multi_FK_2`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_option_multi_FK_3`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_option_single`
(
    `id_catalog_value_option_single` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_value_option` INTEGER NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_option_single`),
    UNIQUE INDEX `pac_catalog_value_option_single_U_1` (`fk_catalog_product`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_option_single_FI_1` (`fk_catalog_value_option`),
    INDEX `pac_catalog_value_option_single_FI_2` (`fk_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_option_single_FK_1`
        FOREIGN KEY (`fk_catalog_value_option`)
        REFERENCES `pac_catalog_value_option` (`id_catalog_value_option`),
    CONSTRAINT `pac_catalog_value_option_single_FK_2`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_option_single_FK_3`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_integer`
(
    `id_catalog_value_integer` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `value` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_integer`),
    UNIQUE INDEX `pac_catalog_value_integer_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_integer_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_integer_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_integer_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_integer_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_timestamp`
(
    `id_catalog_value_timestamp` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `value` DATETIME NOT NULL,
    PRIMARY KEY (`id_catalog_value_timestamp`),
    UNIQUE INDEX `pac_catalog_value_timestamp_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_timestamp_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_timestamp_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_timestamp_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_timestamp_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_decimal`
(
    `id_catalog_value_decimal` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `value` DECIMAL(15,5) NOT NULL,
    PRIMARY KEY (`id_catalog_value_decimal`),
    UNIQUE INDEX `pac_catalog_value_decimal_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_decimal_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_decimal_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_decimal_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_decimal_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_text`
(
    `id_catalog_value_text` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    PRIMARY KEY (`id_catalog_value_text`),
    UNIQUE INDEX `pac_catalog_value_text_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_text_I_1` (`fk_catalog_attribute`),
    INDEX `pac_catalog_value_text_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_text_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_text_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_boolean`
(
    `id_catalog_value_boolean` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `value` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id_catalog_value_boolean`),
    UNIQUE INDEX `pac_catalog_value_boolean_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_boolean_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_boolean_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_boolean_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_boolean_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_category`
(
    `id_catalog_product_category` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_category_name` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product_category`),
    UNIQUE INDEX `pac_catalog_product_category_U_1` (`fk_catalog_product`, `fk_category_name`),
    CONSTRAINT `pac_catalog_product_category_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_option`
(
    `id_catalog_option` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_option_type` INTEGER NOT NULL,
    `identifier` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `price` INTEGER NOT NULL,
    `tax_percentage` INTEGER DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_option`),
    INDEX `pac_catalog_option_FI_1` (`fk_catalog_option_type`),
    CONSTRAINT `pac_catalog_option_FK_1`
        FOREIGN KEY (`fk_catalog_option_type`)
        REFERENCES `pac_catalog_option_type` (`id_catalog_option_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_option_type`
(
    `id_catalog_option_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_option_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_option`
(
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_catalog_option` INTEGER NOT NULL,
    PRIMARY KEY (`fk_catalog_product`,`fk_catalog_option`),
    INDEX `pac_catalog_product_option_FI_2` (`fk_catalog_option`),
    CONSTRAINT `pac_catalog_product_option_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_option_FK_2`
        FOREIGN KEY (`fk_catalog_option`)
        REFERENCES `pac_catalog_option` (`id_catalog_option`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_scope`
(
    `id_category_scope` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_category_scope`),
    UNIQUE INDEX `pac_category_scope_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_name`
(
    `id_category_name` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `status` INTEGER DEFAULT 1,
    PRIMARY KEY (`id_category_name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_attribute_key`
(
    `id_category_attribute_key` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category_scope` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(25) NOT NULL,
    `config` VARCHAR(255),
    PRIMARY KEY (`id_category_attribute_key`),
    INDEX `pac_category_attribute_key_FI_1` (`fk_category_scope`),
    CONSTRAINT `pac_category_attribute_key_FK_1`
        FOREIGN KEY (`fk_category_scope`)
        REFERENCES `pac_category_scope` (`id_category_scope`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category`
(
    `id_category` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category_name` INTEGER NOT NULL,
    `fk_category_scope` INTEGER NOT NULL,
    `lft` INTEGER NOT NULL,
    `rgt` INTEGER NOT NULL,
    `level` INTEGER DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_category`),
    INDEX `pac_category_FI_1` (`fk_category_scope`),
    INDEX `pac_category_FI_2` (`fk_category_name`),
    CONSTRAINT `pac_category_FK_1`
        FOREIGN KEY (`fk_category_scope`)
        REFERENCES `pac_category_scope` (`id_category_scope`),
    CONSTRAINT `pac_category_FK_2`
        FOREIGN KEY (`fk_category_name`)
        REFERENCES `pac_category_name` (`id_category_name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_attribute`
(
    `id_category_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category` INTEGER NOT NULL,
    `fk_category_attribute_key` INTEGER NOT NULL,
    `value` LONGTEXT NOT NULL,
    PRIMARY KEY (`id_category_attribute`),
    UNIQUE INDEX `uidx_category_attribute` (`fk_category`, `fk_category_attribute_key`),
    INDEX `pac_category_attribute_FI_2` (`fk_category_attribute_key`),
    CONSTRAINT `pac_category_attribute_FK_1`
        FOREIGN KEY (`fk_category`)
        REFERENCES `pac_category` (`id_category`),
    CONSTRAINT `pac_category_attribute_FK_2`
        FOREIGN KEY (`fk_category_attribute_key`)
        REFERENCES `pac_category_attribute_key` (`id_category_attribute_key`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_tree`
(
    `id_category` INTEGER NOT NULL AUTO_INCREMENT,
    `is_active` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_node`
(
    `id_category_node` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category` INTEGER NOT NULL,
    `fk_parent_category_node` INTEGER,
    `is_root` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_category_node`),
    INDEX `pac_category_node_FI_1` (`fk_parent_category_node`),
    INDEX `pac_category_node_FI_2` (`fk_category`),
    CONSTRAINT `pac_category_node_FK_1`
        FOREIGN KEY (`fk_parent_category_node`)
        REFERENCES `pac_category_node` (`id_category_node`),
    CONSTRAINT `pac_category_node_FK_2`
        FOREIGN KEY (`fk_category`)
        REFERENCES `pac_category_tree` (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_closure_table`
(
    `id_category_closure_table` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category_node` INTEGER NOT NULL,
    `fk_category_node_descendant` INTEGER NOT NULL,
    `depth` INTEGER NOT NULL,
    PRIMARY KEY (`id_category_closure_table`),
    INDEX `pac_category_closure_table_FI_1` (`fk_category_node`),
    INDEX `pac_category_closure_table_FI_2` (`fk_category_node_descendant`),
    CONSTRAINT `pac_category_closure_table_FK_1`
        FOREIGN KEY (`fk_category_node`)
        REFERENCES `pac_category_node` (`id_category_node`),
    CONSTRAINT `pac_category_closure_table_FK_2`
        FOREIGN KEY (`fk_category_node_descendant`)
        REFERENCES `pac_category_node` (`id_category_node`)
) ENGINE=InnoDB;

CREATE TABLE `pac_category_tree_attribute`
(
    `id_category_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `locale` VARCHAR(5) NOT NULL,
    `url_key` VARCHAR(255),
    `meta_title` TEXT,
    `meta_description` TEXT,
    `meta_keywords` TEXT,
    `category_image_name` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_category_attribute`),
    INDEX `pac_category_tree_attribute_I_1` (`locale`),
    INDEX `pac_category_tree_attribute_FI_1` (`fk_category`),
    CONSTRAINT `pac_category_tree_attribute_FK_1`
        FOREIGN KEY (`fk_category`)
        REFERENCES `pac_category_tree` (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page`
(
    `id_cms_page` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_template` INTEGER,
    `fk_cms_layout` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `status` TINYINT DEFAULT 2 NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_page`),
    INDEX `pac_cms_page_FI_1` (`fk_cms_template`),
    INDEX `pac_cms_page_FI_2` (`fk_cms_layout`),
    CONSTRAINT `pac_cms_page_FK_1`
        FOREIGN KEY (`fk_cms_template`)
        REFERENCES `pac_cms_template` (`id_cms_template`),
    CONSTRAINT `pac_cms_page_FK_2`
        FOREIGN KEY (`fk_cms_layout`)
        REFERENCES `pac_cms_layout` (`id_cms_layout`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_layout`
(
    `id_cms_layout` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_layout`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_template`
(
    `id_cms_template` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `template_type` TINYINT DEFAULT 1,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_template`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_partial`
(
    `id_cms_partial` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block_type` INTEGER NOT NULL,
    `yves_partial_name` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `content` LONGTEXT,
    `description` VARCHAR(255) NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_partial`),
    INDEX `pac_cms_partial_FI_1` (`fk_cms_block_type`),
    CONSTRAINT `pac_cms_partial_FK_1`
        FOREIGN KEY (`fk_cms_block_type`)
        REFERENCES `pac_cms_block_type` (`id_cms_block_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_template_partial`
(
    `id_cms_template_partial` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_template` INTEGER NOT NULL,
    `fk_cms_partial` INTEGER NOT NULL,
    `row` INTEGER,
    `column` INTEGER,
    `position` INTEGER,
    PRIMARY KEY (`id_cms_template_partial`),
    INDEX `pac_cms_template_partial_FI_1` (`fk_cms_template`),
    INDEX `pac_cms_template_partial_FI_2` (`fk_cms_partial`),
    CONSTRAINT `pac_cms_template_partial_FK_1`
        FOREIGN KEY (`fk_cms_template`)
        REFERENCES `pac_cms_template` (`id_cms_template`),
    CONSTRAINT `pac_cms_template_partial_FK_2`
        FOREIGN KEY (`fk_cms_partial`)
        REFERENCES `pac_cms_partial` (`id_cms_partial`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page_block`
(
    `id_cms_page_block` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_page` INTEGER NOT NULL,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_cms_template_partial` INTEGER NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_cms_page_block`),
    INDEX `pac_cms_page_block_FI_1` (`fk_cms_page`),
    INDEX `pac_cms_page_block_FI_2` (`fk_cms_block`),
    INDEX `pac_cms_page_block_FI_3` (`fk_cms_template_partial`),
    CONSTRAINT `pac_cms_page_block_FK_1`
        FOREIGN KEY (`fk_cms_page`)
        REFERENCES `pac_cms_page` (`id_cms_page`),
    CONSTRAINT `pac_cms_page_block_FK_2`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `pac_cms_block` (`id_cms_block`),
    CONSTRAINT `pac_cms_page_block_FK_3`
        FOREIGN KEY (`fk_cms_template_partial`)
        REFERENCES `pac_cms_template_partial` (`id_cms_template_partial`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_block`
(
    `id_cms_block` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block_type` INTEGER NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_cms_block`),
    INDEX `pac_cms_block_FI_1` (`fk_cms_block_type`),
    CONSTRAINT `pac_cms_block_FK_1`
        FOREIGN KEY (`fk_cms_block_type`)
        REFERENCES `pac_cms_block_type` (`id_cms_block_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_block_type`
(
    `id_cms_block_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_block_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_block_text`
(
    `id_cms_block_text` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `content` LONGTEXT,
    `is_deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_cms_block_text`),
    UNIQUE INDEX `pac_cms_block_text_U_1` (`fk_cms_block`),
    CONSTRAINT `pac_cms_block_text_FK_1`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `pac_cms_block` (`id_cms_block`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_block_product`
(
    `id_cms_block_product` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER,
    `is_deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_cms_block_product`),
    UNIQUE INDEX `pac_cms_block_product_U_1` (`fk_cms_block`),
    INDEX `pac_cms_block_product_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_cms_block_product_FK_1`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `pac_cms_block` (`id_cms_block`),
    CONSTRAINT `pac_cms_block_product_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_block_glossary`
(
    `id_cms_block_glossary` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER,
    `is_deleted` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_cms_block_glossary`),
    UNIQUE INDEX `pac_cms_block_glossary_U_1` (`fk_cms_block`),
    INDEX `pac_cms_block_glossary_FI_2` (`fk_glossary_key`),
    CONSTRAINT `pac_cms_block_glossary_FK_1`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `pac_cms_block` (`id_cms_block`),
    CONSTRAINT `pac_cms_block_glossary_FK_2`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `pac_glossary_key` (`id_glossary_key`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page_attribute`
(
    `id_cms_page_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(25) NOT NULL,
    `is_meta_attribute` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_page_attribute`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page_attribute_value`
(
    `id_cms_page_attribute_value` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_page_attribute` INTEGER NOT NULL,
    `fk_cms_page` INTEGER NOT NULL,
    `value` LONGTEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_page_attribute_value`),
    INDEX `pac_cms_page_attribute_value_FI_1` (`fk_cms_page`),
    INDEX `pac_cms_page_attribute_value_FI_2` (`fk_cms_page_attribute`),
    CONSTRAINT `pac_cms_page_attribute_value_FK_1`
        FOREIGN KEY (`fk_cms_page`)
        REFERENCES `pac_cms_page` (`id_cms_page`),
    CONSTRAINT `pac_cms_page_attribute_value_FK_2`
        FOREIGN KEY (`fk_cms_page_attribute`)
        REFERENCES `pac_cms_page_attribute` (`id_cms_page_attribute`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_redirection`
(
    `id_cms_redirection` INTEGER NOT NULL AUTO_INCREMENT,
    `url_source` VARCHAR(255) NOT NULL,
    `url_target` VARCHAR(255) NOT NULL,
    `type` TINYINT DEFAULT 0 NOT NULL,
    `status` TINYINT DEFAULT 0 NOT NULL,
    `description` VARCHAR(255),
    `is_deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_redirection`)
) ENGINE=InnoDB;

CREATE TABLE `pac_customer`
(
    `id_customer` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer_status` INTEGER NOT NULL,
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
    `registration_key` VARCHAR(150),
    `default_billing_address` INTEGER,
    `default_shipping_address` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer`),
    UNIQUE INDEX `pac_customer_U_1` (`email`),
    UNIQUE INDEX `pac_customer_U_2` (`increment_id`),
    INDEX `pac_customer_FI_1` (`default_billing_address`),
    INDEX `pac_customer_FI_2` (`default_shipping_address`),
    INDEX `pac_customer_FI_3` (`fk_customer_status`),
    CONSTRAINT `pac_customer_FK_1`
        FOREIGN KEY (`default_billing_address`)
        REFERENCES `pac_customer_address` (`id_customer_address`),
    CONSTRAINT `pac_customer_FK_2`
        FOREIGN KEY (`default_shipping_address`)
        REFERENCES `pac_customer_address` (`id_customer_address`),
    CONSTRAINT `pac_customer_FK_3`
        FOREIGN KEY (`fk_customer_status`)
        REFERENCES `pac_customer_status` (`id_customer_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_customer_status`
(
    `id_customer_status` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_customer_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_customer_address`
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
    INDEX `pac_customer_address_I_1` (`fk_customer`),
    INDEX `pac_customer_address_FI_2` (`fk_misc_country`),
    INDEX `pac_customer_address_FI_3` (`fk_misc_region`),
    CONSTRAINT `pac_customer_address_FK_1`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`),
    CONSTRAINT `pac_customer_address_FK_2`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `pac_customer_address_FK_3`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `pac_misc_region` (`id_misc_region`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_type`
(
    `id_document_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_document_type`),
    UNIQUE INDEX `pac_document_type_U_1` (`type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_render_engine`
(
    `id_document_render_engine` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_document_render_engine`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_template`
(
    `id_document_template` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `content` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_document_template`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_configuration`
(
    `id_document_configuration` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_document_type` INTEGER NOT NULL,
    `fk_document_template` INTEGER NOT NULL,
    `fk_document_render_engine` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_document_configuration`),
    INDEX `pac_document_configuration_FI_1` (`fk_document_type`),
    INDEX `pac_document_configuration_FI_2` (`fk_document_template`),
    INDEX `pac_document_configuration_FI_3` (`fk_document_render_engine`),
    CONSTRAINT `pac_document_configuration_FK_1`
        FOREIGN KEY (`fk_document_type`)
        REFERENCES `pac_document_type` (`id_document_type`),
    CONSTRAINT `pac_document_configuration_FK_2`
        FOREIGN KEY (`fk_document_template`)
        REFERENCES `pac_document_template` (`id_document_template`),
    CONSTRAINT `pac_document_configuration_FK_3`
        FOREIGN KEY (`fk_document_render_engine`)
        REFERENCES `pac_document_render_engine` (`id_document_render_engine`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_render_process`
(
    `id_document_render_process` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_document` INTEGER NOT NULL,
    `is_success` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_document_render_process`),
    INDEX `pac_document_render_process_FI_1` (`fk_document`),
    CONSTRAINT `pac_document_render_process_FK_1`
        FOREIGN KEY (`fk_document`)
        REFERENCES `pac_document` (`id_document`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document`
(
    `id_document` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `fk_document_render_engine` INTEGER NOT NULL,
    `fk_document_configuration` INTEGER NOT NULL,
    `data` LONGTEXT NOT NULL,
    `template` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_document`),
    INDEX `pac_document_FI_1` (`fk_sales_order`),
    INDEX `pac_document_FI_2` (`fk_document_render_engine`),
    INDEX `pac_document_FI_3` (`fk_document_configuration`),
    CONSTRAINT `pac_document_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_document_FK_2`
        FOREIGN KEY (`fk_document_render_engine`)
        REFERENCES `pac_document_render_engine` (`id_document_render_engine`),
    CONSTRAINT `pac_document_FK_3`
        FOREIGN KEY (`fk_document_configuration`)
        REFERENCES `pac_document_configuration` (`id_document_configuration`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_key`
(
    `id_glossary_key` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_key`),
    UNIQUE INDEX `pac_glossary_key_U_1` (`key`),
    INDEX `key` (`key`),
    INDEX `is_active` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_translation`
(
    `id_glossary_translation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_glossary_key` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_translation`),
    UNIQUE INDEX `pac_glossary_translation_U_1` (`fk_glossary_key`, `fk_locale`),
    INDEX `locale` (`fk_locale`),
    INDEX `is_active` (`is_active`),
    CONSTRAINT `pac_glossary_translation_FK_1`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `pac_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE,
    CONSTRAINT `pac_glossary_translation_FK_2`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `pac_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice`
(
    `id_invoice` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `invoice_number` VARCHAR(255),
    `type` TINYINT DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice`),
    UNIQUE INDEX `pac_invoice_U_1` (`invoice_number`),
    INDEX `pac_invoice_FI_1` (`fk_sales_order`),
    CONSTRAINT `pac_invoice_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice_configuration`
(
    `id_invoice_configuration` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_document_configuration` INTEGER NOT NULL,
    `type` TINYINT DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice_configuration`),
    UNIQUE INDEX `pac_invoice_configuration_U_1` (`type`),
    INDEX `pac_invoice_configuration_FI_1` (`fk_document_configuration`),
    CONSTRAINT `pac_invoice_configuration_FK_1`
        FOREIGN KEY (`fk_document_configuration`)
        REFERENCES `pac_document_configuration` (`id_document_configuration`)
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice_document`
(
    `id_invoice_document` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_invoice` INTEGER NOT NULL,
    `fk_document` INTEGER NOT NULL,
    `layout_type` TINYINT DEFAULT 0 NOT NULL,
    `filename` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice_document`),
    INDEX `pac_invoice_document_I_1` (`layout_type`),
    INDEX `pac_invoice_document_FI_1` (`fk_invoice`),
    INDEX `pac_invoice_document_FI_2` (`fk_document`),
    CONSTRAINT `pac_invoice_document_FK_1`
        FOREIGN KEY (`fk_invoice`)
        REFERENCES `pac_invoice` (`id_invoice`),
    CONSTRAINT `pac_invoice_document_FK_2`
        FOREIGN KEY (`fk_document`)
        REFERENCES `pac_document` (`id_document`)
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice_number`
(
    `id_invoice_number` INTEGER NOT NULL AUTO_INCREMENT,
    `date` INTEGER(6) NOT NULL,
    `increment_id` VARCHAR(35) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice_number`),
    INDEX `pac_invoice_number_I_1` (`increment_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_kendo_grid_state`
(
    `id_kendo_grid_state` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_user` INTEGER NOT NULL,
    `id_grid` VARCHAR(32) NOT NULL,
    `state` TEXT NOT NULL,
    PRIMARY KEY (`id_kendo_grid_state`),
    INDEX `pac_kendo_grid_state_FI_1` (`fk_acl_user`),
    CONSTRAINT `pac_kendo_grid_state_FK_1`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mail_queue`
(
    `id_mail_queue` INTEGER NOT NULL AUTO_INCREMENT,
    `mail_type` VARCHAR(255) NOT NULL,
    `transfer_string` LONGTEXT NOT NULL,
    `reference_id` INTEGER NOT NULL,
    `sent` TINYINT(1) DEFAULT 0 NOT NULL,
    `send_tries` INTEGER(2) DEFAULT 0 NOT NULL,
    `send_after` DATETIME,
    `last_response` LONGTEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_mail_queue`),
    INDEX `pac_mail_queue_I_1` (`sent`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mail_template`
(
    `id_mail_template` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `subject` VARCHAR(255),
    `sender` VARCHAR(255),
    `sender_name` VARCHAR(255),
    `text` TEXT,
    `html` TEXT,
    `date_interval` VARCHAR(255),
    `wrapper` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id_mail_template`),
    UNIQUE INDEX `pac_mail_template_U_1` (`name`),
    INDEX `pac_mail_template_FI_1` (`wrapper`),
    CONSTRAINT `pac_mail_template_FK_1`
        FOREIGN KEY (`wrapper`)
        REFERENCES `pac_mail_template` (`id_mail_template`)
) ENGINE=InnoDB;

CREATE TABLE `pac_misc_country`
(
    `id_misc_country` INTEGER NOT NULL AUTO_INCREMENT,
    `iso2_code` VARCHAR(2) NOT NULL,
    `iso3_code` VARCHAR(3) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `postal_code_madatory` TINYINT(1) DEFAULT 0,
    `postal_code_regex` VARCHAR(500),
    PRIMARY KEY (`id_misc_country`),
    UNIQUE INDEX `pac_misc_country_U_1` (`iso2_code`),
    UNIQUE INDEX `pac_misc_country_U_2` (`iso3_code`)
) ENGINE=InnoDB;

CREATE TABLE `pac_misc_region`
(
    `id_misc_region` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_misc_country` INTEGER,
    `name` VARCHAR(100) NOT NULL,
    `iso2_code` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`id_misc_region`),
    UNIQUE INDEX `pac_misc_region_U_1` (`iso2_code`),
    INDEX `pac_misc_region_FI_1` (`fk_misc_country`),
    CONSTRAINT `pac_misc_region_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`)
) ENGINE=InnoDB;

CREATE TABLE `pac_misc_lock`
(
    `id_misc_lock` INTEGER NOT NULL AUTO_INCREMENT,
    `uid` VARCHAR(255) NOT NULL,
    `resource` VARCHAR(255) NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_misc_lock`),
    UNIQUE INDEX `pac_misc_lock_U_1` (`uid`, `resource`)
) ENGINE=InnoDB;

CREATE TABLE `pac_newsletter_subscription`
(
    `id_newsletter_subscription` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `status` TINYINT DEFAULT 0,
    `confirmation_key` VARCHAR(32) NOT NULL,
    `unsubscription_key` VARCHAR(32),
    `subscribed_at` DATETIME,
    `confirmed_at` DATETIME,
    `unsubscribed_at` DATETIME,
    PRIMARY KEY (`id_newsletter_subscription`),
    UNIQUE INDEX `newsletter_subscription_email` (`email`)
) ENGINE=InnoDB;

CREATE TABLE `pac_oms_transition_log`
(
    `id_oms_transition_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_acl_user` INTEGER,
    `locked` TINYINT(1),
    `fk_oms_order_process` INTEGER,
    `event` VARCHAR(100),
    `hostname` VARCHAR(128) NOT NULL,
    `module` VARCHAR(128) NOT NULL,
    `controller` VARCHAR(128) NOT NULL,
    `action` VARCHAR(128) NOT NULL,
    `params` TEXT NOT NULL,
    `source_state` VARCHAR(128),
    `target_state` VARCHAR(128),
    `commands` TEXT,
    `conditions` TEXT,
    `error` TINYINT(1),
    `error_message` VARCHAR(1024),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_transition_log`),
    INDEX `pac_oms_transition_log_FI_1` (`fk_sales_order`),
    INDEX `pac_oms_transition_log_FI_2` (`fk_sales_order_item`),
    INDEX `pac_oms_transition_log_FI_3` (`fk_acl_user`),
    INDEX `pac_oms_transition_log_FI_4` (`fk_oms_order_process`),
    CONSTRAINT `pac_oms_transition_log_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_oms_transition_log_FK_2`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_oms_transition_log_FK_3`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`),
    CONSTRAINT `pac_oms_transition_log_FK_4`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `pac_oms_order_process` (`id_oms_order_process`)
) ENGINE=InnoDB;

CREATE TABLE `pac_oms_order_process`
(
    `id_oms_order_process` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_order_process`),
    UNIQUE INDEX `pac_oms_order_process_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_oms_order_item_status`
(
    `id_oms_order_item_status` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_oms_order_item_status`),
    UNIQUE INDEX `pac_oms_order_item_status_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_oms_order_item_status_history`
(
    `id_oms_order_item_status_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_status` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_order_item_status_history`),
    INDEX `pac_oms_order_item_status_history_FI_1` (`fk_sales_order_item`),
    INDEX `pac_oms_order_item_status_history_FI_2` (`fk_oms_order_item_status`),
    CONSTRAINT `pac_oms_order_item_status_history_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_oms_order_item_status_history_FK_2`
        FOREIGN KEY (`fk_oms_order_item_status`)
        REFERENCES `pac_oms_order_item_status` (`id_oms_order_item_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_oms_event_timeout`
(
    `id_oms_event_timeout` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_status` INTEGER NOT NULL,
    `timeout` DATETIME NOT NULL,
    `event` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_event_timeout`),
    UNIQUE INDEX `pac_oms_event_timeout_U_1` (`fk_sales_order_item`, `fk_oms_order_item_status`, `event`),
    INDEX `pac_oms_event_timeout_I_1` (`timeout`),
    INDEX `pac_oms_event_timeout_FI_2` (`fk_oms_order_item_status`),
    CONSTRAINT `pac_oms_event_timeout_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_oms_event_timeout_FK_2`
        FOREIGN KEY (`fk_oms_order_item_status`)
        REFERENCES `pac_oms_order_item_status` (`id_oms_order_item_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment`
(
    `id_payment` INTEGER NOT NULL,
    `transaction` VARCHAR(60),
    `method` VARCHAR(50) NOT NULL,
    `provider` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment`),
    CONSTRAINT `pac_payment_FK_1`
        FOREIGN KEY (`id_payment`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_account`
(
    `id_payment_account` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment` INTEGER NOT NULL,
    `fk_payment_transaction` INTEGER,
    `receivable` INTEGER NOT NULL,
    `cash` INTEGER NOT NULL,
    `balance` INTEGER NOT NULL,
    `delta` INTEGER NOT NULL,
    `action` VARCHAR(50) NOT NULL,
    `message` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_account`),
    INDEX `pac_payment_account_I_1` (`action`),
    INDEX `pac_payment_account_FI_1` (`fk_payment`),
    INDEX `pac_payment_account_FI_2` (`fk_payment_transaction`),
    CONSTRAINT `pac_payment_account_FK_1`
        FOREIGN KEY (`fk_payment`)
        REFERENCES `pac_payment` (`id_payment`),
    CONSTRAINT `pac_payment_account_FK_2`
        FOREIGN KEY (`fk_payment_transaction`)
        REFERENCES `pac_payment_transaction` (`id_payment_transaction`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_transaction`
(
    `id_payment_transaction` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment` INTEGER NOT NULL,
    `reference_id` VARCHAR(50),
    `event` VARCHAR(50) NOT NULL,
    `event_date` DATETIME,
    `is_outbound` TINYINT(1) NOT NULL,
    `is_success` TINYINT(1) NOT NULL,
    `message` VARCHAR(255),
    `raw_request` TEXT,
    `raw_response` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_transaction`),
    INDEX `pac_payment_transaction_I_1` (`event`, `reference_id`),
    INDEX `pac_payment_transaction_FI_1` (`fk_payment`),
    CONSTRAINT `pac_payment_transaction_FK_1`
        FOREIGN KEY (`fk_payment`)
        REFERENCES `pac_payment` (`id_payment`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_config`
(
    `id_payment_config` INTEGER NOT NULL AUTO_INCREMENT,
    `provider` VARCHAR(50) NOT NULL,
    `method` VARCHAR(50) NOT NULL,
    `identifier` VARCHAR(50) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `is_active` TINYINT(1) NOT NULL,
    `value` VARCHAR(50),
    `position` INTEGER,
    `description` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_config`),
    UNIQUE INDEX `pac_payment_config_U_1` (`provider`, `method`, `identifier`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_control_raw_data_log`
(
    `id_payment_control_raw_data_log` INTEGER NOT NULL AUTO_INCREMENT,
    `session_id` VARCHAR(255) NOT NULL,
    `ip_address` VARCHAR(128) NOT NULL,
    `data` LONGTEXT NOT NULL,
    `offered_methods` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_control_raw_data_log`),
    INDEX `pac_payment_control_raw_data_log_I_1` (`session_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_transaction_payone`
(
    `id_payment_transaction_payone` INTEGER NOT NULL,
    `sequence_number` INTEGER,
    `mode` VARCHAR(255),
    `txaction` VARCHAR(255),
    `txid` VARCHAR(255),
    `clearingtype` VARCHAR(255),
    `balance` VARCHAR(255),
    `receivable` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_transaction_payone`),
    CONSTRAINT `pac_payment_transaction_payone_FK_1`
        FOREIGN KEY (`id_payment_transaction_payone`)
        REFERENCES `pac_payment_transaction` (`id_payment_transaction`)
) ENGINE=InnoDB;

CREATE TABLE `pac_price_product`
(
    `id_price_product` INTEGER NOT NULL AUTO_INCREMENT,
    `price` BIGINT DEFAULT 0 NOT NULL,
    `valid_from` DATETIME NOT NULL,
    `valid_to` DATETIME NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_price_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_price_product`),
    UNIQUE INDEX `pac_price_product_U_1` (`fk_catalog_product`, `fk_price_type`, `valid_from`),
    INDEX `pac_price_product_FI_1` (`fk_price_type`),
    CONSTRAINT `pac_price_product_FK_1`
        FOREIGN KEY (`fk_price_type`)
        REFERENCES `pac_price_type` (`id_price_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_price_type`
(
    `id_price_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_price_type`),
    UNIQUE INDEX `pac_price_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_price_attribute`
(
    `id_price_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_price_attribute`),
    UNIQUE INDEX `pac_price_attribute_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_price_attribute_value`
(
    `id_price_attribute_value` INTEGER NOT NULL AUTO_INCREMENT,
    `value` VARCHAR(20000) NOT NULL,
    `fk_price_type` INTEGER NOT NULL,
    `fk_price_attribute` INTEGER NOT NULL,
    PRIMARY KEY (`id_price_attribute_value`),
    UNIQUE INDEX `pac_price_attribute_value_U_1` (`fk_price_type`, `fk_price_attribute`),
    INDEX `pac_price_attribute_value_FI_2` (`fk_price_attribute`),
    CONSTRAINT `pac_price_attribute_value_FK_1`
        FOREIGN KEY (`fk_price_type`)
        REFERENCES `pac_price_type` (`id_price_type`),
    CONSTRAINT `pac_price_attribute_value_FK_2`
        FOREIGN KEY (`fk_price_attribute`)
        REFERENCES `pac_price_attribute` (`id_price_attribute`)
) ENGINE=InnoDB;

CREATE TABLE `pac_abstract_product`
(
    `abstract_product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`abstract_product_id`),
    UNIQUE INDEX `pac_abstract_product_U_1` (`sku`)
) ENGINE=InnoDB;

CREATE TABLE `pac_abstract_product_localized_attributes`
(
    `attributes_id` INTEGER NOT NULL AUTO_INCREMENT,
    `abstract_product_id` INTEGER NOT NULL,
    `locale` VARCHAR(5) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    PRIMARY KEY (`attributes_id`),
    UNIQUE INDEX `pac_abstract_product_localized_attributes_U_1` (`abstract_product_id`, `locale`),
    CONSTRAINT `pac_abstract_product_localized_attributes_FK_1`
        FOREIGN KEY (`abstract_product_id`)
        REFERENCES `pac_abstract_product` (`abstract_product_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_product`
(
    `product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `abstract_product_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`),
    UNIQUE INDEX `pac_product_U_1` (`sku`),
    INDEX `pac_product_FI_1` (`abstract_product_id`),
    CONSTRAINT `pac_product_FK_1`
        FOREIGN KEY (`abstract_product_id`)
        REFERENCES `pac_abstract_product` (`abstract_product_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_product_localized_attributes`
(
    `attributes_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_id` INTEGER NOT NULL,
    `locale` VARCHAR(5) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `is_complete` TINYINT(1) DEFAULT 1,
    `tax_id` INTEGER,
    PRIMARY KEY (`attributes_id`),
    UNIQUE INDEX `pac_product_localized_attributes_U_1` (`product_id`, `locale`),
    INDEX `pac_product_localized_attributes_FI_2` (`tax_id`),
    CONSTRAINT `pac_product_localized_attributes_FK_1`
        FOREIGN KEY (`product_id`)
        REFERENCES `pac_product` (`product_id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `pac_product_localized_attributes_FK_2`
        FOREIGN KEY (`tax_id`)
        REFERENCES `pac_tax` (`tax_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_product_to_bundle`
(
    `product_id` INTEGER NOT NULL,
    `related_product_id` INTEGER NOT NULL,
    PRIMARY KEY (`product_id`,`related_product_id`),
    INDEX `pac_product_to_bundle_FI_2` (`related_product_id`),
    CONSTRAINT `pac_product_to_bundle_FK_1`
        FOREIGN KEY (`product_id`)
        REFERENCES `pac_product` (`product_id`),
    CONSTRAINT `pac_product_to_bundle_FK_2`
        FOREIGN KEY (`related_product_id`)
        REFERENCES `pac_product` (`product_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tax`
(
    `tax_id` INTEGER NOT NULL AUTO_INCREMENT,
    `rate` INTEGER NOT NULL,
    `locale` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_attributes_metadata`
(
    `attribute_id` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_editable` TINYINT(1) DEFAULT 1 NOT NULL,
    `type_id` INTEGER,
    PRIMARY KEY (`attribute_id`),
    INDEX `pac_attributes_metadata_FI_1` (`type_id`),
    CONSTRAINT `pac_attributes_metadata_FK_1`
        FOREIGN KEY (`type_id`)
        REFERENCES `pac_attribute_type` (`type_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_attribute_type`
(
    `type_id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `parent_type_id` INTEGER,
    `input_representation` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`type_id`),
    INDEX `pac_attribute_type_FI_1` (`parent_type_id`),
    CONSTRAINT `pac_attribute_type_FK_1`
        FOREIGN KEY (`parent_type_id`)
        REFERENCES `pac_attribute_type` (`type_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_attribute_type_value`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `type_id` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `locale` VARCHAR(5),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `pac_attribute_type_value_U_1` (`locale`, `type_id`, `key`)
) ENGINE=InnoDB;

CREATE TABLE `pac_product_category`
(
    `fk_product` INTEGER NOT NULL,
    `fk_category_node` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product`,`fk_category_node`),
    INDEX `pac_product_category_FI_1` (`fk_category_node`),
    CONSTRAINT `pac_product_category_FK_1`
        FOREIGN KEY (`fk_category_node`)
        REFERENCES `pac_category_node` (`id_category_node`),
    CONSTRAINT `pac_product_category_FK_2`
        FOREIGN KEY (`fk_product`)
        REFERENCES `pac_product` (`product_id`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_image_size`
(
    `id_catalog_product_image_size` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `width` INTEGER NOT NULL,
    `height` INTEGER NOT NULL,
    `quality` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_product_image_size`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_product_image`
(
    `id_catalog_product_image` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_catalog_product_image_size` INTEGER NOT NULL,
    `seo_title` VARCHAR(255),
    `seo_filename` VARCHAR(255) NOT NULL,
    `weight` VARCHAR(255) DEFAULT \'0\' NOT NULL,
    `original_image_path` VARCHAR(255) NOT NULL,
    `processed_image_path` VARCHAR(255) NOT NULL,
    `image_hash` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_product_image`),
    INDEX `pac_catalog_product_image_FI_1` (`fk_catalog_product_image_size`),
    INDEX `pac_catalog_product_image_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_product_image_FK_1`
        FOREIGN KEY (`fk_catalog_product_image_size`)
        REFERENCES `pac_catalog_product_image_size` (`id_catalog_product_image_size`),
    CONSTRAINT `pac_catalog_product_image_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_product_search_attributes_operation`
(
    `source_attribute_id` INTEGER NOT NULL,
    `operation` VARCHAR(255) NOT NULL,
    `target_field` VARCHAR(255) NOT NULL,
    `weighting` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`source_attribute_id`,`operation`,`target_field`),
    INDEX `pac_product_search_attributes_operation_I_1` (`source_attribute_id`, `weighting`),
    CONSTRAINT `pac_product_search_attributes_operation_FK_1`
        FOREIGN KEY (`source_attribute_id`)
        REFERENCES `pac_attributes_metadata` (`attribute_id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_address`
(
    `id_sales_order_address` INTEGER NOT NULL AUTO_INCREMENT,
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
    `city` VARCHAR(255) NOT NULL,
    `zip_code` VARCHAR(15) NOT NULL,
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `description` VARCHAR(255),
    `comment` VARCHAR(255),
    `email` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_address`),
    INDEX `pac_sales_order_address_FI_1` (`fk_misc_country`),
    INDEX `pac_sales_order_address_FI_2` (`fk_misc_region`),
    CONSTRAINT `pac_sales_order_address_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `pac_sales_order_address_FK_2`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `pac_misc_region` (`id_misc_region`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_address_history`
(
    `id_sales_order_address_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_misc_country` INTEGER NOT NULL,
    `fk_misc_region` INTEGER,
    `fk_sales_order_address` INTEGER NOT NULL,
    `is_billing` TINYINT(1) DEFAULT 0,
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255) NOT NULL,
    `address2` VARCHAR(255),
    `address3` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255) NOT NULL,
    `zip_code` VARCHAR(15) NOT NULL,
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `description` VARCHAR(255),
    `comment` VARCHAR(255),
    `email` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_address_history`),
    INDEX `pac_sales_order_address_history_FI_1` (`fk_misc_country`),
    INDEX `pac_sales_order_address_history_FI_2` (`fk_sales_order_address`),
    INDEX `pac_sales_order_address_history_FI_3` (`fk_misc_region`),
    CONSTRAINT `pac_sales_order_address_history_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `pac_sales_order_address_history_FK_2`
        FOREIGN KEY (`fk_sales_order_address`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `pac_sales_order_address_history_FK_3`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `pac_misc_region` (`id_misc_region`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order`
(
    `id_sales_order` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_address_billing` INTEGER NOT NULL,
    `fk_sales_order_address_shipping` INTEGER NOT NULL,
    `fk_customer` INTEGER,
    `email` VARCHAR(255),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `customer_session_id` VARCHAR(100),
    `increment_id` VARCHAR(45),
    `grand_total` INTEGER NOT NULL,
    `subtotal` INTEGER NOT NULL,
    `is_test` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    UNIQUE INDEX `pac_sales_order_U_1` (`increment_id`),
    INDEX `pac_sales_order_FI_1` (`fk_sales_order_address_billing`),
    INDEX `pac_sales_order_FI_2` (`fk_sales_order_address_shipping`),
    INDEX `pac_sales_order_FI_3` (`fk_customer`),
    CONSTRAINT `pac_sales_order_FK_1`
        FOREIGN KEY (`fk_sales_order_address_billing`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `pac_sales_order_FK_2`
        FOREIGN KEY (`fk_sales_order_address_shipping`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `pac_sales_order_FK_3`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item`
(
    `id_sales_order_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_oms_order_item_status` INTEGER NOT NULL,
    `fk_oms_order_process` INTEGER,
    `fk_sales_order_item_bundle` INTEGER,
    `last_status_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `price_to_pay` INTEGER NOT NULL COMMENT \'/value that the customer has to pay./\',
    `tax_percentage` DECIMAL(8,4),
    `variety` ENUM(\'Single\',\'Config\',\'Simple\',\'Bundle\') NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `pac_sales_order_item_I_1` (`sku`),
    INDEX `pac_sales_order_item_FI_1` (`fk_sales_order`),
    INDEX `pac_sales_order_item_FI_2` (`fk_oms_order_item_status`),
    INDEX `pac_sales_order_item_FI_3` (`fk_oms_order_process`),
    INDEX `pac_sales_order_item_FI_4` (`fk_sales_order_item_bundle`),
    CONSTRAINT `pac_sales_order_item_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_sales_order_item_FK_2`
        FOREIGN KEY (`fk_oms_order_item_status`)
        REFERENCES `pac_oms_order_item_status` (`id_oms_order_item_status`),
    CONSTRAINT `pac_sales_order_item_FK_3`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `pac_oms_order_process` (`id_oms_order_process`),
    CONSTRAINT `pac_sales_order_item_FK_4`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `pac_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item_option`
(
    `id_sales_order_item_option` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `identifier` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `gross_price` INTEGER DEFAULT 0 NOT NULL,
    `price_to_pay` INTEGER DEFAULT 0 NOT NULL,
    `tax_percentage` INTEGER DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_option`),
    INDEX `pac_sales_order_item_option_FI_1` (`fk_sales_order_item`),
    CONSTRAINT `pac_sales_order_item_option_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_note`
(
    `id_sales_order_note` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_user` INTEGER,
    `fk_sales_order` INTEGER NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `command` VARCHAR(255) NOT NULL,
    `success` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_note`),
    INDEX `pac_sales_order_note_FI_1` (`fk_acl_user`),
    INDEX `pac_sales_order_note_FI_2` (`fk_sales_order`),
    CONSTRAINT `pac_sales_order_note_FK_1`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`),
    CONSTRAINT `pac_sales_order_note_FK_2`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_comment`
(
    `id_sales_order_comment` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `username` VARCHAR(255),
    `message` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_comment`),
    INDEX `pac_sales_order_comment_FI_1` (`fk_sales_order`),
    CONSTRAINT `pac_sales_order_comment_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_expense`
(
    `id_sales_expense` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER,
    `fk_sales_order` INTEGER,
    `type` VARCHAR(150),
    `name` VARCHAR(255),
    `gross_price` INTEGER NOT NULL,
    `price_to_pay` INTEGER NOT NULL,
    `tax_percentage` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_expense`),
    UNIQUE INDEX `pac_sales_expense_U_1` (`fk_sales_order_item`, `fk_sales_order`, `type`),
    INDEX `pac_sales_expense_FI_2` (`fk_sales_order`),
    CONSTRAINT `pac_sales_expense_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_sales_expense_FK_2`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_discount`
(
    `id_sales_discount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `fk_sales_order_item` INTEGER,
    `fk_sales_expense` INTEGER,
    `fk_sales_order_item_option` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(510),
    `display_name` VARCHAR(255) NOT NULL,
    `scope` TINYINT,
    `action` VARCHAR(255) NOT NULL,
    `conditions` VARCHAR(1000),
    `amount` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_discount`),
    INDEX `pac_sales_discount_FI_1` (`fk_sales_order`),
    INDEX `pac_sales_discount_FI_2` (`fk_sales_order_item`),
    INDEX `pac_sales_discount_FI_3` (`fk_sales_expense`),
    INDEX `pac_sales_discount_FI_4` (`fk_sales_order_item_option`),
    CONSTRAINT `pac_sales_discount_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_sales_discount_FK_2`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_sales_discount_FK_3`
        FOREIGN KEY (`fk_sales_expense`)
        REFERENCES `pac_sales_expense` (`id_sales_expense`),
    CONSTRAINT `pac_sales_discount_FK_4`
        FOREIGN KEY (`fk_sales_order_item_option`)
        REFERENCES `pac_sales_order_item_option` (`id_sales_order_item_option`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_discount_code`
(
    `id_sales_discount_code` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_discount` INTEGER NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `codepool_name` VARCHAR(255) NOT NULL,
    `is_reusable` TINYINT(1) DEFAULT 0,
    `is_once_per_customer` TINYINT(1) DEFAULT 1,
    `is_refundable` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_discount_code`),
    INDEX `pac_sales_discount_code_FI_1` (`fk_sales_discount`),
    CONSTRAINT `pac_sales_discount_code_FK_1`
        FOREIGN KEY (`fk_sales_discount`)
        REFERENCES `pac_sales_discount` (`id_sales_discount`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item_bundle`
(
    `id_sales_order_item_bundle` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `price_to_pay` INTEGER NOT NULL COMMENT \'/value that the customer has to pay./\',
    `tax_percentage` DECIMAL(8,4),
    `bundle_type` ENUM(\'NonSplitBundle\',\'SplitBundle\') NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item_bundle_item`
(
    `id_sales_order_item_bundle_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item_bundle` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL,
    `tax_percentage` DECIMAL(8,4),
    `variety` ENUM(\'Single\',\'Config\',\'Simple\',\'Bundle\') NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_bundle_item`),
    INDEX `pac_sales_order_item_bundle_item_FI_1` (`fk_sales_order_item_bundle`),
    CONSTRAINT `pac_sales_order_item_bundle_item_FK_1`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `pac_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `pac_salesrule`
(
    `id_salesrule` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(510),
    `display_name` VARCHAR(255) NOT NULL,
    `scope` TINYINT,
    `action` VARCHAR(255) NOT NULL,
    `amount` FLOAT NOT NULL,
    `is_active` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule`)
) ENGINE=InnoDB;

CREATE TABLE `pac_salesrule_condition`
(
    `id_salesrule_condition` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_salesrule` INTEGER NOT NULL,
    `condition` TEXT NOT NULL,
    `configuration` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_condition`),
    INDEX `pac_salesrule_condition_FI_1` (`fk_salesrule`),
    CONSTRAINT `pac_salesrule_condition_FK_1`
        FOREIGN KEY (`fk_salesrule`)
        REFERENCES `pac_salesrule` (`id_salesrule`)
) ENGINE=InnoDB;

CREATE TABLE `pac_salesrule_codepool`
(
    `id_salesrule_codepool` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `prefix` VARCHAR(255),
    `is_reusable` TINYINT(1) DEFAULT 0,
    `is_once_per_customer` TINYINT(1) DEFAULT 1,
    `is_refundable` TINYINT(1) DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_codepool`)
) ENGINE=InnoDB;

CREATE TABLE `pac_salesrule_code`
(
    `id_salesrule_code` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_salesrule_codepool` INTEGER NOT NULL,
    `fk_customer` INTEGER,
    `code` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_code`),
    UNIQUE INDEX `pac_salesrule_code_U_1` (`code`),
    INDEX `pac_salesrule_code_FI_1` (`fk_salesrule_codepool`),
    INDEX `pac_salesrule_code_FI_2` (`fk_customer`),
    CONSTRAINT `pac_salesrule_code_FK_1`
        FOREIGN KEY (`fk_salesrule_codepool`)
        REFERENCES `pac_salesrule_codepool` (`id_salesrule_codepool`),
    CONSTRAINT `pac_salesrule_code_FK_2`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `pac_salesrule_code_usage`
(
    `id_salesrule_code_usage` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_customer` INTEGER,
    `fk_salesrule_code` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_code_usage`),
    INDEX `pac_salesrule_code_usage_FI_1` (`fk_customer`),
    INDEX `pac_salesrule_code_usage_FI_2` (`fk_salesrule_code`),
    INDEX `pac_salesrule_code_usage_FI_3` (`fk_sales_order`),
    CONSTRAINT `pac_salesrule_code_usage_FK_1`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`),
    CONSTRAINT `pac_salesrule_code_usage_FK_2`
        FOREIGN KEY (`fk_salesrule_code`)
        REFERENCES `pac_salesrule_code` (`id_salesrule_code`),
    CONSTRAINT `pac_salesrule_code_usage_FK_3`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock`
(
    `id_stock` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_stock`),
    UNIQUE INDEX `pac_stock_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock_product`
(
    `id_stock_product` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_id` INTEGER NOT NULL,
    `fk_stock` INTEGER NOT NULL,
    `quantity` INTEGER DEFAULT 0 NOT NULL,
    `is_never_out_of_stock` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_stock_product`),
    UNIQUE INDEX `pac_stock_product_U_1` (`fk_stock`, `fk_product_id`),
    INDEX `pac_stock_product_FI_1` (`fk_product_id`),
    CONSTRAINT `pac_stock_product_FK_1`
        FOREIGN KEY (`fk_product_id`)
        REFERENCES `pac_product` (`product_id`),
    CONSTRAINT `pac_stock_product_FK_2`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `pac_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE `pac_yves_kv_update`
(
    `id_yves_kv_update` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` VARCHAR(255) NOT NULL,
    `item_id` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_yves_kv_update`),
    UNIQUE INDEX `pac_yves_kv_update_U_1` (`item_id`, `item_type`, `item_event`),
    INDEX `pac_yves_kv_update_I_1` (`touched`),
    INDEX `pac_yves_kv_update_I_2` (`item_id`),
    INDEX `pac_yves_kv_update_I_3` (`item_type`),
    INDEX `pac_yves_kv_update_I_4` (`item_event`)
) ENGINE=InnoDB;

CREATE TABLE `pac_yves_control`
(
    `id_yves_control` INTEGER NOT NULL AUTO_INCREMENT,
    `type` VARCHAR(128) NOT NULL,
    `hostname` VARCHAR(128) NOT NULL,
    `last_modified` DATETIME NOT NULL,
    `number_of_documents` INTEGER NOT NULL,
    `message` VARCHAR(128),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_yves_control`),
    UNIQUE INDEX `pac_yves_control_U_1` (`hostname`, `type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_yves_export_touch`
(
    `id_yves_export_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `export_type` TINYINT DEFAULT 1 NOT NULL,
    `item_id` VARCHAR(255) NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_yves_export_touch`),
    UNIQUE INDEX `pac_yves_export_touch_U_1` (`item_id`, `item_type`, `item_event`, `export_type`),
    INDEX `pac_yves_export_touch_I_1` (`touched`),
    INDEX `pac_yves_export_touch_I_2` (`item_id`),
    INDEX `pac_yves_export_touch_I_3` (`item_type`),
    INDEX `pac_yves_export_touch_I_4` (`item_event`)
) ENGINE=InnoDB;

CREATE TABLE `pac_locale`
(
    `id_locale` INTEGER NOT NULL AUTO_INCREMENT,
    `locale_name` VARCHAR(5) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_locale`),
    UNIQUE INDEX `pac_locale_U_1` (`locale_name`),
    INDEX `pac_locale_I_1` (`locale_name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_touch`
(
    `id_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `item_id` INTEGER NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_touch`),
    UNIQUE INDEX `pac_touch_U_1` (`item_id`, `item_type`),
    INDEX `pac_touch_I_1` (`touched`),
    INDEX `pac_touch_I_2` (`item_id`),
    INDEX `pac_touch_I_3` (`item_type`),
    INDEX `pac_touch_I_4` (`item_event`)
) ENGINE=InnoDB;

CREATE TABLE `pac_document_template_version`
(
    `id_document_template` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `content` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_document_template`,`version`),
    CONSTRAINT `pac_document_template_version_FK_1`
        FOREIGN KEY (`id_document_template`)
        REFERENCES `pac_document_template` (`id_document_template`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_mail_template_version`
(
    `id_mail_template` INTEGER NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `subject` VARCHAR(255),
    `sender` VARCHAR(255),
    `sender_name` VARCHAR(255),
    `text` TEXT,
    `html` TEXT,
    `date_interval` VARCHAR(255),
    `wrapper` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `wrapper_version` INTEGER DEFAULT 0,
    `pac_mail_template_ids` TEXT,
    `pac_mail_template_versions` TEXT,
    PRIMARY KEY (`id_mail_template`,`version`),
    CONSTRAINT `pac_mail_template_version_FK_1`
        FOREIGN KEY (`id_mail_template`)
        REFERENCES `pac_mail_template` (`id_mail_template`)
        ON DELETE CASCADE
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

DROP TABLE IF EXISTS `pac_acl_role`;

DROP TABLE IF EXISTS `pac_acl_user`;

DROP TABLE IF EXISTS `pac_acl_resource`;

DROP TABLE IF EXISTS `pac_acl_group_privilege`;

DROP TABLE IF EXISTS `pac_acl_group`;

DROP TABLE IF EXISTS `pac_cart`;

DROP TABLE IF EXISTS `pac_cart_item`;

DROP TABLE IF EXISTS `pac_cart_item_option`;

DROP TABLE IF EXISTS `pac_cart_user`;

DROP TABLE IF EXISTS `pac_cart_user_step`;

DROP TABLE IF EXISTS `pac_catalog_product`;

DROP TABLE IF EXISTS `pac_catalog_product_bundle`;

DROP TABLE IF EXISTS `pac_catalog_product_bundle_product`;

DROP TABLE IF EXISTS `pac_catalog_product_single`;

DROP TABLE IF EXISTS `pac_catalog_product_config`;

DROP TABLE IF EXISTS `pac_catalog_product_simple`;

DROP TABLE IF EXISTS `pac_catalog_attribute_set`;

DROP TABLE IF EXISTS `pac_catalog_attribute`;

DROP TABLE IF EXISTS `pac_catalog_group`;

DROP TABLE IF EXISTS `pac_catalog_value_type`;

DROP TABLE IF EXISTS `pac_catalog_attribute_group`;

DROP TABLE IF EXISTS `pac_catalog_attribute_set_group`;

DROP TABLE IF EXISTS `pac_catalog_value_option`;

DROP TABLE IF EXISTS `pac_catalog_value_option_multi`;

DROP TABLE IF EXISTS `pac_catalog_value_option_single`;

DROP TABLE IF EXISTS `pac_catalog_value_integer`;

DROP TABLE IF EXISTS `pac_catalog_value_timestamp`;

DROP TABLE IF EXISTS `pac_catalog_value_decimal`;

DROP TABLE IF EXISTS `pac_catalog_value_text`;

DROP TABLE IF EXISTS `pac_catalog_value_boolean`;

DROP TABLE IF EXISTS `pac_catalog_product_category`;

DROP TABLE IF EXISTS `pac_catalog_option`;

DROP TABLE IF EXISTS `pac_catalog_option_type`;

DROP TABLE IF EXISTS `pac_catalog_product_option`;

DROP TABLE IF EXISTS `pac_category_scope`;

DROP TABLE IF EXISTS `pac_category_name`;

DROP TABLE IF EXISTS `pac_category_attribute_key`;

DROP TABLE IF EXISTS `pac_category`;

DROP TABLE IF EXISTS `pac_category_attribute`;

DROP TABLE IF EXISTS `pac_category_tree`;

DROP TABLE IF EXISTS `pac_category_node`;

DROP TABLE IF EXISTS `pac_category_closure_table`;

DROP TABLE IF EXISTS `pac_category_tree_attribute`;

DROP TABLE IF EXISTS `pac_cms_page`;

DROP TABLE IF EXISTS `pac_cms_layout`;

DROP TABLE IF EXISTS `pac_cms_template`;

DROP TABLE IF EXISTS `pac_cms_partial`;

DROP TABLE IF EXISTS `pac_cms_template_partial`;

DROP TABLE IF EXISTS `pac_cms_page_block`;

DROP TABLE IF EXISTS `pac_cms_block`;

DROP TABLE IF EXISTS `pac_cms_block_type`;

DROP TABLE IF EXISTS `pac_cms_block_text`;

DROP TABLE IF EXISTS `pac_cms_block_product`;

DROP TABLE IF EXISTS `pac_cms_block_glossary`;

DROP TABLE IF EXISTS `pac_cms_page_attribute`;

DROP TABLE IF EXISTS `pac_cms_page_attribute_value`;

DROP TABLE IF EXISTS `pac_cms_redirection`;

DROP TABLE IF EXISTS `pac_customer`;

DROP TABLE IF EXISTS `pac_customer_status`;

DROP TABLE IF EXISTS `pac_customer_address`;

DROP TABLE IF EXISTS `pac_document_type`;

DROP TABLE IF EXISTS `pac_document_render_engine`;

DROP TABLE IF EXISTS `pac_document_template`;

DROP TABLE IF EXISTS `pac_document_configuration`;

DROP TABLE IF EXISTS `pac_document_render_process`;

DROP TABLE IF EXISTS `pac_document`;

DROP TABLE IF EXISTS `pac_glossary_key`;

DROP TABLE IF EXISTS `pac_glossary_translation`;

DROP TABLE IF EXISTS `pac_invoice`;

DROP TABLE IF EXISTS `pac_invoice_configuration`;

DROP TABLE IF EXISTS `pac_invoice_document`;

DROP TABLE IF EXISTS `pac_invoice_number`;

DROP TABLE IF EXISTS `pac_kendo_grid_state`;

DROP TABLE IF EXISTS `pac_mail_queue`;

DROP TABLE IF EXISTS `pac_mail_template`;

DROP TABLE IF EXISTS `pac_misc_country`;

DROP TABLE IF EXISTS `pac_misc_region`;

DROP TABLE IF EXISTS `pac_misc_lock`;

DROP TABLE IF EXISTS `pac_newsletter_subscription`;

DROP TABLE IF EXISTS `pac_oms_transition_log`;

DROP TABLE IF EXISTS `pac_oms_order_process`;

DROP TABLE IF EXISTS `pac_oms_order_item_status`;

DROP TABLE IF EXISTS `pac_oms_order_item_status_history`;

DROP TABLE IF EXISTS `pac_oms_event_timeout`;

DROP TABLE IF EXISTS `pac_payment`;

DROP TABLE IF EXISTS `pac_payment_account`;

DROP TABLE IF EXISTS `pac_payment_transaction`;

DROP TABLE IF EXISTS `pac_payment_config`;

DROP TABLE IF EXISTS `pac_payment_control_raw_data_log`;

DROP TABLE IF EXISTS `pac_payment_transaction_payone`;

DROP TABLE IF EXISTS `pac_price_product`;

DROP TABLE IF EXISTS `pac_price_type`;

DROP TABLE IF EXISTS `pac_price_attribute`;

DROP TABLE IF EXISTS `pac_price_attribute_value`;

DROP TABLE IF EXISTS `pac_abstract_product`;

DROP TABLE IF EXISTS `pac_abstract_product_localized_attributes`;

DROP TABLE IF EXISTS `pac_product`;

DROP TABLE IF EXISTS `pac_product_localized_attributes`;

DROP TABLE IF EXISTS `pac_product_to_bundle`;

DROP TABLE IF EXISTS `pac_tax`;

DROP TABLE IF EXISTS `pac_attributes_metadata`;

DROP TABLE IF EXISTS `pac_attribute_type`;

DROP TABLE IF EXISTS `pac_attribute_type_value`;

DROP TABLE IF EXISTS `pac_product_category`;

DROP TABLE IF EXISTS `pac_catalog_product_image_size`;

DROP TABLE IF EXISTS `pac_catalog_product_image`;

DROP TABLE IF EXISTS `pac_product_search_attributes_operation`;

DROP TABLE IF EXISTS `pac_sales_order_address`;

DROP TABLE IF EXISTS `pac_sales_order_address_history`;

DROP TABLE IF EXISTS `pac_sales_order`;

DROP TABLE IF EXISTS `pac_sales_order_item`;

DROP TABLE IF EXISTS `pac_sales_order_item_option`;

DROP TABLE IF EXISTS `pac_sales_order_note`;

DROP TABLE IF EXISTS `pac_sales_order_comment`;

DROP TABLE IF EXISTS `pac_sales_expense`;

DROP TABLE IF EXISTS `pac_sales_discount`;

DROP TABLE IF EXISTS `pac_sales_discount_code`;

DROP TABLE IF EXISTS `pac_sales_order_item_bundle`;

DROP TABLE IF EXISTS `pac_sales_order_item_bundle_item`;

DROP TABLE IF EXISTS `pac_salesrule`;

DROP TABLE IF EXISTS `pac_salesrule_condition`;

DROP TABLE IF EXISTS `pac_salesrule_codepool`;

DROP TABLE IF EXISTS `pac_salesrule_code`;

DROP TABLE IF EXISTS `pac_salesrule_code_usage`;

DROP TABLE IF EXISTS `pac_stock`;

DROP TABLE IF EXISTS `pac_stock_product`;

DROP TABLE IF EXISTS `pac_yves_kv_update`;

DROP TABLE IF EXISTS `pac_yves_control`;

DROP TABLE IF EXISTS `pac_yves_export_touch`;

DROP TABLE IF EXISTS `pac_locale`;

DROP TABLE IF EXISTS `pac_touch`;

DROP TABLE IF EXISTS `pac_document_template_version`;

DROP TABLE IF EXISTS `pac_mail_template_version`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}