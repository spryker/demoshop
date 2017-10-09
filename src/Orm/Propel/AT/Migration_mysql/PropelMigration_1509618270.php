<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1509618270.
 * Generated on 2017-11-02 10:24:30 by vagrant
 */
class PropelMigration_1509618270
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
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

CREATE TABLE `spy_cms_block_product_connector`
(
    `id_cms_block_product_connector` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    PRIMARY KEY (`id_cms_block_product_connector`),
    INDEX `spy_cms_block_product_connector-fk_cms_block` (`fk_cms_block`),
    INDEX `spy_cms_block_product_connector-fk_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_cms_block_product_connector-fk_cms_block`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `spy_cms_block` (`id_cms_block`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_block_product_connector-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_role`
(
    `id_acl_role` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    UNIQUE INDEX `spy_acl_role-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_rule`
(
    `id_acl_rule` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_acl_role` INTEGER NOT NULL,
    `bundle` VARCHAR(45) NOT NULL,
    `controller` VARCHAR(45) NOT NULL,
    `action` VARCHAR(45) NOT NULL,
    `type` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_rule`),
    INDEX `spy_acl_rule-fi_acl_role` (`fk_acl_role`),
    CONSTRAINT `spy_acl_rule-fk_acl_role`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `spy_acl_role` (`id_acl_role`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_group`
(
    `id_acl_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_group`),
    UNIQUE INDEX `spy_acl_group-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_user_has_group`
(
    `fk_user` INTEGER NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    PRIMARY KEY (`fk_user`,`fk_acl_group`),
    INDEX `spy_acl_user_has_group-fi_acl_group` (`fk_acl_group`),
    CONSTRAINT `spy_acl_user_has_group-fk_user`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_acl_user_has_group-fk_acl_group`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `spy_acl_group` (`id_acl_group`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_groups_has_roles`
(
    `fk_acl_role` INTEGER NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    PRIMARY KEY (`fk_acl_role`,`fk_acl_group`),
    INDEX `spy_acl_groups_has_roles-fi_acl_group` (`fk_acl_group`),
    CONSTRAINT `spy_acl_groups_has_roles-fk_acl_role`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `spy_acl_role` (`id_acl_role`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_acl_groups_has_roles-fk_acl_group`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `spy_acl_group` (`id_acl_group`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_auth_reset_password`
(
    `id_auth_reset_password` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_user` INTEGER NOT NULL,
    `code` VARCHAR(35) NOT NULL,
    `status` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_auth_reset_password`,`fk_user`),
    UNIQUE INDEX `spy_auth_reset_password-code` (`code`),
    INDEX `spy_auth_reset_password-fi_user` (`fk_user`),
    CONSTRAINT `spy_auth_reset_password-fk_user`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_availability_abstract`
(
    `id_availability_abstract` INTEGER NOT NULL AUTO_INCREMENT,
    `abstract_sku` VARCHAR(255) NOT NULL,
    `quantity` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_availability_abstract`),
    UNIQUE INDEX `spy_availability_abstract-sku` (`abstract_sku`)
) ENGINE=InnoDB;

CREATE TABLE `spy_availability`
(
    `id_availability` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_availability_abstract` INTEGER NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `quantity` INTEGER NOT NULL,
    `is_never_out_of_stock` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_availability`),
    UNIQUE INDEX `spy_availability-sku` (`sku`),
    INDEX `spy_availability-fi_spy_availability_abstract` (`fk_availability_abstract`),
    CONSTRAINT `spy_availability-fk_spy_availability_abstract`
        FOREIGN KEY (`fk_availability_abstract`)
        REFERENCES `spy_availability_abstract` (`id_availability_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_braintree`
(
    `id_payment_braintree` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `payment_type` VARCHAR(255),
    `client_ip` VARCHAR(255) NOT NULL,
    `country_iso2_code` CHAR(2) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `zip_code` VARCHAR(15) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `language_iso2_code` CHAR(2) NOT NULL,
    `currency_iso3_code` CHAR(3) NOT NULL,
    `transaction_id` VARCHAR(100),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_braintree`),
    INDEX `spy_payment_braintree-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_payment_braintree-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_braintree_transaction_request_log`
(
    `id_payment_braintree_transaction_request_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_braintree` INTEGER NOT NULL,
    `transaction_id` VARCHAR(255) NOT NULL,
    `transaction_type` VARCHAR(255),
    `transaction_code` VARCHAR(255) NOT NULL,
    `presentation_amount` VARCHAR(255),
    `presentation_currency` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_braintree_transaction_request_log`),
    INDEX `spy_braintree_transaction_request_log-fi_payment_braintree` (`fk_payment_braintree`),
    CONSTRAINT `spy_braintree_transaction_request_log-fk_payment_braintree`
        FOREIGN KEY (`fk_payment_braintree`)
        REFERENCES `spy_payment_braintree` (`id_payment_braintree`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_braintree_transaction_status_log`
(
    `id_payment_braintree_transaction_status_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_braintree` INTEGER NOT NULL,
    `is_success` TINYINT(1) NOT NULL,
    `code` INTEGER,
    `message` VARCHAR(255),
    `transaction_id` VARCHAR(255) NOT NULL,
    `transaction_code` VARCHAR(255),
    `transaction_type` VARCHAR(255),
    `transaction_status` VARCHAR(255),
    `transaction_amount` VARCHAR(255),
    `merchant_account` VARCHAR(255),
    `processing_timestamp` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_braintree_transaction_status_log`),
    INDEX `spy_braintree_transaction_status_log-fi_braintree` (`fk_payment_braintree`),
    CONSTRAINT `spy_braintree_transaction_status_log-fk_braintree`
        FOREIGN KEY (`fk_payment_braintree`)
        REFERENCES `spy_payment_braintree` (`id_payment_braintree`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_braintree_order_item`
(
    `fk_payment_braintree` INTEGER NOT NULL,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`fk_payment_braintree`,`fk_sales_order_item`),
    INDEX `spy_payment_braintree_order_item-fi_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_braintree_order_item-fk_braintree`
        FOREIGN KEY (`fk_payment_braintree`)
        REFERENCES `spy_payment_braintree` (`id_payment_braintree`),
    CONSTRAINT `spy_payment_braintree_order_item-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_category`
(
    `id_category` INTEGER NOT NULL AUTO_INCREMENT,
    `category_key` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `is_in_menu` TINYINT(1) DEFAULT 1,
    `is_clickable` TINYINT(1) DEFAULT 1,
    `is_searchable` TINYINT(1) DEFAULT 1,
    `fk_category_template` INTEGER,
    PRIMARY KEY (`id_category`),
    UNIQUE INDEX `spy_category-category_key` (`category_key`),
    INDEX `spy_category_fi_7e2c46` (`fk_category_template`),
    CONSTRAINT `spy_category_fk_7e2c46`
        FOREIGN KEY (`fk_category_template`)
        REFERENCES `spy_category_template` (`id_category_template`)
) ENGINE=InnoDB;

CREATE TABLE `spy_category_attribute`
(
    `id_category_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `meta_title` TEXT,
    `meta_description` TEXT,
    `meta_keywords` TEXT,
    `category_image_name` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_category_attribute`),
    INDEX `spy_category_attribute_fi_12b6d0` (`fk_locale`),
    INDEX `spy_category_attribute_fi_723c48` (`fk_category`),
    CONSTRAINT `spy_category_attribute_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_category_attribute_fk_723c48`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE `spy_category_node`
(
    `id_category_node` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category` INTEGER NOT NULL,
    `fk_parent_category_node` INTEGER,
    `is_root` TINYINT(1) DEFAULT 0,
    `is_main` TINYINT(1) DEFAULT 0,
    `node_order` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_category_node`),
    INDEX `spy_category_node_i_8f153e` (`node_order`),
    INDEX `spy_category_node_fi_b54a47` (`fk_parent_category_node`),
    INDEX `spy_category_node_fi_723c48` (`fk_category`),
    CONSTRAINT `spy_category_node_fk_b54a47`
        FOREIGN KEY (`fk_parent_category_node`)
        REFERENCES `spy_category_node` (`id_category_node`),
    CONSTRAINT `spy_category_node_fk_723c48`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE `spy_category_closure_table`
(
    `id_category_closure_table` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_category_node` INTEGER NOT NULL,
    `fk_category_node_descendant` INTEGER NOT NULL,
    `depth` INTEGER NOT NULL,
    PRIMARY KEY (`id_category_closure_table`),
    INDEX `spy_category_closure_table_fi_d3e44d` (`fk_category_node`),
    INDEX `spy_category_closure_table_fi_a3476a` (`fk_category_node_descendant`),
    CONSTRAINT `spy_category_closure_table_fk_d3e44d`
        FOREIGN KEY (`fk_category_node`)
        REFERENCES `spy_category_node` (`id_category_node`),
    CONSTRAINT `spy_category_closure_table_fk_a3476a`
        FOREIGN KEY (`fk_category_node_descendant`)
        REFERENCES `spy_category_node` (`id_category_node`)
) ENGINE=InnoDB;

CREATE TABLE `spy_category_template`
(
    `id_category_template` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `template_path` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_category_template`),
    UNIQUE INDEX `spy_category_template-template_path` (`template_path`)
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_template`
(
    `id_cms_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    `template_path` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_template`),
    UNIQUE INDEX `spy_cms_template-unique-template_path` (`template_path`),
    INDEX `spy_cms_template-template_path` (`template_path`)
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_page`
(
    `id_cms_page` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_template` INTEGER NOT NULL,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `is_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_searchable` TINYINT(1) DEFAULT 0 NOT NULL,
    `page_key` VARCHAR(32),
    PRIMARY KEY (`id_cms_page`),
    INDEX `spy_cms_page_i_615cb5` (`page_key`),
    INDEX `spy_cms_page-fi_template` (`fk_template`),
    CONSTRAINT `spy_cms_page-fk_template`
        FOREIGN KEY (`fk_template`)
        REFERENCES `spy_cms_template` (`id_cms_template`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_page_localized_attributes`
(
    `id_cms_page_localized_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_page` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `meta_title` VARCHAR(255),
    `meta_keywords` TEXT,
    `meta_description` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_page_localized_attributes`),
    UNIQUE INDEX `spy_cms_page_localized_attributes-unique-fk_cms_page` (`fk_cms_page`, `fk_locale`),
    INDEX `spy_cms_page_localized_attributes-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_cms_page_localized_attributes-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_cms_page_localized_attributes-fk_cms_page`
        FOREIGN KEY (`fk_cms_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_glossary_key_mapping`
(
    `id_cms_glossary_key_mapping` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_page` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER NOT NULL,
    `placeholder` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_glossary_key_mapping`),
    UNIQUE INDEX `spy_cms_glossary_key_mapping-unique-fk_page` (`fk_page`, `placeholder`),
    INDEX `spy_cms_glossary_key_mapping-fk_page` (`fk_page`, `placeholder`),
    INDEX `spy_cms_glossary_key_mapping-fi_glossary_key` (`fk_glossary_key`),
    CONSTRAINT `spy_cms_glossary_key_mapping-fk_glossary_key`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_glossary_key_mapping-fk_page`
        FOREIGN KEY (`fk_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_version`
(
    `id_cms_version` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_page` INTEGER NOT NULL,
    `version` INTEGER NOT NULL,
    `version_name` VARCHAR(255),
    `data` TEXT,
    `fk_user` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_cms_version`),
    INDEX `spy_cms_version-index-fk_cms_page_version` (`fk_cms_page`, `version`),
    INDEX `spy_cms_version-fi_user` (`fk_user`),
    CONSTRAINT `spy_cms_version-fk_user`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`),
    CONSTRAINT `spy_cms_version-fk_cms_page`
        FOREIGN KEY (`fk_cms_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block_template`
(
    `id_cms_block_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    `template_path` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_block_template`),
    UNIQUE INDEX `spy_cms_block_template-unique-template_path` (`template_path`),
    INDEX `spy_cms_block_template-template_path` (`template_path`)
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block_glossary_key_mapping`
(
    `id_cms_block_glossary_key_mapping` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER NOT NULL,
    `placeholder` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_block_glossary_key_mapping`),
    UNIQUE INDEX `spy_cms_block_glossary_key_mapping-unique-fk_cms_block` (`fk_cms_block`, `placeholder`),
    INDEX `spy_cms_block_glossary_key_mapping-fi_glossary_key` (`fk_glossary_key`),
    CONSTRAINT `spy_cms_block_glossary_key_mapping-fk_cms_block`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `spy_cms_block` (`id_cms_block`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_block_glossary_key_mapping-fk_glossary_key`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block`
(
    `id_cms_block` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_template` INTEGER,
    `is_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) COMMENT \'Deprecated\',
    `fk_page` INTEGER COMMENT \'Deprecated\',
    `value` INTEGER COMMENT \'Deprecated\',
    PRIMARY KEY (`id_cms_block`),
    UNIQUE INDEX `spy_cms_block-name-uq` (`name`),
    INDEX `spy_cms_block-fi_template` (`fk_template`),
    CONSTRAINT `spy_cms_block-fk_template`
        FOREIGN KEY (`fk_template`)
        REFERENCES `spy_cms_block_template` (`id_cms_block_template`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block_category_connector`
(
    `id_cms_block_category_connector` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_cms_block` INTEGER NOT NULL,
    `fk_category` INTEGER NOT NULL,
    `fk_category_template` INTEGER NOT NULL,
    `fk_cms_block_category_position` INTEGER,
    PRIMARY KEY (`id_cms_block_category_connector`),
    INDEX `spy_cms_block_category-connector-fk_cms_block` (`fk_cms_block`),
    INDEX `spy_cms_block_category-connector-fk_category` (`fk_category`),
    INDEX `spy_cms_block_category_connector-fi_category_template` (`fk_category_template`),
    INDEX `spy_cms_block_category_connector-fi_cms_block_category_position` (`fk_cms_block_category_position`),
    CONSTRAINT `spy_cms_block_category_connector-fk_cms_block`
        FOREIGN KEY (`fk_cms_block`)
        REFERENCES `spy_cms_block` (`id_cms_block`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_block_category_connector-fk_category`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_block_category_connector-fk_category_template`
        FOREIGN KEY (`fk_category_template`)
        REFERENCES `spy_category_template` (`id_category_template`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_block_category_connector-fk_cms_block_category_position`
        FOREIGN KEY (`fk_cms_block_category_position`)
        REFERENCES `spy_cms_block_category_position` (`id_cms_block_category_position`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block_category_position`
(
    `id_cms_block_category_position` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_block_category_position`)
) ENGINE=InnoDB;

CREATE TABLE `spy_country`
(
    `id_country` INTEGER NOT NULL AUTO_INCREMENT,
    `iso2_code` VARCHAR(2) NOT NULL,
    `iso3_code` VARCHAR(3),
    `name` VARCHAR(255),
    `postal_code_mandatory` TINYINT(1) DEFAULT 0,
    `postal_code_regex` VARCHAR(500),
    PRIMARY KEY (`id_country`),
    UNIQUE INDEX `spy_country-iso2_code` (`iso2_code`),
    UNIQUE INDEX `spy_country-iso3_code` (`iso3_code`)
) ENGINE=InnoDB;

CREATE TABLE `spy_region`
(
    `id_region` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_country` INTEGER,
    `name` VARCHAR(100) NOT NULL,
    `iso2_code` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`id_region`),
    UNIQUE INDEX `spy_region-iso2_code` (`iso2_code`),
    INDEX `spy_region-fi_country` (`fk_country`),
    CONSTRAINT `spy_region-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE `spy_currency`
(
    `id_currency` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `code` VARCHAR(5),
    `symbol` VARCHAR(255),
    PRIMARY KEY (`id_currency`)
) ENGINE=InnoDB;

CREATE TABLE `spy_customer`
(
    `id_customer` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER,
    `customer_reference` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `company` VARCHAR(100),
    `gender` TINYINT,
    `date_of_birth` DATE,
    `password` VARCHAR(255),
    `restore_password_key` VARCHAR(150),
    `restore_password_date` DATETIME,
    `registered` DATE,
    `registration_key` VARCHAR(150),
    `default_billing_address` INTEGER,
    `default_shipping_address` INTEGER,
    `anonymized_at` DATETIME,
    `fk_user` INTEGER,
    `phone` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer`),
    UNIQUE INDEX `spy_customer-customer_reference` (`customer_reference`),
    UNIQUE INDEX `spy_customer-email` (`email`),
    INDEX `fi__customer-default_shipping_address` (`default_shipping_address`),
    INDEX `spy_customer-fi_user` (`fk_user`),
    INDEX `spy_customer-fi_locale` (`fk_locale`),
    INDEX `fi__customer-default_billing_address` (`default_billing_address`),
    CONSTRAINT `spy_customer-default_shipping_address`
        FOREIGN KEY (`default_shipping_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`)
        ON DELETE SET NULL,
    CONSTRAINT `spy_customer-fk_user`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`)
        ON DELETE NO ACTION,
    CONSTRAINT `spy_customer-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_customer-default_billing_address`
        FOREIGN KEY (`default_billing_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE `spy_customer_address`
(
    `id_customer_address` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER NOT NULL,
    `fk_country` INTEGER NOT NULL,
    `fk_region` INTEGER,
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255),
    `address2` VARCHAR(255),
    `address3` VARCHAR(255),
    `company` VARCHAR(255),
    `city` VARCHAR(255),
    `zip_code` VARCHAR(15),
    `phone` VARCHAR(255),
    `comment` VARCHAR(255),
    `deleted_at` DATETIME,
    `anonymized_at` DATETIME,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_address`),
    INDEX `spy_customer_address-fk_customer` (`fk_customer`),
    INDEX `spy_customer_address-fi_region` (`fk_region`),
    INDEX `spy_customer_address-fi_country` (`fk_country`),
    CONSTRAINT `spy_customer_address-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`),
    CONSTRAINT `spy_customer_address-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_customer_address-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE `spy_customer_group`
(
    `id_customer_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(70) NOT NULL,
    `description` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_group`),
    UNIQUE INDEX `spy_customer-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_customer_group_to_customer`
(
    `id_customer_group_to_customer` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer_group` INTEGER NOT NULL,
    `fk_customer` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_group_to_customer`),
    UNIQUE INDEX `fk_customer_group-fk_customer` (`fk_customer_group`, `fk_customer`),
    INDEX `spy_customer_group_to_customer-fi_customer` (`fk_customer`),
    CONSTRAINT `spy_customer_group_to_customer-fk_customer_group`
        FOREIGN KEY (`fk_customer_group`)
        REFERENCES `spy_customer_group` (`id_customer_group`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_customer_group_to_customer-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount`
(
    `id_discount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount_voucher_pool` INTEGER,
    `fk_store` INTEGER,
    `display_name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(1024),
    `amount` INTEGER NOT NULL,
    `is_exclusive` TINYINT(1) DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 0,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `calculator_plugin` VARCHAR(255),
    `discount_type` VARCHAR(255),
    `decision_rule_query_string` VARCHAR(255),
    `collector_query_string` VARCHAR(255),
    `discount_key` VARCHAR(32),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount`),
    UNIQUE INDEX `spy_discount-unique-display_name` (`display_name`),
    UNIQUE INDEX `spy_discount-unique-fk_discount_voucher_pool` (`fk_discount_voucher_pool`),
    INDEX `spy_discount-index-discount_type` (`discount_type`),
    INDEX `spy_discount_i_862ce6` (`discount_key`),
    INDEX `spy_discount-fi_store` (`fk_store`),
    CONSTRAINT `spy_discount-fk_store`
        FOREIGN KEY (`fk_store`)
        REFERENCES `spy_store` (`id_store`),
    CONSTRAINT `spy_discount-fk_discount_voucher_pool`
        FOREIGN KEY (`fk_discount_voucher_pool`)
        REFERENCES `spy_discount_voucher_pool` (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_voucher_pool`
(
    `id_discount_voucher_pool` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_voucher`
(
    `id_discount_voucher` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount_voucher_pool` INTEGER,
    `code` VARCHAR(255) NOT NULL,
    `number_of_uses` INTEGER,
    `max_number_of_uses` INTEGER,
    `is_active` TINYINT(1) DEFAULT 0,
    `voucher_batch` INTEGER DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher`),
    UNIQUE INDEX `spy_discount_voucher-code` (`code`),
    INDEX `spy_discount_voucher-fi_discount_voucher_pool` (`fk_discount_voucher_pool`),
    CONSTRAINT `spy_discount_voucher-fk_discount_voucher_pool`
        FOREIGN KEY (`fk_discount_voucher_pool`)
        REFERENCES `spy_discount_voucher_pool` (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_amount`
(
    `id_discount_amount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_currency` INTEGER NOT NULL,
    `fk_discount` INTEGER NOT NULL,
    `gross_amount` INTEGER,
    `net_amount` INTEGER,
    PRIMARY KEY (`id_discount_amount`),
    UNIQUE INDEX `spy_discount_amount-unique-currency-discount` (`fk_currency`, `fk_discount`),
    INDEX `spy_discount_amount-fi_discount` (`fk_discount`),
    CONSTRAINT `spy_discount_amount-fk_discount`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`),
    CONSTRAINT `spy_discount_amount-fk_currency`
        FOREIGN KEY (`fk_currency`)
        REFERENCES `spy_currency` (`id_currency`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_promotion`
(
    `id_discount_promotion` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount` INTEGER NOT NULL,
    `abstract_sku` VARCHAR(255) NOT NULL,
    `quantity` INTEGER NOT NULL,
    PRIMARY KEY (`id_discount_promotion`),
    INDEX `spy_discount_promotion-fi_discount` (`fk_discount`),
    CONSTRAINT `spy_discount_promotion-fk_discount`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`)
) ENGINE=InnoDB;

CREATE TABLE `spy_event_behavior_entity_change`
(
    `id_event_behavior_entity_change` INTEGER NOT NULL AUTO_INCREMENT,
    `data` VARCHAR(255),
    `process_id` VARCHAR(255),
    `created_at` DATETIME,
    PRIMARY KEY (`id_event_behavior_entity_change`)
) ENGINE=InnoDB;

CREATE TABLE `spy_glossary_key`
(
    `id_glossary_key` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_key`),
    UNIQUE INDEX `spy_glossary_key-unique-key` (`key`),
    INDEX `spy_glossary_key-index-key` (`key`),
    INDEX `spy_glossary_key-is_active` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE `spy_glossary_translation`
(
    `id_glossary_translation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_glossary_key` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_translation`),
    UNIQUE INDEX `spy_glossary_translation-unique-fk_glossary_key` (`fk_glossary_key`, `fk_locale`),
    INDEX `spy_glossary_translation-index-fk_locale` (`fk_locale`),
    INDEX `spy_glossary_translation-is_active` (`is_active`),
    CONSTRAINT `spy_glossary_translation-fk_glossary_key`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_glossary_translation-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_locale`
(
    `id_locale` INTEGER NOT NULL AUTO_INCREMENT,
    `locale_name` VARCHAR(5) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_locale`),
    UNIQUE INDEX `spy_locale-unique-locale_name` (`locale_name`),
    INDEX `spy_locale-index-locale_name` (`locale_name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_navigation`
(
    `id_navigation` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_navigation`),
    UNIQUE INDEX `spy_navigation_key-unique-key` (`key`),
    INDEX `spy_navigation-index-key` (`key`),
    INDEX `spy_navigation-index-is_active` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE `spy_navigation_node`
(
    `id_navigation_node` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_navigation` INTEGER NOT NULL,
    `fk_parent_navigation_node` INTEGER,
    `node_type` VARCHAR(255),
    `position` INTEGER,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `node_key` VARCHAR(32),
    PRIMARY KEY (`id_navigation_node`),
    INDEX `spy_navigation_node_i_ba7161` (`position`),
    INDEX `spy_navigation_node_i_576b1b` (`node_key`),
    INDEX `spy_navigation_node_fi_6f985c` (`fk_navigation`),
    INDEX `spy_navigation_node_fi_07636b` (`fk_parent_navigation_node`),
    CONSTRAINT `spy_navigation_node_fk_6f985c`
        FOREIGN KEY (`fk_navigation`)
        REFERENCES `spy_navigation` (`id_navigation`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_navigation_node_fk_07636b`
        FOREIGN KEY (`fk_parent_navigation_node`)
        REFERENCES `spy_navigation_node` (`id_navigation_node`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_navigation_node_localized_attributes`
(
    `id_navigation_node_localized_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_navigation_node` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `fk_url` INTEGER,
    `title` VARCHAR(255) NOT NULL,
    `link` VARCHAR(255),
    `external_url` VARCHAR(255),
    `css_class` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_navigation_node_localized_attributes`),
    INDEX `spy_navigation_node_localized_attributes_fi_12b6d0` (`fk_locale`),
    INDEX `spy_navigation_node_localized_attributes_fi_43843f` (`fk_navigation_node`),
    INDEX `spy_navigation_node_localized_attributes_fi_76593a` (`fk_url`),
    CONSTRAINT `spy_navigation_node_localized_attributes_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_navigation_node_localized_attributes_fk_43843f`
        FOREIGN KEY (`fk_navigation_node`)
        REFERENCES `spy_navigation_node` (`id_navigation_node`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_navigation_node_localized_attributes_fk_76593a`
        FOREIGN KEY (`fk_url`)
        REFERENCES `spy_url` (`id_url`)
) ENGINE=InnoDB;

CREATE TABLE `spy_newsletter_subscriber`
(
    `id_newsletter_subscriber` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER,
    `email` VARCHAR(255) NOT NULL,
    `subscriber_key` VARCHAR(150),
    `is_confirmed` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_newsletter_subscriber`),
    UNIQUE INDEX `spy_newsletter_subscriber-unique-email` (`email`),
    UNIQUE INDEX `spy_newsletter_subscriber-unique-subscriber_key` (`subscriber_key`),
    INDEX `spy_newsletter_subscriber-index-email` (`email`),
    INDEX `spy_newsletter_subscriber-index-subscriber_key` (`subscriber_key`),
    INDEX `spy_newsletter_subscriber-fi_customer` (`fk_customer`),
    CONSTRAINT `spy_newsletter_subscriber-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `spy_newsletter_type`
(
    `id_newsletter_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_newsletter_type`),
    UNIQUE INDEX `spy_newsletter_type-unique-name` (`name`),
    INDEX `spy_newsletter_type-index-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_newsletter_subscription`
(
    `fk_newsletter_subscriber` INTEGER NOT NULL,
    `fk_newsletter_type` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`fk_newsletter_subscriber`,`fk_newsletter_type`),
    INDEX `spy_newsletter_subscription-fi_newsletter_type` (`fk_newsletter_type`),
    CONSTRAINT `spy_newsletter_subscription-fk_newsletter_subscriber`
        FOREIGN KEY (`fk_newsletter_subscriber`)
        REFERENCES `spy_newsletter_subscriber` (`id_newsletter_subscriber`),
    CONSTRAINT `spy_newsletter_subscription-fk_newsletter_type`
        FOREIGN KEY (`fk_newsletter_type`)
        REFERENCES `spy_newsletter_type` (`id_newsletter_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_nopayment_paid`
(
    `id_nopayment_paid` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_nopayment_paid`),
    INDEX `spy_nopayment_paid-fi_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_nopayment_paid-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_transition_log`
(
    `id_oms_transition_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_sales_order` INTEGER NOT NULL,
    `quantity` INTEGER,
    `locked` TINYINT(1),
    `fk_oms_order_process` INTEGER,
    `event` VARCHAR(100),
    `hostname` VARCHAR(128) NOT NULL,
    `path` VARCHAR(256),
    `params` TEXT,
    `source_state` VARCHAR(128),
    `target_state` VARCHAR(128),
    `command` VARCHAR(255),
    `condition` VARCHAR(255),
    `is_error` TINYINT(1),
    `error_message` TEXT,
    `created_at` DATETIME,
    PRIMARY KEY (`id_oms_transition_log`),
    INDEX `spy_oms_transition_log-fi_sales_order` (`fk_sales_order`),
    INDEX `spy_oms_transition_log-fi_sales_order_item` (`fk_sales_order_item`),
    INDEX `spy_oms_transition_log-fi_oms_order_process` (`fk_oms_order_process`),
    CONSTRAINT `spy_oms_transition_log-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_oms_transition_log-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_transition_log-fk_oms_order_process`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `spy_oms_order_process` (`id_oms_order_process`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_order_process`
(
    `id_oms_order_process` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_order_process`),
    UNIQUE INDEX `spy_oms_order_process-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_state_machine_lock`
(
    `id_oms_state_machine_lock` INTEGER NOT NULL AUTO_INCREMENT,
    `identifier` VARCHAR(255) NOT NULL,
    `expires` DATETIME NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_state_machine_lock`),
    UNIQUE INDEX `spy_oms_state_machine_lock-identifier` (`identifier`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_order_item_state`
(
    `id_oms_order_item_state` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_oms_order_item_state`),
    UNIQUE INDEX `spy_oms_order_item_state-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_order_item_state_history`
(
    `id_oms_order_item_state_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`id_oms_order_item_state_history`),
    INDEX `spy_oms_order_item_state_history-index-fk_soi-fk_oois-id_ooish` (`fk_sales_order_item`, `fk_oms_order_item_state`),
    INDEX `spy_oms_order_item_state_history-fi_oms_order_item_state` (`fk_oms_order_item_state`),
    CONSTRAINT `spy_oms_order_item_state_history-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_order_item_state_history-fk_oms_order_item_state`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_event_timeout`
(
    `id_oms_event_timeout` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `timeout` DATETIME NOT NULL,
    `event` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_event_timeout`),
    UNIQUE INDEX `spy_oms_event_timeout-unique-fk_sales_order_item` (`fk_sales_order_item`, `fk_oms_order_item_state`),
    INDEX `spy_oms_event_timeout-timeout` (`timeout`),
    INDEX `spy_oms_event_timeout-fi_oms_order_item_state` (`fk_oms_order_item_state`),
    CONSTRAINT `spy_oms_event_timeout-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_event_timeout-fk_oms_order_item_state`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`)
) ENGINE=InnoDB;

CREATE TABLE `spy_oms_product_reservation`
(
    `id_oms_product_reservation` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `reservation_quantity` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_oms_product_reservation`),
    UNIQUE INDEX `spy_oms_product_reservation-sku` (`sku`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payolution`
(
    `id_payment_payolution` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `account_brand` VARCHAR(255) NOT NULL,
    `client_ip` VARCHAR(255) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `salutation` TINYINT NOT NULL,
    `gender` TINYINT NOT NULL,
    `date_of_birth` DATE,
    `country_iso2_code` CHAR(2) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    `street` VARCHAR(255) NOT NULL,
    `zip_code` VARCHAR(15) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255),
    `cell_phone` VARCHAR(255),
    `language_iso2_code` CHAR(2) NOT NULL,
    `currency_iso3_code` CHAR(3) NOT NULL,
    `pre_check_id` VARCHAR(255),
    `installment_calculation_id` VARCHAR(255),
    `installment_amount` INTEGER,
    `installment_duration` INTEGER,
    `bank_account_holder` VARCHAR(100),
    `bank_account_bic` VARCHAR(100),
    `bank_account_iban` VARCHAR(100),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payolution`),
    INDEX `spy_payment_payolution-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_payment_payolution-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payolution_transaction_request_log`
(
    `id_payment_payolution_transaction_request_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_payolution` INTEGER NOT NULL,
    `transaction_id` VARCHAR(255) NOT NULL,
    `reference_id` VARCHAR(255),
    `payment_code` VARCHAR(255) NOT NULL,
    `presentation_amount` VARCHAR(255) NOT NULL,
    `presentation_currency` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payolution_transaction_request_log`),
    INDEX `spy_payolution_transaction_request_log-fi_payment_payolution` (`fk_payment_payolution`),
    CONSTRAINT `spy_payolution_transaction_request_log-fk_payment_payolution`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payolution_transaction_status_log`
(
    `id_payment_payolution_transaction_status_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_payolution` INTEGER NOT NULL,
    `processing_code` VARCHAR(255) NOT NULL,
    `processing_result` VARCHAR(255) NOT NULL,
    `processing_status` VARCHAR(255) NOT NULL,
    `processing_status_code` INTEGER NOT NULL,
    `processing_reason` VARCHAR(255) NOT NULL,
    `processing_reason_code` INTEGER NOT NULL,
    `processing_return` VARCHAR(255) NOT NULL,
    `processing_return_code` VARCHAR(255) NOT NULL,
    `identification_transactionid` VARCHAR(255) NOT NULL,
    `identification_uniqueid` VARCHAR(255) NOT NULL,
    `identification_shortid` VARCHAR(255) NOT NULL,
    `identification_referenceid` VARCHAR(255),
    `processing_connectordetail_connectortxid1` VARCHAR(255),
    `processing_connectordetail_paymentreference` VARCHAR(255),
    `processing_timestamp` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payolution_transaction_status_log`),
    INDEX `spy_payolution_transaction_status_log-fi_payolution` (`fk_payment_payolution`),
    CONSTRAINT `spy_payolution_transaction_status_log-fk_payolution`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payolution_order_item`
(
    `fk_payment_payolution` INTEGER NOT NULL,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`fk_payment_payolution`,`fk_sales_order_item`),
    INDEX `spy_payment_payolution_order_item-fi_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_payolution_order_item-fk_payolution`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`),
    CONSTRAINT `spy_payment_payolution_order_item-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_price_product`
(
    `id_price_product` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER DEFAULT 0,
    `fk_product` INTEGER,
    `fk_price_type` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER,
    PRIMARY KEY (`id_price_product`),
    UNIQUE INDEX `spy_price_product-unique-fk_product_abstract` (`fk_product_abstract`, `fk_product`, `fk_price_type`),
    INDEX `spy_price_product-fk_price_type` (`fk_price_type`),
    INDEX `spy_price_product-index-fk_product-fk_price_type-price` (`fk_product`, `fk_price_type`, `price`),
    CONSTRAINT `spy_price_product-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_price_product-fk_price_type`
        FOREIGN KEY (`fk_price_type`)
        REFERENCES `spy_price_type` (`id_price_type`),
    CONSTRAINT `spy_price_product-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_price_type`
(
    `id_price_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_price_type`),
    UNIQUE INDEX `spy_price_type-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_abstract`
(
    `new_from` DATETIME,
    `new_to` DATETIME,
    `id_product_abstract` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_tax_set` INTEGER,
    `is_featured` TINYINT(1) DEFAULT 0,
    `color_code` VARCHAR(8),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_abstract`),
    UNIQUE INDEX `spy_product_abstract-sku` (`sku`),
    INDEX `spy_product_abstract-fi_tax_set` (`fk_tax_set`),
    CONSTRAINT `spy_product_abstract-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_abstract_localized_attributes`
(
    `id_abstract_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_abstract` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `meta_title` VARCHAR(255),
    `meta_keywords` TEXT,
    `meta_description` TEXT,
    `attributes` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_abstract_attributes`),
    UNIQUE INDEX `spy_product_abstract_localized_attributes-unique-fk_product_abst` (`fk_product_abstract`, `fk_locale`),
    INDEX `spy_product_abstract_localized_attributes-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_abstract_localized_attributes-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_product_abstract_localized_attributes-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product`
(
    `id_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product`),
    UNIQUE INDEX `spy_product-sku` (`sku`),
    INDEX `spy_product-fi_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_product-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_localized_attributes`
(
    `id_product_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `attributes` TEXT NOT NULL,
    `is_complete` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_attributes`),
    UNIQUE INDEX `spy_product_localized_attributes-unique-fk_product` (`fk_product`, `fk_locale`),
    INDEX `spy_product_localized_attributes-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_localized_attributes-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_product_localized_attributes-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_attribute_key`
(
    `id_product_attribute_key` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_super` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_product_attribute_key`),
    UNIQUE INDEX `spy_product_attribute_key-unique-key` (`key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_management_attribute`
(
    `id_product_management_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_attribute_key` INTEGER NOT NULL,
    `allow_input` TINYINT(1) DEFAULT 1 NOT NULL,
    `input_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_product_management_attribute`),
    UNIQUE INDEX `spy_pim_attribute-unique-fk_product_attribute_key` (`fk_product_attribute_key`),
    CONSTRAINT `spy_pim_attribute-fk_product_attribute_key`
        FOREIGN KEY (`fk_product_attribute_key`)
        REFERENCES `spy_product_attribute_key` (`id_product_attribute_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_management_attribute_value`
(
    `id_product_management_attribute_value` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_management_attribute` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    PRIMARY KEY (`id_product_management_attribute_value`),
    INDEX `spy_pim_attribute_value-fi_pim_attribute` (`fk_product_management_attribute`),
    CONSTRAINT `spy_pim_attribute_value-fk_pim_attribute`
        FOREIGN KEY (`fk_product_management_attribute`)
        REFERENCES `spy_product_management_attribute` (`id_product_management_attribute`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_management_attribute_value_translation`
(
    `id_product_management_attribute_value_translation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `fk_product_management_attribute_value` INTEGER NOT NULL,
    `translation` TEXT NOT NULL,
    PRIMARY KEY (`id_product_management_attribute_value_translation`),
    UNIQUE INDEX `spy_pim_attribute_value_translation-unique-locale_attribute_valu` (`fk_locale`, `fk_product_management_attribute_value`),
    INDEX `spy_pim_attribute_value_translation-fi_pim_attribute_value` (`fk_product_management_attribute_value`),
    CONSTRAINT `spy_pim_attribute_value-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`),
    CONSTRAINT `spy_pim_attribute_value_translation-fk_pim_attribute_value`
        FOREIGN KEY (`fk_product_management_attribute_value`)
        REFERENCES `spy_product_management_attribute_value` (`id_product_management_attribute_value`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_bundle`
(
    `id_product_bundle` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_bundled_product` INTEGER NOT NULL COMMENT \'Representation of the single item in this bundle\',
    `fk_product` INTEGER NOT NULL COMMENT \'Relation to the main bundle product\',
    `quantity` INTEGER DEFAULT 1 NOT NULL COMMENT \'Number of items bundled. For instance when you have 5000 equal items you will have quantity 5000\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_bundle`),
    INDEX `spy_product_bundle-index-fk_product` (`fk_product`),
    INDEX `spy_product_bundle-fi_bundled_product` (`fk_bundled_product`),
    CONSTRAINT `spy_product_bundle-fk_bundled_product`
        FOREIGN KEY (`fk_bundled_product`)
        REFERENCES `spy_product` (`id_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_bundle-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item_bundle`
(
    `id_sales_order_item_bundle` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `image` TEXT,
    `gross_price` INTEGER NOT NULL,
    `net_price` INTEGER DEFAULT 0,
    `price` INTEGER DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_category`
(
    `id_product_category` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_abstract` INTEGER NOT NULL,
    `fk_category` INTEGER NOT NULL,
    `product_order` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_product_category`),
    UNIQUE INDEX `spy_product_category-unique-fk_product_abstract` (`fk_product_abstract`, `fk_category`),
    INDEX `spy_product_category-fi_category` (`fk_category`),
    CONSTRAINT `spy_product_category-fk_category`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`),
    CONSTRAINT `spy_product_category-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_group`
(
    `id_product_group` INTEGER NOT NULL AUTO_INCREMENT,
    `product_group_key` VARCHAR(32),
    PRIMARY KEY (`id_product_group`),
    INDEX `spy_product_group_i_55ec34` (`product_group_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_abstract_group`
(
    `fk_product_group` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`fk_product_group`,`fk_product_abstract`),
    INDEX `spy_product_abstract_group-fi_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_product_abstract_group-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_abstract_group-fk_product_group`
        FOREIGN KEY (`fk_product_group`)
        REFERENCES `spy_product_group` (`id_product_group`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_image_set`
(
    `id_product_image_set` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `fk_locale` INTEGER,
    `fk_product` INTEGER,
    `fk_product_abstract` INTEGER,
    `fk_resource_product_set` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_image_set`),
    UNIQUE INDEX `fk_locale-fk_product-fk_product_abstract` (`fk_locale`, `fk_product`, `fk_product_abstract`),
    INDEX `spy_product_image_set-index-fk_product` (`fk_product`),
    INDEX `spy_product_image_set-index-fk_product_abstract` (`fk_product_abstract`),
    INDEX `spy_product_image_set-fk_resource_product_set` (`fk_resource_product_set`),
    CONSTRAINT `spy_product_image_set-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_product_image_set-fk_resource_product_set`
        FOREIGN KEY (`fk_resource_product_set`)
        REFERENCES `spy_product_set` (`id_product_set`),
    CONSTRAINT `spy_product_image_set-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`),
    CONSTRAINT `spy_product_image_set-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_image`
(
    `id_product_image` INTEGER NOT NULL AUTO_INCREMENT,
    `external_url_small` VARCHAR(2048),
    `external_url_large` VARCHAR(2048),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_image`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_image_set_to_product_image`
(
    `id_product_image_set_to_product_image` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_image_set` INTEGER NOT NULL,
    `fk_product_image` INTEGER NOT NULL,
    `sort_order` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_image_set_to_product_image`),
    UNIQUE INDEX `fk_product_image_set-fk_product_image` (`fk_product_image_set`, `fk_product_image`),
    INDEX `spy_product_image_set_to_product_image-fi_product_image` (`fk_product_image`),
    CONSTRAINT `spy_product_image_set_to_product_image-fk_product_image`
        FOREIGN KEY (`fk_product_image`)
        REFERENCES `spy_product_image` (`id_product_image`),
    CONSTRAINT `spy_product_image_set_to_product_image-fk_product_image_set`
        FOREIGN KEY (`fk_product_image_set`)
        REFERENCES `spy_product_image_set` (`id_product_image_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_label`
(
    `id_product_label` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_exclusive` TINYINT(1) DEFAULT 0 NOT NULL,
    `is_published` TINYINT(1) DEFAULT 0,
    `is_dynamic` TINYINT(1) DEFAULT 0 NOT NULL,
    `front_end_reference` VARCHAR(255),
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `position` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_label`),
    UNIQUE INDEX `spy_product_label-name` (`name`),
    INDEX `idx-spy_product_label-position` (`position`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_label_localized_attributes`
(
    `id_product_label_localized_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_label` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255),
    PRIMARY KEY (`id_product_label_localized_attributes`),
    UNIQUE INDEX `spy_product_label_localized_attributes-fk_product_label-fk_local` (`fk_product_label`, `fk_locale`),
    INDEX `idx-spy_product_label_localized_attributes-fk_product_label` (`fk_product_label`),
    INDEX `spy_product_label_localized_attributes_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_product_label_localized_attributes_fk_3dcfb4`
        FOREIGN KEY (`fk_product_label`)
        REFERENCES `spy_product_label` (`id_product_label`),
    CONSTRAINT `spy_product_label_localized_attributes_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_label_product_abstract`
(
    `id_product_label_product_abstract` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_label` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_label_product_abstract`),
    UNIQUE INDEX `spy_product_label_product_abstract-fk_product_label-fk_product_a` (`fk_product_label`, `fk_product_abstract`),
    INDEX `idx-spy_product_label_product_abstract-fk_product_label` (`fk_product_label`),
    INDEX `idx-spy_product_label_product_abstract-fk_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_product_label_product_abstract_fk_3dcfb4`
        FOREIGN KEY (`fk_product_label`)
        REFERENCES `spy_product_label` (`id_product_label`),
    CONSTRAINT `spy_product_label_product_abstract_fk_371a4f`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_group`
(
    `id_product_option_group` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_tax_set` INTEGER,
    `name` VARCHAR(255),
    `active` TINYINT(1),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_option_group`),
    INDEX `spy_product_option_group-fi_tax_set` (`fk_tax_set`),
    CONSTRAINT `spy_product_option_group-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE `spy_product_abstract_product_option_group`
(
    `fk_product_abstract` INTEGER NOT NULL,
    `fk_product_option_group` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_abstract`,`fk_product_option_group`),
    INDEX `spy_product_abstract-fi_product_option_group` (`fk_product_option_group`),
    CONSTRAINT `spy_product_abstract-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`),
    CONSTRAINT `spy_product_abstract-fk_product_option_group`
        FOREIGN KEY (`fk_product_option_group`)
        REFERENCES `spy_product_option_group` (`id_product_option_group`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value`
(
    `id_product_option_value` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER,
    `sku` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `fk_product_option_group` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_option_value`),
    UNIQUE INDEX `spy_product_option_value-sku` (`sku`),
    INDEX `spy_product_option_value-fi_product_option_group` (`fk_product_option_group`),
    CONSTRAINT `spy_product_option_value-fk_product_option_group`
        FOREIGN KEY (`fk_product_option_group`)
        REFERENCES `spy_product_option_group` (`id_product_option_group`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_relation_type`
(
    `id_product_relation_type` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_relation_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_relation`
(
    `id_product_relation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_abstract` INTEGER NOT NULL,
    `fk_product_relation_type` INTEGER NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `is_rebuild_scheduled` TINYINT(1) DEFAULT 0 NOT NULL,
    `query_set_data` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_relation`),
    UNIQUE INDEX `spy_product-relation-unique-fk_product_abstract` (`fk_product_abstract`, `fk_product_relation_type`),
    INDEX `spy_product-relation-type-fi_product_abstract` (`fk_product_relation_type`),
    CONSTRAINT `spy_product-relation-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`),
    CONSTRAINT `spy_product-relation-type-fk_product_abstract`
        FOREIGN KEY (`fk_product_relation_type`)
        REFERENCES `spy_product_relation_type` (`id_product_relation_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_relation_product_abstract`
(
    `id_product_relation_product_abstract` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_relation` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    `order` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_relation_product_abstract`),
    INDEX `spy_product-rel-prod-rel-fi_product_relation` (`fk_product_relation`),
    INDEX `spy_product-rel-prod-abs-fi_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_product-rel-prod-rel-fk_product_relation`
        FOREIGN KEY (`fk_product_relation`)
        REFERENCES `spy_product_relation` (`id_product_relation`),
    CONSTRAINT `spy_product-rel-prod-abs-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_review`
(
    `id_product_review` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_abstract` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `customer_reference` VARCHAR(255) NOT NULL,
    `rating` INTEGER DEFAULT 0 NOT NULL,
    `summary` TEXT,
    `description` TEXT,
    `nickname` VARCHAR(255),
    `status` TINYINT DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_review`),
    INDEX `spy_product_review-fk_product_abstract` (`fk_product_abstract`),
    INDEX `spy_product_review-fk_locale` (`fk_locale`),
    INDEX `spy_product_review-customer_reference` (`customer_reference`),
    CONSTRAINT `spy_product_review-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`),
    CONSTRAINT `spy_product_review-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search`
(
    `id_product_search` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_locale` INTEGER,
    `is_searchable` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id_product_search`),
    INDEX `spy_product_search-index-fk-product-fk-locale-is_searchable` (`fk_product`, `fk_locale`, `is_searchable`),
    INDEX `spy_product_search-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_search-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_product_search-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search_attribute_map`
(
    `fk_product_attribute_key` INTEGER NOT NULL,
    `target_field` VARCHAR(255) NOT NULL,
    `synced` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`fk_product_attribute_key`,`target_field`),
    INDEX `spy_product_search_attribute_map_i_a1d33d` (`fk_product_attribute_key`),
    CONSTRAINT `spy_product_search_attribute_map-fk_product_attribute_key`
        FOREIGN KEY (`fk_product_attribute_key`)
        REFERENCES `spy_product_attribute_key` (`id_product_attribute_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search_attribute`
(
    `id_product_search_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_attribute_key` INTEGER NOT NULL,
    `filter_type` VARCHAR(255) NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    `synced` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_product_search_attribute`),
    UNIQUE INDEX `spy_product_search_attribute-unique-fk_product_attribute_key` (`fk_product_attribute_key`),
    CONSTRAINT `spy_product_search_attribute-fk_product_attribute_key`
        FOREIGN KEY (`fk_product_attribute_key`)
        REFERENCES `spy_product_attribute_key` (`id_product_attribute_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_set`
(
    `id_product_set` INTEGER NOT NULL AUTO_INCREMENT,
    `is_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `weight` INTEGER DEFAULT 0 NOT NULL,
    `product_set_key` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_set`),
    UNIQUE INDEX `spy_product_set-product_set_key` (`product_set_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_abstract_set`
(
    `id_product_abstract_set` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_set` INTEGER NOT NULL,
    `fk_product_abstract` INTEGER NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id_product_abstract_set`),
    UNIQUE INDEX `spy_product_abstract_set-unique-fk_product_set` (`fk_product_set`, `fk_product_abstract`),
    INDEX `spy_product_abstract_set-fk_product_set` (`fk_product_set`),
    INDEX `spy_product_abstract_set-fk_product_abstract` (`fk_product_abstract`),
    CONSTRAINT `spy_product_abstract_set-fk_product_set`
        FOREIGN KEY (`fk_product_set`)
        REFERENCES `spy_product_set` (`id_product_set`),
    CONSTRAINT `spy_product_abstract_set-fk_product_abstract`
        FOREIGN KEY (`fk_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_set_data`
(
    `id_product_set_data` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product_set` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `meta_title` VARCHAR(255),
    `meta_keywords` TEXT,
    `meta_description` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product_set_data`),
    UNIQUE INDEX `spy_product_set_data-unique-fk_product_set` (`fk_product_set`, `fk_locale`),
    INDEX `spy_product_set_data-fk_product_set` (`fk_product_set`),
    INDEX `spy_product_set_data-fk_locale` (`fk_locale`),
    CONSTRAINT `spy_product_set_data-fk_product_set`
        FOREIGN KEY (`fk_product_set`)
        REFERENCES `spy_product_set` (`id_product_set`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_set_data-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_propel_heartbeat`
(
    `heartbeat_check` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`heartbeat_check`)
) ENGINE=InnoDB;

CREATE TABLE `spy_queue_process`
(
    `id_queue_process` INTEGER NOT NULL AUTO_INCREMENT,
    `server_id` VARCHAR(255) NOT NULL,
    `process_pid` INTEGER NOT NULL,
    `worker_pid` INTEGER NOT NULL,
    `queue_name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_queue_process`),
    UNIQUE INDEX `spy_queue_process-unique-key` (`server_id`, `process_pid`, `queue_name`),
    INDEX `spy_queue_process-index-key` (`server_id`, `queue_name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_ratepay`
(
    `id_payment_ratepay` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `payment_type` TINYINT NOT NULL,
    `transaction_id` VARCHAR(50),
    `transaction_short_id` VARCHAR(50),
    `result_code` INTEGER,
    `gender` TINYINT NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `phone` VARCHAR(32) NOT NULL,
    `ip_address` VARCHAR(50) NOT NULL,
    `customer_allow_credit_inquiry` INTEGER NOT NULL,
    `currency_iso3` VARCHAR(3) NOT NULL,
    `device_fingerprint` VARCHAR(50),
    `debit_pay_type` TINYINT,
    `installment_total_amount` INTEGER,
    `installment_interest_amount` INTEGER,
    `installment_interest_rate` FLOAT,
    `installment_last_rate` FLOAT,
    `installment_rate` FLOAT,
    `installment_payment_first_day` INTEGER,
    `installment_month` INTEGER,
    `installment_number_rates` INTEGER,
    `installment_calculation_start` VARCHAR(50),
    `installment_service_charge` FLOAT,
    `installment_annual_percentage_rate` FLOAT,
    `installment_month_allowed` INTEGER,
    `bank_account_holder` VARCHAR(255),
    `bank_account_bic` VARCHAR(100),
    `bank_account_iban` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_ratepay`),
    INDEX `spy_payment_ratepay-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_payment_ratepay-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_ratepay_log`
(
    `id_payment_ratepay_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `message` VARCHAR(255),
    `payment_method` TINYINT,
    `request_type` TINYINT NOT NULL,
    `request_transaction_id` VARCHAR(50),
    `request_transaction_short_id` VARCHAR(50),
    `request_body` TEXT,
    `response_type` VARCHAR(255),
    `response_result_code` INTEGER,
    `response_result_text` VARCHAR(255),
    `response_transaction_id` VARCHAR(255),
    `response_transaction_short_id` VARCHAR(255),
    `response_reason_code` INTEGER,
    `response_reason_text` VARCHAR(255),
    `response_status_code` INTEGER,
    `response_status_text` VARCHAR(255),
    `response_customer_message` TEXT,
    `item_count` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_ratepay_log`),
    INDEX `spy_payment_ratepay_log-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_payment_ratepay_log-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_refund`
(
    `id_refund` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    `comment` VARCHAR(255),
    `created_at` DATETIME,
    PRIMARY KEY (`id_refund`),
    INDEX `spy_refund-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_refund-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order`
(
    `customer_reference` VARCHAR(255),
    `id_sales_order` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_address_billing` INTEGER NOT NULL,
    `fk_sales_order_address_shipping` INTEGER NOT NULL,
    `fk_locale` INTEGER,
    `email` VARCHAR(255),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `order_reference` VARCHAR(45) NOT NULL,
    `is_test` TINYINT(1) DEFAULT 0 NOT NULL,
    `store` VARCHAR(255),
    `currency_iso_code` VARCHAR(5),
    `price_mode` TINYINT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    UNIQUE INDEX `spy_sales_order-order_reference` (`order_reference`),
    INDEX `spy_sales_order-customer_reference` (`customer_reference`),
    INDEX `spy_sales_order-store` (`store`),
    INDEX `spy_sales_order-currency_iso_code` (`currency_iso_code`),
    INDEX `spy_sales_order-fi_sales_order_address_shipping` (`fk_sales_order_address_shipping`),
    INDEX `spy_sales_order-fi_sales_order_address_billing` (`fk_sales_order_address_billing`),
    INDEX `spy_sales_order-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_sales_order-fk_sales_order_address_shipping`
        FOREIGN KEY (`fk_sales_order_address_shipping`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order-fk_sales_order_address_billing`
        FOREIGN KEY (`fk_sales_order_address_billing`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_discount`
(
    `id_sales_discount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `fk_sales_order_item` INTEGER,
    `fk_sales_expense` INTEGER,
    `fk_sales_order_item_option` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(510),
    `display_name` VARCHAR(255) NOT NULL,
    `amount` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_discount`),
    INDEX `spy_sales_discount-fi_sales_order_item` (`fk_sales_order_item`),
    INDEX `spy_sales_discount-fi_sales_order_item_option` (`fk_sales_order_item_option`),
    INDEX `spy_sales_discount-fi_sales_expense` (`fk_sales_expense`),
    INDEX `spy_sales_discount-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_sales_discount-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_sales_discount-fk_sales_order_item_option`
        FOREIGN KEY (`fk_sales_order_item_option`)
        REFERENCES `spy_sales_order_item_option` (`id_sales_order_item_option`),
    CONSTRAINT `spy_sales_discount-fk_sales_expense`
        FOREIGN KEY (`fk_sales_expense`)
        REFERENCES `spy_sales_expense` (`id_sales_expense`),
    CONSTRAINT `spy_sales_discount-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_discount_code`
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
    INDEX `spy_sales_discount_code-fi_sales_discount` (`fk_sales_discount`),
    CONSTRAINT `spy_sales_discount_code-fk_sales_discount`
        FOREIGN KEY (`fk_sales_discount`)
        REFERENCES `spy_sales_discount` (`id_sales_discount`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item`
(
    `fk_sales_order_item_bundle` INTEGER,
    `id_sales_order_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `fk_oms_order_process` INTEGER,
    `last_state_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `canceled_amount` INTEGER DEFAULT 0,
    `tax_rate` DECIMAL(8,2),
    `quantity` INTEGER DEFAULT 1 NOT NULL COMMENT \'/Quantity ordered for item/\',
    `group_key` VARCHAR(255),
    `net_price` INTEGER DEFAULT 0 COMMENT \'/Price for one unit not including tax, without shipping, coupons/\',
    `price` INTEGER DEFAULT 0 COMMENT \'/Price for item, can be gross or net price depending on tax mode/\',
    `subtotal_aggregation` INTEGER COMMENT \'/Subtotal price amount (item + options + item expenses) before discounts/\',
    `tax_amount` INTEGER DEFAULT 0 COMMENT \'/Calculated tax amount based on tax mode/\',
    `tax_amount_full_aggregation` INTEGER DEFAULT 0 COMMENT \'/Calculated tax full amount based on tax mode, includes options, item expenses/\',
    `tax_rate_average_aggregation` DECIMAL(8,2) COMMENT \'/Calculated tax rate, includes options, item expenses, /\',
    `tax_amount_after_cancellation` INTEGER DEFAULT 0 COMMENT \'/Calculated tax full amount based on tax mode, includes options, item expenses, /\',
    `product_option_price_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total price amount for item from options/\',
    `expense_price_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total price amount for item from item expenses/\',
    `discount_amount_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total discount amount for item/\',
    `discount_amount_full_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total discount amount for item with options or item expenses/\',
    `price_to_pay_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total item price to pay after discounts including options or item expenses/\',
    `refundable_amount` INTEGER DEFAULT 0 COMMENT \'/Total item refundable amount/\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `spy_sales_order_item-sku` (`sku`),
    INDEX `spy_sales_order_item-fi_sales_order` (`fk_sales_order`),
    INDEX `spy_sales_order_item-fi_oms_order_process` (`fk_oms_order_process`),
    INDEX `spy_sales_order_item-fi_oms_order_item_state` (`fk_oms_order_item_state`),
    INDEX `spy_sales_order_item-fi_sales_order_item_bundle` (`fk_sales_order_item_bundle`),
    CONSTRAINT `spy_sales_order_item-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_order_item-fk_oms_order_process`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `spy_oms_order_process` (`id_oms_order_process`),
    CONSTRAINT `spy_sales_order_item-fk_oms_order_item_state`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`),
    CONSTRAINT `spy_sales_order_item-fk_sales_order_item_bundle`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `spy_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item_option`
(
    `id_sales_order_item_option` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `group_name` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER DEFAULT 0 NOT NULL,
    `canceled_amount` INTEGER DEFAULT 0,
    `tax_rate` DECIMAL(8,2) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `net_price` INTEGER DEFAULT 0 COMMENT \'/Price for one unit not including tax, without shipping, coupons/\',
    `price` INTEGER DEFAULT 0 COMMENT \'/Price for item, can be gross or net price depending on tax mode/\',
    `discount_amount_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total discount amount for item/\',
    `tax_amount` INTEGER DEFAULT 0 COMMENT \'/Calculated tax amount based on tax mode/\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_option`),
    INDEX `spy_sales_order_item_option-fi_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_sales_order_item_option-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_address`
(
    `id_sales_order_address` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_country` INTEGER NOT NULL,
    `fk_region` INTEGER,
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255),
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
    INDEX `spy_sales_order_address-fi_region` (`fk_region`),
    INDEX `spy_sales_order_address-fi_country` (`fk_country`),
    CONSTRAINT `spy_sales_order_address-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`),
    CONSTRAINT `spy_sales_order_address-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_address_history`
(
    `id_sales_order_address_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_country` INTEGER NOT NULL,
    `fk_region` INTEGER,
    `fk_sales_order_address` INTEGER NOT NULL,
    `is_billing` TINYINT(1) DEFAULT 0,
    `salutation` TINYINT,
    `first_name` VARCHAR(100) NOT NULL,
    `middle_name` VARCHAR(100),
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(255),
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
    INDEX `spy_sales_order_address_history-fi_sales_order_address` (`fk_sales_order_address`),
    INDEX `spy_sales_order_address_history-fi_country` (`fk_country`),
    INDEX `spy_sales_order_address_history-fi_region` (`fk_region`),
    CONSTRAINT `spy_sales_order_address_history-fk_sales_order_address`
        FOREIGN KEY (`fk_sales_order_address`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order_address_history-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_sales_order_address_history-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_totals`
(
    `id_sales_order_totals` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER DEFAULT 0 NOT NULL,
    `subtotal` INTEGER DEFAULT 0,
    `order_expense_total` INTEGER DEFAULT 0,
    `discount_total` INTEGER DEFAULT 0,
    `grand_total` INTEGER DEFAULT 0,
    `refund_total` INTEGER DEFAULT 0,
    `canceled_total` INTEGER DEFAULT 0,
    `tax_total` INTEGER DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_totals`),
    INDEX `spy_sales_order_totals-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_sales_order_totals-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_note`
(
    `id_sales_order_note` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `command` VARCHAR(255) NOT NULL,
    `success` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_note`),
    INDEX `spy_sales_order_note-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_sales_order_note-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_comment`
(
    `id_sales_order_comment` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `username` VARCHAR(255),
    `message` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_comment`),
    INDEX `spy_sales_order_comment-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_sales_order_comment-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_expense`
(
    `id_sales_expense` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `type` VARCHAR(150),
    `name` VARCHAR(255),
    `gross_price` INTEGER NOT NULL,
    `tax_rate` DECIMAL(8,2),
    `canceled_amount` INTEGER DEFAULT 0,
    `net_price` INTEGER DEFAULT 0 COMMENT \'/Price for one unit not including tax, without shipping, coupons/\',
    `price` INTEGER DEFAULT 0 COMMENT \'/Price for item, can be gross or net price depending on tax mode/\',
    `discount_amount_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total discount amount for item/\',
    `tax_amount` INTEGER DEFAULT 0 COMMENT \'/Calculated tax amount based on tax mode/\',
    `refundable_amount` INTEGER DEFAULT 0 COMMENT \'/Total item refundable amount/\',
    `price_to_pay_aggregation` INTEGER DEFAULT 0 COMMENT \'/Total item price to pay after discounts/\',
    `tax_amount_after_cancellation` INTEGER DEFAULT 0 COMMENT \'/Calculated tax full amount based on tax mode, includes options, item expenses, /\',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_expense`),
    UNIQUE INDEX `spy_sales_expense-unique-fk_sales_order` (`fk_sales_order`, `type`),
    CONSTRAINT `spy_sales_expense-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item_metadata`
(
    `id_sales_order_item_metadata` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `super_attributes` TEXT NOT NULL,
    `image` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_metadata`),
    INDEX `spy_sales_order_item_metadata-index-fk_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_sales_order_item_metadata-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_shipment`
(
    `id_sales_shipment` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_sales_expense` INTEGER,
    `name` VARCHAR(255),
    `delivery_time` VARCHAR(255),
    `carrier_name` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_shipment`),
    INDEX `spy_sales_shipment-fi_sales_expense` (`fk_sales_expense`),
    INDEX `spy_sales_shipment-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_sales_shipment-fk_sales_expense`
        FOREIGN KEY (`fk_sales_expense`)
        REFERENCES `spy_sales_expense` (`id_sales_expense`),
    CONSTRAINT `spy_sales_shipment-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_payment`
(
    `id_sales_payment` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_sales_payment_method_type` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_payment`),
    INDEX `spy_sales_payment-fi_sales_order` (`fk_sales_order`),
    INDEX `spy_sales_payment-fi_sales_payment_method_type` (`fk_sales_payment_method_type`),
    CONSTRAINT `spy_sales_payment-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_payment-fk_sales_payment_method_type`
        FOREIGN KEY (`fk_sales_payment_method_type`)
        REFERENCES `spy_sales_payment_method_type` (`id_sales_payment_method_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_payment_method_type`
(
    `id_sales_payment_method_type` INTEGER NOT NULL AUTO_INCREMENT,
    `payment_provider` VARCHAR(255) NOT NULL,
    `payment_method` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_sales_payment_method_type`),
    INDEX `spy_sales_payment_method_type-type` (`payment_provider`, `payment_method`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sequence_number`
(
    `id_sequence_number` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `current_id` INTEGER NOT NULL,
    PRIMARY KEY (`id_sequence_number`),
    UNIQUE INDEX `spy_sequence_number-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_shipment_carrier`
(
    `id_shipment_carrier` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_shipment_carrier`),
    INDEX `spy_shipment_carrier-is_active` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE `spy_shipment_method`
(
    `id_shipment_method` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_shipment_carrier` INTEGER NOT NULL,
    `fk_tax_set` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `shipment_method_key` VARCHAR(255),
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `default_price` INTEGER COMMENT \'Deprecated\',
    `availability_plugin` VARCHAR(255),
    `price_plugin` VARCHAR(255),
    `delivery_time_plugin` VARCHAR(255),
    PRIMARY KEY (`id_shipment_method`),
    INDEX `spy_shipment_method-is_active` (`is_active`),
    INDEX `spy_shipment_method-fi_shipment_carrier` (`fk_shipment_carrier`),
    INDEX `spy_shipment_method-fi_tax_set` (`fk_tax_set`),
    CONSTRAINT `spy_shipment_method-fk_shipment_carrier`
        FOREIGN KEY (`fk_shipment_carrier`)
        REFERENCES `spy_shipment_carrier` (`id_shipment_carrier`),
    CONSTRAINT `spy_shipment_method-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_shipment_method_price`
(
    `id_shipment_method_price` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_currency` INTEGER NOT NULL,
    `fk_store` INTEGER,
    `fk_shipment_method` INTEGER NOT NULL,
    `default_gross_price` INTEGER,
    `default_net_price` INTEGER,
    PRIMARY KEY (`id_shipment_method_price`),
    UNIQUE INDEX `spy_shipment_method_price-fk_shipment_method-fk_currency-fk_stor` (`fk_shipment_method`, `fk_store`, `fk_currency`),
    INDEX `spy_shipment_method_price-fi_currency` (`fk_currency`),
    INDEX `spy_shipment_method_price-fi_store` (`fk_store`),
    CONSTRAINT `spy_shipment_method_price-fk_currency`
        FOREIGN KEY (`fk_currency`)
        REFERENCES `spy_currency` (`id_currency`),
    CONSTRAINT `spy_shipment_method_price-fk_store`
        FOREIGN KEY (`fk_store`)
        REFERENCES `spy_store` (`id_store`),
    CONSTRAINT `spy_shipment_method_price-fk_shipment_method`
        FOREIGN KEY (`fk_shipment_method`)
        REFERENCES `spy_shipment_method` (`id_shipment_method`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_transition_log`
(
    `id_state_machine_transition_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_state_machine_process` INTEGER NOT NULL,
    `identifier` INTEGER NOT NULL,
    `locked` TINYINT(1),
    `event` VARCHAR(100),
    `hostname` VARCHAR(128) NOT NULL,
    `path` VARCHAR(256),
    `params` TEXT,
    `source_state` VARCHAR(128),
    `target_state` VARCHAR(128),
    `command` VARCHAR(255),
    `condition` VARCHAR(255),
    `is_error` TINYINT(1),
    `error_message` TEXT,
    `created_at` DATETIME,
    PRIMARY KEY (`id_state_machine_transition_log`),
    INDEX `spy_state_machine_transition_log-fi_state_machine_process` (`fk_state_machine_process`),
    CONSTRAINT `spy_state_machine_transition_log-fk_state_machine_process`
        FOREIGN KEY (`fk_state_machine_process`)
        REFERENCES `spy_state_machine_process` (`id_state_machine_process`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_process`
(
    `id_state_machine_process` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `state_machine_name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_state_machine_process`),
    UNIQUE INDEX `spy_state_machine_process-name` (`name`, `state_machine_name`),
    INDEX `spy_state_machine_process-state_machine_name` (`state_machine_name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_lock`
(
    `id_state_machine_lock` INTEGER NOT NULL AUTO_INCREMENT,
    `identifier` VARCHAR(255) NOT NULL,
    `expires` DATETIME NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_state_machine_lock`),
    UNIQUE INDEX `spy_state_machine_lock-identifier` (`identifier`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_item_state`
(
    `id_state_machine_item_state` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_state_machine_process` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_state_machine_item_state`),
    UNIQUE INDEX `spy_state_machine_item_state-name` (`name`, `fk_state_machine_process`),
    INDEX `spy_state_machine_item_state-fi_state_machine_process` (`fk_state_machine_process`),
    CONSTRAINT `spy_state_machine_item_state-fk_state_machine_process`
        FOREIGN KEY (`fk_state_machine_process`)
        REFERENCES `spy_state_machine_process` (`id_state_machine_process`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_item_state_history`
(
    `id_state_machine_item_state_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_state_machine_item_state` INTEGER NOT NULL,
    `identifier` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`id_state_machine_item_state_history`),
    INDEX `spy_state_machine_item_state_history-identifier` (`identifier`),
    INDEX `spy_state_machine_item_state_h-fi_state_machine_item_state` (`fk_state_machine_item_state`),
    CONSTRAINT `spy_state_machine_item_state_h-fk_state_machine_item_state`
        FOREIGN KEY (`fk_state_machine_item_state`)
        REFERENCES `spy_state_machine_item_state` (`id_state_machine_item_state`)
) ENGINE=InnoDB;

CREATE TABLE `spy_state_machine_event_timeout`
(
    `id_state_machine_event_timeout` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_state_machine_item_state` INTEGER NOT NULL,
    `fk_state_machine_process` INTEGER NOT NULL,
    `identifier` INTEGER NOT NULL,
    `timeout` DATETIME NOT NULL,
    `event` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_state_machine_event_timeout`),
    UNIQUE INDEX `spy_state_machine_item_state-unique-identifier` (`identifier`, `fk_state_machine_item_state`),
    INDEX `spy_state_machine_event_timeout-timeout` (`timeout`),
    INDEX `spy_state_machine_event_timeout-fi_state_machine_item_state` (`fk_state_machine_item_state`),
    INDEX `spy_state_machine_event_timeout-fi_state_machine_process` (`fk_state_machine_process`),
    CONSTRAINT `spy_state_machine_event_timeout-fk_state_machine_item_state`
        FOREIGN KEY (`fk_state_machine_item_state`)
        REFERENCES `spy_state_machine_item_state` (`id_state_machine_item_state`),
    CONSTRAINT `spy_state_machine_event_timeout-fk_state_machine_process`
        FOREIGN KEY (`fk_state_machine_process`)
        REFERENCES `spy_state_machine_process` (`id_state_machine_process`)
) ENGINE=InnoDB;

CREATE TABLE `pyz_state_machine_example_item`
(
    `id_state_machine_example_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_state_machine_item_state` INTEGER,
    `name` VARCHAR(255),
    PRIMARY KEY (`id_state_machine_example_item`),
    INDEX `pyz_state_machine_example_item-fi_state_machine_item_state` (`fk_state_machine_item_state`),
    CONSTRAINT `pyz_state_machine_example_item-fk_state_machine_item_state`
        FOREIGN KEY (`fk_state_machine_item_state`)
        REFERENCES `spy_state_machine_item_state` (`id_state_machine_item_state`)
) ENGINE=InnoDB;

CREATE TABLE `spy_stock`
(
    `id_stock` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_stock`),
    UNIQUE INDEX `spy_stock-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_stock_product`
(
    `id_stock_product` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER NOT NULL,
    `fk_stock` INTEGER NOT NULL,
    `quantity` INTEGER DEFAULT 0,
    `is_never_out_of_stock` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_stock_product`),
    UNIQUE INDEX `spy_stock_product-unique-fk_stock` (`fk_stock`, `fk_product`),
    INDEX `spy_stock_product-fk_product` (`fk_product`),
    CONSTRAINT `spy_stock_product-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_stock_product-fk_stock`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `spy_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE `spy_store`
(
    `id_store` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    PRIMARY KEY (`id_store`)
) ENGINE=InnoDB;

CREATE TABLE `spy_tax_set`
(
    `id_tax_set` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_tax_rate`
(
    `id_tax_rate` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `rate` DECIMAL(8,2) NOT NULL,
    `fk_country` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_tax_rate`),
    INDEX `spy_tax_rate-fi_country` (`fk_country`),
    CONSTRAINT `spy_tax_rate-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE `spy_tax_set_tax`
(
    `fk_tax_set` INTEGER NOT NULL,
    `fk_tax_rate` INTEGER NOT NULL,
    PRIMARY KEY (`fk_tax_set`,`fk_tax_rate`),
    INDEX `spy_tax_set_tax-fi_tax_rate` (`fk_tax_rate`),
    CONSTRAINT `spy_tax_set_tax-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_tax_set_tax-fk_tax_rate`
        FOREIGN KEY (`fk_tax_rate`)
        REFERENCES `spy_tax_rate` (`id_tax_rate`)
) ENGINE=InnoDB;

CREATE TABLE `spy_touch`
(
    `id_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `item_id` INTEGER NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_touch`),
    UNIQUE INDEX `spy_touch-unique-item_id` (`item_id`, `item_event`, `item_type`),
    INDEX `spy_touch-index-touched` (`touched`),
    INDEX `spy_touch-index-item_id` (`item_id`),
    INDEX `spy_touch-index-item_type` (`item_type`),
    INDEX `spy_touch-index-item_event` (`item_event`)
) ENGINE=InnoDB;

CREATE TABLE `spy_touch_storage`
(
    `id_touch_storage` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `fk_touch` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_touch_storage`),
    UNIQUE INDEX `spy_touch_storage-unique-fk_locale` (`fk_locale`, `key`),
    INDEX `spy_touch_storage-index-key` (`key`),
    INDEX `spy_touch_storage-fi_touch` (`fk_touch`),
    CONSTRAINT `spy_touch_storage-fk_touch`
        FOREIGN KEY (`fk_touch`)
        REFERENCES `spy_touch` (`id_touch`),
    CONSTRAINT `spy_touch_storage-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_touch_search`
(
    `id_touch_search` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `fk_touch` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_touch_search`),
    UNIQUE INDEX `spy_touch_search-unique-fk_locale` (`fk_locale`, `key`),
    INDEX `spy_touch_search-index-key` (`key`),
    INDEX `spy_touch_search-fi_touch` (`fk_touch`),
    CONSTRAINT `spy_touch_search-fk_touch`
        FOREIGN KEY (`fk_touch`)
        REFERENCES `spy_touch` (`id_touch`),
    CONSTRAINT `spy_touch_search-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_url`
(
    `fk_resource_categorynode` INTEGER,
    `fk_resource_page` INTEGER,
    `fk_resource_product_set` INTEGER,
    `fk_resource_product_abstract` INTEGER,
    `id_url` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `fk_resource_redirect` INTEGER,
    PRIMARY KEY (`id_url`),
    UNIQUE INDEX `spy_url_unique_key` (`url`),
    INDEX `spy_url-fk_resource_product_set` (`fk_resource_product_set`),
    INDEX `spy_url-fi_resource_page` (`fk_resource_page`),
    INDEX `spy_url-fi_resource_product_abstract` (`fk_resource_product_abstract`),
    INDEX `spy_url-fi_resource_redirect` (`fk_resource_redirect`),
    INDEX `spy_url-fi_resource_categorynode` (`fk_resource_categorynode`),
    INDEX `spy_url-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_url-fk_resource_page`
        FOREIGN KEY (`fk_resource_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_product_abstract`
        FOREIGN KEY (`fk_resource_product_abstract`)
        REFERENCES `spy_product_abstract` (`id_product_abstract`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_redirect`
        FOREIGN KEY (`fk_resource_redirect`)
        REFERENCES `spy_url_redirect` (`id_url_redirect`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_product_set`
        FOREIGN KEY (`fk_resource_product_set`)
        REFERENCES `spy_product_set` (`id_product_set`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_categorynode`
        FOREIGN KEY (`fk_resource_categorynode`)
        REFERENCES `spy_category_node` (`id_category_node`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_url_redirect`
(
    `id_url_redirect` INTEGER NOT NULL AUTO_INCREMENT,
    `to_url` VARCHAR(255) NOT NULL,
    `status` INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY (`id_url_redirect`),
    INDEX `spy_url_redirect-to_url` (`to_url`, `status`)
) ENGINE=InnoDB;

CREATE TABLE `spy_user`
(
    `id_user` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(45) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `last_login` DATETIME,
    `status` TINYINT(10) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_user`),
    UNIQUE INDEX `spy_user-username` (`username`)
) ENGINE=InnoDB;

CREATE TABLE `spy_wishlist`
(
    `id_wishlist` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_wishlist`),
    UNIQUE INDEX `spy_wishlist-unique-fk_customer-name` (`fk_customer`, `name`),
    CONSTRAINT `spy_wishlist-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `spy_wishlist_item`
(
    `id_wishlist_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_wishlist` INTEGER NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_wishlist_item`),
    INDEX `spy_wishlist_item-fi_wishlist` (`fk_wishlist`),
    INDEX `fi__wishlist_item-sku` (`sku`),
    CONSTRAINT `spy_wishlist_item-fk_wishlist`
        FOREIGN KEY (`fk_wishlist`)
        REFERENCES `spy_wishlist` (`id_wishlist`),
    CONSTRAINT `spy_wishlist_item-sku`
        FOREIGN KEY (`sku`)
        REFERENCES `spy_product` (`sku`)
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_role_archive`
(
    `id_acl_role` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    INDEX `spy_acl_role_archive_i_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_rule_archive`
(
    `id_acl_rule` INTEGER NOT NULL,
    `fk_acl_role` INTEGER NOT NULL,
    `bundle` VARCHAR(45) NOT NULL,
    `controller` VARCHAR(45) NOT NULL,
    `action` VARCHAR(45) NOT NULL,
    `type` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_acl_rule`),
    INDEX `spy_acl_rule-fi_acl_role` (`fk_acl_role`)
) ENGINE=InnoDB;

CREATE TABLE `spy_acl_group_archive`
(
    `id_acl_group` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_acl_group`),
    INDEX `spy_acl_group_archive_i_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_auth_reset_password_archive`
(
    `id_auth_reset_password` INTEGER NOT NULL,
    `fk_user` INTEGER NOT NULL,
    `code` VARCHAR(35) NOT NULL,
    `status` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_auth_reset_password`,`fk_user`),
    INDEX `spy_auth_reset_password-fi_user` (`fk_user`),
    INDEX `spy_auth_reset_password_archive_i_4db226` (`code`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search_attribute_map_archive`
(
    `fk_product_attribute_key` INTEGER NOT NULL,
    `target_field` VARCHAR(255) NOT NULL,
    `synced` TINYINT(1) DEFAULT 0,
    `archived_at` DATETIME,
    PRIMARY KEY (`fk_product_attribute_key`,`target_field`),
    INDEX `spy_product_search_attribute_map_archive_i_a1d33d` (`fk_product_attribute_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search_attribute_archive`
(
    `id_product_search_attribute` INTEGER NOT NULL,
    `fk_product_attribute_key` INTEGER NOT NULL,
    `filter_type` VARCHAR(255) NOT NULL,
    `position` INTEGER DEFAULT 0 NOT NULL,
    `synced` TINYINT(1) DEFAULT 0,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_product_search_attribute`),
    INDEX `spy_product_search_attribute_archive_i_a1d33d` (`fk_product_attribute_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_user_archive`
(
    `id_user` INTEGER NOT NULL,
    `first_name` VARCHAR(45) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `last_login` DATETIME,
    `status` TINYINT(10) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_user`),
    INDEX `spy_user_archive_i_f86ef3` (`username`)
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

DROP TABLE IF EXISTS `spy_cms_block_product_connector`;

DROP TABLE IF EXISTS `spy_acl_role`;

DROP TABLE IF EXISTS `spy_acl_rule`;

DROP TABLE IF EXISTS `spy_acl_group`;

DROP TABLE IF EXISTS `spy_acl_user_has_group`;

DROP TABLE IF EXISTS `spy_acl_groups_has_roles`;

DROP TABLE IF EXISTS `spy_auth_reset_password`;

DROP TABLE IF EXISTS `spy_availability_abstract`;

DROP TABLE IF EXISTS `spy_availability`;

DROP TABLE IF EXISTS `spy_payment_braintree`;

DROP TABLE IF EXISTS `spy_payment_braintree_transaction_request_log`;

DROP TABLE IF EXISTS `spy_payment_braintree_transaction_status_log`;

DROP TABLE IF EXISTS `spy_payment_braintree_order_item`;

DROP TABLE IF EXISTS `spy_category`;

DROP TABLE IF EXISTS `spy_category_attribute`;

DROP TABLE IF EXISTS `spy_category_node`;

DROP TABLE IF EXISTS `spy_category_closure_table`;

DROP TABLE IF EXISTS `spy_category_template`;

DROP TABLE IF EXISTS `spy_cms_template`;

DROP TABLE IF EXISTS `spy_cms_page`;

DROP TABLE IF EXISTS `spy_cms_page_localized_attributes`;

DROP TABLE IF EXISTS `spy_cms_glossary_key_mapping`;

DROP TABLE IF EXISTS `spy_cms_version`;

DROP TABLE IF EXISTS `spy_cms_block_template`;

DROP TABLE IF EXISTS `spy_cms_block_glossary_key_mapping`;

DROP TABLE IF EXISTS `spy_cms_block`;

DROP TABLE IF EXISTS `spy_cms_block_category_connector`;

DROP TABLE IF EXISTS `spy_cms_block_category_position`;

DROP TABLE IF EXISTS `spy_country`;

DROP TABLE IF EXISTS `spy_region`;

DROP TABLE IF EXISTS `spy_currency`;

DROP TABLE IF EXISTS `spy_customer`;

DROP TABLE IF EXISTS `spy_customer_address`;

DROP TABLE IF EXISTS `spy_customer_group`;

DROP TABLE IF EXISTS `spy_customer_group_to_customer`;

DROP TABLE IF EXISTS `spy_discount`;

DROP TABLE IF EXISTS `spy_discount_voucher_pool`;

DROP TABLE IF EXISTS `spy_discount_voucher`;

DROP TABLE IF EXISTS `spy_discount_amount`;

DROP TABLE IF EXISTS `spy_discount_promotion`;

DROP TABLE IF EXISTS `spy_event_behavior_entity_change`;

DROP TABLE IF EXISTS `spy_glossary_key`;

DROP TABLE IF EXISTS `spy_glossary_translation`;

DROP TABLE IF EXISTS `spy_locale`;

DROP TABLE IF EXISTS `spy_navigation`;

DROP TABLE IF EXISTS `spy_navigation_node`;

DROP TABLE IF EXISTS `spy_navigation_node_localized_attributes`;

DROP TABLE IF EXISTS `spy_newsletter_subscriber`;

DROP TABLE IF EXISTS `spy_newsletter_type`;

DROP TABLE IF EXISTS `spy_newsletter_subscription`;

DROP TABLE IF EXISTS `spy_nopayment_paid`;

DROP TABLE IF EXISTS `spy_oms_transition_log`;

DROP TABLE IF EXISTS `spy_oms_order_process`;

DROP TABLE IF EXISTS `spy_oms_state_machine_lock`;

DROP TABLE IF EXISTS `spy_oms_order_item_state`;

DROP TABLE IF EXISTS `spy_oms_order_item_state_history`;

DROP TABLE IF EXISTS `spy_oms_event_timeout`;

DROP TABLE IF EXISTS `spy_oms_product_reservation`;

DROP TABLE IF EXISTS `spy_payment_payolution`;

DROP TABLE IF EXISTS `spy_payment_payolution_transaction_request_log`;

DROP TABLE IF EXISTS `spy_payment_payolution_transaction_status_log`;

DROP TABLE IF EXISTS `spy_payment_payolution_order_item`;

DROP TABLE IF EXISTS `spy_price_product`;

DROP TABLE IF EXISTS `spy_price_type`;

DROP TABLE IF EXISTS `spy_product_abstract`;

DROP TABLE IF EXISTS `spy_product_abstract_localized_attributes`;

DROP TABLE IF EXISTS `spy_product`;

DROP TABLE IF EXISTS `spy_product_localized_attributes`;

DROP TABLE IF EXISTS `spy_product_attribute_key`;

DROP TABLE IF EXISTS `spy_product_management_attribute`;

DROP TABLE IF EXISTS `spy_product_management_attribute_value`;

DROP TABLE IF EXISTS `spy_product_management_attribute_value_translation`;

DROP TABLE IF EXISTS `spy_product_bundle`;

DROP TABLE IF EXISTS `spy_sales_order_item_bundle`;

DROP TABLE IF EXISTS `spy_product_category`;

DROP TABLE IF EXISTS `spy_product_group`;

DROP TABLE IF EXISTS `spy_product_abstract_group`;

DROP TABLE IF EXISTS `spy_product_image_set`;

DROP TABLE IF EXISTS `spy_product_image`;

DROP TABLE IF EXISTS `spy_product_image_set_to_product_image`;

DROP TABLE IF EXISTS `spy_product_label`;

DROP TABLE IF EXISTS `spy_product_label_localized_attributes`;

DROP TABLE IF EXISTS `spy_product_label_product_abstract`;

DROP TABLE IF EXISTS `spy_product_option_group`;

DROP TABLE IF EXISTS `spy_product_abstract_product_option_group`;

DROP TABLE IF EXISTS `spy_product_option_value`;

DROP TABLE IF EXISTS `spy_product_relation_type`;

DROP TABLE IF EXISTS `spy_product_relation`;

DROP TABLE IF EXISTS `spy_product_relation_product_abstract`;

DROP TABLE IF EXISTS `spy_product_review`;

DROP TABLE IF EXISTS `spy_product_search`;

DROP TABLE IF EXISTS `spy_product_search_attribute_map`;

DROP TABLE IF EXISTS `spy_product_search_attribute`;

DROP TABLE IF EXISTS `spy_product_set`;

DROP TABLE IF EXISTS `spy_product_abstract_set`;

DROP TABLE IF EXISTS `spy_product_set_data`;

DROP TABLE IF EXISTS `spy_propel_heartbeat`;

DROP TABLE IF EXISTS `spy_queue_process`;

DROP TABLE IF EXISTS `spy_payment_ratepay`;

DROP TABLE IF EXISTS `spy_payment_ratepay_log`;

DROP TABLE IF EXISTS `spy_refund`;

DROP TABLE IF EXISTS `spy_sales_order`;

DROP TABLE IF EXISTS `spy_sales_discount`;

DROP TABLE IF EXISTS `spy_sales_discount_code`;

DROP TABLE IF EXISTS `spy_sales_order_item`;

DROP TABLE IF EXISTS `spy_sales_order_item_option`;

DROP TABLE IF EXISTS `spy_sales_order_address`;

DROP TABLE IF EXISTS `spy_sales_order_address_history`;

DROP TABLE IF EXISTS `spy_sales_order_totals`;

DROP TABLE IF EXISTS `spy_sales_order_note`;

DROP TABLE IF EXISTS `spy_sales_order_comment`;

DROP TABLE IF EXISTS `spy_sales_expense`;

DROP TABLE IF EXISTS `spy_sales_order_item_metadata`;

DROP TABLE IF EXISTS `spy_sales_shipment`;

DROP TABLE IF EXISTS `spy_sales_payment`;

DROP TABLE IF EXISTS `spy_sales_payment_method_type`;

DROP TABLE IF EXISTS `spy_sequence_number`;

DROP TABLE IF EXISTS `spy_shipment_carrier`;

DROP TABLE IF EXISTS `spy_shipment_method`;

DROP TABLE IF EXISTS `spy_shipment_method_price`;

DROP TABLE IF EXISTS `spy_state_machine_transition_log`;

DROP TABLE IF EXISTS `spy_state_machine_process`;

DROP TABLE IF EXISTS `spy_state_machine_lock`;

DROP TABLE IF EXISTS `spy_state_machine_item_state`;

DROP TABLE IF EXISTS `spy_state_machine_item_state_history`;

DROP TABLE IF EXISTS `spy_state_machine_event_timeout`;

DROP TABLE IF EXISTS `pyz_state_machine_example_item`;

DROP TABLE IF EXISTS `spy_stock`;

DROP TABLE IF EXISTS `spy_stock_product`;

DROP TABLE IF EXISTS `spy_store`;

DROP TABLE IF EXISTS `spy_tax_set`;

DROP TABLE IF EXISTS `spy_tax_rate`;

DROP TABLE IF EXISTS `spy_tax_set_tax`;

DROP TABLE IF EXISTS `spy_touch`;

DROP TABLE IF EXISTS `spy_touch_storage`;

DROP TABLE IF EXISTS `spy_touch_search`;

DROP TABLE IF EXISTS `spy_url`;

DROP TABLE IF EXISTS `spy_url_redirect`;

DROP TABLE IF EXISTS `spy_user`;

DROP TABLE IF EXISTS `spy_wishlist`;

DROP TABLE IF EXISTS `spy_wishlist_item`;

DROP TABLE IF EXISTS `spy_acl_role_archive`;

DROP TABLE IF EXISTS `spy_acl_rule_archive`;

DROP TABLE IF EXISTS `spy_acl_group_archive`;

DROP TABLE IF EXISTS `spy_auth_reset_password_archive`;

DROP TABLE IF EXISTS `spy_product_search_attribute_map_archive`;

DROP TABLE IF EXISTS `spy_product_search_attribute_archive`;

DROP TABLE IF EXISTS `spy_user_archive`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}