<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1376574181.
 * Generated on 2013-08-15 13:43:01 by reneklatt
 */
class PropelMigration_1376574181
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
    `fk_acl_role` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `is_deleteable` TINYINT(1) DEFAULT 1,
    `is_admin` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    UNIQUE INDEX `pac_acl_role_U_1` (`name`),
    INDEX `pac_acl_role_FI_1` (`fk_acl_role`),
    CONSTRAINT `pac_acl_role_FK_1`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `pac_acl_role` (`id_acl_role`)
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
    `is_active` TINYINT(1) DEFAULT 1,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `is_default` TINYINT(1) DEFAULT 0,
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
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_resource`),
    UNIQUE INDEX `pac_acl_resource_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_privilege`
(
    `id_acl_privilege` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_resource` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_privilege`),
    INDEX `pac_acl_privilege_FI_1` (`fk_acl_resource`),
    CONSTRAINT `pac_acl_privilege_FK_1`
        FOREIGN KEY (`fk_acl_resource`)
        REFERENCES `pac_acl_resource` (`id_acl_resource`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_role_resource`
(
    `id_acl_role_resource` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_role` INTEGER NOT NULL,
    `fk_acl_resource` INTEGER NOT NULL,
    PRIMARY KEY (`id_acl_role_resource`),
    INDEX `pac_acl_role_resource_FI_1` (`fk_acl_role`),
    INDEX `pac_acl_role_resource_FI_2` (`fk_acl_resource`),
    CONSTRAINT `pac_acl_role_resource_FK_1`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `pac_acl_role` (`id_acl_role`),
    CONSTRAINT `pac_acl_role_resource_FK_2`
        FOREIGN KEY (`fk_acl_resource`)
        REFERENCES `pac_acl_resource` (`id_acl_resource`)
) ENGINE=InnoDB;

CREATE TABLE `pac_acl_role_privilege`
(
    `id_acl_role_privilege` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_role` INTEGER NOT NULL,
    `fk_acl_resource` INTEGER NOT NULL,
    `fk_acl_privilege` INTEGER NOT NULL,
    PRIMARY KEY (`id_acl_role_privilege`),
    INDEX `pac_acl_role_privilege_FI_1` (`fk_acl_role`),
    INDEX `pac_acl_role_privilege_FI_2` (`fk_acl_resource`),
    INDEX `pac_acl_role_privilege_FI_3` (`fk_acl_privilege`),
    CONSTRAINT `pac_acl_role_privilege_FK_1`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `pac_acl_role` (`id_acl_role`),
    CONSTRAINT `pac_acl_role_privilege_FK_2`
        FOREIGN KEY (`fk_acl_resource`)
        REFERENCES `pac_acl_resource` (`id_acl_resource`),
    CONSTRAINT `pac_acl_role_privilege_FK_3`
        FOREIGN KEY (`fk_acl_privilege`)
        REFERENCES `pac_acl_privilege` (`id_acl_privilege`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment_adyen`
(
    `id_payment_adyen` INTEGER NOT NULL,
    `authCode` VARCHAR(10),
    PRIMARY KEY (`id_payment_adyen`),
    CONSTRAINT `pac_payment_adyen_FK_1`
        FOREIGN KEY (`id_payment_adyen`)
        REFERENCES `pac_payment` (`id_payment`)
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
    `variety` ENUM(\'Config\',\'Simple\',\'Bundle\') NOT NULL,
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
    `variety` ENUM(\'Text\',\'Integer\',\'Boolean\',\'OptionSingle\',\'OptionMulti\',\'Decimal\',\'TextArea\',\'Timestamp\') NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_attribute_set` INTEGER NOT NULL,
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
    `value` INTEGER NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
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
    `value` DATETIME NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
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
    `value` DECIMAL(15,5) NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
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
    `value` VARCHAR(20000) NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_text`),
    UNIQUE INDEX `pac_catalog_value_text_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_text_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_text_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_text_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_text_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_text_area`
(
    `id_catalog_value_text_area` INTEGER NOT NULL AUTO_INCREMENT,
    `value` VARCHAR(20000) NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_value_text_area`),
    UNIQUE INDEX `pac_catalog_value_text_area_U_1` (`fk_catalog_attribute`, `fk_catalog_product`),
    INDEX `pac_catalog_value_text_area_I_1` (`value`, `fk_catalog_attribute`),
    INDEX `pac_catalog_value_text_area_FI_2` (`fk_catalog_product`),
    CONSTRAINT `pac_catalog_value_text_area_FK_1`
        FOREIGN KEY (`fk_catalog_attribute`)
        REFERENCES `pac_catalog_attribute` (`id_catalog_attribute`),
    CONSTRAINT `pac_catalog_value_text_area_FK_2`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `pac_catalog_value_boolean`
(
    `id_catalog_value_boolean` INTEGER NOT NULL AUTO_INCREMENT,
    `value` TINYINT(1) NOT NULL,
    `fk_catalog_attribute` INTEGER NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
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
    INDEX `pac_catalog_product_category_FI_2` (`fk_category_name`),
    CONSTRAINT `pac_catalog_product_category_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_catalog_product_category_FK_2`
        FOREIGN KEY (`fk_category_name`)
        REFERENCES `pac_category_name` (`id_category_name`)
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

CREATE TABLE `pac_category_name`
(
    `id_category_name` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `status` INTEGER DEFAULT 1,
    PRIMARY KEY (`id_category_name`)
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

CREATE TABLE `pac_category_scope`
(
    `id_category_scope` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_category_scope`),
    UNIQUE INDEX `pac_category_scope_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page`
(
    `id_cms_page` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_page_type` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `user` VARCHAR(255) DEFAULT \'acl user\' NOT NULL,
    `updated_from` INTEGER,
    `version` SMALLINT DEFAULT 1,
    `status` TINYINT DEFAULT 2 NOT NULL,
    `content` LONGTEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_page`),
    UNIQUE INDEX `pac_cms_page_U_1` (`url`),
    INDEX `pac_cms_page_I_1` (`fk_cms_page_type`),
    CONSTRAINT `pac_cms_page_FK_1`
        FOREIGN KEY (`fk_cms_page_type`)
        REFERENCES `pac_cms_page_type` (`id_cms_page_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_page_type`
(
    `id_cms_page_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `layout` VARCHAR(32) NOT NULL,
    `view` VARCHAR(32) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_cms_page_type`),
    UNIQUE INDEX `pac_cms_page_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_element_page`
(
    `id_cms_element_page` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_element` INTEGER NOT NULL,
    `fk_cms_page` INTEGER NOT NULL,
    PRIMARY KEY (`id_cms_element_page`),
    INDEX `pac_cms_element_page_FI_1` (`fk_cms_page`),
    INDEX `pac_cms_element_page_FI_2` (`fk_cms_element`),
    CONSTRAINT `pac_cms_element_page_FK_1`
        FOREIGN KEY (`fk_cms_page`)
        REFERENCES `pac_cms_page` (`id_cms_page`),
    CONSTRAINT `pac_cms_element_page_FK_2`
        FOREIGN KEY (`fk_cms_element`)
        REFERENCES `pac_cms_element` (`id_cms_element`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_element`
(
    `id_cms_element` INTEGER NOT NULL AUTO_INCREMENT,
    `element_key` VARCHAR(255) DEFAULT \'\' NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    `content` TEXT NOT NULL,
    `fk_cms_element_type` INTEGER NOT NULL,
    `updated_from` INTEGER,
    `version` SMALLINT DEFAULT 1,
    `status` TINYINT DEFAULT 2 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_element`),
    UNIQUE INDEX `pac_cms_element_U_1` (`name`),
    INDEX `pac_cms_element_FI_1` (`fk_cms_element_type`),
    CONSTRAINT `pac_cms_element_FK_1`
        FOREIGN KEY (`fk_cms_element_type`)
        REFERENCES `pac_cms_element_type` (`id_cms_element_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_element_type`
(
    `id_cms_element_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `element_type_key` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    `input` VARCHAR(255) NOT NULL,
    `tab` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_element_type`),
    UNIQUE INDEX `pac_cms_element_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_elementtype_pagetype_constraint`
(
    `fk_cms_page_type` INTEGER NOT NULL,
    `fk_cms_element_type` INTEGER NOT NULL,
    `is_default` TINYINT DEFAULT 0,
    PRIMARY KEY (`fk_cms_page_type`,`fk_cms_element_type`),
    INDEX `pac_cms_elementtype_pagetype_constraint_FI_1` (`fk_cms_element_type`),
    CONSTRAINT `pac_cms_elementtype_pagetype_constraint_FK_1`
        FOREIGN KEY (`fk_cms_element_type`)
        REFERENCES `pac_cms_element_type` (`id_cms_element_type`),
    CONSTRAINT `pac_cms_elementtype_pagetype_constraint_FK_2`
        FOREIGN KEY (`fk_cms_page_type`)
        REFERENCES `pac_cms_page_type` (`id_cms_page_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_media`
(
    `id_cms_media` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `mime_type` VARCHAR(255) NOT NULL,
    `updated_from` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_media`)
) ENGINE=InnoDB;

CREATE TABLE `pac_cms_redirection`
(
    `id_cms_redirection` INTEGER NOT NULL AUTO_INCREMENT,
    `url_source` VARCHAR(255) NOT NULL,
    `url_target` VARCHAR(255) NOT NULL,
    `type` TINYINT DEFAULT 0 NOT NULL,
    `status` TINYINT DEFAULT 2 NOT NULL,
    `description` VARCHAR(255),
    `user` VARCHAR(255) DEFAULT \'acl user\' NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_redirection`),
    UNIQUE INDEX `pac_cms_redirection_U_1` (`url_source`)
) ENGINE=InnoDB;

CREATE TABLE `pac_customer`
(
    `id_customer` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer_status` INTEGER NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `increment_id` VARCHAR(45),
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `gender` TINYINT,
    `date_of_birth` DATE,
    `password` VARCHAR(255) NOT NULL,
    `restore_password_key` VARCHAR(150),
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
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255) NOT NULL,
    `address2` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `is_deleted` SMALLINT DEFAULT 0 NOT NULL,
    `comment` VARCHAR(255),
    `deleted_at` DATETIME,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_address`),
    INDEX `pac_customer_address_I_1` (`fk_customer`),
    INDEX `pac_customer_address_FI_2` (`fk_misc_country`),
    CONSTRAINT `pac_customer_address_FK_1`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`),
    CONSTRAINT `pac_customer_address_FK_2`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_report_permission`
(
    `id_dwh_report_permission` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_user` INTEGER NOT NULL,
    `report_id` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_dwh_report_permission`),
    INDEX `pac_dwh_report_permission_FI_1` (`fk_acl_user`),
    CONSTRAINT `pac_dwh_report_permission_FK_1`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_saiku_permission`
(
    `id_dwh_saiku_permission` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_user` INTEGER NOT NULL,
    PRIMARY KEY (`id_dwh_saiku_permission`),
    INDEX `pac_dwh_saiku_permission_FI_1` (`fk_acl_user`),
    CONSTRAINT `pac_dwh_saiku_permission_FK_1`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_mdx_log`
(
    `id_dwh_mdx_log` INTEGER NOT NULL AUTO_INCREMENT,
    `mdx_query` TEXT NOT NULL,
    `mdx_query_hash` VARCHAR(255) NOT NULL,
    `execution_time` DOUBLE NOT NULL,
    `exception_message` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_mdx_log`),
    INDEX `pac_dwh_mdx_log_I_1` (`mdx_query_hash`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_import_run`
(
    `id_dwh_import_run` INTEGER NOT NULL AUTO_INCREMENT,
    `execution_time` DOUBLE NOT NULL,
    `succeeded` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_import_run`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_process_run`
(
    `id_dwh_process_run` INTEGER NOT NULL AUTO_INCREMENT,
    `process_name` VARCHAR(255) NOT NULL,
    `execution_time` DOUBLE NOT NULL,
    `fk_dwh_import_run` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_process_run`),
    INDEX `pac_dwh_process_run_I_1` (`process_name`, `created_at`),
    INDEX `pac_dwh_process_run_FI_1` (`fk_dwh_import_run`),
    CONSTRAINT `pac_dwh_process_run_FK_1`
        FOREIGN KEY (`fk_dwh_import_run`)
        REFERENCES `pac_dwh_import_run` (`id_dwh_import_run`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_job_run`
(
    `id_dwh_job_run` INTEGER NOT NULL AUTO_INCREMENT,
    `job_name` VARCHAR(255) NOT NULL,
    `process_name` VARCHAR(255) NOT NULL,
    `execution_time` DOUBLE NOT NULL,
    `fk_dwh_process_run` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_job_run`),
    INDEX `pac_dwh_job_run_I_1` (`process_name`),
    INDEX `pac_dwh_job_run_I_2` (`job_name`, `created_at`),
    INDEX `pac_dwh_job_run_FI_1` (`fk_dwh_process_run`),
    CONSTRAINT `pac_dwh_job_run_FK_1`
        FOREIGN KEY (`fk_dwh_process_run`)
        REFERENCES `pac_dwh_process_run` (`id_dwh_process_run`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_relation_size`
(
    `id_dwh_relation_size` INTEGER NOT NULL AUTO_INCREMENT,
    `relation` VARCHAR(255) NOT NULL,
    `size` BIGINT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_relation_size`),
    INDEX `pac_dwh_relation_size_I_1` (`relation`, `created_at`)
) ENGINE=InnoDB;

CREATE TABLE `pac_dwh_query_token`
(
    `id_dwh_query_token` INTEGER NOT NULL AUTO_INCREMENT,
    `uid` VARCHAR(255) NOT NULL,
    `div` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `query` TEXT NOT NULL,
    `args` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_dwh_query_token`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_group`
(
    `id_glossary_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_glossary_group`),
    UNIQUE INDEX `pac_glossary_group_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_language`
(
    `id_glossary_language` INTEGER NOT NULL AUTO_INCREMENT,
    `locale` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_glossary_language`),
    UNIQUE INDEX `pac_glossary_language_U_1` (`locale`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_key`
(
    `id_glossary_key` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_glossary_group` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `is_global` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_glossary_key`),
    UNIQUE INDEX `pac_glossary_key_U_1` (`name`),
    INDEX `is_global` (`is_global`),
    INDEX `is_deleted` (`is_deleted`),
    INDEX `pac_glossary_key_FI_1` (`fk_glossary_group`),
    CONSTRAINT `pac_glossary_key_FK_1`
        FOREIGN KEY (`fk_glossary_group`)
        REFERENCES `pac_glossary_group` (`id_glossary_group`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_explanation`
(
    `id_glossary_explanation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_glossary_language` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER NOT NULL,
    `text` LONGTEXT NOT NULL,
    `version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_glossary_explanation`),
    UNIQUE INDEX `pac_glossary_explanation_U_1` (`fk_glossary_language`, `fk_glossary_key`),
    INDEX `pac_glossary_explanation_FI_2` (`fk_glossary_key`),
    CONSTRAINT `pac_glossary_explanation_FK_1`
        FOREIGN KEY (`fk_glossary_language`)
        REFERENCES `pac_glossary_language` (`id_glossary_language`)
        ON DELETE CASCADE,
    CONSTRAINT `pac_glossary_explanation_FK_2`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `pac_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_lookup`
(
    `id_glossary_lookup` INTEGER NOT NULL AUTO_INCREMENT,
    `store` VARCHAR(255) NOT NULL,
    `locale` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `text` LONGTEXT NOT NULL,
    PRIMARY KEY (`id_glossary_lookup`),
    UNIQUE INDEX `name_store_language` (`name`, `store`, `locale`)
) ENGINE=InnoDB;

CREATE TABLE `pac_image_size`
(
    `id_image_size` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `width` INTEGER NOT NULL,
    `height` INTEGER NOT NULL,
    `quality` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_image_size`)
) ENGINE=InnoDB;

CREATE TABLE `pac_image`
(
    `id_image` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_image_size` INTEGER NOT NULL,
    `mapping_id` INTEGER NOT NULL,
    `priority` INTEGER DEFAULT 50 NOT NULL,
    `type` TINYINT NOT NULL,
    `original_image_path` VARCHAR(255) NOT NULL,
    `base_url_key` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_image`),
    INDEX `pac_image_I_1` (`mapping_id`),
    INDEX `pac_image_I_2` (`type`),
    INDEX `pac_image_FI_1` (`fk_image_size`),
    CONSTRAINT `pac_image_FK_1`
        FOREIGN KEY (`fk_image_size`)
        REFERENCES `pac_image_size` (`id_image_size`)
) ENGINE=InnoDB;

CREATE TABLE `pac_image_product`
(
    `id_image_product` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_image` INTEGER NOT NULL,
    PRIMARY KEY (`id_image_product`),
    UNIQUE INDEX `pac_image_product_U_1` (`fk_image`, `fk_catalog_product`),
    INDEX `pac_image_product_FI_1` (`fk_catalog_product`),
    CONSTRAINT `pac_image_product_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_image_product_FK_2`
        FOREIGN KEY (`fk_image`)
        REFERENCES `pac_image` (`id_image`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice`
(
    `id_invoice` INTEGER NOT NULL AUTO_INCREMENT,
    `invoice_number` VARCHAR(255),
    `fk_sales_order` INTEGER NOT NULL,
    `note` VARCHAR(255),
    `currency_code` VARCHAR(20),
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

CREATE TABLE `pac_invoice_item`
(
    `id_invoice_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_invoice` INTEGER NOT NULL,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice_item`),
    INDEX `pac_invoice_item_FI_1` (`fk_sales_order_item`),
    INDEX `pac_invoice_item_FI_2` (`fk_invoice`),
    CONSTRAINT `pac_invoice_item_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_invoice_item_FK_2`
        FOREIGN KEY (`fk_invoice`)
        REFERENCES `pac_invoice` (`id_invoice`)
) ENGINE=InnoDB;

CREATE TABLE `pac_invoice_document`
(
    `id_invoice_document` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_invoice` INTEGER NOT NULL,
    `content` LONGBLOB,
    `layout_type` TINYINT DEFAULT 0 NOT NULL,
    `content_type` TINYINT DEFAULT 1 NOT NULL,
    `filename` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_invoice_document`),
    INDEX `pac_invoice_document_I_1` (`layout_type`),
    INDEX `pac_invoice_document_I_2` (`content_type`),
    INDEX `pac_invoice_document_FI_1` (`fk_invoice`),
    CONSTRAINT `pac_invoice_document_FK_1`
        FOREIGN KEY (`fk_invoice`)
        REFERENCES `pac_invoice` (`id_invoice`)
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

CREATE TABLE `pac_mail_queue`
(
    `id_mail_queue` INTEGER NOT NULL AUTO_INCREMENT,
    `mail_type` VARCHAR(255) NOT NULL,
    `transfer_string` TEXT NOT NULL,
    `reference_id` INTEGER NOT NULL,
    `sent` TINYINT DEFAULT 0 NOT NULL,
    `send_tries` INTEGER(2) DEFAULT 0 NOT NULL,
    `last_response` LONGTEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_mail_queue`),
    INDEX `pac_mail_queue_I_1` (`sent`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mci_cost_entry`
(
    `id_mci_cost_entry` INTEGER NOT NULL AUTO_INCREMENT,
    `from` DATE NOT NULL,
    `to` DATE NOT NULL,
    `cost` INTEGER NOT NULL,
    `fk_mci_cost_type` INTEGER NOT NULL,
    `fk_mcm_channel` INTEGER NOT NULL,
    `fk_mcm_partner_in_channel` INTEGER,
    `fk_mcm_publication` INTEGER,
    `fk_mcm_campaign` INTEGER,
    `fk_acl_user_created` INTEGER NOT NULL,
    `fk_acl_user_updated` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_mci_cost_entry`),
    INDEX `pac_mci_cost_entry_FI_1` (`fk_mci_cost_type`),
    INDEX `pac_mci_cost_entry_FI_2` (`fk_mcm_channel`),
    INDEX `pac_mci_cost_entry_FI_3` (`fk_mcm_partner_in_channel`),
    INDEX `pac_mci_cost_entry_FI_4` (`fk_mcm_publication`),
    INDEX `pac_mci_cost_entry_FI_5` (`fk_mcm_campaign`),
    INDEX `pac_mci_cost_entry_FI_6` (`fk_acl_user_created`),
    INDEX `pac_mci_cost_entry_FI_7` (`fk_acl_user_updated`),
    CONSTRAINT `pac_mci_cost_entry_FK_1`
        FOREIGN KEY (`fk_mci_cost_type`)
        REFERENCES `pac_mci_cost_type` (`id_mci_cost_type`),
    CONSTRAINT `pac_mci_cost_entry_FK_2`
        FOREIGN KEY (`fk_mcm_channel`)
        REFERENCES `pac_mcm_channel` (`id_mcm_channel`),
    CONSTRAINT `pac_mci_cost_entry_FK_3`
        FOREIGN KEY (`fk_mcm_partner_in_channel`)
        REFERENCES `pac_mcm_partner_in_channel` (`id_mcm_partner_in_channel`),
    CONSTRAINT `pac_mci_cost_entry_FK_4`
        FOREIGN KEY (`fk_mcm_publication`)
        REFERENCES `pac_mcm_publication` (`id_mcm_publication`),
    CONSTRAINT `pac_mci_cost_entry_FK_5`
        FOREIGN KEY (`fk_mcm_campaign`)
        REFERENCES `pac_mcm_campaign` (`id_mcm_campaign`),
    CONSTRAINT `pac_mci_cost_entry_FK_6`
        FOREIGN KEY (`fk_acl_user_created`)
        REFERENCES `pac_acl_user` (`id_acl_user`),
    CONSTRAINT `pac_mci_cost_entry_FK_7`
        FOREIGN KEY (`fk_acl_user_updated`)
        REFERENCES `pac_acl_user` (`id_acl_user`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mci_cost_type`
(
    `id_mci_cost_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_mci_cost_type`),
    UNIQUE INDEX `pac_mci_cost_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_channel`
(
    `id_mcm_channel` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_mcm_channel`),
    UNIQUE INDEX `pac_mcm_channel_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_partner_in_channel`
(
    `id_mcm_partner_in_channel` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_mcm_partner` INTEGER NOT NULL,
    `fk_mcm_channel` INTEGER NOT NULL,
    PRIMARY KEY (`id_mcm_partner_in_channel`),
    INDEX `pac_mcm_partner_in_channel_FI_1` (`fk_mcm_partner`),
    INDEX `pac_mcm_partner_in_channel_FI_2` (`fk_mcm_channel`),
    CONSTRAINT `pac_mcm_partner_in_channel_FK_1`
        FOREIGN KEY (`fk_mcm_partner`)
        REFERENCES `pac_mcm_partner` (`id_mcm_partner`),
    CONSTRAINT `pac_mcm_partner_in_channel_FK_2`
        FOREIGN KEY (`fk_mcm_channel`)
        REFERENCES `pac_mcm_channel` (`id_mcm_channel`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_partner`
(
    `id_mcm_partner` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_mcm_partner`),
    UNIQUE INDEX `pac_mcm_partner_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_publication`
(
    `id_mcm_publication` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_mcm_partner_in_channel` INTEGER NOT NULL,
    PRIMARY KEY (`id_mcm_publication`),
    INDEX `pac_mcm_publication_FI_1` (`fk_mcm_partner_in_channel`),
    CONSTRAINT `pac_mcm_publication_FK_1`
        FOREIGN KEY (`fk_mcm_partner_in_channel`)
        REFERENCES `pac_mcm_partner_in_channel` (`id_mcm_partner_in_channel`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_campaign`
(
    `id_mcm_campaign` INTEGER NOT NULL AUTO_INCREMENT,
    `wmc` INTEGER,
    `fk_mcm_publication` INTEGER NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_mcm_campaign`),
    INDEX `pac_mcm_campaign_FI_1` (`fk_mcm_publication`),
    CONSTRAINT `pac_mcm_campaign_FK_1`
        FOREIGN KEY (`fk_mcm_publication`)
        REFERENCES `pac_mcm_publication` (`id_mcm_publication`)
) ENGINE=InnoDB;

CREATE TABLE `pac_mcm_relation`
(
    `id_mcm_relation` INTEGER NOT NULL AUTO_INCREMENT,
    `type` TINYINT NOT NULL,
    `fk_tree_location` INTEGER NOT NULL,
    `fk_tracking_instance` INTEGER NOT NULL,
    PRIMARY KEY (`id_mcm_relation`),
    INDEX `pac_mcm_relation_FI_1` (`fk_tracking_instance`),
    CONSTRAINT `pac_mcm_relation_FK_1`
        FOREIGN KEY (`fk_tracking_instance`)
        REFERENCES `pac_tracking_instance` (`id_tracking_instance`)
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
    INDEX `pac_misc_country_I_1` (`iso3_code`)
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
    `fk_customer` INTEGER,
    `status` TINYINT DEFAULT 0,
    `gender` TINYINT,
    `zip_code` VARCHAR(15),
    `confirmation_key` VARCHAR(32) NOT NULL,
    `unsubscription_key` VARCHAR(32),
    `subscribed_at` DATETIME,
    `confirmed_at` DATETIME,
    `unsubscribed_at` DATETIME,
    PRIMARY KEY (`id_newsletter_subscription`),
    UNIQUE INDEX `newsletter_subscription_email` (`email`),
    INDEX `pac_newsletter_subscription_FI_1` (`fk_customer`),
    CONSTRAINT `pac_newsletter_subscription_FK_1`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `pac_payment`
(
    `id_payment` INTEGER NOT NULL,
    `transaction` VARCHAR(60) NOT NULL,
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
    `amount_delta` INTEGER NOT NULL,
    `amount_sum` INTEGER NOT NULL,
    `type` TINYINT,
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
    `sequence_nr` VARCHAR(32),
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
    INDEX `pac_price_product_FI_2` (`fk_price_type`),
    CONSTRAINT `pac_price_product_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_price_product_FK_2`
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

CREATE TABLE `pac_sales_order_item_status`
(
    `id_sales_order_item_status` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_sales_order_item_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item_status_history`
(
    `id_sales_order_item_status_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_sales_order_item_status` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_status_history`),
    INDEX `pac_sales_order_item_status_history_FI_1` (`fk_sales_order_item`),
    INDEX `pac_sales_order_item_status_history_FI_2` (`fk_sales_order_item_status`),
    CONSTRAINT `pac_sales_order_item_status_history_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_sales_order_item_status_history_FK_2`
        FOREIGN KEY (`fk_sales_order_item_status`)
        REFERENCES `pac_sales_order_item_status` (`id_sales_order_item_status`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item_transition_log`
(
    `id_sales_order_item_transition_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_acl_user` INTEGER,
    `locked` TINYINT(1),
    `fk_sales_order_process` INTEGER,
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
    PRIMARY KEY (`id_sales_order_item_transition_log`),
    INDEX `pac_sales_order_item_transition_log_FI_1` (`fk_sales_order`),
    INDEX `pac_sales_order_item_transition_log_FI_2` (`fk_sales_order_item`),
    INDEX `pac_sales_order_item_transition_log_FI_3` (`fk_acl_user`),
    INDEX `pac_sales_order_item_transition_log_FI_4` (`fk_sales_order_process`),
    CONSTRAINT `pac_sales_order_item_transition_log_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_sales_order_item_transition_log_FK_2`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `pac_sales_order_item_transition_log_FK_3`
        FOREIGN KEY (`fk_acl_user`)
        REFERENCES `pac_acl_user` (`id_acl_user`),
    CONSTRAINT `pac_sales_order_item_transition_log_FK_4`
        FOREIGN KEY (`fk_sales_order_process`)
        REFERENCES `pac_sales_order_process` (`id_sales_order_process`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_address`
(
    `id_sales_order_address` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_misc_country` INTEGER NOT NULL,
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
    CONSTRAINT `pac_sales_order_address_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_address_history`
(
    `id_sales_order_address_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_misc_country` INTEGER NOT NULL,
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
    CONSTRAINT `pac_sales_order_address_history_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `pac_sales_order_address_history_FK_2`
        FOREIGN KEY (`fk_sales_order_address`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order`
(
    `id_sales_order` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_address_billing` INTEGER NOT NULL,
    `fk_sales_order_address_shipping` INTEGER NOT NULL,
    `fk_customer` INTEGER,
    `fk_sales_order_process` INTEGER,
    `email` VARCHAR(255),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `customer_session_id` VARCHAR(100),
    `increment_id` VARCHAR(45),
    `invoice_number` VARCHAR(45),
    `invoice_generated_at` DATETIME,
    `ip_address` VARCHAR(15),
    `grand_total` INTEGER NOT NULL,
    `subtotal` INTEGER NOT NULL,
    `is_test` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    UNIQUE INDEX `pac_sales_order_U_1` (`increment_id`),
    UNIQUE INDEX `pac_sales_order_U_2` (`invoice_number`),
    INDEX `pac_sales_order_FI_1` (`fk_sales_order_address_billing`),
    INDEX `pac_sales_order_FI_2` (`fk_sales_order_address_shipping`),
    INDEX `pac_sales_order_FI_3` (`fk_customer`),
    INDEX `pac_sales_order_FI_4` (`fk_sales_order_process`),
    CONSTRAINT `pac_sales_order_FK_1`
        FOREIGN KEY (`fk_sales_order_address_billing`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `pac_sales_order_FK_2`
        FOREIGN KEY (`fk_sales_order_address_shipping`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `pac_sales_order_FK_3`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `pac_customer` (`id_customer`),
    CONSTRAINT `pac_sales_order_FK_4`
        FOREIGN KEY (`fk_sales_order_process`)
        REFERENCES `pac_sales_order_process` (`id_sales_order_process`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_item`
(
    `id_sales_order_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_sales_order_item_status` INTEGER NOT NULL,
    `fk_sales_order_process` INTEGER,
    `last_status_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `price_to_pay` INTEGER NOT NULL COMMENT \'/value that the customer has to pay. TODO define calculation rules .unit_price + tax_amount + shipping_amount - coupon_amount./\',
    `paid_amount` INTEGER DEFAULT 0 COMMENT \'/amount which the customer really paid/\',
    `tax_amount` INTEGER COMMENT \'/tax money value/\',
    `tax_percentage` DECIMAL(8,4) COMMENT \'/tax percentage/\',
    `to_be_captured` TINYINT(1),
    `to_be_billed` TINYINT(1),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `pac_sales_order_item_I_1` (`sku`),
    INDEX `pac_sales_order_item_FI_1` (`fk_sales_order`),
    INDEX `pac_sales_order_item_FI_2` (`fk_sales_order_item_status`),
    INDEX `pac_sales_order_item_FI_3` (`fk_sales_order_process`),
    CONSTRAINT `pac_sales_order_item_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `pac_sales_order_item_FK_2`
        FOREIGN KEY (`fk_sales_order_item_status`)
        REFERENCES `pac_sales_order_item_status` (`id_sales_order_item_status`),
    CONSTRAINT `pac_sales_order_item_FK_3`
        FOREIGN KEY (`fk_sales_order_process`)
        REFERENCES `pac_sales_order_process` (`id_sales_order_process`)
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

CREATE TABLE `pac_sales_order_process`
(
    `id_sales_order_process` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_process`),
    UNIQUE INDEX `pac_sales_order_process_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_sales_order_note`
(
    `id_sales_order_note` INTEGER NOT NULL AUTO_INCREMENT,
    `message` VARCHAR(255) NOT NULL,
    `command` VARCHAR(100) NOT NULL,
    `success` TINYINT(1) NOT NULL,
    `fk_acl_user` INTEGER,
    `fk_sales_order` INTEGER NOT NULL,
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

CREATE TABLE `pac_sales_order_history`
(
    `id_sales_order_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `email` VARCHAR(255),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_history`),
    INDEX `pac_sales_order_history_FI_1` (`fk_sales_order`),
    CONSTRAINT `pac_sales_order_history_FK_1`
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
    `is_refundable` TINYINT DEFAULT 0,
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

CREATE TABLE `pac_salesrule`
(
    `id_salesrule` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    `display_name` VARCHAR(255) NOT NULL,
    `scope` TINYINT,
    `action` VARCHAR(255) NOT NULL,
    `amount` FLOAT NOT NULL,
    `is_active` TINYINT DEFAULT 0,
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
    `is_reusable` TINYINT DEFAULT 0,
    `is_once_per_customer` TINYINT DEFAULT 1,
    `is_refundable` TINYINT DEFAULT 0,
    `is_balanced` TINYINT DEFAULT 0,
    `is_voucher` TINYINT DEFAULT 0,
    `is_active` TINYINT DEFAULT 1,
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
    `is_active` TINYINT DEFAULT 1,
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

CREATE TABLE `pac_salesrule_item_discount`
(
    `id_salesrule_item_discount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `is_refundable` TINYINT DEFAULT 0,
    `amount` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_item_discount`),
    INDEX `pac_salesrule_item_discount_FI_1` (`fk_sales_order_item`),
    CONSTRAINT `pac_salesrule_item_discount_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`)
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

CREATE TABLE `pac_salesrule_log`
(
    `id_salesrule_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `log` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule_log`),
    INDEX `pac_salesrule_log_FI_1` (`fk_sales_order`),
    CONSTRAINT `pac_salesrule_log_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock`
(
    `id_stock` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_never_out_of_stock` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_stock`),
    UNIQUE INDEX `pac_stock_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock_attribute`
(
    `id_stock_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_stock_attribute`),
    UNIQUE INDEX `pac_stock_attribute_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock_attribute_value`
(
    `id_stock_attribute_value` INTEGER NOT NULL AUTO_INCREMENT,
    `value` VARCHAR(20000) NOT NULL,
    `fk_stock_attribute` INTEGER NOT NULL,
    `fk_stock` INTEGER NOT NULL,
    PRIMARY KEY (`id_stock_attribute_value`),
    UNIQUE INDEX `pac_stock_attribute_value_U_1` (`fk_stock`, `fk_stock_attribute`),
    INDEX `pac_stock_attribute_value_FI_1` (`fk_stock_attribute`),
    CONSTRAINT `pac_stock_attribute_value_FK_1`
        FOREIGN KEY (`fk_stock_attribute`)
        REFERENCES `pac_stock_attribute` (`id_stock_attribute`),
    CONSTRAINT `pac_stock_attribute_value_FK_2`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `pac_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE `pac_stock_product`
(
    `id_stock_product` INTEGER NOT NULL AUTO_INCREMENT,
    `quantity` INTEGER DEFAULT 0 NOT NULL,
    `fk_catalog_product` INTEGER NOT NULL,
    `fk_stock` INTEGER NOT NULL,
    PRIMARY KEY (`id_stock_product`),
    UNIQUE INDEX `pac_stock_product_U_1` (`fk_stock`, `fk_catalog_product`),
    INDEX `pac_stock_product_FI_1` (`fk_catalog_product`),
    CONSTRAINT `pac_stock_product_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`),
    CONSTRAINT `pac_stock_product_FK_2`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `pac_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_pixel_type`
(
    `id_tracking_pixel_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tracking_pixel_type`),
    UNIQUE INDEX `pac_tracking_pixel_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_conversion_type`
(
    `id_tracking_conversion_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tracking_conversion_type`),
    UNIQUE INDEX `pac_tracking_conversion_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_library`
(
    `id_tracking_library` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_tracking_pixel_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_tracking_library`),
    INDEX `pac_tracking_library_FI_1` (`fk_tracking_pixel_type`),
    CONSTRAINT `pac_tracking_library_FK_1`
        FOREIGN KEY (`fk_tracking_pixel_type`)
        REFERENCES `pac_tracking_pixel_type` (`id_tracking_pixel_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_library_code`
(
    `id_tracking_library_code` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tracking_library` INTEGER NOT NULL,
    `config` TEXT,
    `code` TEXT,
    `original_code` TEXT,
    PRIMARY KEY (`id_tracking_library_code`),
    INDEX `pac_tracking_library_code_FI_1` (`fk_tracking_library`),
    CONSTRAINT `pac_tracking_library_code_FK_1`
        FOREIGN KEY (`fk_tracking_library`)
        REFERENCES `pac_tracking_library` (`id_tracking_library`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_page_type`
(
    `id_tracking_page_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tracking_page_type`),
    UNIQUE INDEX `pac_tracking_page_type_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_page_type_is_conversion`
(
    `id_tracking_page_type_is_conversion` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tracking_page_type` INTEGER NOT NULL,
    `fk_tracking_conversion_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_tracking_page_type_is_conversion`),
    UNIQUE INDEX `pac_tracking_page_type_is_conversion_U_1` (`fk_tracking_page_type`, `fk_tracking_conversion_type`),
    INDEX `pac_tracking_page_type_is_conversion_FI_2` (`fk_tracking_conversion_type`),
    CONSTRAINT `pac_tracking_page_type_is_conversion_FK_1`
        FOREIGN KEY (`fk_tracking_page_type`)
        REFERENCES `pac_tracking_page_type` (`id_tracking_page_type`),
    CONSTRAINT `pac_tracking_page_type_is_conversion_FK_2`
        FOREIGN KEY (`fk_tracking_conversion_type`)
        REFERENCES `pac_tracking_conversion_type` (`id_tracking_conversion_type`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_instance`
(
    `id_tracking_instance` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tracking_library_code` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_tracking_instance`),
    INDEX `pac_tracking_instance_FI_1` (`fk_tracking_library_code`),
    CONSTRAINT `pac_tracking_instance_FK_1`
        FOREIGN KEY (`fk_tracking_library_code`)
        REFERENCES `pac_tracking_library_code` (`id_tracking_library_code`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_instance_revision`
(
    `id_tracking_instance_revision` INTEGER NOT NULL AUTO_INCREMENT,
    `is_global` TINYINT(1) NOT NULL,
    `revision` INTEGER NOT NULL,
    `fk_tracking_instance` INTEGER NOT NULL,
    `config` TEXT,
    `code` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_tracking_instance_revision`),
    INDEX `pac_tracking_instance_revision_FI_1` (`fk_tracking_instance`),
    CONSTRAINT `pac_tracking_instance_revision_FK_1`
        FOREIGN KEY (`fk_tracking_instance`)
        REFERENCES `pac_tracking_instance` (`id_tracking_instance`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_page_type_has_instance_revision`
(
    `id_tracking_page_type_has_instance_revision` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tracking_page_type` INTEGER NOT NULL,
    `fk_tracking_instance_revision` INTEGER NOT NULL,
    PRIMARY KEY (`id_tracking_page_type_has_instance_revision`),
    UNIQUE INDEX `pac_tracking_page_type_has_instance_revision_U_1` (`fk_tracking_page_type`, `fk_tracking_instance_revision`),
    INDEX `pac_tracking_page_type_has_instance_revision_FI_2` (`fk_tracking_instance_revision`),
    CONSTRAINT `pac_tracking_page_type_has_instance_revision_FK_1`
        FOREIGN KEY (`fk_tracking_page_type`)
        REFERENCES `pac_tracking_page_type` (`id_tracking_page_type`),
    CONSTRAINT `pac_tracking_page_type_has_instance_revision_FK_2`
        FOREIGN KEY (`fk_tracking_instance_revision`)
        REFERENCES `pac_tracking_instance_revision` (`id_tracking_instance_revision`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_setting`
(
    `id_tracking_setting` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `value` TEXT NOT NULL,
    PRIMARY KEY (`id_tracking_setting`),
    UNIQUE INDEX `pac_tracking_setting_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_exclusivity_group`
(
    `id_tracking_exclusivity_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tracking_exclusivity_group`)
) ENGINE=InnoDB;

CREATE TABLE `pac_tracking_exclusivity`
(
    `id_tracking_exclusivity` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tracking_exclusivity_group` INTEGER NOT NULL,
    `fk_tracking_instance` INTEGER NOT NULL,
    PRIMARY KEY (`id_tracking_exclusivity`),
    INDEX `pac_tracking_exclusivity_FI_1` (`fk_tracking_exclusivity_group`),
    INDEX `pac_tracking_exclusivity_FI_2` (`fk_tracking_instance`),
    CONSTRAINT `pac_tracking_exclusivity_FK_1`
        FOREIGN KEY (`fk_tracking_exclusivity_group`)
        REFERENCES `pac_tracking_exclusivity_group` (`id_tracking_exclusivity_group`),
    CONSTRAINT `pac_tracking_exclusivity_FK_2`
        FOREIGN KEY (`fk_tracking_instance`)
        REFERENCES `pac_tracking_instance` (`id_tracking_instance`)
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

CREATE TABLE `sao_cart_user`
(
    `id_cart_user` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    PRIMARY KEY (`id_cart_user`),
    INDEX `sao_cart_user_I_1` (`user_id`),
    CONSTRAINT `sao_cart_user_FK_1`
        FOREIGN KEY (`id_cart_user`)
        REFERENCES `pac_cart_user` (`id_cart_user`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sao_catalog_product_category_boost`
(
    `id_catalog_product_category_boost` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_product_category` INTEGER NOT NULL,
    `boost` INTEGER NOT NULL,
    PRIMARY KEY (`id_catalog_product_category_boost`),
    INDEX `sao_catalog_product_category_boost_FI_1` (`fk_catalog_product_category`),
    CONSTRAINT `sao_catalog_product_category_boost_FK_1`
        FOREIGN KEY (`fk_catalog_product_category`)
        REFERENCES `pac_catalog_product_category` (`id_catalog_product_category`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sao_catalog_sold_limited_edition`
(
    `id_catalog_sold_limited_edition` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_catalog_product` INTEGER NOT NULL,
    `edition_identifier` VARCHAR(100) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_catalog_sold_limited_edition`),
    UNIQUE INDEX `sao_catalog_sold_limited_edition_U_1` (`fk_catalog_product`, `edition_identifier`),
    CONSTRAINT `sao_catalog_sold_limited_edition_FK_1`
        FOREIGN KEY (`fk_catalog_product`)
        REFERENCES `pac_catalog_product` (`id_catalog_product`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_provider`
(
    `id_provider` INTEGER NOT NULL AUTO_INCREMENT,
    `legacy_id` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `short_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_provider`),
    UNIQUE INDEX `sao_fulfillment_provider_U_1` (`legacy_id`),
    UNIQUE INDEX `sao_fulfillment_provider_U_2` (`short_name`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_quote`
(
    `id_quote` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_fulfillment_provider` INTEGER NOT NULL,
    `quote_id` VARCHAR(255) NOT NULL COMMENT \'needs to be set for tracking\',
    `fk_shipping_agent` INTEGER NOT NULL,
    `shipping_product` VARCHAR(255),
    `shipping_price` INTEGER,
    `shipping_freight` INTEGER,
    `shipping_tax_duties` INTEGER,
    `shipping_currency_code` VARCHAR(20),
    `packing_slip_url_front` VARCHAR(255),
    `packing_slip_url_back` VARCHAR(255),
    `provider_order_number` VARCHAR(20),
    `internal_order_number` VARCHAR(20),
    `order_timestamp` DATETIME,
    `is_deleted` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_quote`),
    INDEX `sao_fulfillment_quote_FI_1` (`fk_shipping_agent`),
    INDEX `sao_fulfillment_quote_FI_2` (`fk_sales_order`),
    INDEX `sao_fulfillment_quote_FI_3` (`fk_fulfillment_provider`),
    CONSTRAINT `sao_fulfillment_quote_FK_1`
        FOREIGN KEY (`fk_shipping_agent`)
        REFERENCES `sao_fulfillment_shipping_agent` (`id_shipping_agent`),
    CONSTRAINT `sao_fulfillment_quote_FK_2`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`),
    CONSTRAINT `sao_fulfillment_quote_FK_3`
        FOREIGN KEY (`fk_fulfillment_provider`)
        REFERENCES `sao_fulfillment_provider` (`id_provider`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_quote_item`
(
    `fk_fulfillment_quote` INTEGER NOT NULL,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`fk_fulfillment_quote`,`fk_sales_order_item`),
    INDEX `sao_fulfillment_quote_item_FI_2` (`fk_sales_order_item`),
    CONSTRAINT `sao_fulfillment_quote_item_FK_1`
        FOREIGN KEY (`fk_fulfillment_quote`)
        REFERENCES `sao_fulfillment_quote` (`id_quote`),
    CONSTRAINT `sao_fulfillment_quote_item_FK_2`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_shipping_agent`
(
    `id_shipping_agent` INTEGER NOT NULL AUTO_INCREMENT,
    `internal_name` VARCHAR(50),
    `name` VARCHAR(50),
    `tracking_url` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_shipping_agent`),
    UNIQUE INDEX `sao_fulfillment_shipping_agent_U_1` (`internal_name`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_shipping_tracking`
(
    `id_shipping_tracking` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_shipping_agent` INTEGER NOT NULL,
    `fk_quote` INTEGER NOT NULL,
    `tracking_number` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_shipping_tracking`),
    INDEX `sao_fulfillment_shipping_tracking_FI_1` (`fk_quote`),
    INDEX `sao_fulfillment_shipping_tracking_FI_2` (`fk_shipping_agent`),
    CONSTRAINT `sao_fulfillment_shipping_tracking_FK_1`
        FOREIGN KEY (`fk_quote`)
        REFERENCES `sao_fulfillment_quote` (`id_quote`),
    CONSTRAINT `sao_fulfillment_shipping_tracking_FK_2`
        FOREIGN KEY (`fk_shipping_agent`)
        REFERENCES `sao_fulfillment_shipping_agent` (`id_shipping_agent`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_shipping_tracking_status_history`
(
    `id_shipping_tracking_status_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_shipping_tracking` INTEGER NOT NULL,
    `code` VARCHAR(8),
    `description` VARCHAR(128),
    `notification_timestamp` DATETIME,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_shipping_tracking_status_history`),
    INDEX `sao_fulfillment_shipping_tracking_status_history_FI_1` (`fk_shipping_tracking`),
    CONSTRAINT `sao_fulfillment_shipping_tracking_status_history_FK_1`
        FOREIGN KEY (`fk_shipping_tracking`)
        REFERENCES `sao_fulfillment_shipping_tracking` (`id_shipping_tracking`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_print_product`
(
    `id_print_product` INTEGER NOT NULL AUTO_INCREMENT,
    `legacy_product_id` INTEGER NOT NULL,
    `fk_option` INTEGER,
    `fk_provider` INTEGER NOT NULL,
    `provider_product_id` INTEGER NOT NULL,
    `vendor_price` INTEGER DEFAULT 0 NOT NULL,
    `artist_cost` INTEGER DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_print_product`),
    INDEX `sao_fulfillment_print_product_FI_1` (`fk_provider`),
    INDEX `sao_fulfillment_print_product_FI_2` (`fk_option`),
    CONSTRAINT `sao_fulfillment_print_product_FK_1`
        FOREIGN KEY (`fk_provider`)
        REFERENCES `sao_fulfillment_provider` (`id_provider`),
    CONSTRAINT `sao_fulfillment_print_product_FK_2`
        FOREIGN KEY (`fk_option`)
        REFERENCES `pac_catalog_option` (`id_catalog_option`)
) ENGINE=InnoDB;

CREATE TABLE `sao_fulfillment_shipping_pickup`
(
    `id_sales_order_item` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    `ready_time` TIME NOT NULL,
    `close_time` TIME NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    CONSTRAINT `sao_fulfillment_shipping_pickup_FK_1`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `sao_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `sao_legacy_sales_order`
(
    `id_legacy_sales_order` INTEGER NOT NULL,
    `user_id` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_legacy_sales_order`),
    CONSTRAINT `sao_legacy_sales_order_FK_1`
        FOREIGN KEY (`id_legacy_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_template`
(
    `id_mail_template` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `subject` VARCHAR(255),
    `sender` VARCHAR(255),
    `text` TEXT,
    `html` TEXT,
    `wrap` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    PRIMARY KEY (`id_mail_template`),
    UNIQUE INDEX `sao_mail_template_U_1` (`name`),
    INDEX `sao_mail_template_FI_1` (`wrap`),
    CONSTRAINT `sao_mail_template_FK_1`
        FOREIGN KEY (`wrap`)
        REFERENCES `sao_mail_template` (`id_mail_template`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence`
(
    `id_mail_sequence` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL COMMENT \'internal display name\',
    PRIMARY KEY (`id_mail_sequence`),
    UNIQUE INDEX `sao_mail_sequence_U_1` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence_element`
(
    `id_mail_sequence_element` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `template` VARCHAR(255) NOT NULL COMMENT \'Explicit no FK to template table. As so you will be able to use other template systems with the sequences.\',
    `interval` VARCHAR(255) NOT NULL COMMENT \'use php date-string parsing functionality. e.g. 5 days or 20 minutes\',
    `position` INTEGER NOT NULL,
    `fk_mail_sequence` INTEGER NOT NULL,
    PRIMARY KEY (`id_mail_sequence_element`),
    UNIQUE INDEX `sao_mail_sequence_element_U_1` (`name`),
    UNIQUE INDEX `sao_mail_sequence_element_U_2` (`fk_mail_sequence`, `position`),
    CONSTRAINT `sao_mail_sequence_element_FK_1`
        FOREIGN KEY (`fk_mail_sequence`)
        REFERENCES `sao_mail_sequence` (`id_mail_sequence`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence_step`
(
    `id_mail_sequence_step` INTEGER NOT NULL,
    `step` VARCHAR(30) NOT NULL COMMENT \'used for ajax calls to set current step\',
    PRIMARY KEY (`id_mail_sequence_step`),
    CONSTRAINT `sao_mail_sequence_step_FK_1`
        FOREIGN KEY (`id_mail_sequence_step`)
        REFERENCES `sao_mail_sequence` (`id_mail_sequence`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence_element_codepool`
(
    `id_mail_sequence_element_codepool` INTEGER NOT NULL,
    `fk_salesrule_codepool` INTEGER NOT NULL,
    `code_valid_to_interval` CHAR(50) NOT NULL,
    `code_valid_to_format` CHAR(50) NOT NULL,
    PRIMARY KEY (`id_mail_sequence_element_codepool`),
    INDEX `sao_mail_sequence_element_codepool_FI_2` (`fk_salesrule_codepool`),
    CONSTRAINT `sao_mail_sequence_element_codepool_FK_1`
        FOREIGN KEY (`id_mail_sequence_element_codepool`)
        REFERENCES `sao_mail_sequence_element` (`id_mail_sequence_element`),
    CONSTRAINT `sao_mail_sequence_element_codepool_FK_2`
        FOREIGN KEY (`fk_salesrule_codepool`)
        REFERENCES `pac_salesrule_codepool` (`id_salesrule_codepool`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence_cart_user_code`
(
    `id_mail_sequence_cart_user_code` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cart_user` INTEGER NOT NULL,
    `fk_mail_sequence` INTEGER NOT NULL,
    `fk_salesrule_code` INTEGER NOT NULL,
    `fk_salesrule_codepool` INTEGER NOT NULL,
    PRIMARY KEY (`id_mail_sequence_cart_user_code`),
    UNIQUE INDEX `sao_mail_sequence_cart_user_code_U_1` (`fk_cart_user`, `fk_mail_sequence`, `fk_salesrule_codepool`),
    INDEX `sao_mail_sequence_cart_user_code_FI_2` (`fk_mail_sequence`),
    INDEX `sao_mail_sequence_cart_user_code_FI_3` (`fk_salesrule_code`),
    INDEX `sao_mail_sequence_cart_user_code_FI_4` (`fk_salesrule_codepool`),
    CONSTRAINT `sao_mail_sequence_cart_user_code_FK_1`
        FOREIGN KEY (`fk_cart_user`)
        REFERENCES `pac_cart_user` (`id_cart_user`),
    CONSTRAINT `sao_mail_sequence_cart_user_code_FK_2`
        FOREIGN KEY (`fk_mail_sequence`)
        REFERENCES `sao_mail_sequence` (`id_mail_sequence`),
    CONSTRAINT `sao_mail_sequence_cart_user_code_FK_3`
        FOREIGN KEY (`fk_salesrule_code`)
        REFERENCES `pac_salesrule_code` (`id_salesrule_code`),
    CONSTRAINT `sao_mail_sequence_cart_user_code_FK_4`
        FOREIGN KEY (`fk_salesrule_codepool`)
        REFERENCES `pac_salesrule_codepool` (`id_salesrule_codepool`)
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_sequence_cart_user_blacklist`
(
    `id_mail_sequence_cart_user_blacklist` INTEGER NOT NULL,
    PRIMARY KEY (`id_mail_sequence_cart_user_blacklist`),
    CONSTRAINT `sao_mail_sequence_cart_user_blacklist_FK_1`
        FOREIGN KEY (`id_mail_sequence_cart_user_blacklist`)
        REFERENCES `pac_cart_user` (`id_cart_user`)
) ENGINE=InnoDB;

CREATE TABLE `sao_misc_region`
(
    `id_region` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_misc_country` INTEGER,
    `name` VARCHAR(50) NOT NULL,
    `short_name` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id_region`),
    INDEX `sao_misc_region_FI_1` (`fk_misc_country`),
    CONSTRAINT `sao_misc_region_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_ccvalidation`
(
    `id_validation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `valid_js` INTEGER,
    `valid_payment_provider` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_validation`),
    INDEX `sao_sales_ccvalidation_FI_1` (`fk_sales_order`),
    CONSTRAINT `sao_sales_ccvalidation_FK_1`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_tax`
(
    `id_sales_tax` INTEGER NOT NULL AUTO_INCREMENT,
    `tax_percentage` DECIMAL(8,4) COMMENT \'/tax percentage/\',
    `fk_misc_country` INTEGER NOT NULL,
    `zip_code` VARCHAR(15) NOT NULL,
    `name1` VARCHAR(255),
    `name2` VARCHAR(255),
    `name3` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_tax`),
    INDEX `sao_sales_tax_FI_1` (`fk_misc_country`),
    CONSTRAINT `sao_sales_tax_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order_address`
(
    `id_sales_order_address` INTEGER NOT NULL,
    `fk_misc_region` INTEGER,
    PRIMARY KEY (`id_sales_order_address`),
    INDEX `sao_sales_order_address_FI_2` (`fk_misc_region`),
    CONSTRAINT `sao_sales_order_address_FK_1`
        FOREIGN KEY (`id_sales_order_address`)
        REFERENCES `pac_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `sao_sales_order_address_FK_2`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `sao_misc_region` (`id_region`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order_item`
(
    `id_sales_order_item` INTEGER NOT NULL,
    `fk_artist_sales` INTEGER,
    `impression` INTEGER,
    `fk_misc_country` INTEGER,
    `fk_misc_region` INTEGER,
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `address3` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `description` VARCHAR(255),
    `comment` VARCHAR(255),
    `email` VARCHAR(255),
    `marked_for_refund` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `version_comment` VARCHAR(255),
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `sao_sales_order_item_FI_1` (`fk_misc_country`),
    INDEX `sao_sales_order_item_FI_2` (`fk_misc_region`),
    CONSTRAINT `sao_sales_order_item_FK_1`
        FOREIGN KEY (`fk_misc_country`)
        REFERENCES `pac_misc_country` (`id_misc_country`),
    CONSTRAINT `sao_sales_order_item_FK_2`
        FOREIGN KEY (`fk_misc_region`)
        REFERENCES `sao_misc_region` (`id_region`),
    CONSTRAINT `sao_sales_order_item_FK_3`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order`
(
    `id_sales_order` INTEGER NOT NULL,
    `flagged` INTEGER(1) DEFAULT -1,
    PRIMARY KEY (`id_sales_order`),
    CONSTRAINT `sao_sales_order_FK_1`
        FOREIGN KEY (`id_sales_order`)
        REFERENCES `pac_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_discount`
(
    `id_sales_discount` INTEGER NOT NULL,
    `saatchi_amount` INTEGER,
    `artist_amount` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_discount`),
    CONSTRAINT `sao_sales_discount_FK_1`
        FOREIGN KEY (`id_sales_discount`)
        REFERENCES `pac_sales_discount` (`id_sales_discount`)
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order_item_notification`
(
    `id_sao_sales_order_item_notification` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `event` VARCHAR(255) NOT NULL,
    `event_triggered` TINYINT DEFAULT 0 NOT NULL,
    `status` TINYINT DEFAULT 2 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sao_sales_order_item_notification`),
    UNIQUE INDEX `sao_sales_order_item_notification_U_1` (`hash`),
    INDEX `sao_sales_order_item_notification_FI_1` (`fk_sales_order_item`),
    CONSTRAINT `sao_sales_order_item_notification_FK_1`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `pac_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `sao_salesrule`
(
    `id_salesrule` INTEGER NOT NULL,
    `cost_distribution` TINYINT DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_salesrule`),
    CONSTRAINT `sao_salesrule_FK_1`
        FOREIGN KEY (`id_salesrule`)
        REFERENCES `pac_salesrule` (`id_salesrule`)
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_key_version`
(
    `id_glossary_key` INTEGER NOT NULL,
    `fk_glossary_group` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `is_global` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_deleted` TINYINT(1) DEFAULT 0 NOT NULL,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `pac_glossary_explanation_ids` TEXT,
    `pac_glossary_explanation_versions` TEXT,
    PRIMARY KEY (`id_glossary_key`,`version`),
    CONSTRAINT `pac_glossary_key_version_FK_1`
        FOREIGN KEY (`id_glossary_key`)
        REFERENCES `pac_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `pac_glossary_explanation_version`
(
    `id_glossary_explanation` INTEGER NOT NULL,
    `fk_glossary_language` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER NOT NULL,
    `text` LONGTEXT NOT NULL,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `fk_glossary_key_version` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_glossary_explanation`,`version`),
    CONSTRAINT `pac_glossary_explanation_version_FK_1`
        FOREIGN KEY (`id_glossary_explanation`)
        REFERENCES `pac_glossary_explanation` (`id_glossary_explanation`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sao_mail_template_version`
(
    `id_mail_template` INTEGER NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `subject` VARCHAR(255),
    `sender` VARCHAR(255),
    `text` TEXT,
    `html` TEXT,
    `wrap` INTEGER,
    `deleted` TINYINT(1) DEFAULT 0,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `wrap_version` INTEGER DEFAULT 0,
    `sao_mail_template_ids` TEXT,
    `sao_mail_template_versions` TEXT,
    PRIMARY KEY (`id_mail_template`,`version`),
    CONSTRAINT `sao_mail_template_version_FK_1`
        FOREIGN KEY (`id_mail_template`)
        REFERENCES `sao_mail_template` (`id_mail_template`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `sao_sales_order_item_version`
(
    `id_sales_order_item` INTEGER NOT NULL,
    `fk_artist_sales` INTEGER,
    `impression` INTEGER,
    `fk_misc_country` INTEGER,
    `fk_misc_region` INTEGER,
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `address3` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `po_box` VARCHAR(255),
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `description` VARCHAR(255),
    `comment` VARCHAR(255),
    `email` VARCHAR(255),
    `marked_for_refund` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `version` INTEGER DEFAULT 0 NOT NULL,
    `version_created_at` DATETIME,
    `version_created_by` VARCHAR(100),
    `version_comment` VARCHAR(255),
    PRIMARY KEY (`id_sales_order_item`,`version`),
    CONSTRAINT `sao_sales_order_item_version_FK_1`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `sao_sales_order_item` (`id_sales_order_item`)
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

DROP TABLE IF EXISTS `pac_acl_privilege`;

DROP TABLE IF EXISTS `pac_acl_role_resource`;

DROP TABLE IF EXISTS `pac_acl_role_privilege`;

DROP TABLE IF EXISTS `pac_payment_adyen`;

DROP TABLE IF EXISTS `pac_cart`;

DROP TABLE IF EXISTS `pac_cart_item`;

DROP TABLE IF EXISTS `pac_cart_item_option`;

DROP TABLE IF EXISTS `pac_cart_user`;

DROP TABLE IF EXISTS `pac_cart_user_step`;

DROP TABLE IF EXISTS `pac_catalog_product`;

DROP TABLE IF EXISTS `pac_catalog_product_bundle`;

DROP TABLE IF EXISTS `pac_catalog_product_bundle_product`;

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

DROP TABLE IF EXISTS `pac_catalog_value_text_area`;

DROP TABLE IF EXISTS `pac_catalog_value_boolean`;

DROP TABLE IF EXISTS `pac_catalog_product_category`;

DROP TABLE IF EXISTS `pac_catalog_option`;

DROP TABLE IF EXISTS `pac_catalog_option_type`;

DROP TABLE IF EXISTS `pac_catalog_product_option`;

DROP TABLE IF EXISTS `pac_category`;

DROP TABLE IF EXISTS `pac_category_name`;

DROP TABLE IF EXISTS `pac_category_attribute`;

DROP TABLE IF EXISTS `pac_category_attribute_key`;

DROP TABLE IF EXISTS `pac_category_scope`;

DROP TABLE IF EXISTS `pac_cms_page`;

DROP TABLE IF EXISTS `pac_cms_page_type`;

DROP TABLE IF EXISTS `pac_cms_element_page`;

DROP TABLE IF EXISTS `pac_cms_element`;

DROP TABLE IF EXISTS `pac_cms_element_type`;

DROP TABLE IF EXISTS `pac_cms_elementtype_pagetype_constraint`;

DROP TABLE IF EXISTS `pac_cms_media`;

DROP TABLE IF EXISTS `pac_cms_redirection`;

DROP TABLE IF EXISTS `pac_customer`;

DROP TABLE IF EXISTS `pac_customer_status`;

DROP TABLE IF EXISTS `pac_customer_address`;

DROP TABLE IF EXISTS `pac_dwh_report_permission`;

DROP TABLE IF EXISTS `pac_dwh_saiku_permission`;

DROP TABLE IF EXISTS `pac_dwh_mdx_log`;

DROP TABLE IF EXISTS `pac_dwh_import_run`;

DROP TABLE IF EXISTS `pac_dwh_process_run`;

DROP TABLE IF EXISTS `pac_dwh_job_run`;

DROP TABLE IF EXISTS `pac_dwh_relation_size`;

DROP TABLE IF EXISTS `pac_dwh_query_token`;

DROP TABLE IF EXISTS `pac_glossary_group`;

DROP TABLE IF EXISTS `pac_glossary_language`;

DROP TABLE IF EXISTS `pac_glossary_key`;

DROP TABLE IF EXISTS `pac_glossary_explanation`;

DROP TABLE IF EXISTS `pac_glossary_lookup`;

DROP TABLE IF EXISTS `pac_image_size`;

DROP TABLE IF EXISTS `pac_image`;

DROP TABLE IF EXISTS `pac_image_product`;

DROP TABLE IF EXISTS `pac_invoice`;

DROP TABLE IF EXISTS `pac_invoice_item`;

DROP TABLE IF EXISTS `pac_invoice_document`;

DROP TABLE IF EXISTS `pac_invoice_number`;

DROP TABLE IF EXISTS `pac_mail_queue`;

DROP TABLE IF EXISTS `pac_mci_cost_entry`;

DROP TABLE IF EXISTS `pac_mci_cost_type`;

DROP TABLE IF EXISTS `pac_mcm_channel`;

DROP TABLE IF EXISTS `pac_mcm_partner_in_channel`;

DROP TABLE IF EXISTS `pac_mcm_partner`;

DROP TABLE IF EXISTS `pac_mcm_publication`;

DROP TABLE IF EXISTS `pac_mcm_campaign`;

DROP TABLE IF EXISTS `pac_mcm_relation`;

DROP TABLE IF EXISTS `pac_misc_country`;

DROP TABLE IF EXISTS `pac_misc_lock`;

DROP TABLE IF EXISTS `pac_newsletter_subscription`;

DROP TABLE IF EXISTS `pac_payment`;

DROP TABLE IF EXISTS `pac_payment_account`;

DROP TABLE IF EXISTS `pac_payment_transaction`;

DROP TABLE IF EXISTS `pac_payment_control_raw_data_log`;

DROP TABLE IF EXISTS `pac_price_product`;

DROP TABLE IF EXISTS `pac_price_type`;

DROP TABLE IF EXISTS `pac_price_attribute`;

DROP TABLE IF EXISTS `pac_price_attribute_value`;

DROP TABLE IF EXISTS `pac_sales_order_item_status`;

DROP TABLE IF EXISTS `pac_sales_order_item_status_history`;

DROP TABLE IF EXISTS `pac_sales_order_item_transition_log`;

DROP TABLE IF EXISTS `pac_sales_order_address`;

DROP TABLE IF EXISTS `pac_sales_order_address_history`;

DROP TABLE IF EXISTS `pac_sales_order`;

DROP TABLE IF EXISTS `pac_sales_order_item`;

DROP TABLE IF EXISTS `pac_sales_order_item_option`;

DROP TABLE IF EXISTS `pac_sales_order_process`;

DROP TABLE IF EXISTS `pac_sales_order_note`;

DROP TABLE IF EXISTS `pac_sales_order_comment`;

DROP TABLE IF EXISTS `pac_sales_order_history`;

DROP TABLE IF EXISTS `pac_sales_expense`;

DROP TABLE IF EXISTS `pac_sales_discount`;

DROP TABLE IF EXISTS `pac_salesrule`;

DROP TABLE IF EXISTS `pac_salesrule_condition`;

DROP TABLE IF EXISTS `pac_salesrule_codepool`;

DROP TABLE IF EXISTS `pac_salesrule_code`;

DROP TABLE IF EXISTS `pac_salesrule_item_discount`;

DROP TABLE IF EXISTS `pac_salesrule_code_usage`;

DROP TABLE IF EXISTS `pac_salesrule_log`;

DROP TABLE IF EXISTS `pac_stock`;

DROP TABLE IF EXISTS `pac_stock_attribute`;

DROP TABLE IF EXISTS `pac_stock_attribute_value`;

DROP TABLE IF EXISTS `pac_stock_product`;

DROP TABLE IF EXISTS `pac_tracking_pixel_type`;

DROP TABLE IF EXISTS `pac_tracking_conversion_type`;

DROP TABLE IF EXISTS `pac_tracking_library`;

DROP TABLE IF EXISTS `pac_tracking_library_code`;

DROP TABLE IF EXISTS `pac_tracking_page_type`;

DROP TABLE IF EXISTS `pac_tracking_page_type_is_conversion`;

DROP TABLE IF EXISTS `pac_tracking_instance`;

DROP TABLE IF EXISTS `pac_tracking_instance_revision`;

DROP TABLE IF EXISTS `pac_tracking_page_type_has_instance_revision`;

DROP TABLE IF EXISTS `pac_tracking_setting`;

DROP TABLE IF EXISTS `pac_tracking_exclusivity_group`;

DROP TABLE IF EXISTS `pac_tracking_exclusivity`;

DROP TABLE IF EXISTS `pac_yves_kv_update`;

DROP TABLE IF EXISTS `pac_yves_control`;

DROP TABLE IF EXISTS `sao_cart_user`;

DROP TABLE IF EXISTS `sao_catalog_product_category_boost`;

DROP TABLE IF EXISTS `sao_catalog_sold_limited_edition`;

DROP TABLE IF EXISTS `sao_fulfillment_provider`;

DROP TABLE IF EXISTS `sao_fulfillment_quote`;

DROP TABLE IF EXISTS `sao_fulfillment_quote_item`;

DROP TABLE IF EXISTS `sao_fulfillment_shipping_agent`;

DROP TABLE IF EXISTS `sao_fulfillment_shipping_tracking`;

DROP TABLE IF EXISTS `sao_fulfillment_shipping_tracking_status_history`;

DROP TABLE IF EXISTS `sao_fulfillment_print_product`;

DROP TABLE IF EXISTS `sao_fulfillment_shipping_pickup`;

DROP TABLE IF EXISTS `sao_legacy_sales_order`;

DROP TABLE IF EXISTS `sao_mail_template`;

DROP TABLE IF EXISTS `sao_mail_sequence`;

DROP TABLE IF EXISTS `sao_mail_sequence_element`;

DROP TABLE IF EXISTS `sao_mail_sequence_step`;

DROP TABLE IF EXISTS `sao_mail_sequence_element_codepool`;

DROP TABLE IF EXISTS `sao_mail_sequence_cart_user_code`;

DROP TABLE IF EXISTS `sao_mail_sequence_cart_user_blacklist`;

DROP TABLE IF EXISTS `sao_misc_region`;

DROP TABLE IF EXISTS `sao_sales_ccvalidation`;

DROP TABLE IF EXISTS `sao_sales_tax`;

DROP TABLE IF EXISTS `sao_sales_order_address`;

DROP TABLE IF EXISTS `sao_sales_order_item`;

DROP TABLE IF EXISTS `sao_sales_order`;

DROP TABLE IF EXISTS `sao_sales_discount`;

DROP TABLE IF EXISTS `sao_sales_order_item_notification`;

DROP TABLE IF EXISTS `sao_salesrule`;

DROP TABLE IF EXISTS `pac_glossary_key_version`;

DROP TABLE IF EXISTS `pac_glossary_explanation_version`;

DROP TABLE IF EXISTS `sao_mail_template_version`;

DROP TABLE IF EXISTS `sao_sales_order_item_version`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}