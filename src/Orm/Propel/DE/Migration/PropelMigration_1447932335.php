<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447932335.
 * Generated on 2015-11-19 11:25:35 by vagrant
 */
class PropelMigration_1447932335
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
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'zed' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

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

CREATE TABLE `spy_category`
(
    `id_category` INTEGER NOT NULL AUTO_INCREMENT,
    `category_key` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `is_in_menu` TINYINT(1) DEFAULT 1,
    `is_clickable` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id_category`),
    UNIQUE INDEX `spy_category-category_key` (`category_key`)
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
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_cms_page`),
    INDEX `spy_cms_page-fi_template` (`fk_template`),
    CONSTRAINT `spy_cms_page-fk_template`
        FOREIGN KEY (`fk_template`)
        REFERENCES `spy_cms_template` (`id_cms_template`)
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
    CONSTRAINT `spy_cms_glossary_key_mapping-fk_page`
        FOREIGN KEY (`fk_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_glossary_key_mapping-fk_glossary_key`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_cms_block`
(
    `id_cms_block` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_page` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255),
    `value` INTEGER,
    PRIMARY KEY (`id_cms_block`),
    UNIQUE INDEX `spy_cms_block-unique-fk_page` (`fk_page`),
    UNIQUE INDEX `spy_cms_block-name` (`name`, `type`, `value`),
    INDEX `spy_cms_block-index-fk_page` (`fk_page`),
    CONSTRAINT `spy_cms_block-foreign-fk_page`
        FOREIGN KEY (`fk_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE
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

CREATE TABLE `spy_customer`
(
    `id_customer` INTEGER NOT NULL AUTO_INCREMENT,
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer`),
    UNIQUE INDEX `spy_customer-email` (`email`),
    INDEX `fi__customer-default_billing_address` (`default_billing_address`),
    INDEX `fi__customer-default_shipping_address` (`default_shipping_address`),
    CONSTRAINT `spy_customer-default_billing_address`
        FOREIGN KEY (`default_billing_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`),
    CONSTRAINT `spy_customer-default_shipping_address`
        FOREIGN KEY (`default_shipping_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`)
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_customer_address`),
    INDEX `spy_customer_address-fk_customer` (`fk_customer`),
    INDEX `spy_customer_address-fi_region` (`fk_region`),
    INDEX `spy_customer_address-fi_country` (`fk_country`),
    CONSTRAINT `spy_customer_address-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`),
    CONSTRAINT `spy_customer_address-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`),
    CONSTRAINT `spy_customer_address-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount`
(
    `id_discount` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount_voucher_pool` INTEGER,
    `display_name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(1024),
    `amount` INTEGER NOT NULL,
    `calculator_plugin` VARCHAR(255),
    `is_privileged` TINYINT(1) DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 0,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `collector_logical_operator` VARCHAR(16),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount`),
    UNIQUE INDEX `spy_discount-unique-fk_discount_voucher_pool` (`fk_discount_voucher_pool`),
    CONSTRAINT `spy_discount-fk_discount_voucher_pool`
        FOREIGN KEY (`fk_discount_voucher_pool`)
        REFERENCES `spy_discount_voucher_pool` (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_decision_rule`
(
    `id_discount_decision_rule` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `decision_rule_plugin` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_decision_rule`),
    INDEX `spy_discount_decision_rule-fi_discount` (`fk_discount`),
    CONSTRAINT `spy_discount_decision_rule-fk_discount`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_collector`
(
    `id_discount_collector` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount` INTEGER NOT NULL,
    `collector_plugin` VARCHAR(255),
    `value` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_collector`),
    INDEX `spy_discount_collector-fi_discount` (`fk_discount`),
    CONSTRAINT `spy_discount_collector-fk_discount`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`)
) ENGINE=InnoDB;

CREATE TABLE `spy_discount_voucher_pool`
(
    `id_discount_voucher_pool` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount_voucher_pool_category` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `template` VARCHAR(255),
    `is_active` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher_pool`),
    INDEX `spy_discount_voucher_pool-fi_discount_voucher_pool_category` (`fk_discount_voucher_pool_category`),
    CONSTRAINT `spy_discount_voucher_pool-fk_discount_voucher_pool_category`
        FOREIGN KEY (`fk_discount_voucher_pool_category`)
        REFERENCES `spy_discount_voucher_pool_category` (`id_discount_voucher_pool_category`)
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

