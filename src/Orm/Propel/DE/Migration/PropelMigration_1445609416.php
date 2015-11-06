<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1445609416.
 * Generated on 2015-10-23 14:10:16 by vagrant
 */
class PropelMigration_1445609416
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

CREATE TABLE IF NOT EXISTS `spy_acl_role`
(
    `id_acl_role` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    UNIQUE INDEX `spy_acl_role_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_rule`
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
    INDEX `spy_acl_rule_fi_4e4ee0` (`fk_acl_role`),
    CONSTRAINT `spy_acl_rule_fk_4e4ee0`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `spy_acl_role` (`id_acl_role`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_group`
(
    `id_acl_group` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_acl_group`),
    UNIQUE INDEX `spy_acl_group_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_user_has_group`
(
    `fk_user` INTEGER NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    PRIMARY KEY (`fk_user`,`fk_acl_group`),
    INDEX `spy_acl_user_has_group_fi_537946` (`fk_acl_group`),
    CONSTRAINT `spy_acl_user_has_group_fk_f93f9c`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_acl_user_has_group_fk_537946`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `spy_acl_group` (`id_acl_group`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_groups_has_roles`
(
    `fk_acl_role` INTEGER NOT NULL,
    `fk_acl_group` INTEGER NOT NULL,
    PRIMARY KEY (`fk_acl_role`,`fk_acl_group`),
    INDEX `spy_acl_groups_has_roles_fi_537946` (`fk_acl_group`),
    CONSTRAINT `spy_acl_groups_has_roles_fk_4e4ee0`
        FOREIGN KEY (`fk_acl_role`)
        REFERENCES `spy_acl_role` (`id_acl_role`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_acl_groups_has_roles_fk_537946`
        FOREIGN KEY (`fk_acl_group`)
        REFERENCES `spy_acl_group` (`id_acl_group`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_auth_reset_password`
(
    `id_auth_reset_password` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_user` INTEGER NOT NULL,
    `code` VARCHAR(35) NOT NULL,
    `status` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_auth_reset_password`,`fk_user`),
    UNIQUE INDEX `spy_auth_reset_password_u_4db226` (`code`),
    INDEX `spy_auth_reset_password_fi_f93f9c` (`fk_user`),
    CONSTRAINT `spy_auth_reset_password_fk_f93f9c`
        FOREIGN KEY (`fk_user`)
        REFERENCES `spy_user` (`id_user`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_category`
(
    `id_category` INTEGER NOT NULL AUTO_INCREMENT,
    `is_active` TINYINT(1) DEFAULT 1,
    `is_in_menu` TINYINT(1) DEFAULT 1,
    `is_clickable` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`id_category`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_category_attribute`
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

CREATE TABLE IF NOT EXISTS `spy_category_node`
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

CREATE TABLE IF NOT EXISTS `spy_category_closure_table`
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

CREATE TABLE IF NOT EXISTS `spy_cms_template`
(
    `id_cms_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    `template_path` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_template`),
    UNIQUE INDEX `spy_cms_template_u_3631d2` (`template_path`),
    INDEX `spy_cms_template_i_3631d2` (`template_path`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_cms_page`
(
    `id_cms_page` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_template` INTEGER NOT NULL,
    `valid_from` DATETIME,
    `valid_to` DATETIME,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_cms_page`),
    INDEX `spy_cms_page_fi_bef579` (`fk_template`),
    CONSTRAINT `spy_cms_page_fk_bef579`
        FOREIGN KEY (`fk_template`)
        REFERENCES `spy_cms_template` (`id_cms_template`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_cms_glossary_key_mapping`
(
    `id_cms_glossary_key_mapping` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_page` INTEGER NOT NULL,
    `fk_glossary_key` INTEGER NOT NULL,
    `placeholder` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_cms_glossary_key_mapping`),
    UNIQUE INDEX `spy_cms_glossary_key_mapping_u_62236a` (`fk_page`, `placeholder`),
    INDEX `spy_cms_glossary_key_mapping_i_62236a` (`fk_page`, `placeholder`),
    INDEX `spy_cms_glossary_key_mapping_fi_7016e7` (`fk_glossary_key`),
    CONSTRAINT `spy_cms_glossary_key_mapping_fk_d37f38`
        FOREIGN KEY (`fk_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_cms_glossary_key_mapping_fk_7016e7`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_cms_block`
(
    `id_cms_block` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_page` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255),
    `value` INTEGER,
    PRIMARY KEY (`id_cms_block`),
    UNIQUE INDEX `spy_cms_block_u_546fc4` (`fk_page`),
    UNIQUE INDEX `spy_cms_block_u_cd3bc3` (`name`, `type`, `value`),
    INDEX `spy_cms_block_i_546fc4` (`fk_page`),
    CONSTRAINT `spy_cms_block_fk_d37f38`
        FOREIGN KEY (`fk_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_country`
(
    `id_country` INTEGER NOT NULL AUTO_INCREMENT,
    `iso2_code` VARCHAR(2) NOT NULL,
    `iso3_code` VARCHAR(3),
    `name` VARCHAR(255),
    `postal_code_mandatory` TINYINT(1) DEFAULT 0,
    `postal_code_regex` VARCHAR(500),
    PRIMARY KEY (`id_country`),
    UNIQUE INDEX `spy_country_u_49373d` (`iso2_code`),
    UNIQUE INDEX `spy_country_u_a38cfe` (`iso3_code`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_region`
(
    `id_region` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_country` INTEGER,
    `name` VARCHAR(100) NOT NULL,
    `iso2_code` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`id_region`),
    UNIQUE INDEX `spy_region_u_49373d` (`iso2_code`),
    INDEX `spy_region_fi_28d90b` (`fk_country`),
    CONSTRAINT `spy_region_fk_28d90b`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_customer`
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
    UNIQUE INDEX `spy_customer_u_ce4c89` (`email`),
    INDEX `spy_customer_fi_709a0a` (`default_billing_address`),
    INDEX `spy_customer_fi_0855ab` (`default_shipping_address`),
    CONSTRAINT `spy_customer_fk_709a0a`
        FOREIGN KEY (`default_billing_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`),
    CONSTRAINT `spy_customer_fk_0855ab`
        FOREIGN KEY (`default_shipping_address`)
        REFERENCES `spy_customer_address` (`id_customer_address`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_customer_address`
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
    INDEX `spy_customer_address_i_48916d` (`fk_customer`),
    INDEX `spy_customer_address_fi_19f88c` (`fk_region`),
    INDEX `spy_customer_address_fi_28d90b` (`fk_country`),
    CONSTRAINT `spy_customer_address_fk_29a8ca`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`),
    CONSTRAINT `spy_customer_address_fk_19f88c`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`),
    CONSTRAINT `spy_customer_address_fk_28d90b`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount`
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount`),
    UNIQUE INDEX `spy_discount_u_6c730d` (`fk_discount_voucher_pool`),
    CONSTRAINT `spy_discount_fk_20ec91`
        FOREIGN KEY (`fk_discount_voucher_pool`)
        REFERENCES `spy_discount_voucher_pool` (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount_decision_rule`
(
    `id_discount_decision_rule` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `decision_rule_plugin` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_decision_rule`),
    INDEX `spy_discount_decision_rule_fi_4a7cdd` (`fk_discount`),
    CONSTRAINT `spy_discount_decision_rule_fk_4a7cdd`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount_collector`
(
    `id_discount_collector` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount` INTEGER NOT NULL,
    `collector_plugin` VARCHAR(255),
    `value` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_collector`),
    INDEX `spy_discount_collector_fi_4a7cdd` (`fk_discount`),
    CONSTRAINT `spy_discount_collector_fk_4a7cdd`
        FOREIGN KEY (`fk_discount`)
        REFERENCES `spy_discount` (`id_discount`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount_voucher_pool`
(
    `id_discount_voucher_pool` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_discount_voucher_pool_category` INTEGER,
    `name` VARCHAR(255) NOT NULL,
    `template` VARCHAR(255),
    `is_active` TINYINT(1) DEFAULT 0,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher_pool`),
    INDEX `spy_discount_voucher_pool_fi_fb0522` (`fk_discount_voucher_pool_category`),
    CONSTRAINT `spy_discount_voucher_pool_fk_fb0522`
        FOREIGN KEY (`fk_discount_voucher_pool_category`)
        REFERENCES `spy_discount_voucher_pool_category` (`id_discount_voucher_pool_category`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount_voucher`
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
    UNIQUE INDEX `spy_discount_voucher_u_4db226` (`code`),
    INDEX `spy_discount_voucher_fi_20ec91` (`fk_discount_voucher_pool`),
    CONSTRAINT `spy_discount_voucher_fk_20ec91`
        FOREIGN KEY (`fk_discount_voucher_pool`)
        REFERENCES `spy_discount_voucher_pool` (`id_discount_voucher_pool`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_discount_voucher_pool_category`
(
    `id_discount_voucher_pool_category` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_discount_voucher_pool_category`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_distributor_item`
(
    `id_distributor_item` INTEGER NOT NULL AUTO_INCREMENT,
    `touched` DATETIME NOT NULL,
    `fk_item_type` INTEGER NOT NULL,
    `fk_glossary_translation` INTEGER,
    PRIMARY KEY (`id_distributor_item`,`fk_item_type`),
    INDEX `spy_distributor_item_i_da8410` (`touched`),
    INDEX `spy_distributor_item_fi_d16b97` (`fk_item_type`),
    INDEX `spy_distributor_item_fi_18698e` (`fk_glossary_translation`),
    CONSTRAINT `spy_distributor_item_fk_d16b97`
        FOREIGN KEY (`fk_item_type`)
        REFERENCES `spy_distributor_item_type` (`id_distributor_item_type`),
    CONSTRAINT `spy_distributor_item_fk_18698e`
        FOREIGN KEY (`fk_glossary_translation`)
        REFERENCES `spy_glossary_translation` (`id_glossary_translation`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_distributor_receiver`
(
    `id_distributor_receiver` INTEGER NOT NULL AUTO_INCREMENT,
    `receiver_key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_distributor_receiver`),
    UNIQUE INDEX `spy_distributor_receiver_u_904f77` (`receiver_key`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_distributor_item_type`
(
    `id_distributor_item_type` INTEGER NOT NULL AUTO_INCREMENT,
    `type_key` VARCHAR(255) NOT NULL,
    `last_distribution` DATETIME NOT NULL,
    PRIMARY KEY (`id_distributor_item_type`),
    UNIQUE INDEX `spy_distributor_item_type_u_cc6c13` (`type_key`),
    INDEX `spy_distributor_item_type_i_fa6585` (`last_distribution`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_glossary_key`
(
    `id_glossary_key` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_key`),
    UNIQUE INDEX `spy_glossary_key_u_b0eafe` (`key`),
    INDEX `spy_glossary_key_i_b0eafe` (`key`),
    INDEX `spy_glossary_key_i_530ee5` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_glossary_translation`
(
    `id_glossary_translation` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_glossary_key` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `value` TEXT NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_glossary_translation`),
    UNIQUE INDEX `spy_glossary_translation_u_2d77bc` (`fk_glossary_key`, `fk_locale`),
    INDEX `spy_glossary_translation_i_84b65c` (`fk_locale`),
    INDEX `spy_glossary_translation_i_530ee5` (`is_active`),
    CONSTRAINT `spy_glossary_translation_fk_7016e7`
        FOREIGN KEY (`fk_glossary_key`)
        REFERENCES `spy_glossary_key` (`id_glossary_key`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_glossary_translation_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_locale`
(
    `id_locale` INTEGER NOT NULL AUTO_INCREMENT,
    `locale_name` VARCHAR(5) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_locale`),
    UNIQUE INDEX `spy_locale_u_1a6f04` (`locale_name`),
    INDEX `spy_locale_i_1a6f04` (`locale_name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_newsletter_subscriber`
(
    `id_newsletter_subscriber` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER,
    `email` VARCHAR(255) NOT NULL,
    `subscriber_key` VARCHAR(150),
    `is_confirmed` TINYINT(1) DEFAULT 0 NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_newsletter_subscriber`),
    UNIQUE INDEX `spy_newsletter_subscriber_u_ce4c89` (`email`),
    UNIQUE INDEX `spy_newsletter_subscriber_u_b1a50b` (`subscriber_key`),
    INDEX `spy_newsletter_subscriber_i_ce4c89` (`email`),
    INDEX `spy_newsletter_subscriber_i_b1a50b` (`subscriber_key`),
    INDEX `spy_newsletter_subscriber_fi_29a8ca` (`fk_customer`),
    CONSTRAINT `spy_newsletter_subscriber_fk_29a8ca`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_newsletter_type`
(
    `id_newsletter_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_newsletter_type`),
    UNIQUE INDEX `spy_newsletter_type_u_d94269` (`name`),
    INDEX `spy_newsletter_type_i_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_newsletter_subscription`
(
    `fk_newsletter_subscriber` INTEGER NOT NULL,
    `fk_newsletter_type` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`fk_newsletter_subscriber`,`fk_newsletter_type`),
    INDEX `spy_newsletter_subscription_fi_1b7e7b` (`fk_newsletter_type`),
    CONSTRAINT `spy_newsletter_subscription_fk_16a157`
        FOREIGN KEY (`fk_newsletter_subscriber`)
        REFERENCES `spy_newsletter_subscriber` (`id_newsletter_subscriber`),
    CONSTRAINT `spy_newsletter_subscription_fk_1b7e7b`
        FOREIGN KEY (`fk_newsletter_type`)
        REFERENCES `spy_newsletter_type` (`id_newsletter_type`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_nopayment_paid`
(
    `id_nopayment_paid` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_nopayment_paid`),
    INDEX `spy_nopayment_paid_fi_d4f62a` (`fk_sales_order_item`),
    CONSTRAINT `spy_nopayment_paid_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_oms_transition_log`
(
    `id_oms_transition_log` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_sales_order` INTEGER NOT NULL,
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
    INDEX `spy_oms_transition_log_fi_066cc0` (`fk_sales_order`),
    INDEX `spy_oms_transition_log_fi_d4f62a` (`fk_sales_order_item`),
    INDEX `spy_oms_transition_log_fi_661a16` (`fk_oms_order_process`),
    CONSTRAINT `spy_oms_transition_log_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_oms_transition_log_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_transition_log_fk_661a16`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `spy_oms_order_process` (`id_oms_order_process`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_oms_order_process`
(
    `id_oms_order_process` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_order_process`),
    UNIQUE INDEX `spy_oms_order_process_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_oms_order_item_state`
(
    `id_oms_order_item_state` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255),
    PRIMARY KEY (`id_oms_order_item_state`),
    UNIQUE INDEX `spy_oms_order_item_state_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_oms_order_item_state_history`
(
    `id_oms_order_item_state_history` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_order_item_state_history`),
    INDEX `spy_oms_order_item_state_history_fi_d4f62a` (`fk_sales_order_item`),
    INDEX `spy_oms_order_item_state_history_fi_d7aa41` (`fk_oms_order_item_state`),
    CONSTRAINT `spy_oms_order_item_state_history_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_order_item_state_history_fk_d7aa41`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_oms_event_timeout`
(
    `id_oms_event_timeout` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order_item` INTEGER NOT NULL,
    `fk_oms_order_item_state` INTEGER NOT NULL,
    `timeout` DATETIME NOT NULL,
    `event` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_oms_event_timeout`),
    UNIQUE INDEX `spy_oms_event_timeout_u_394228` (`fk_sales_order_item`, `fk_oms_order_item_state`),
    INDEX `spy_oms_event_timeout_i_1711d7` (`timeout`),
    INDEX `spy_oms_event_timeout_fi_d7aa41` (`fk_oms_order_item_state`),
    CONSTRAINT `spy_oms_event_timeout_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_oms_event_timeout_fk_d7aa41`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payolution`
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
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payolution`),
    INDEX `spy_payment_payolution_fi_066cc0` (`fk_sales_order`),
    CONSTRAINT `spy_payment_payolution_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payolution_transaction_request_log`
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
    INDEX `spy_payment_payolution_transaction_request_log_fi_fd183f` (`fk_payment_payolution`),
    INDEX `i_referenced_spy_payment_payolution_transaction_status_log_fk_49` (`transaction_id`),
    CONSTRAINT `spy_payment_payolution_transaction_request_log_fk_fd183f`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payolution_transaction_status_log`
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
    INDEX `spy_payment_payolution_transaction_status_log_fi_fd183f` (`fk_payment_payolution`),
    INDEX `spy_payment_payolution_transaction_status_log_fi_49d9de` (`identification_transactionid`),
    CONSTRAINT `spy_payment_payolution_transaction_status_log_fk_fd183f`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`),
    CONSTRAINT `spy_payment_payolution_transaction_status_log_fk_49d9de`
        FOREIGN KEY (`identification_transactionid`)
        REFERENCES `spy_payment_payolution_transaction_request_log` (`transaction_id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payolution_order_item`
(
    `fk_payment_payolution` INTEGER NOT NULL,
    `fk_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`fk_payment_payolution`,`fk_sales_order_item`),
    INDEX `spy_payment_payolution_order_item_fi_d4f62a` (`fk_sales_order_item`),
    CONSTRAINT `spy_payment_payolution_order_item_fk_fd183f`
        FOREIGN KEY (`fk_payment_payolution`)
        REFERENCES `spy_payment_payolution` (`id_payment_payolution`),
    CONSTRAINT `spy_payment_payolution_order_item_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payone`
(
    `id_payment_payone` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `payment_method` VARCHAR(255) NOT NULL,
    `reference` VARCHAR(255) NOT NULL,
    `transaction_id` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_payment_payone`),
    INDEX `spy_payment_payone_fi_066cc0` (`fk_sales_order`),
    CONSTRAINT `spy_payment_payone_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payone_detail`
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
    CONSTRAINT `spy_payment_payone_detail_fk_ad1b81`
        FOREIGN KEY (`id_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payone_api_log`
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
    INDEX `spy_payment_payone_api_log_fi_96d8d3` (`fk_payment_payone`),
    CONSTRAINT `spy_payment_payone_api_log_fk_96d8d3`
        FOREIGN KEY (`fk_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payone_transaction_status_log`
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
    INDEX `spy_payment_payone_transaction_status_log_i_63355d` (`transaction_id`),
    INDEX `spy_payment_payone_transaction_status_log_fi_96d8d3` (`fk_payment_payone`),
    CONSTRAINT `spy_payment_payone_transaction_status_log_fk_96d8d3`
        FOREIGN KEY (`fk_payment_payone`)
        REFERENCES `spy_payment_payone` (`id_payment_payone`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_payment_payone_transaction_status_log_order_item`
(
    `id_payment_payone_transaction_status_log` INTEGER NOT NULL,
    `id_sales_order_item` INTEGER NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`id_payment_payone_transaction_status_log`,`id_sales_order_item`),
    INDEX `spy_payment_payone_transaction_status_log_order_item_fi_b190fc` (`id_sales_order_item`),
    CONSTRAINT `spy_payment_payone_transaction_status_log_order_item_fk_a65732`
        FOREIGN KEY (`id_payment_payone_transaction_status_log`)
        REFERENCES `spy_payment_payone_transaction_status_log` (`id_payment_payone_transaction_status_log`),
    CONSTRAINT `spy_payment_payone_transaction_status_log_order_item_fk_b190fc`
        FOREIGN KEY (`id_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_price_product`
(
    `id_price_product` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER DEFAULT 0,
    `fk_product` INTEGER,
    `fk_price_type` INTEGER NOT NULL,
    `fk_abstract_product` INTEGER,
    PRIMARY KEY (`id_price_product`),
    UNIQUE INDEX `spy_price_product_u_9a9f58` (`fk_abstract_product`, `fk_product`, `fk_price_type`),
    INDEX `spy_price_product_fi_831c22` (`fk_product`),
    INDEX `spy_price_product_fi_576112` (`fk_price_type`),
    CONSTRAINT `spy_price_product_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_price_product_fk_576112`
        FOREIGN KEY (`fk_price_type`)
        REFERENCES `spy_price_type` (`id_price_type`),
    CONSTRAINT `spy_price_product_fk_ac5f14`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_price_type`
(
    `id_price_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_price_type`),
    UNIQUE INDEX `spy_price_type_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_abstract_product`
(
    `id_abstract_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_tax_set` INTEGER,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_abstract_product`),
    UNIQUE INDEX `spy_abstract_product_u_8438f4` (`sku`),
    INDEX `spy_abstract_product_fi_643ea0` (`fk_tax_set`),
    CONSTRAINT `spy_abstract_product_fk_643ea0`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_abstract_product_localized_attributes`
(
    `id_abstract_attributes` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_abstract_product` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `attributes` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_abstract_attributes`),
    UNIQUE INDEX `spy_abstract_product_localized_attributes_u_2846a2` (`fk_abstract_product`, `fk_locale`),
    INDEX `spy_abstract_product_localized_attributes_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_abstract_product_localized_attributes_fk_ac5f14`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `spy_abstract_product_localized_attributes_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product`
(
    `id_product` INTEGER NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    `attributes` TEXT NOT NULL,
    `fk_abstract_product` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_product`),
    UNIQUE INDEX `spy_product_u_8438f4` (`sku`),
    INDEX `spy_product_fi_ac5f14` (`fk_abstract_product`),
    CONSTRAINT `spy_product_fk_ac5f14`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_localized_attributes`
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
    UNIQUE INDEX `spy_product_localized_attributes_u_9c44e0` (`fk_product`, `fk_locale`),
    INDEX `spy_product_localized_attributes_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_product_localized_attributes_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_localized_attributes_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_to_bundle`
(
    `fk_product` INTEGER NOT NULL,
    `fk_related_product` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product`,`fk_related_product`),
    INDEX `spy_product_to_bundle_fi_613fa5` (`fk_related_product`),
    CONSTRAINT `spy_product_to_bundle_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_product_to_bundle_fk_613fa5`
        FOREIGN KEY (`fk_related_product`)
        REFERENCES `spy_product` (`id_product`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_attributes_metadata`
(
    `id_attributes_metadata` INTEGER NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255) NOT NULL,
    `is_editable` TINYINT(1) DEFAULT 1 NOT NULL,
    `fk_type` INTEGER,
    PRIMARY KEY (`id_attributes_metadata`),
    INDEX `spy_attributes_metadata_fi_1b21d9` (`fk_type`),
    CONSTRAINT `spy_attributes_metadata_fk_1b21d9`
        FOREIGN KEY (`fk_type`)
        REFERENCES `spy_attribute_type` (`id_type`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_attribute_type`
(
    `id_type` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `fk_parent_type` INTEGER,
    `input_representation` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_type`),
    INDEX `spy_attribute_type_fi_7e047a` (`fk_parent_type`),
    CONSTRAINT `spy_attribute_type_fk_7e047a`
        FOREIGN KEY (`fk_parent_type`)
        REFERENCES `spy_attribute_type` (`id_type`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_attribute_type_value`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_type` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255) NOT NULL,
    `fk_locale` INTEGER,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `spy_attribute_type_value_u_d8484c` (`fk_locale`, `fk_type`, `key`),
    CONSTRAINT `spy_attribute_type_value_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_category`
(
    `id_product_category` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_abstract_product` INTEGER NOT NULL,
    `fk_category` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_category`),
    UNIQUE INDEX `spy_product_category_u_4a2f6b` (`fk_abstract_product`, `fk_category`),
    INDEX `spy_product_category_fi_723c48` (`fk_category`),
    CONSTRAINT `spy_product_category_fk_723c48`
        FOREIGN KEY (`fk_category`)
        REFERENCES `spy_category` (`id_category`),
    CONSTRAINT `spy_product_category_fk_ac5f14`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_type`
(
    `id_product_option_type` INTEGER NOT NULL AUTO_INCREMENT,
    `import_key` VARCHAR(255),
    `fk_tax_set` INTEGER,
    PRIMARY KEY (`id_product_option_type`),
    UNIQUE INDEX `spy_product_option_type_u_0497cd` (`import_key`),
    INDEX `spy_product_option_type_fi_643ea0` (`fk_tax_set`),
    CONSTRAINT `spy_product_option_type_fk_643ea0`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_value`
(
    `id_product_option_value` INTEGER NOT NULL AUTO_INCREMENT,
    `import_key` VARCHAR(255),
    `fk_product_option_type` INTEGER NOT NULL,
    `fk_product_option_value_price` INTEGER,
    PRIMARY KEY (`id_product_option_value`),
    UNIQUE INDEX `spy_product_option_value_u_0497cd` (`import_key`),
    INDEX `spy_product_option_value_fi_138fad` (`fk_product_option_type`),
    INDEX `spy_product_option_value_fi_8ac688` (`fk_product_option_value_price`),
    CONSTRAINT `spy_product_option_value_fk_138fad`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_fk_8ac688`
        FOREIGN KEY (`fk_product_option_value_price`)
        REFERENCES `spy_product_option_value_price` (`id_product_option_value_price`)
        ON DELETE SET NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_value_price`
(
    `id_product_option_value_price` INTEGER NOT NULL AUTO_INCREMENT,
    `price` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_value_price`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_value_translation`
(
    `name` VARCHAR(255) NOT NULL,
    `fk_product_option_value` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_value`,`fk_locale`),
    INDEX `spy_product_option_value_translation_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_product_option_value_translation_fk_57e769`
        FOREIGN KEY (`fk_product_option_value`)
        REFERENCES `spy_product_option_value` (`id_product_option_value`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_translation_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_type_translation`
(
    `name` VARCHAR(255) NOT NULL,
    `fk_product_option_type` INTEGER NOT NULL,
    `fk_locale` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_type`,`fk_locale`),
    INDEX `spy_product_option_type_translation_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_product_option_type_translation_fk_138fad`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_translation_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_type_usage`
(
    `id_product_option_type_usage` INTEGER NOT NULL AUTO_INCREMENT,
    `is_optional` INTEGER NOT NULL,
    `sequence` INTEGER,
    `fk_product` INTEGER NOT NULL,
    `fk_product_option_type` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_type_usage`),
    INDEX `spy_product_option_type_usage_fi_831c22` (`fk_product`),
    INDEX `spy_product_option_type_usage_fi_138fad` (`fk_product_option_type`),
    CONSTRAINT `spy_product_option_type_usage_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_usage_fk_138fad`
        FOREIGN KEY (`fk_product_option_type`)
        REFERENCES `spy_product_option_type` (`id_product_option_type`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_value_usage`
(
    `id_product_option_value_usage` INTEGER NOT NULL AUTO_INCREMENT,
    `sequence` INTEGER,
    `fk_product_option_type_usage` INTEGER NOT NULL,
    `fk_product_option_value` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_value_usage`),
    INDEX `spy_product_option_value_usage_fi_983493` (`fk_product_option_type_usage`),
    INDEX `spy_product_option_value_usage_fi_57e769` (`fk_product_option_value`),
    CONSTRAINT `spy_product_option_value_usage_fk_983493`
        FOREIGN KEY (`fk_product_option_type_usage`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_usage_fk_57e769`
        FOREIGN KEY (`fk_product_option_value`)
        REFERENCES `spy_product_option_value` (`id_product_option_value`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_type_usage_exclusion`
(
    `fk_product_option_type_usage_a` INTEGER NOT NULL,
    `fk_product_option_type_usage_b` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_type_usage_a`,`fk_product_option_type_usage_b`),
    INDEX `spy_product_option_type_usage_exclusion_fi_d2377d` (`fk_product_option_type_usage_b`),
    CONSTRAINT `spy_product_option_type_usage_exclusion_fk_91276b`
        FOREIGN KEY (`fk_product_option_type_usage_a`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_type_usage_exclusion_fk_d2377d`
        FOREIGN KEY (`fk_product_option_type_usage_b`)
        REFERENCES `spy_product_option_type_usage` (`id_product_option_type_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_value_usage_constraint`
(
    `fk_product_option_value_usage_a` INTEGER NOT NULL,
    `fk_product_option_value_usage_b` INTEGER NOT NULL,
    `operator` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`fk_product_option_value_usage_a`,`fk_product_option_value_usage_b`),
    INDEX `spy_product_option_value_usage_constraint_fi_336f1e` (`fk_product_option_value_usage_b`),
    CONSTRAINT `spy_product_option_value_usage_constraint_fk_0a43c9`
        FOREIGN KEY (`fk_product_option_value_usage_a`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_value_usage_constraint_fk_336f1e`
        FOREIGN KEY (`fk_product_option_value_usage_b`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_configuration_preset`
(
    `id_product_option_configuration_preset` INTEGER NOT NULL AUTO_INCREMENT,
    `is_default` TINYINT(1) NOT NULL,
    `sequence` INTEGER,
    `fk_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_product_option_configuration_preset`),
    INDEX `spy_product_option_configuration_preset_fi_831c22` (`fk_product`),
    CONSTRAINT `spy_product_option_configuration_preset_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_option_configuration_preset_value`
(
    `fk_product_option_configuration_preset` INTEGER NOT NULL,
    `fk_product_option_value_usage` INTEGER NOT NULL,
    PRIMARY KEY (`fk_product_option_configuration_preset`,`fk_product_option_value_usage`),
    INDEX `spy_product_option_configuration_preset_value_fi_03ff86` (`fk_product_option_value_usage`),
    CONSTRAINT `spy_product_option_configuration_preset_value_fk_acef2b`
        FOREIGN KEY (`fk_product_option_configuration_preset`)
        REFERENCES `spy_product_option_configuration_preset` (`id_product_option_configuration_preset`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_product_option_configuration_preset_value_fk_03ff86`
        FOREIGN KEY (`fk_product_option_value_usage`)
        REFERENCES `spy_product_option_value_usage` (`id_product_option_value_usage`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_product_search_attributes_operation`
(
    `source_attribute_id` INTEGER NOT NULL,
    `operation` VARCHAR(255) NOT NULL,
    `target_field` VARCHAR(255) NOT NULL,
    `weighting` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`source_attribute_id`,`operation`,`target_field`),
    INDEX `spy_product_search_attributes_operation_i_635bae` (`source_attribute_id`, `weighting`),
    CONSTRAINT `spy_product_search_attributes_operation_fk_f2400a`
        FOREIGN KEY (`source_attribute_id`)
        REFERENCES `spy_attributes_metadata` (`id_attributes_metadata`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_searchable_products`
(
    `searchable_id` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_locale` INTEGER,
    `is_searchable` TINYINT(1) DEFAULT 1,
    PRIMARY KEY (`searchable_id`),
    INDEX `spy_searchable_products_fi_831c22` (`fk_product`),
    INDEX `spy_searchable_products_fi_12b6d0` (`fk_locale`),
    CONSTRAINT `spy_searchable_products_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_searchable_products_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_propel_heartbeat`
(
    `heartbeat_check` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`heartbeat_check`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_refund`
(
    `id_refund` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `amount` INTEGER NOT NULL,
    `adjustment_fee` INTEGER,
    `comment` VARCHAR(255),
    `created_at` DATETIME,
    PRIMARY KEY (`id_refund`),
    INDEX `spy_refund_fi_066cc0` (`fk_sales_order`),
    CONSTRAINT `spy_refund_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order`
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
    UNIQUE INDEX `spy_sales_order_u_4b7039` (`order_reference`),
    INDEX `spy_sales_order_fi_29a8ca` (`fk_customer`),
    INDEX `spy_sales_order_fi_2a0126` (`fk_sales_order_address_billing`),
    INDEX `spy_sales_order_fi_844097` (`fk_sales_order_address_shipping`),
    INDEX `spy_sales_order_fi_f9cb11` (`fk_shipment_method`),
    CONSTRAINT `spy_sales_order_fk_29a8ca`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`),
    CONSTRAINT `spy_sales_order_fk_2a0126`
        FOREIGN KEY (`fk_sales_order_address_billing`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order_fk_844097`
        FOREIGN KEY (`fk_sales_order_address_shipping`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order_fk_f9cb11`
        FOREIGN KEY (`fk_shipment_method`)
        REFERENCES `spy_shipment_method` (`id_shipment_method`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_item`
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
    `tax_percentage` INTEGER,
    `quantity` INTEGER DEFAULT 1 NOT NULL COMMENT \'/Quantity ordered for item/\',
    `group_key` VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_item`),
    INDEX `spy_sales_order_item_i_8438f4` (`sku`),
    INDEX `spy_sales_order_item_fi_ff2886` (`fk_refund`),
    INDEX `spy_sales_order_item_fi_066cc0` (`fk_sales_order`),
    INDEX `spy_sales_order_item_fi_d7aa41` (`fk_oms_order_item_state`),
    INDEX `spy_sales_order_item_fi_661a16` (`fk_oms_order_process`),
    INDEX `spy_sales_order_item_fi_174e1f` (`fk_sales_order_item_bundle`),
    CONSTRAINT `spy_sales_order_item_fk_ff2886`
        FOREIGN KEY (`fk_refund`)
        REFERENCES `spy_refund` (`id_refund`),
    CONSTRAINT `spy_sales_order_item_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_order_item_fk_d7aa41`
        FOREIGN KEY (`fk_oms_order_item_state`)
        REFERENCES `spy_oms_order_item_state` (`id_oms_order_item_state`),
    CONSTRAINT `spy_sales_order_item_fk_661a16`
        FOREIGN KEY (`fk_oms_order_process`)
        REFERENCES `spy_oms_order_process` (`id_oms_order_process`),
    CONSTRAINT `spy_sales_order_item_fk_174e1f`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `spy_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_expense`
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
    UNIQUE INDEX `spy_sales_expense_u_db930d` (`fk_sales_order`, `type`),
    INDEX `spy_sales_expense_fi_ff2886` (`fk_refund`),
    CONSTRAINT `spy_sales_expense_fk_ff2886`
        FOREIGN KEY (`fk_refund`)
        REFERENCES `spy_refund` (`id_refund`),
    CONSTRAINT `spy_sales_expense_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_address`
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
    INDEX `spy_sales_order_address_fi_28d90b` (`fk_country`),
    INDEX `spy_sales_order_address_fi_19f88c` (`fk_region`),
    CONSTRAINT `spy_sales_order_address_fk_28d90b`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_sales_order_address_fk_19f88c`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_address_history`
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
    INDEX `spy_sales_order_address_history_fi_28d90b` (`fk_country`),
    INDEX `spy_sales_order_address_history_fi_9ee4dc` (`fk_sales_order_address`),
    INDEX `spy_sales_order_address_history_fi_19f88c` (`fk_region`),
    CONSTRAINT `spy_sales_order_address_history_fk_28d90b`
        FOREIGN KEY (`fk_country`)
        REFERENCES `spy_country` (`id_country`),
    CONSTRAINT `spy_sales_order_address_history_fk_9ee4dc`
        FOREIGN KEY (`fk_sales_order_address`)
        REFERENCES `spy_sales_order_address` (`id_sales_order_address`),
    CONSTRAINT `spy_sales_order_address_history_fk_19f88c`
        FOREIGN KEY (`fk_region`)
        REFERENCES `spy_region` (`id_region`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_item_option`
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
    INDEX `spy_sales_order_item_option_fi_d4f62a` (`fk_sales_order_item`),
    CONSTRAINT `spy_sales_order_item_option_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_note`
(
    `id_sales_order_note` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `command` VARCHAR(255) NOT NULL,
    `success` TINYINT(1) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_note`),
    INDEX `spy_sales_order_note_fi_066cc0` (`fk_sales_order`),
    CONSTRAINT `spy_sales_order_note_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_comment`
(
    `id_sales_order_comment` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_sales_order` INTEGER NOT NULL,
    `username` VARCHAR(255),
    `message` TEXT NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id_sales_order_comment`),
    INDEX `spy_sales_order_comment_fi_066cc0` (`fk_sales_order`),
    CONSTRAINT `spy_sales_order_comment_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_discount`
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
    INDEX `spy_sales_discount_fi_066cc0` (`fk_sales_order`),
    INDEX `spy_sales_discount_fi_d4f62a` (`fk_sales_order_item`),
    INDEX `spy_sales_discount_fi_d13812` (`fk_sales_expense`),
    INDEX `spy_sales_discount_fi_bdfa83` (`fk_sales_order_item_option`),
    CONSTRAINT `spy_sales_discount_fk_066cc0`
        FOREIGN KEY (`fk_sales_order`)
        REFERENCES `spy_sales_order` (`id_sales_order`),
    CONSTRAINT `spy_sales_discount_fk_d4f62a`
        FOREIGN KEY (`fk_sales_order_item`)
        REFERENCES `spy_sales_order_item` (`id_sales_order_item`),
    CONSTRAINT `spy_sales_discount_fk_d13812`
        FOREIGN KEY (`fk_sales_expense`)
        REFERENCES `spy_sales_expense` (`id_sales_expense`),
    CONSTRAINT `spy_sales_discount_fk_bdfa83`
        FOREIGN KEY (`fk_sales_order_item_option`)
        REFERENCES `spy_sales_order_item_option` (`id_sales_order_item_option`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_discount_code`
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
    INDEX `spy_sales_discount_code_fi_9a83ea` (`fk_sales_discount`),
    CONSTRAINT `spy_sales_discount_code_fk_9a83ea`
        FOREIGN KEY (`fk_sales_discount`)
        REFERENCES `spy_sales_discount` (`id_sales_discount`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sales_order_item_bundle`
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

CREATE TABLE IF NOT EXISTS `spy_sales_order_item_bundle_item`
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
    INDEX `spy_sales_order_item_bundle_item_fi_174e1f` (`fk_sales_order_item_bundle`),
    CONSTRAINT `spy_sales_order_item_bundle_item_fk_174e1f`
        FOREIGN KEY (`fk_sales_order_item_bundle`)
        REFERENCES `spy_sales_order_item_bundle` (`id_sales_order_item_bundle`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_search_page_element`
(
    `id_search_page_element` INTEGER NOT NULL AUTO_INCREMENT,
    `element_key` VARCHAR(255) NOT NULL,
    `is_element_active` TINYINT(1) DEFAULT 0 NOT NULL,
    `fk_search_document_attribute` INTEGER NOT NULL,
    `fk_search_page_element_template` INTEGER NOT NULL,
    PRIMARY KEY (`id_search_page_element`),
    UNIQUE INDEX `spy_search_page_element_u_0815d3` (`element_key`),
    INDEX `spy_search_page_element_fi_144c6a` (`fk_search_document_attribute`),
    INDEX `spy_search_page_element_fi_21a5bf` (`fk_search_page_element_template`),
    CONSTRAINT `spy_search_page_element_fk_144c6a`
        FOREIGN KEY (`fk_search_document_attribute`)
        REFERENCES `spy_search_document_attribute` (`id_search_document_attribute`),
    CONSTRAINT `spy_search_page_element_fk_21a5bf`
        FOREIGN KEY (`fk_search_page_element_template`)
        REFERENCES `spy_search_page_element_template` (`id_search_page_element_template`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_search_document_attribute`
(
    `id_search_document_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `attribute_name` VARCHAR(255) NOT NULL,
    `attribute_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_document_attribute`),
    UNIQUE INDEX `spy_search_document_attribute_u_b8d4bd` (`attribute_name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_search_page_element_template`
(
    `id_search_page_element_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_page_element_template`),
    UNIQUE INDEX `spy_search_page_element_template_u_832ec3` (`template_name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_sequence_number`
(
    `id_sequence_number` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `current_id` INTEGER NOT NULL,
    PRIMARY KEY (`id_sequence_number`),
    UNIQUE INDEX `spy_sequence_number_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_shipment_carrier`
(
    `id_shipment_carrier` INTEGER NOT NULL AUTO_INCREMENT,
    `glossary_key_name` VARCHAR(255),
    `name` VARCHAR(255) NOT NULL,
    `is_active` TINYINT(1) DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id_shipment_carrier`),
    INDEX `spy_shipment_carrier_i_530ee5` (`is_active`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_shipment_method`
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
    INDEX `spy_shipment_method_i_530ee5` (`is_active`),
    INDEX `spy_shipment_method_fi_2a5317` (`fk_shipment_carrier`),
    INDEX `spy_shipment_method_fi_643ea0` (`fk_tax_set`),
    CONSTRAINT `spy_shipment_method_fk_2a5317`
        FOREIGN KEY (`fk_shipment_carrier`)
        REFERENCES `spy_shipment_carrier` (`id_shipment_carrier`),
    CONSTRAINT `spy_shipment_method_fk_643ea0`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_stock`
(
    `id_stock` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_stock`),
    UNIQUE INDEX `spy_stock_u_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_stock_product`
(
    `id_stock_product` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER NOT NULL,
    `fk_stock` INTEGER NOT NULL,
    `quantity` INTEGER DEFAULT 0,
    `is_never_out_of_stock` TINYINT(1) DEFAULT 0,
    PRIMARY KEY (`id_stock_product`),
    UNIQUE INDEX `spy_stock_product_u_9da627` (`fk_stock`, `fk_product`),
    INDEX `spy_stock_product_fi_831c22` (`fk_product`),
    CONSTRAINT `spy_stock_product_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_stock_product_fk_054e18`
        FOREIGN KEY (`fk_stock`)
        REFERENCES `spy_stock` (`id_stock`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_tax_set`
(
    `id_tax_set` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_tax_set`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_tax_rate`
(
    `id_tax_rate` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL,
    PRIMARY KEY (`id_tax_rate`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_tax_set_tax`
(
    `fk_tax_set` INTEGER NOT NULL,
    `fk_tax_rate` INTEGER NOT NULL,
    PRIMARY KEY (`fk_tax_set`,`fk_tax_rate`),
    INDEX `spy_tax_set_tax_fi_502d4f` (`fk_tax_rate`),
    CONSTRAINT `spy_tax_set_tax_fk_643ea0`
        FOREIGN KEY (`fk_tax_set`)
        REFERENCES `spy_tax_set` (`id_tax_set`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_tax_set_tax_fk_502d4f`
        FOREIGN KEY (`fk_tax_rate`)
        REFERENCES `spy_tax_rate` (`id_tax_rate`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_touch`
(
    `id_touch` INTEGER NOT NULL AUTO_INCREMENT,
    `item_type` VARCHAR(255) NOT NULL,
    `item_event` TINYINT NOT NULL,
    `item_id` INTEGER NOT NULL,
    `touched` DATETIME NOT NULL,
    PRIMARY KEY (`id_touch`),
    UNIQUE INDEX `spy_touch_u_6689b0` (`item_id`, `item_event`, `item_type`),
    INDEX `spy_touch_i_da8410` (`touched`),
    INDEX `spy_touch_i_9255dc` (`item_id`),
    INDEX `spy_touch_i_df6cb6` (`item_type`),
    INDEX `spy_touch_i_b02e54` (`item_event`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_touch_storage`
(
    `id_touch_storage` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `fk_touch` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_touch_storage`),
    UNIQUE INDEX `spy_touch_storage_u_4ab403` (`fk_locale`, `key`),
    INDEX `spy_touch_storage_i_b0eafe` (`key`),
    INDEX `spy_touch_storage_fi_4baddf` (`fk_touch`),
    CONSTRAINT `spy_touch_storage_fk_4baddf`
        FOREIGN KEY (`fk_touch`)
        REFERENCES `spy_touch` (`id_touch`),
    CONSTRAINT `spy_touch_storage_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_touch_search`
(
    `id_touch_search` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_locale` INTEGER NOT NULL,
    `fk_touch` INTEGER NOT NULL,
    `key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_touch_search`),
    UNIQUE INDEX `spy_touch_search_u_4ab403` (`fk_locale`, `key`),
    INDEX `spy_touch_search_i_b0eafe` (`key`),
    INDEX `spy_touch_search_fi_4baddf` (`fk_touch`),
    CONSTRAINT `spy_touch_search_fk_4baddf`
        FOREIGN KEY (`fk_touch`)
        REFERENCES `spy_touch` (`id_touch`),
    CONSTRAINT `spy_touch_search_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_url`
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
    INDEX `spy_url_fi_f0e4d1` (`fk_resource_categorynode`),
    INDEX `spy_url_fi_9f93b4` (`fk_resource_page`),
    INDEX `spy_url_fi_1ffeb5` (`fk_resource_abstract_product`),
    INDEX `spy_url_fi_12b6d0` (`fk_locale`),
    INDEX `spy_url_fi_823f87` (`fk_resource_redirect`),
    CONSTRAINT `spy_url_fk_f0e4d1`
        FOREIGN KEY (`fk_resource_categorynode`)
        REFERENCES `spy_category_node` (`id_category_node`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url_fk_9f93b4`
        FOREIGN KEY (`fk_resource_page`)
        REFERENCES `spy_cms_page` (`id_cms_page`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url_fk_1ffeb5`
        FOREIGN KEY (`fk_resource_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url_fk_12b6d0`
        FOREIGN KEY (`fk_locale`)
        REFERENCES `spy_locale` (`id_locale`)
        ON DELETE CASCADE,
    CONSTRAINT `spy_url_fk_823f87`
        FOREIGN KEY (`fk_resource_redirect`)
        REFERENCES `spy_redirect` (`id_redirect`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_redirect`
(
    `id_redirect` INTEGER NOT NULL AUTO_INCREMENT,
    `to_url` VARCHAR(255) NOT NULL,
    `status` INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY (`id_redirect`),
    INDEX `spy_redirect_i_44a5e4` (`to_url`, `status`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_user`
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
    UNIQUE INDEX `spy_user_u_f86ef3` (`username`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_wishlist`
(
    `id_wishlist` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_customer` INTEGER NOT NULL,
    PRIMARY KEY (`id_wishlist`),
    UNIQUE INDEX `spy_wishlist_u_48916d` (`fk_customer`),
    CONSTRAINT `spy_wishlist_fk_29a8ca`
        FOREIGN KEY (`fk_customer`)
        REFERENCES `spy_customer` (`id_customer`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_wishlist_item`
(
    `id_wishlist_item` INTEGER NOT NULL AUTO_INCREMENT,
    `fk_product` INTEGER,
    `fk_wishlist` INTEGER NOT NULL,
    `quantity` INTEGER NOT NULL,
    `added_at` DATETIME NOT NULL,
    `group_key` VARCHAR(255),
    `fk_abstract_product` INTEGER NOT NULL,
    PRIMARY KEY (`id_wishlist_item`),
    INDEX `spy_wishlist_item_fi_4eb102` (`fk_wishlist`),
    INDEX `spy_wishlist_item_fi_831c22` (`fk_product`),
    INDEX `spy_wishlist_item_fi_ac5f14` (`fk_abstract_product`),
    CONSTRAINT `spy_wishlist_item_fk_4eb102`
        FOREIGN KEY (`fk_wishlist`)
        REFERENCES `spy_wishlist` (`id_wishlist`),
    CONSTRAINT `spy_wishlist_item_fk_831c22`
        FOREIGN KEY (`fk_product`)
        REFERENCES `spy_product` (`id_product`),
    CONSTRAINT `spy_wishlist_item_fk_ac5f14`
        FOREIGN KEY (`fk_abstract_product`)
        REFERENCES `spy_abstract_product` (`id_abstract_product`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_role_archive`
(
    `id_acl_role` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_acl_role`),
    INDEX `spy_acl_role_archive_i_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_rule_archive`
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
    INDEX `spy_acl_rule_fi_4e4ee0` (`fk_acl_role`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_acl_group_archive`
(
    `id_acl_group` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_acl_group`),
    INDEX `spy_acl_group_archive_i_d94269` (`name`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_auth_reset_password_archive`
(
    `id_auth_reset_password` INTEGER NOT NULL,
    `fk_user` INTEGER NOT NULL,
    `code` VARCHAR(35) NOT NULL,
    `status` TINYINT(10) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `archived_at` DATETIME,
    PRIMARY KEY (`id_auth_reset_password`,`fk_user`),
    INDEX `spy_auth_reset_password_fi_f93f9c` (`fk_user`),
    INDEX `spy_auth_reset_password_archive_i_4db226` (`code`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `spy_user_archive`
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