CREATE TABLE `spy_discount_voucher_pool_category`
(
    `id_discount_voucher_pool_category` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher_pool_category`)
) ENGINE=InnoDB;

CREATE TABLE `spy_distributor_item`
(
    `id_distributor_item` INTEGER NOT NULL AUTO_INCREMENT,
    `touched` DATETIME NOT NULL,
    `fk_item_type` INTEGER NOT NULL,
    `fk_glossary_translation` INTEGER,
    PRIMARY KEY (`id_distributor_item`,`fk_item_type`),
    INDEX `spy_distributor_item-touched` (`touched`),
    INDEX `spy_distributor_item-fi_item_type` (`fk_item_type`),
    INDEX `spy_distributor_item-fi_glossary_translation` (`fk_glossary_translation`),
    CONSTRAINT `spy_distributor_item-fk_item_type`
        FOREIGN KEY (`fk_item_type`)
        REFERENCES `spy_distributor_item_type` (`id_distributor_item_type`),
    CONSTRAINT `spy_distributor_item-fk_glossary_translation`
        FOREIGN KEY (`fk_glossary_translation`)
        REFERENCES `spy_glossary_translation` (`id_glossary_translation`)
) ENGINE=InnoDB;

CREATE TABLE `spy_distributor_receiver`
(
    `id_distributor_receiver` INTEGER NOT NULL AUTO_INCREMENT,
    `receiver_key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_distributor_receiver`),
    UNIQUE INDEX `spy_distributor_receiver-receiver_key` (`receiver_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_distributor_item_type`
(
    `id_distributor_item_type` INTEGER NOT NULL AUTO_INCREMENT,
    `type_key` VARCHAR(255) NOT NULL,
    `last_distribution` DATETIME NOT NULL,
    PRIMARY KEY (`id_distributor_item_type`),
    UNIQUE INDEX `spy_distributor_item_type-type_key` (`type_key`),
    INDEX `spy_distributor_item_type-last_distribution` (`last_distribution`)
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
    `error_message` VARCHAR(1024),
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
    INDEX `spy_oms_order_item_state_history-fi_sales_order_item` (`fk_sales_order_item`),
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
    `bank_account_holder` VARCHAR(100),
    `bank_account_bic` VARCHAR(100),
    `bank_account_iban` VARCHAR(100),
    `installment_amount` INTEGER,
    `installment_duration` INTEGER,
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
    UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` (`transaction_id`(255)),
    INDEX `spy_payolution_transaction_request_log-fi_payment_payolution` (`fk_payment_payolution`),
    INDEX `i_referenced_spy_payolution_transaction_status_log-transactionid` (`transaction_id`),
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
    INDEX `fi__payolution_transaction_status_log-transactionid` (`identification_transactionid`),
    CONSTRAINT `spy_payolution_transaction_status_log-fk_payolution`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`),
    CONSTRAINT `spy_payolution_transaction_status_log-transactionid`
        FOREIGN KEY (`identification_transactionid`)
        REFERENCES `spy_payment_payolution_transaction_request_log` (`transaction_id`)
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

CREATE TABLE `spy_payment_payone`
(
    `id_payment_payone` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `payment_method` VARCHAR(255) NOT NULL,
    `reference` VARCHAR(255) NOT NULL,
    `transaction_id` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payone`),
    INDEX `spy_payment_payone-fi_sales_order` (`fk_sales_order`),
    CONSTRAINT `spy_payment_payone-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payone_detail`
(
    `id_payment_payone` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    `currency` VARCHAR(255) NOT NULL,
    `pseudo_card_pan` VARCHAR(255),
    `bank_country` VARCHAR(2),
    `bank_account` VARCHAR(26),
    `bank_code` VARCHAR(8),
    `bank_group_type` VARCHAR(50),
    `bank_branch_code` VARCHAR(5),
    `bank_check_digit` VARCHAR(2),
    `iban` VARCHAR(35),
    `bic` VARCHAR(11),
    `type` VARCHAR(3),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payone`),
    CONSTRAINT `spy_payment_payone_detail-id_payment_payone`
        FOREIGN KEY (`id_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payone_api_log`
(
    `id_payment_payone_api_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_payone` INTEGER NOT NULL,
    `request` VARCHAR(255) NOT NULL,
    `mode` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255),
    `transaction_id` INTEGER,
    `sequence_number` INTEGER,
    `user_id` VARCHAR(255),
    `merchant_id` VARCHAR(255) NOT NULL,
    `portal_id` VARCHAR(255) NOT NULL,
    `error_code` VARCHAR(255),
    `error_message_internal` VARCHAR(255),
    `error_message_user` VARCHAR(255),
    `redirect_url` TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payone_api_log`),
    INDEX `spy_payment_payone_api_log-fi_payment_payone` (`fk_payment_payone`),
    CONSTRAINT `spy_payment_payone_api_log-fk_payment_payone`
        FOREIGN KEY (`fk_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payone_transaction_status_log`
(
    `id_payment_payone_transaction_status_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_payment_payone` INTEGER NOT NULL,
    `transaction_id` INTEGER,
    `reference_id` INTEGER,
    `mode` VARCHAR(255),
    `status` VARCHAR(255) NOT NULL,
    `transaction_time` DATETIME,
    `sequence_number` INTEGER,
    `clearing_type` VARCHAR(255),
    `portal_id` VARCHAR(255),
    `price` INTEGER,
    `balance` INTEGER,
    `receivable` INTEGER,
    `reminder_level` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payone_transaction_status_log`),
    INDEX `spy_payment_payone_transaction_status_log-transaction_id` (`transaction_id`),
    INDEX `spy_payment_payone_transaction_status_log-fi_payment_payone` (`fk_payment_payone`),
    CONSTRAINT `spy_payment_payone_transaction_status_log-fk_payment_payone`
        FOREIGN KEY (`fk_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE `spy_payment_payone_transaction_status_log_order_item`
(
    `id_payment_payone_transaction_status_log` INTEGER NOT NULL,
    `id_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`id_payment_payone_transaction_status_log`,`id_sales_order_item`),
    INDEX `fi__payone_transaction_log_order_item-id_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_payone_transaction_log_order_item-id_payone_transaction_log`
        FOREIGN KEY (`id_payment_payone_transaction_status_log`)
        REFERENCES `spy_payment_payone_transaction_status_log` (`id_payment_payone_transaction_status_log`),
    CONSTRAINT `spy_payone_transaction_log_order_item-id_sales_order_item`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE `spy_price_product`
(
    `id_price_product` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER DEFAULT 0,
    `fk_product` INTEGER,
    `fk_price_type` INTEGER NOT NULL,
    `fk_abstract_product` INTEGER,
    PRIMARY KEY (`id_price_product`),
    UNIQUE INDEX `spy_price_product-unique-fk_abstract_product` (`fk_abstract_product`, `fk_product`, `fk_price_type`),
    INDEX `spy_price_product-fi_product` (`fk_product`),
    INDEX `spy_price_product-fi_price_type` (`fk_price_type`),
    CONSTRAINT `spy_price_product-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_price_product-fk_price_type`
        FOREIGN KEY (`fk_price_type`)
        REFERENCES `spy_price_type` (`id_price_type`),
    CONSTRAINT `spy_price_product-fk_abstract_product`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE `spy_price_type`
(
    `id_price_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_price_type`),
    UNIQUE INDEX `spy_price_type-name` (`name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_abstract_product`
(
    `id_abstract_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_tax_set` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_abstract_product`),
    UNIQUE INDEX `spy_abstract_product-sku` (`sku`),
    INDEX `spy_abstract_product-fi_tax_set` (`fk_tax_set`),
    CONSTRAINT `spy_abstract_product-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_abstract_product_localized_attributes`
(
    `id_abstract_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_abstract_product` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_abstract_attributes`),
    UNIQUE INDEX `spy_abstract_product_localized_attributes-unique-fk_abstract_pro` (`fk_abstract_product`, `fk_locale`),
    INDEX `spy_abstract_product_localized_attributes-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_abstract_product_localized_attributes-fk_abstract_product`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `spy_abstract_product_localized_attributes-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product`
(
    `id_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_abstract_product` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product`),
    UNIQUE INDEX `spy_product-sku` (`sku`),
    INDEX `spy_product-fi_abstract_product` (`fk_abstract_product`),
    CONSTRAINT `spy_product-fk_abstract_product`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_localized_attributes`
(
    `id_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `is_complete` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_attributes`),
    UNIQUE INDEX `spy_product_localized_attributes-unique-fk_product` (`fk_product`, `fk_locale`),
    INDEX `spy_product_localized_attributes-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_localized_attributes-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_localized_attributes-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_to_bundle`
(
    `fk_product` INTEGER NOT NULL,
    `fk_related_product` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product`,`fk_related_product`),
    INDEX `spy_product_to_bundle-fi_related_product` (`fk_related_product`),
    CONSTRAINT `spy_product_to_bundle-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_product_to_bundle-fk_related_product`
        FOREIGN KEY (`fk_related_product`)
        REFERENCES `spy_product` (`id_product`)
) ENGINE=InnoDB;

CREATE TABLE `spy_attributes_metadata`
(
    `id_attributes_metadata` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_editable` TINYINT(1) DEFAULT 1 NOT NULL,
    `fk_type` INTEGER,
    PRIMARY KEY (`id_attributes_metadata`),
    INDEX `spy_attributes_metadata-fi_type` (`fk_type`),
    CONSTRAINT `spy_attributes_metadata-fk_type`
        FOREIGN KEY (`fk_type`)
        REFERENCES `spy_attribute_type` (`id_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_attribute_type`
(
    `id_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_parent_type` INTEGER,
    `input_representation` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_type`),
    INDEX `spy_attribute_type-fi_parent_type` (`fk_parent_type`),
    CONSTRAINT `spy_attribute_type-fk_parent_type`
        FOREIGN KEY (`fk_parent_type`)
        REFERENCES `spy_attribute_type` (`id_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_attribute_type_value`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_type` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `fk_locale` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `spy_attribute_type_value-unique-fk_locale` (`fk_locale`, `fk_type`, `key`),
    CONSTRAINT `spy_attribute_type_value-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_category`
(
    `id_product_category` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_abstract_product` INTEGER NOT NULL,
    `fk_category` INTEGER NOT NULL,
    `product_order` INTEGER DEFAULT 0,
    PRIMARY KEY (`id_product_category`),
    UNIQUE INDEX `spy_product_category-unique-fk_abstract_product` (`fk_abstract_product`, `fk_category`),
    INDEX `spy_product_category-fi_category` (`fk_category`),
    CONSTRAINT `spy_product_category-fk_category`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`),
    CONSTRAINT `spy_product_category-fk_abstract_product`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_type`
(
    `id_product_option_type` INTEGER NOT NULL AUTO_INCREMENT,
    `import_key` VARCHAR(255),
    `fk_tax_set` INTEGER,
    PRIMARY KEY (`id_product_option_type`),
    UNIQUE INDEX `spy_product_option_type-import_key` (`import_key`),
    INDEX `spy_product_option_type-fi_tax_set` (`fk_tax_set`),
    CONSTRAINT `spy_product_option_type-fk_tax_set`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value`
(
    `id_product_option_value` INTEGER NOT NULL AUTO_INCREMENT,
    `import_key` VARCHAR(255),
    `fk_product_option_type` INTEGER NOT NULL,
    `fk_product_option_value_price` INTEGER,
    PRIMARY KEY (`id_product_option_value`),
    UNIQUE INDEX `spy_product_option_value-import_key` (`import_key`),
    INDEX `spy_product_option_value-fi_product_option_type` (`fk_product_option_type`),
    INDEX `spy_product_option_value-fi_product_option_value_price` (`fk_product_option_value_price`),
    CONSTRAINT `spy_product_option_value-fk_product_option_type`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value-fk_product_option_value_price`
        FOREIGN KEY (`fk_product_option_value_price`)
        REFERENCES `spy_product_option_value_price` (`id_product_option_value_price`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value_price`
(
    `id_product_option_value_price` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_value_price`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value_translation`
(
    `name` VARCHAR(255) NOT NULL,
    `fk_product_option_value` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_value`,`fk_locale`),
    INDEX `spy_product_option_value_translation-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_option_value_translation-fk_product_option_value`
        FOREIGN KEY (`fk_product_option_value`)
        REFERENCES `spy_product_option_value` (`id_product_option_value`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_translation-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_type_translation`
(
    `name` VARCHAR(255) NOT NULL,
    `fk_product_option_type` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_type`,`fk_locale`),
    INDEX `spy_product_option_type_translation-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_product_option_type_translation-fk_product_option_type`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_translation-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_type_usage`
(
    `id_product_option_type_usage` INTEGER NOT NULL AUTO_INCREMENT,
    `is_optional` INTEGER NOT NULL,
    `sequence` INTEGER,
    `fk_product` INTEGER NOT NULL,
    `fk_product_option_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_type_usage`),
    INDEX `spy_product_option_type_usage-fi_product` (`fk_product`),
    INDEX `spy_product_option_type_usage-fi_product_option_type` (`fk_product_option_type`),
    CONSTRAINT `spy_product_option_type_usage-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_usage-fk_product_option_type`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value_usage`
(
    `id_product_option_value_usage` INTEGER NOT NULL AUTO_INCREMENT,
    `sequence` INTEGER,
    `fk_product_option_type_usage` INTEGER NOT NULL,
    `fk_product_option_value` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_value_usage`),
    INDEX `spy_product_option_value_usage-fi_product_option_type_usage` (`fk_product_option_type_usage`),
    INDEX `spy_product_option_value_usage-fi_product_option_value` (`fk_product_option_value`),
    CONSTRAINT `spy_product_option_value_usage-fk_product_option_type_usage`
        FOREIGN KEY (`fk_product_option_type_usage`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_usage-fk_product_option_value`
        FOREIGN KEY (`fk_product_option_value`)
        REFERENCES `spy_product_option_value` (`id_product_option_value`)
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_type_usage_exclusion`
(
    `fk_product_option_type_usage_a` INTEGER NOT NULL,
    `fk_product_option_type_usage_b` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_type_usage_a`,`fk_product_option_type_usage_b`),
    INDEX `spy_product_option_type_usage_exc-fi_product_option_type_usage2` (`fk_product_option_type_usage_b`),
    CONSTRAINT `spy_product_option_type_usage_exc-fk_product_option_type_usage1`
        FOREIGN KEY (`fk_product_option_type_usage_a`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_usage_exc-fk_product_option_type_usage2`
        FOREIGN KEY (`fk_product_option_type_usage_b`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_value_usage_constraint`
(
    `fk_product_option_value_usage_a` INTEGER NOT NULL,
    `fk_product_option_value_usage_b` INTEGER NOT NULL,
    `operator` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`fk_product_option_value_usage_a`,`fk_product_option_value_usage_b`),
    INDEX `spy_product_option_value_usage_c-fi_product_option_value_usage2` (`fk_product_option_value_usage_b`),
    CONSTRAINT `spy_product_option_value_usage_c-fk_product_option_value_usage1`
        FOREIGN KEY (`fk_product_option_value_usage_a`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_usage_c-fk_product_option_value_usage2`
        FOREIGN KEY (`fk_product_option_value_usage_b`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_configuration_preset`
(
    `id_product_option_configuration_preset` INTEGER NOT NULL AUTO_INCREMENT,
    `is_default` TINYINT(1) NOT NULL,
    `sequence` INTEGER,
    `fk_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_configuration_preset`),
    INDEX `spy_product_option_configuration_preset-fi_product` (`fk_product`),
    CONSTRAINT `spy_product_option_configuration_preset-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_option_configuration_preset_value`
(
    `fk_product_option_configuration_preset` INTEGER NOT NULL,
    `fk_product_option_value_usage` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_configuration_preset`,`fk_product_option_value_usage`),
    INDEX `spy_product_option_config_value-fi_product_option_value_usage` (`fk_product_option_value_usage`),
    CONSTRAINT `spy_product_option_config_value-fk_product_option_config`
        FOREIGN KEY (`fk_product_option_configuration_preset`)
        REFERENCES `spy_product_option_configuration_preset` (`id_product_option_configuration_preset`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_config_value-fk_product_option_value_usage`
        FOREIGN KEY (`fk_product_option_value_usage`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_product_search_attributes_operation`
(
    `source_attribute_id` INTEGER NOT NULL,
    `operation` VARCHAR(255) NOT NULL,
    `target_field` VARCHAR(255) NOT NULL,
    `weighting` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`source_attribute_id`,`operation`,`target_field`),
    INDEX `spy_product_search_attributes_operation-source_attribute_id` (`source_attribute_id`, `weighting`),
    CONSTRAINT `spy_product_search_attributes_operation-source_attribute_id`
        FOREIGN KEY (`source_attribute_id`)
        REFERENCES `spy_attributes_metadata` (`id_attributes_metadata`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_searchable_products`
(
    `searchable_id` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_locale` INTEGER,
    `is_searchable` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`searchable_id`),
    INDEX `spy_searchable_products-fi_product` (`fk_product`),
    INDEX `spy_searchable_products-fi_locale` (`fk_locale`),
    CONSTRAINT `spy_searchable_products-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_searchable_products-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE `spy_propel_heartbeat`
(
    `heartbeat_check` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`heartbeat_check`)
) ENGINE=InnoDB;

CREATE TABLE `spy_refund`
(
    `id_refund` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    `adjustment_fee` INTEGER,
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
    `fk_customer` INTEGER,
    `id_sales_order` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_address_billing` INTEGER NOT NULL,
    `fk_sales_order_address_shipping` INTEGER NOT NULL,
    `email` VARCHAR(255),
    `salutation` TINYINT,
    `first_name` VARCHAR(100),
    `last_name` VARCHAR(100),
    `order_reference` VARCHAR(45) NOT NULL,
    `grand_total` INTEGER NOT NULL,
    `subtotal` INTEGER NOT NULL,
    `is_test` TINYINT(1) DEFAULT 0 NOT NULL,
    `fk_shipment_method` INTEGER,
    `shipment_delivery_time` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order`),
    UNIQUE INDEX `spy_sales_order-order_reference` (`order_reference`),
    INDEX `spy_sales_order-fi_customer` (`fk_customer`),
    INDEX `spy_sales_order-fi_sales_order_address_billing` (`fk_sales_order_address_billing`),
    INDEX `spy_sales_order-fi_sales_order_address_shipping` (`fk_sales_order_address_shipping`),
    INDEX `spy_sales_order-fi_shipment_method` (`fk_shipment_method`),
    CONSTRAINT `spy_sales_order-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`),
    CONSTRAINT `spy_sales_order-fk_sales_order_address_billing`
        FOREIGN KEY (`fk_sales_order_address_billing`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order-fk_sales_order_address_shipping`
        FOREIGN KEY (`fk_sales_order_address_shipping`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order-fk_shipment_method`
        FOREIGN KEY (`fk_shipment_method`)
        REFERENCES `spy_shipment_method` (`id_shipment_method`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item`
(
    `fk_refund` INTEGER,
    `id_sales_order_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `fk_oms_order_process` INTEGER,
    `fk_sales_order_item_bundle` INTEGER,
    `last_state_change` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `price_to_pay` INTEGER NOT NULL COMMENT \'/value that the customer has to pay./\',
    `tax_percentage` DECIMAL(8,2),
    `quantity` INTEGER DEFAULT 1 NOT NULL COMMENT \'/Quantity ordered for item/\',
    `group_key` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `spy_sales_order_item-sku` (`sku`),
    INDEX `spy_sales_order_item-fi_refund` (`fk_refund`),
    INDEX `spy_sales_order_item-fi_sales_order` (`fk_sales_order`),
    INDEX `spy_sales_order_item-fi_oms_order_item_state` (`fk_oms_order_item_state`),
    INDEX `spy_sales_order_item-fi_oms_order_process` (`fk_oms_order_process`),
    INDEX `spy_sales_order_item-fi_sales_order_item_bundle` (`fk_sales_order_item_bundle`),
    CONSTRAINT `spy_sales_order_item-fk_refund`
        FOREIGN KEY (`fk_refund`)
        REFERENCES `spy_refund` (`id_refund`),
    CONSTRAINT `spy_sales_order_item-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_order_item-fk_oms_order_item_state`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`),
    CONSTRAINT `spy_sales_order_item-fk_oms_order_process`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `spy_oms_order_process` (`id_oms_order_process`),
    CONSTRAINT `spy_sales_order_item-fk_sales_order_item_bundle`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `spy_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_expense`
(
    `fk_refund` INTEGER,
    `id_sales_expense` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER,
    `type` VARCHAR(150),
    `name` VARCHAR(255),
    `gross_price` INTEGER NOT NULL,
    `price_to_pay` INTEGER NOT NULL,
    `tax_percentage` DECIMAL(8,2),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_expense`),
    UNIQUE INDEX `spy_sales_expense-unique-fk_sales_order` (`fk_sales_order`, `type`),
    INDEX `spy_sales_expense-fi_refund` (`fk_refund`),
    CONSTRAINT `spy_sales_expense-fk_refund`
        FOREIGN KEY (`fk_refund`)
        REFERENCES `spy_refund` (`id_refund`),
    CONSTRAINT `spy_sales_expense-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
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
    INDEX `spy_sales_order_address-fi_country` (`fk_country`),
    INDEX `spy_sales_order_address-fi_region` (`fk_region`),
    CONSTRAINT `spy_sales_order_address-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_sales_order_address-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`)
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
    INDEX `spy_sales_order_address_history-fi_country` (`fk_country`),
    INDEX `spy_sales_order_address_history-fi_sales_order_address` (`fk_sales_order_address`),
    INDEX `spy_sales_order_address_history-fi_region` (`fk_region`),
    CONSTRAINT `spy_sales_order_address_history-fk_country`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_sales_order_address_history-fk_sales_order_address`
        FOREIGN KEY (`fk_sales_order_address`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order_address_history-fk_region`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item_option`
(
    `id_sales_order_item_option` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `label_option_type` VARCHAR(255) NOT NULL,
    `label_option_value` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER DEFAULT 0 NOT NULL,
    `price_to_pay` INTEGER DEFAULT 0 NOT NULL,
    `tax_percentage` DECIMAL(8,2) DEFAULT 0.0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_option`),
    INDEX `spy_sales_order_item_option-fi_sales_order_item` (`fk_sales_order_item`),
    CONSTRAINT `spy_sales_order_item_option-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
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
    `amount` DECIMAL(8,2) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_discount`),
    INDEX `spy_sales_discount-fi_sales_order` (`fk_sales_order`),
    INDEX `spy_sales_discount-fi_sales_order_item` (`fk_sales_order_item`),
    INDEX `spy_sales_discount-fi_sales_expense` (`fk_sales_expense`),
    INDEX `spy_sales_discount-fi_sales_order_item_option` (`fk_sales_order_item_option`),
    CONSTRAINT `spy_sales_discount-fk_sales_order`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_discount-fk_sales_order_item`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_sales_discount-fk_sales_expense`
        FOREIGN KEY (`fk_sales_expense`)
        REFERENCES `spy_sales_expense` (`id_sales_expense`),
    CONSTRAINT `spy_sales_discount-fk_sales_order_item_option`
        FOREIGN KEY (`fk_sales_order_item_option`)
        REFERENCES `spy_sales_order_item_option` (`id_sales_order_item_option`)
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

CREATE TABLE `spy_sales_order_item_bundle`
(
    `id_sales_order_item_bundle` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL COMMENT \'/price for one unit including tax, without shipping, coupons/\',
    `price_to_pay` INTEGER NOT NULL COMMENT \'/value that the customer has to pay./\',
    `tax_percentage` DECIMAL(8,2),
    `bundle_type` TINYINT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `spy_sales_order_item_bundle_item`
(
    `id_sales_order_item_bundle_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item_bundle` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `sku` VARCHAR(255) NOT NULL,
    `gross_price` INTEGER NOT NULL,
    `tax_percentage` DECIMAL(8,2),
    `variety` TINYINT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item_bundle_item`),
    INDEX `spy_sales_order_item_bundle_item-fi_sales_order_item_bundle` (`fk_sales_order_item_bundle`),
    CONSTRAINT `spy_sales_order_item_bundle_item-fk_sales_order_item_bundle`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `spy_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE `spy_search_page_element`
(
    `id_search_page_element` INTEGER NOT NULL AUTO_INCREMENT,
    `element_key` VARCHAR(255) NOT NULL,
    `is_element_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `fk_search_document_attribute` INTEGER NOT NULL,
    `fk_search_page_element_template` INTEGER NOT NULL,
    PRIMARY KEY (`id_search_page_element`),
    UNIQUE INDEX `spy_search_page_element-element_key` (`element_key`),
    INDEX `spy_search_page_element-fi_search_document_attribute` (`fk_search_document_attribute`),
    INDEX `spy_search_page_element-fi_search_page_element_template` (`fk_search_page_element_template`),
    CONSTRAINT `spy_search_page_element-fk_search_document_attribute`
        FOREIGN KEY (`fk_search_document_attribute`)
        REFERENCES `spy_search_document_attribute` (`id_search_document_attribute`),
    CONSTRAINT `spy_search_page_element-fk_search_page_element_template`
        FOREIGN KEY (`fk_search_page_element_template`)
        REFERENCES `spy_search_page_element_template` (`id_search_page_element_template`)
) ENGINE=InnoDB;

CREATE TABLE `spy_search_document_attribute`
(
    `id_search_document_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `attribute_name` VARCHAR(255) NOT NULL,
    `attribute_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_document_attribute`),
    UNIQUE INDEX `spy_search_document_attribute-attribute_name` (`attribute_name`)
) ENGINE=InnoDB;

CREATE TABLE `spy_search_page_element_template`
(
    `id_search_page_element_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_page_element_template`),
    UNIQUE INDEX `spy_search_page_element_template-template_name` (`template_name`)
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
    `glossary_key_name` VARCHAR(255),
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
    `glossary_key_name` VARCHAR(255),
    `glossary_key_description` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `price` INTEGER,
    `availability_plugin` VARCHAR(255),
    `price_calculation_plugin` VARCHAR(255),
    `delivery_time_plugin` VARCHAR(255),
    `tax_calculation_plugin` VARCHAR(255),
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
    INDEX `spy_stock_product-fi_product` (`fk_product`),
    CONSTRAINT `spy_stock_product-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_stock_product-fk_stock`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `spy_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE `spy_tax_set`
(
    `id_tax_set` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE `spy_tax_rate`
(
    `id_tax_rate` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL,
    PRIMARY KEY (`id_tax_rate`)
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
    `fk_resource_abstract_product` INTEGER,
    `id_url` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `url` VARCHAR(255) NOT NULL,
    `fk_resource_redirect` INTEGER,
    PRIMARY KEY (`id_url`),
    UNIQUE INDEX `spy_url_unique_key` (`url`),
    INDEX `spy_url-fi_resource_categorynode` (`fk_resource_categorynode`),
    INDEX `spy_url-fi_resource_page` (`fk_resource_page`),
    INDEX `spy_url-fi_resource_abstract_product` (`fk_resource_abstract_product`),
    INDEX `spy_url-fi_locale` (`fk_locale`),
    INDEX `spy_url-fi_resource_redirect` (`fk_resource_redirect`),
    CONSTRAINT `spy_url-fk_resource_categorynode`
        FOREIGN KEY (`fk_resource_categorynode`)
        REFERENCES `spy_category_node` (`id_category_node`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_page`
        FOREIGN KEY (`fk_resource_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_abstract_product`
        FOREIGN KEY (`fk_resource_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_locale`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url-fk_resource_redirect`
        FOREIGN KEY (`fk_resource_redirect`)
        REFERENCES `spy_redirect` (`id_redirect`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `spy_redirect`
(
    `id_redirect` INTEGER NOT NULL AUTO_INCREMENT,
    `to_url` VARCHAR(255) NOT NULL,
    `status` INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY (`id_redirect`),
    INDEX `spy_redirect-to_url` (`to_url`, `status`)
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
    PRIMARY KEY (`id_wishlist`),
    UNIQUE INDEX `spy_wishlist-unique-fk_customer` (`fk_customer`),
    CONSTRAINT `spy_wishlist-fk_customer`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE `spy_wishlist_item`
(
    `id_wishlist_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_wishlist` INTEGER NOT NULL,
    `quantity` INTEGER NOT NULL,
    `added_at` DATETIME NOT NULL,
    `group_key` VARCHAR(255),
    `fk_abstract_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_wishlist_item`),
    INDEX `spy_wishlist_item-fi_wishlist` (`fk_wishlist`),
    INDEX `spy_wishlist_item-fi_product` (`fk_product`),
    INDEX `spy_wishlist_item-fi_abstract_product` (`fk_abstract_product`),
    CONSTRAINT `spy_wishlist_item-fk_wishlist`
        FOREIGN KEY (`fk_wishlist`)
        REFERENCES `spy_wishlist` (`id_wishlist`),
    CONSTRAINT `spy_wishlist_item-fk_product`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_wishlist_item-fk_abstract_product`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
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

DROP TABLE IF EXISTS `spy_acl_role`;

DROP TABLE IF EXISTS `spy_acl_rule`;

DROP TABLE IF EXISTS `spy_acl_group`;

DROP TABLE IF EXISTS `spy_acl_user_has_group`;

DROP TABLE IF EXISTS `spy_acl_groups_has_roles`;

DROP TABLE IF EXISTS `spy_auth_reset_password`;

DROP TABLE IF EXISTS `spy_category`;

DROP TABLE IF EXISTS `spy_category_attribute`;

DROP TABLE IF EXISTS `spy_category_node`;

DROP TABLE IF EXISTS `spy_category_closure_table`;

DROP TABLE IF EXISTS `spy_cms_template`;

DROP TABLE IF EXISTS `spy_cms_page`;

DROP TABLE IF EXISTS `spy_cms_glossary_key_mapping`;

DROP TABLE IF EXISTS `spy_cms_block`;

DROP TABLE IF EXISTS `spy_country`;

DROP TABLE IF EXISTS `spy_region`;

DROP TABLE IF EXISTS `spy_customer`;

DROP TABLE IF EXISTS `spy_customer_address`;

DROP TABLE IF EXISTS `spy_discount`;

DROP TABLE IF EXISTS `spy_discount_decision_rule`;

DROP TABLE IF EXISTS `spy_discount_collector`;

DROP TABLE IF EXISTS `spy_discount_voucher_pool`;

DROP TABLE IF EXISTS `spy_discount_voucher`;

DROP TABLE IF EXISTS `spy_discount_voucher_pool_category`;

DROP TABLE IF EXISTS `spy_distributor_item`;

DROP TABLE IF EXISTS `spy_distributor_receiver`;

DROP TABLE IF EXISTS `spy_distributor_item_type`;

DROP TABLE IF EXISTS `spy_glossary_key`;

DROP TABLE IF EXISTS `spy_glossary_translation`;

DROP TABLE IF EXISTS `spy_locale`;

DROP TABLE IF EXISTS `spy_newsletter_subscriber`;

DROP TABLE IF EXISTS `spy_newsletter_type`;

DROP TABLE IF EXISTS `spy_newsletter_subscription`;

DROP TABLE IF EXISTS `spy_nopayment_paid`;

DROP TABLE IF EXISTS `spy_oms_transition_log`;

DROP TABLE IF EXISTS `spy_oms_order_process`;

DROP TABLE IF EXISTS `spy_oms_order_item_state`;

DROP TABLE IF EXISTS `spy_oms_order_item_state_history`;

DROP TABLE IF EXISTS `spy_oms_event_timeout`;

DROP TABLE IF EXISTS `spy_payment_payolution`;

DROP TABLE IF EXISTS `spy_payment_payolution_transaction_request_log`;

DROP TABLE IF EXISTS `spy_payment_payolution_transaction_status_log`;

DROP TABLE IF EXISTS `spy_payment_payolution_order_item`;

DROP TABLE IF EXISTS `spy_payment_payone`;

DROP TABLE IF EXISTS `spy_payment_payone_detail`;

DROP TABLE IF EXISTS `spy_payment_payone_api_log`;

DROP TABLE IF EXISTS `spy_payment_payone_transaction_status_log`;

DROP TABLE IF EXISTS `spy_payment_payone_transaction_status_log_order_item`;

DROP TABLE IF EXISTS `spy_price_product`;

DROP TABLE IF EXISTS `spy_price_type`;

DROP TABLE IF EXISTS `spy_abstract_product`;

DROP TABLE IF EXISTS `spy_abstract_product_localized_attributes`;

DROP TABLE IF EXISTS `spy_product`;

DROP TABLE IF EXISTS `spy_product_localized_attributes`;

DROP TABLE IF EXISTS `spy_product_to_bundle`;

DROP TABLE IF EXISTS `spy_attributes_metadata`;

DROP TABLE IF EXISTS `spy_attribute_type`;

DROP TABLE IF EXISTS `spy_attribute_type_value`;

DROP TABLE IF EXISTS `spy_product_category`;

DROP TABLE IF EXISTS `spy_product_option_type`;

DROP TABLE IF EXISTS `spy_product_option_value`;

DROP TABLE IF EXISTS `spy_product_option_value_price`;

DROP TABLE IF EXISTS `spy_product_option_value_translation`;

DROP TABLE IF EXISTS `spy_product_option_type_translation`;

DROP TABLE IF EXISTS `spy_product_option_type_usage`;

DROP TABLE IF EXISTS `spy_product_option_value_usage`;

DROP TABLE IF EXISTS `spy_product_option_type_usage_exclusion`;

DROP TABLE IF EXISTS `spy_product_option_value_usage_constraint`;

DROP TABLE IF EXISTS `spy_product_option_configuration_preset`;

DROP TABLE IF EXISTS `spy_product_option_configuration_preset_value`;

DROP TABLE IF EXISTS `spy_product_search_attributes_operation`;

DROP TABLE IF EXISTS `spy_searchable_products`;

DROP TABLE IF EXISTS `spy_propel_heartbeat`;

DROP TABLE IF EXISTS `spy_refund`;

DROP TABLE IF EXISTS `spy_sales_order`;

DROP TABLE IF EXISTS `spy_sales_order_item`;

DROP TABLE IF EXISTS `spy_sales_expense`;

DROP TABLE IF EXISTS `spy_sales_order_address`;

DROP TABLE IF EXISTS `spy_sales_order_address_history`;

DROP TABLE IF EXISTS `spy_sales_order_item_option`;

DROP TABLE IF EXISTS `spy_sales_order_note`;

DROP TABLE IF EXISTS `spy_sales_order_comment`;

DROP TABLE IF EXISTS `spy_sales_discount`;

DROP TABLE IF EXISTS `spy_sales_discount_code`;

DROP TABLE IF EXISTS `spy_sales_order_item_bundle`;

DROP TABLE IF EXISTS `spy_sales_order_item_bundle_item`;

DROP TABLE IF EXISTS `spy_search_page_element`;

DROP TABLE IF EXISTS `spy_search_document_attribute`;

DROP TABLE IF EXISTS `spy_search_page_element_template`;

DROP TABLE IF EXISTS `spy_sequence_number`;

DROP TABLE IF EXISTS `spy_shipment_carrier`;

DROP TABLE IF EXISTS `spy_shipment_method`;

DROP TABLE IF EXISTS `spy_stock`;

DROP TABLE IF EXISTS `spy_stock_product`;

DROP TABLE IF EXISTS `spy_tax_set`;

DROP TABLE IF EXISTS `spy_tax_rate`;

DROP TABLE IF EXISTS `spy_tax_set_tax`;

DROP TABLE IF EXISTS `spy_touch`;

DROP TABLE IF EXISTS `spy_touch_storage`;

DROP TABLE IF EXISTS `spy_touch_search`;

DROP TABLE IF EXISTS `spy_url`;

DROP TABLE IF EXISTS `spy_redirect`;

DROP TABLE IF EXISTS `spy_user`;

DROP TABLE IF EXISTS `spy_wishlist`;

DROP TABLE IF EXISTS `spy_wishlist_item`;

DROP TABLE IF EXISTS `spy_acl_role_archive`;

DROP TABLE IF EXISTS `spy_acl_rule_archive`;

DROP TABLE IF EXISTS `spy_acl_group_archive`;

DROP TABLE IF EXISTS `spy_auth_reset_password_archive`;

DROP TABLE IF EXISTS `spy_user_archive`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}