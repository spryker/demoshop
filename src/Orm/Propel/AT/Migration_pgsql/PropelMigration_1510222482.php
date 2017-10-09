<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1510222482.
 * Generated on 2017-11-09 10:14:42 by vagrant
 */
class PropelMigration_1510222482
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
BEGIN;

CREATE SEQUENCE "spy_cms_block_product_connector_pk_seq";

CREATE TABLE "spy_cms_block_product_connector"
(
    "id_cms_block_product_connector" INTEGER NOT NULL,
    "fk_cms_block" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    PRIMARY KEY ("id_cms_block_product_connector")
);

CREATE INDEX "spy_cms_block_product_connector-fk_cms_block" ON "spy_cms_block_product_connector" ("fk_cms_block");

CREATE INDEX "spy_cms_block_product_connector-fk_product_abstract" ON "spy_cms_block_product_connector" ("fk_product_abstract");

CREATE SEQUENCE "spy_acl_role_pk_seq";

CREATE TABLE "spy_acl_role"
(
    "id_acl_role" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_role"),
    CONSTRAINT "spy_acl_role-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_acl_rule_pk_seq";

CREATE TABLE "spy_acl_rule"
(
    "id_acl_rule" INTEGER NOT NULL,
    "fk_acl_role" INTEGER NOT NULL,
    "bundle" VARCHAR(45) NOT NULL,
    "controller" VARCHAR(45) NOT NULL,
    "action" VARCHAR(45) NOT NULL,
    "type" INT2 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_rule")
);

CREATE SEQUENCE "spy_acl_group_pk_seq";

CREATE TABLE "spy_acl_group"
(
    "id_acl_group" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_group"),
    CONSTRAINT "spy_acl_group-name" UNIQUE ("name")
);

CREATE TABLE "spy_acl_user_has_group"
(
    "fk_user" INTEGER NOT NULL,
    "fk_acl_group" INTEGER NOT NULL,
    PRIMARY KEY ("fk_user","fk_acl_group")
);

CREATE TABLE "spy_acl_groups_has_roles"
(
    "fk_acl_role" INTEGER NOT NULL,
    "fk_acl_group" INTEGER NOT NULL,
    PRIMARY KEY ("fk_acl_role","fk_acl_group")
);

CREATE SEQUENCE "spy_auth_reset_password_pk_seq";

CREATE TABLE "spy_auth_reset_password"
(
    "id_auth_reset_password" INTEGER NOT NULL,
    "fk_user" INTEGER NOT NULL,
    "code" VARCHAR(35) NOT NULL,
    "status" INT2 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_auth_reset_password","fk_user"),
    CONSTRAINT "spy_auth_reset_password-code" UNIQUE ("code")
);

CREATE SEQUENCE "spy_availability_abstract_pk_seq";

CREATE TABLE "spy_availability_abstract"
(
    "id_availability_abstract" INTEGER NOT NULL,
    "abstract_sku" VARCHAR(255) NOT NULL,
    "quantity" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("id_availability_abstract"),
    CONSTRAINT "spy_availability_abstract-sku" UNIQUE ("abstract_sku")
);

CREATE SEQUENCE "spy_availability_pk_seq";

CREATE TABLE "spy_availability"
(
    "id_availability" INTEGER NOT NULL,
    "fk_availability_abstract" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "quantity" INTEGER NOT NULL,
    "is_never_out_of_stock" BOOLEAN DEFAULT \'f\',
    PRIMARY KEY ("id_availability"),
    CONSTRAINT "spy_availability-sku" UNIQUE ("sku")
);

CREATE SEQUENCE "spy_payment_braintree_pk_seq";

CREATE TABLE "spy_payment_braintree"
(
    "id_payment_braintree" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "payment_type" VARCHAR,
    "client_ip" VARCHAR NOT NULL,
    "country_iso2_code" CHAR(2) NOT NULL,
    "city" VARCHAR(255) NOT NULL,
    "street" VARCHAR(255) NOT NULL,
    "zip_code" VARCHAR(15) NOT NULL,
    "email" VARCHAR(255) NOT NULL,
    "language_iso2_code" CHAR(2) NOT NULL,
    "currency_iso3_code" CHAR(3) NOT NULL,
    "transaction_id" VARCHAR(100),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_braintree")
);

CREATE SEQUENCE "spy_payment_braintree_transaction_request_log_pk_seq";

CREATE TABLE "spy_payment_braintree_transaction_request_log"
(
    "id_payment_braintree_transaction_request_log" INTEGER NOT NULL,
    "fk_payment_braintree" INTEGER NOT NULL,
    "transaction_id" VARCHAR NOT NULL,
    "transaction_type" VARCHAR,
    "transaction_code" VARCHAR NOT NULL,
    "presentation_amount" VARCHAR,
    "presentation_currency" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_braintree_transaction_request_log")
);

CREATE SEQUENCE "spy_payment_braintree_transaction_status_log_pk_seq";

CREATE TABLE "spy_payment_braintree_transaction_status_log"
(
    "id_payment_braintree_transaction_status_log" INTEGER NOT NULL,
    "fk_payment_braintree" INTEGER NOT NULL,
    "is_success" BOOLEAN NOT NULL,
    "code" INTEGER,
    "message" VARCHAR,
    "transaction_id" VARCHAR NOT NULL,
    "transaction_code" VARCHAR,
    "transaction_type" VARCHAR,
    "transaction_status" VARCHAR,
    "transaction_amount" VARCHAR,
    "merchant_account" VARCHAR,
    "processing_timestamp" VARCHAR,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_braintree_transaction_status_log")
);

CREATE TABLE "spy_payment_braintree_order_item"
(
    "fk_payment_braintree" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("fk_payment_braintree","fk_sales_order_item")
);

CREATE SEQUENCE "spy_category_pk_seq";

CREATE TABLE "spy_category"
(
    "id_category" INTEGER NOT NULL,
    "category_key" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\',
    "is_in_menu" BOOLEAN DEFAULT \'t\',
    "is_clickable" BOOLEAN DEFAULT \'t\',
    "is_searchable" BOOLEAN DEFAULT \'t\',
    "fk_category_template" INTEGER,
    PRIMARY KEY ("id_category"),
    CONSTRAINT "spy_category-category_key" UNIQUE ("category_key")
);

CREATE SEQUENCE "spy_category_attribute_pk_seq";

CREATE TABLE "spy_category_attribute"
(
    "id_category_attribute" INTEGER NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "meta_title" TEXT,
    "meta_description" TEXT,
    "meta_keywords" TEXT,
    "category_image_name" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_category_attribute")
);

CREATE SEQUENCE "spy_category_node_pk_seq";

CREATE TABLE "spy_category_node"
(
    "id_category_node" INTEGER NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "fk_parent_category_node" INTEGER,
    "is_root" BOOLEAN DEFAULT \'f\',
    "is_main" BOOLEAN DEFAULT \'f\',
    "node_order" INTEGER DEFAULT 0,
    PRIMARY KEY ("id_category_node")
);

CREATE INDEX "spy_category_node_i_8f153e" ON "spy_category_node" ("node_order");

CREATE SEQUENCE "spy_category_closure_table_pk_seq";

CREATE TABLE "spy_category_closure_table"
(
    "id_category_closure_table" INTEGER NOT NULL,
    "fk_category_node" INTEGER NOT NULL,
    "fk_category_node_descendant" INTEGER NOT NULL,
    "depth" INTEGER NOT NULL,
    PRIMARY KEY ("id_category_closure_table")
);

CREATE SEQUENCE "spy_category_template_pk_seq";

CREATE TABLE "spy_category_template"
(
    "id_category_template" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "template_path" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_category_template"),
    CONSTRAINT "spy_category_template-template_path" UNIQUE ("template_path")
);

CREATE SEQUENCE "spy_cms_template_pk_seq";

CREATE TABLE "spy_cms_template"
(
    "id_cms_template" INTEGER NOT NULL,
    "template_name" VARCHAR(255) NOT NULL,
    "template_path" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_cms_template"),
    CONSTRAINT "spy_cms_template-unique-template_path" UNIQUE ("template_path")
);

CREATE INDEX "spy_cms_template-template_path" ON "spy_cms_template" ("template_path");

CREATE SEQUENCE "spy_cms_page_pk_seq";

CREATE TABLE "spy_cms_page"
(
    "id_cms_page" INTEGER NOT NULL,
    "fk_template" INTEGER NOT NULL,
    "valid_from" TIMESTAMP,
    "valid_to" TIMESTAMP,
    "is_active" BOOLEAN DEFAULT \'f\' NOT NULL,
    "is_searchable" BOOLEAN DEFAULT \'f\' NOT NULL,
    "page_key" VARCHAR(32),
    PRIMARY KEY ("id_cms_page")
);

CREATE INDEX "spy_cms_page_i_615cb5" ON "spy_cms_page" ("page_key");

CREATE SEQUENCE "spy_cms_page_localized_attributes_pk_seq";

CREATE TABLE "spy_cms_page_localized_attributes"
(
    "id_cms_page_localized_attributes" INTEGER NOT NULL,
    "fk_cms_page" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "meta_title" VARCHAR(255),
    "meta_keywords" TEXT,
    "meta_description" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_page_localized_attributes"),
    CONSTRAINT "spy_cms_page_localized_attributes-unique-fk_cms_page" UNIQUE ("fk_cms_page","fk_locale")
);

CREATE SEQUENCE "spy_cms_glossary_key_mapping_pk_seq";

CREATE TABLE "spy_cms_glossary_key_mapping"
(
    "id_cms_glossary_key_mapping" INTEGER NOT NULL,
    "fk_page" INTEGER NOT NULL,
    "fk_glossary_key" INTEGER NOT NULL,
    "placeholder" VARCHAR NOT NULL,
    PRIMARY KEY ("id_cms_glossary_key_mapping"),
    CONSTRAINT "spy_cms_glossary_key_mapping-unique-fk_page" UNIQUE ("fk_page","placeholder")
);

CREATE INDEX "spy_cms_glossary_key_mapping-fk_page" ON "spy_cms_glossary_key_mapping" ("fk_page","placeholder");

CREATE SEQUENCE "spy_cms_version_pk_seq";

CREATE TABLE "spy_cms_version"
(
    "id_cms_version" INTEGER NOT NULL,
    "fk_cms_page" INTEGER NOT NULL,
    "version" INTEGER NOT NULL,
    "version_name" VARCHAR(255),
    "data" TEXT,
    "fk_user" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_cms_version")
);

CREATE INDEX "spy_cms_version-index-fk_cms_page_version" ON "spy_cms_version" ("fk_cms_page","version");

CREATE SEQUENCE "spy_cms_block_template_pk_seq";

CREATE TABLE "spy_cms_block_template"
(
    "id_cms_block_template" INTEGER NOT NULL,
    "template_name" VARCHAR(255) NOT NULL,
    "template_path" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_cms_block_template"),
    CONSTRAINT "spy_cms_block_template-unique-template_path" UNIQUE ("template_path")
);

CREATE INDEX "spy_cms_block_template-template_path" ON "spy_cms_block_template" ("template_path");

CREATE SEQUENCE "spy_cms_block_glossary_key_mapping_pk_seq";

CREATE TABLE "spy_cms_block_glossary_key_mapping"
(
    "id_cms_block_glossary_key_mapping" INTEGER NOT NULL,
    "fk_cms_block" INTEGER NOT NULL,
    "fk_glossary_key" INTEGER NOT NULL,
    "placeholder" VARCHAR NOT NULL,
    PRIMARY KEY ("id_cms_block_glossary_key_mapping"),
    CONSTRAINT "spy_cms_block_glossary_key_mapping-unique-fk_cms_block" UNIQUE ("fk_cms_block","placeholder")
);

CREATE SEQUENCE "spy_cms_block_pk_seq";

CREATE TABLE "spy_cms_block"
(
    "id_cms_block" INTEGER NOT NULL,
    "fk_template" INTEGER,
    "is_active" BOOLEAN DEFAULT \'f\' NOT NULL,
    "valid_from" TIMESTAMP,
    "valid_to" TIMESTAMP,
    "name" VARCHAR(255) NOT NULL,
    "type" VARCHAR(255),
    "fk_page" INTEGER,
    "value" INTEGER,
    PRIMARY KEY ("id_cms_block"),
    CONSTRAINT "spy_cms_block-name-uq" UNIQUE ("name")
);

COMMENT ON COLUMN "spy_cms_block"."type" IS \'Deprecated\';

COMMENT ON COLUMN "spy_cms_block"."fk_page" IS \'Deprecated\';

COMMENT ON COLUMN "spy_cms_block"."value" IS \'Deprecated\';

CREATE SEQUENCE "spy_cms_block_category_connector_pk_seq";

CREATE TABLE "spy_cms_block_category_connector"
(
    "id_cms_block_category_connector" INTEGER NOT NULL,
    "fk_cms_block" INTEGER NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "fk_category_template" INTEGER NOT NULL,
    "fk_cms_block_category_position" INTEGER,
    PRIMARY KEY ("id_cms_block_category_connector")
);

CREATE INDEX "spy_cms_block_category-connector-fk_cms_block" ON "spy_cms_block_category_connector" ("fk_cms_block");

CREATE INDEX "spy_cms_block_category-connector-fk_category" ON "spy_cms_block_category_connector" ("fk_category");

CREATE SEQUENCE "spy_cms_block_category_position_pk_seq";

CREATE TABLE "spy_cms_block_category_position"
(
    "id_cms_block_category_position" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_cms_block_category_position")
);

CREATE SEQUENCE "spy_country_pk_seq";

CREATE TABLE "spy_country"
(
    "id_country" INTEGER NOT NULL,
    "iso2_code" VARCHAR(2) NOT NULL,
    "iso3_code" VARCHAR(3),
    "name" VARCHAR(255),
    "postal_code_mandatory" BOOLEAN DEFAULT \'f\',
    "postal_code_regex" VARCHAR(500),
    PRIMARY KEY ("id_country"),
    CONSTRAINT "spy_country-iso2_code" UNIQUE ("iso2_code"),
    CONSTRAINT "spy_country-iso3_code" UNIQUE ("iso3_code")
);

CREATE SEQUENCE "spy_region_pk_seq";

CREATE TABLE "spy_region"
(
    "id_region" INTEGER NOT NULL,
    "fk_country" INTEGER,
    "name" VARCHAR(100) NOT NULL,
    "iso2_code" VARCHAR(6) NOT NULL,
    PRIMARY KEY ("id_region"),
    CONSTRAINT "spy_region-iso2_code" UNIQUE ("iso2_code")
);

CREATE SEQUENCE "spy_currency_pk_seq";

CREATE TABLE "spy_currency"
(
    "id_currency" INTEGER NOT NULL,
    "name" VARCHAR(255),
    "code" VARCHAR(5),
    "symbol" VARCHAR(255),
    PRIMARY KEY ("id_currency")
);

CREATE SEQUENCE "spy_customer_pk_seq";

CREATE TABLE "spy_customer"
(
    "id_customer" INTEGER NOT NULL,
    "fk_locale" INTEGER,
    "customer_reference" VARCHAR(255) NOT NULL,
    "email" VARCHAR(255) NOT NULL,
    "salutation" INT2,
    "first_name" VARCHAR(100),
    "last_name" VARCHAR(100),
    "company" VARCHAR(100),
    "gender" INT2,
    "date_of_birth" DATE,
    "password" VARCHAR(255),
    "restore_password_key" VARCHAR(150),
    "restore_password_date" TIMESTAMP,
    "registered" DATE,
    "registration_key" VARCHAR(150),
    "default_billing_address" INTEGER,
    "default_shipping_address" INTEGER,
    "anonymized_at" TIMESTAMP,
    "fk_user" INTEGER,
    "phone" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_customer"),
    CONSTRAINT "spy_customer-customer_reference" UNIQUE ("customer_reference"),
    CONSTRAINT "spy_customer-email" UNIQUE ("email")
);

CREATE SEQUENCE "spy_customer_address_pk_seq";

CREATE TABLE "spy_customer_address"
(
    "id_customer_address" INTEGER NOT NULL,
    "fk_customer" INTEGER NOT NULL,
    "fk_country" INTEGER NOT NULL,
    "fk_region" INTEGER,
    "salutation" INT2,
    "first_name" VARCHAR(100) NOT NULL,
    "last_name" VARCHAR(100) NOT NULL,
    "address1" VARCHAR(255),
    "address2" VARCHAR(255),
    "address3" VARCHAR(255),
    "company" VARCHAR(255),
    "city" VARCHAR(255),
    "zip_code" VARCHAR(15),
    "phone" VARCHAR(255),
    "comment" VARCHAR(255),
    "deleted_at" TIMESTAMP,
    "anonymized_at" TIMESTAMP,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_customer_address")
);

CREATE INDEX "spy_customer_address-fk_customer" ON "spy_customer_address" ("fk_customer");

CREATE SEQUENCE "spy_customer_group_pk_seq";

CREATE TABLE "spy_customer_group"
(
    "id_customer_group" INTEGER NOT NULL,
    "name" VARCHAR(70) NOT NULL,
    "description" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_customer_group"),
    CONSTRAINT "spy_customer-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_customer_group_to_customer_pk_seq";

CREATE TABLE "spy_customer_group_to_customer"
(
    "id_customer_group_to_customer" INTEGER NOT NULL,
    "fk_customer_group" INTEGER NOT NULL,
    "fk_customer" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_customer_group_to_customer"),
    CONSTRAINT "fk_customer_group-fk_customer" UNIQUE ("fk_customer_group","fk_customer")
);

CREATE SEQUENCE "spy_discount_pk_seq";

CREATE TABLE "spy_discount"
(
    "id_discount" INTEGER NOT NULL,
    "fk_discount_voucher_pool" INTEGER,
    "fk_store" INTEGER,
    "display_name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(1024),
    "amount" INTEGER NOT NULL,
    "is_exclusive" BOOLEAN DEFAULT \'f\',
    "is_active" BOOLEAN DEFAULT \'f\',
    "valid_from" TIMESTAMP,
    "valid_to" TIMESTAMP,
    "calculator_plugin" VARCHAR(255),
    "discount_type" VARCHAR(255),
    "decision_rule_query_string" VARCHAR,
    "collector_query_string" VARCHAR,
    "discount_key" VARCHAR(32),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount"),
    CONSTRAINT "spy_discount-unique-display_name" UNIQUE ("display_name"),
    CONSTRAINT "spy_discount-unique-fk_discount_voucher_pool" UNIQUE ("fk_discount_voucher_pool")
);

CREATE INDEX "spy_discount-index-discount_type" ON "spy_discount" ("discount_type");

CREATE INDEX "spy_discount_i_862ce6" ON "spy_discount" ("discount_key");

CREATE SEQUENCE "spy_discount_voucher_pool_pk_seq";

CREATE TABLE "spy_discount_voucher_pool"
(
    "id_discount_voucher_pool" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'f\',
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount_voucher_pool")
);

CREATE SEQUENCE "spy_discount_voucher_pk_seq";

CREATE TABLE "spy_discount_voucher"
(
    "id_discount_voucher" INTEGER NOT NULL,
    "fk_discount_voucher_pool" INTEGER,
    "code" VARCHAR(255) NOT NULL,
    "number_of_uses" INTEGER,
    "max_number_of_uses" INTEGER,
    "is_active" BOOLEAN DEFAULT \'f\',
    "voucher_batch" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount_voucher"),
    CONSTRAINT "spy_discount_voucher-code" UNIQUE ("code")
);

CREATE SEQUENCE "spy_discount_amount_pk_seq";

CREATE TABLE "spy_discount_amount"
(
    "id_discount_amount" INTEGER NOT NULL,
    "fk_currency" INTEGER NOT NULL,
    "fk_discount" INTEGER NOT NULL,
    "gross_amount" INTEGER,
    "net_amount" INTEGER,
    PRIMARY KEY ("id_discount_amount"),
    CONSTRAINT "spy_discount_amount-unique-currency-discount" UNIQUE ("fk_currency","fk_discount")
);

CREATE SEQUENCE "spy_discount_promotion_pk_seq";

CREATE TABLE "spy_discount_promotion"
(
    "id_discount_promotion" INTEGER NOT NULL,
    "fk_discount" INTEGER NOT NULL,
    "abstract_sku" VARCHAR(255) NOT NULL,
    "quantity" INTEGER NOT NULL,
    PRIMARY KEY ("id_discount_promotion")
);

CREATE SEQUENCE "spy_event_behavior_entity_change_pk_seq";

CREATE TABLE "spy_event_behavior_entity_change"
(
    "id_event_behavior_entity_change" INTEGER NOT NULL,
    "data" VARCHAR,
    "process_id" VARCHAR,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_event_behavior_entity_change")
);

CREATE SEQUENCE "spy_glossary_key_pk_seq";

CREATE TABLE "spy_glossary_key"
(
    "id_glossary_key" INTEGER NOT NULL,
    "key" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    PRIMARY KEY ("id_glossary_key"),
    CONSTRAINT "spy_glossary_key-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_glossary_key-index-key" ON "spy_glossary_key" ("key");

CREATE INDEX "spy_glossary_key-is_active" ON "spy_glossary_key" ("is_active");

CREATE SEQUENCE "spy_glossary_translation_pk_seq";

CREATE TABLE "spy_glossary_translation"
(
    "id_glossary_translation" INTEGER NOT NULL,
    "fk_glossary_key" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "value" TEXT NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    PRIMARY KEY ("id_glossary_translation"),
    CONSTRAINT "spy_glossary_translation-unique-fk_glossary_key" UNIQUE ("fk_glossary_key","fk_locale")
);

CREATE INDEX "spy_glossary_translation-index-fk_locale" ON "spy_glossary_translation" ("fk_locale");

CREATE INDEX "spy_glossary_translation-is_active" ON "spy_glossary_translation" ("is_active");

CREATE SEQUENCE "spy_locale_pk_seq";

CREATE TABLE "spy_locale"
(
    "id_locale" INTEGER NOT NULL,
    "locale_name" VARCHAR(5) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    PRIMARY KEY ("id_locale"),
    CONSTRAINT "spy_locale-unique-locale_name" UNIQUE ("locale_name")
);

CREATE INDEX "spy_locale-index-locale_name" ON "spy_locale" ("locale_name");

CREATE SEQUENCE "spy_navigation_pk_seq";

CREATE TABLE "spy_navigation"
(
    "id_navigation" INTEGER NOT NULL,
    "key" VARCHAR(255) NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_navigation"),
    CONSTRAINT "spy_navigation_key-unique-key" UNIQUE ("key")
);

CREATE INDEX "spy_navigation-index-key" ON "spy_navigation" ("key");

CREATE INDEX "spy_navigation-index-is_active" ON "spy_navigation" ("is_active");

CREATE SEQUENCE "spy_navigation_node_pk_seq";

CREATE TABLE "spy_navigation_node"
(
    "id_navigation_node" INTEGER NOT NULL,
    "fk_navigation" INTEGER NOT NULL,
    "fk_parent_navigation_node" INTEGER,
    "node_type" VARCHAR(255),
    "position" INTEGER,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "valid_from" TIMESTAMP,
    "valid_to" TIMESTAMP,
    "node_key" VARCHAR(32),
    PRIMARY KEY ("id_navigation_node")
);

CREATE INDEX "spy_navigation_node_i_ba7161" ON "spy_navigation_node" ("position");

CREATE INDEX "spy_navigation_node_i_576b1b" ON "spy_navigation_node" ("node_key");

CREATE SEQUENCE "spy_navigation_node_localized_attributes_pk_seq";

CREATE TABLE "spy_navigation_node_localized_attributes"
(
    "id_navigation_node_localized_attributes" INTEGER NOT NULL,
    "fk_navigation_node" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_url" INTEGER,
    "title" VARCHAR(255) NOT NULL,
    "link" VARCHAR(255),
    "external_url" VARCHAR(255),
    "css_class" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_navigation_node_localized_attributes")
);

CREATE SEQUENCE "spy_newsletter_subscriber_pk_seq";

CREATE TABLE "spy_newsletter_subscriber"
(
    "id_newsletter_subscriber" INTEGER NOT NULL,
    "fk_customer" INTEGER,
    "email" VARCHAR(255) NOT NULL,
    "subscriber_key" VARCHAR(150),
    "is_confirmed" BOOLEAN DEFAULT \'f\' NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_newsletter_subscriber"),
    CONSTRAINT "spy_newsletter_subscriber-unique-email" UNIQUE ("email"),
    CONSTRAINT "spy_newsletter_subscriber-unique-subscriber_key" UNIQUE ("subscriber_key")
);

CREATE INDEX "spy_newsletter_subscriber-index-email" ON "spy_newsletter_subscriber" ("email");

CREATE INDEX "spy_newsletter_subscriber-index-subscriber_key" ON "spy_newsletter_subscriber" ("subscriber_key");

CREATE SEQUENCE "spy_newsletter_type_pk_seq";

CREATE TABLE "spy_newsletter_type"
(
    "id_newsletter_type" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_newsletter_type"),
    CONSTRAINT "spy_newsletter_type-unique-name" UNIQUE ("name")
);

CREATE INDEX "spy_newsletter_type-index-name" ON "spy_newsletter_type" ("name");

CREATE TABLE "spy_newsletter_subscription"
(
    "fk_newsletter_subscriber" INTEGER NOT NULL,
    "fk_newsletter_type" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("fk_newsletter_subscriber","fk_newsletter_type")
);

CREATE SEQUENCE "spy_nopayment_paid_pk_seq";

CREATE TABLE "spy_nopayment_paid"
(
    "id_nopayment_paid" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_nopayment_paid")
);

CREATE SEQUENCE "spy_oms_transition_log_pk_seq";

CREATE TABLE "spy_oms_transition_log"
(
    "id_oms_transition_log" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "quantity" INTEGER,
    "locked" BOOLEAN,
    "fk_oms_order_process" INTEGER,
    "event" VARCHAR(100),
    "hostname" VARCHAR(128) NOT NULL,
    "path" VARCHAR(256),
    "params" TEXT,
    "source_state" VARCHAR(128),
    "target_state" VARCHAR(128),
    "command" VARCHAR,
    "condition" VARCHAR,
    "is_error" BOOLEAN,
    "error_message" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_transition_log")
);

CREATE SEQUENCE "spy_oms_order_process_pk_seq";

CREATE TABLE "spy_oms_order_process"
(
    "id_oms_order_process" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_order_process"),
    CONSTRAINT "spy_oms_order_process-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_oms_state_machine_lock_pk_seq";

CREATE TABLE "spy_oms_state_machine_lock"
(
    "id_oms_state_machine_lock" INTEGER NOT NULL,
    "identifier" VARCHAR(255) NOT NULL,
    "expires" TIMESTAMP NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_state_machine_lock"),
    CONSTRAINT "spy_oms_state_machine_lock-identifier" UNIQUE ("identifier")
);

CREATE SEQUENCE "spy_oms_order_item_state_pk_seq";

CREATE TABLE "spy_oms_order_item_state"
(
    "id_oms_order_item_state" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(255),
    PRIMARY KEY ("id_oms_order_item_state"),
    CONSTRAINT "spy_oms_order_item_state-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_oms_order_item_state_history_pk_seq";

CREATE TABLE "spy_oms_order_item_state_history"
(
    "id_oms_order_item_state_history" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "fk_oms_order_item_state" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_order_item_state_history")
);

CREATE INDEX "spy_oms_order_item_state_history-index-fk_soi-fk_oois-id_ooish" ON "spy_oms_order_item_state_history" ("fk_sales_order_item","fk_oms_order_item_state");

CREATE SEQUENCE "spy_oms_event_timeout_pk_seq";

CREATE TABLE "spy_oms_event_timeout"
(
    "id_oms_event_timeout" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "fk_oms_order_item_state" INTEGER NOT NULL,
    "timeout" TIMESTAMP NOT NULL,
    "event" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_oms_event_timeout"),
    CONSTRAINT "spy_oms_event_timeout-unique-fk_sales_order_item" UNIQUE ("fk_sales_order_item","fk_oms_order_item_state")
);

CREATE INDEX "spy_oms_event_timeout-timeout" ON "spy_oms_event_timeout" ("timeout");

CREATE SEQUENCE "spy_oms_product_reservation_pk_seq";

CREATE TABLE "spy_oms_product_reservation"
(
    "id_oms_product_reservation" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "reservation_quantity" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("id_oms_product_reservation"),
    CONSTRAINT "spy_oms_product_reservation-sku" UNIQUE ("sku")
);

CREATE SEQUENCE "spy_payment_payolution_pk_seq";

CREATE TABLE "spy_payment_payolution"
(
    "id_payment_payolution" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "account_brand" VARCHAR NOT NULL,
    "client_ip" VARCHAR NOT NULL,
    "first_name" VARCHAR(100) NOT NULL,
    "last_name" VARCHAR(100) NOT NULL,
    "salutation" INT2 NOT NULL,
    "gender" INT2 NOT NULL,
    "date_of_birth" DATE,
    "country_iso2_code" CHAR(2) NOT NULL,
    "city" VARCHAR(255) NOT NULL,
    "street" VARCHAR(255) NOT NULL,
    "zip_code" VARCHAR(15) NOT NULL,
    "email" VARCHAR(255) NOT NULL,
    "phone" VARCHAR(255),
    "cell_phone" VARCHAR(255),
    "language_iso2_code" CHAR(2) NOT NULL,
    "currency_iso3_code" CHAR(3) NOT NULL,
    "pre_check_id" VARCHAR(255),
    "installment_calculation_id" VARCHAR(255),
    "installment_amount" INTEGER,
    "installment_duration" INTEGER,
    "bank_account_holder" VARCHAR(100),
    "bank_account_bic" VARCHAR(100),
    "bank_account_iban" VARCHAR(100),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_payolution")
);

CREATE SEQUENCE "spy_payment_payolution_transaction_request_log_pk_seq";

CREATE TABLE "spy_payment_payolution_transaction_request_log"
(
    "id_payment_payolution_transaction_request_log" INTEGER NOT NULL,
    "fk_payment_payolution" INTEGER NOT NULL,
    "transaction_id" VARCHAR NOT NULL,
    "reference_id" VARCHAR,
    "payment_code" VARCHAR NOT NULL,
    "presentation_amount" VARCHAR NOT NULL,
    "presentation_currency" VARCHAR NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_payolution_transaction_request_log")
);

CREATE SEQUENCE "spy_payment_payolution_transaction_status_log_pk_seq";

CREATE TABLE "spy_payment_payolution_transaction_status_log"
(
    "id_payment_payolution_transaction_status_log" INTEGER NOT NULL,
    "fk_payment_payolution" INTEGER NOT NULL,
    "processing_code" VARCHAR NOT NULL,
    "processing_result" VARCHAR NOT NULL,
    "processing_status" VARCHAR NOT NULL,
    "processing_status_code" INTEGER NOT NULL,
    "processing_reason" VARCHAR NOT NULL,
    "processing_reason_code" INTEGER NOT NULL,
    "processing_return" VARCHAR NOT NULL,
    "processing_return_code" VARCHAR NOT NULL,
    "identification_transactionid" VARCHAR NOT NULL,
    "identification_uniqueid" VARCHAR NOT NULL,
    "identification_shortid" VARCHAR NOT NULL,
    "identification_referenceid" VARCHAR,
    "processing_connectordetail_connectortxid1" VARCHAR,
    "processing_connectordetail_paymentreference" VARCHAR,
    "processing_timestamp" VARCHAR NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_payolution_transaction_status_log")
);

CREATE TABLE "spy_payment_payolution_order_item"
(
    "fk_payment_payolution" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("fk_payment_payolution","fk_sales_order_item")
);

CREATE SEQUENCE "spy_price_product_pk_seq";

CREATE TABLE "spy_price_product"
(
    "id_price_product" INTEGER NOT NULL,
    "price" INTEGER DEFAULT 0,
    "fk_product" INTEGER,
    "fk_price_type" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER,
    PRIMARY KEY ("id_price_product"),
    CONSTRAINT "spy_price_product-unique-fk_product_abstract" UNIQUE ("fk_product_abstract","fk_product","fk_price_type")
);

CREATE INDEX "spy_price_product-fk_price_type" ON "spy_price_product" ("fk_price_type");

CREATE INDEX "spy_price_product-index-fk_product-fk_price_type-price" ON "spy_price_product" ("fk_product","fk_price_type","price");

CREATE SEQUENCE "spy_price_type_pk_seq";

CREATE TABLE "spy_price_type"
(
    "id_price_type" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_price_type"),
    CONSTRAINT "spy_price_type-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_product_abstract_pk_seq";

CREATE TABLE "spy_product_abstract"
(
    "new_from" TIMESTAMP,
    "new_to" TIMESTAMP,
    "id_product_abstract" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "attributes" TEXT NOT NULL,
    "fk_tax_set" INTEGER,
    "is_featured" BOOLEAN DEFAULT \'f\',
    "color_code" VARCHAR(8),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_abstract"),
    CONSTRAINT "spy_product_abstract-sku" UNIQUE ("sku")
);

CREATE SEQUENCE "spy_product_abstract_localized_attributes_pk_seq";

CREATE TABLE "spy_product_abstract_localized_attributes"
(
    "id_abstract_attributes" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "description" TEXT,
    "meta_title" VARCHAR(255),
    "meta_keywords" TEXT,
    "meta_description" TEXT,
    "attributes" TEXT NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_abstract_attributes"),
    CONSTRAINT "spy_product_abstract_localized_attributes-unique-fk_product_abs" UNIQUE ("fk_product_abstract","fk_locale")
);

CREATE SEQUENCE "spy_product_pk_seq";

CREATE TABLE "spy_product"
(
    "id_product" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "attributes" TEXT NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product"),
    CONSTRAINT "spy_product-sku" UNIQUE ("sku")
);

CREATE SEQUENCE "spy_product_localized_attributes_pk_seq";

CREATE TABLE "spy_product_localized_attributes"
(
    "id_product_attributes" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "description" TEXT,
    "attributes" TEXT NOT NULL,
    "is_complete" BOOLEAN DEFAULT \'t\',
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_attributes"),
    CONSTRAINT "spy_product_localized_attributes-unique-fk_product" UNIQUE ("fk_product","fk_locale")
);

CREATE SEQUENCE "spy_product_attribute_key_pk_seq";

CREATE TABLE "spy_product_attribute_key"
(
    "id_product_attribute_key" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    "is_super" BOOLEAN DEFAULT \'f\' NOT NULL,
    PRIMARY KEY ("id_product_attribute_key"),
    CONSTRAINT "spy_product_attribute_key-unique-key" UNIQUE ("key")
);

CREATE SEQUENCE "spy_product_management_attribute_pk_seq";

CREATE TABLE "spy_product_management_attribute"
(
    "id_product_management_attribute" INTEGER NOT NULL,
    "fk_product_attribute_key" INTEGER NOT NULL,
    "allow_input" BOOLEAN DEFAULT \'t\' NOT NULL,
    "input_type" VARCHAR NOT NULL,
    PRIMARY KEY ("id_product_management_attribute"),
    CONSTRAINT "spy_pim_attribute-unique-fk_product_attribute_key" UNIQUE ("fk_product_attribute_key")
);

CREATE SEQUENCE "spy_product_management_attribute_value_pk_seq";

CREATE TABLE "spy_product_management_attribute_value"
(
    "id_product_management_attribute_value" INTEGER NOT NULL,
    "fk_product_management_attribute" INTEGER NOT NULL,
    "value" TEXT NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_value")
);

CREATE SEQUENCE "spy_product_management_attribute_value_translation_pk_seq";

CREATE TABLE "spy_product_management_attribute_value_translation"
(
    "id_product_management_attribute_value_translation" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_product_management_attribute_value" INTEGER NOT NULL,
    "translation" TEXT NOT NULL,
    PRIMARY KEY ("id_product_management_attribute_value_translation"),
    CONSTRAINT "spy_pim_attribute_value_translation-unique-locale_attribute_val" UNIQUE ("fk_locale","fk_product_management_attribute_value")
);

CREATE SEQUENCE "spy_product_bundle_pk_seq";

CREATE TABLE "spy_product_bundle"
(
    "id_product_bundle" INTEGER NOT NULL,
    "fk_bundled_product" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "quantity" INTEGER DEFAULT 1 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_bundle")
);

COMMENT ON COLUMN "spy_product_bundle"."fk_bundled_product" IS \'Representation of the single item in this bundle\';

COMMENT ON COLUMN "spy_product_bundle"."fk_product" IS \'Relation to the main bundle product\';

COMMENT ON COLUMN "spy_product_bundle"."quantity" IS \'Number of items bundled. For instance when you have 5000 equal items you will have quantity 5000\';

CREATE INDEX "spy_product_bundle-index-fk_product" ON "spy_product_bundle" ("fk_product");

CREATE SEQUENCE "spy_sales_order_item_bundle_pk_seq";

CREATE TABLE "spy_sales_order_item_bundle"
(
    "id_sales_order_item_bundle" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "image" TEXT,
    "gross_price" INTEGER NOT NULL,
    "net_price" INTEGER DEFAULT 0,
    "price" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_item_bundle")
);

CREATE SEQUENCE "spy_product_category_pk_seq";

CREATE TABLE "spy_product_category"
(
    "id_product_category" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_category" INTEGER NOT NULL,
    "product_order" INTEGER DEFAULT 0,
    PRIMARY KEY ("id_product_category"),
    CONSTRAINT "spy_product_category-unique-fk_product_abstract" UNIQUE ("fk_product_abstract","fk_category")
);

CREATE SEQUENCE "spy_product_group_pk_seq";

CREATE TABLE "spy_product_group"
(
    "id_product_group" INTEGER NOT NULL,
    "product_group_key" VARCHAR(32),
    PRIMARY KEY ("id_product_group")
);

CREATE INDEX "spy_product_group_i_55ec34" ON "spy_product_group" ("product_group_key");

CREATE TABLE "spy_product_abstract_group"
(
    "fk_product_group" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "position" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("fk_product_group","fk_product_abstract")
);

CREATE SEQUENCE "spy_product_image_set_pk_seq";

CREATE TABLE "spy_product_image_set"
(
    "id_product_image_set" INTEGER NOT NULL,
    "name" VARCHAR(255),
    "fk_locale" INTEGER,
    "fk_product" INTEGER,
    "fk_product_abstract" INTEGER,
    "fk_resource_product_set" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_image_set"),
    CONSTRAINT "fk_locale-fk_product-fk_product_abstract" UNIQUE ("fk_locale","fk_product","fk_product_abstract")
);

CREATE INDEX "spy_product_image_set-index-fk_product" ON "spy_product_image_set" ("fk_product");

CREATE INDEX "spy_product_image_set-index-fk_product_abstract" ON "spy_product_image_set" ("fk_product_abstract");

CREATE INDEX "spy_product_image_set-fk_resource_product_set" ON "spy_product_image_set" ("fk_resource_product_set");

CREATE SEQUENCE "spy_product_image_pk_seq";

CREATE TABLE "spy_product_image"
(
    "id_product_image" INTEGER NOT NULL,
    "external_url_small" VARCHAR(2048),
    "external_url_large" VARCHAR(2048),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_image")
);

CREATE SEQUENCE "spy_product_image_set_to_product_image_pk_seq";

CREATE TABLE "spy_product_image_set_to_product_image"
(
    "id_product_image_set_to_product_image" INTEGER NOT NULL,
    "fk_product_image_set" INTEGER NOT NULL,
    "fk_product_image" INTEGER NOT NULL,
    "sort_order" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_image_set_to_product_image"),
    CONSTRAINT "fk_product_image_set-fk_product_image" UNIQUE ("fk_product_image_set","fk_product_image")
);

CREATE SEQUENCE "spy_product_label_pk_seq";

CREATE TABLE "spy_product_label"
(
    "id_product_label" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "is_active" BOOLEAN DEFAULT \'f\' NOT NULL,
    "is_exclusive" BOOLEAN DEFAULT \'f\' NOT NULL,
    "is_published" BOOLEAN DEFAULT \'f\',
    "is_dynamic" BOOLEAN DEFAULT \'f\' NOT NULL,
    "front_end_reference" VARCHAR,
    "valid_from" TIMESTAMP,
    "valid_to" TIMESTAMP,
    "position" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_label"),
    CONSTRAINT "spy_product_label-name" UNIQUE ("name")
);

CREATE INDEX "idx-spy_product_label-position" ON "spy_product_label" ("position");

CREATE SEQUENCE "spy_product_label_localized_attributes_pk_seq";

CREATE TABLE "spy_product_label_localized_attributes"
(
    "id_product_label_localized_attributes" INTEGER NOT NULL,
    "fk_product_label" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR,
    PRIMARY KEY ("id_product_label_localized_attributes"),
    CONSTRAINT "spy_product_label_localized_attributes-fk_product_label-fk_loca" UNIQUE ("fk_product_label","fk_locale")
);

CREATE INDEX "idx-spy_product_label_localized_attributes-fk_product_label" ON "spy_product_label_localized_attributes" ("fk_product_label");

CREATE SEQUENCE "spy_product_label_product_abstract_pk_seq";

CREATE TABLE "spy_product_label_product_abstract"
(
    "id_product_label_product_abstract" INTEGER NOT NULL,
    "fk_product_label" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    PRIMARY KEY ("id_product_label_product_abstract"),
    CONSTRAINT "spy_product_label_product_abstract-fk_product_label-fk_product_" UNIQUE ("fk_product_label","fk_product_abstract")
);

CREATE INDEX "idx-spy_product_label_product_abstract-fk_product_label" ON "spy_product_label_product_abstract" ("fk_product_label");

CREATE INDEX "idx-spy_product_label_product_abstract-fk_product_abstract" ON "spy_product_label_product_abstract" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_option_group_pk_seq";

CREATE TABLE "spy_product_option_group"
(
    "id_product_option_group" INTEGER NOT NULL,
    "fk_tax_set" INTEGER,
    "name" VARCHAR(255),
    "active" BOOLEAN,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_option_group")
);

CREATE TABLE "spy_product_abstract_product_option_group"
(
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_product_option_group" INTEGER NOT NULL,
    PRIMARY KEY ("fk_product_abstract","fk_product_option_group")
);

CREATE SEQUENCE "spy_product_option_value_pk_seq";

CREATE TABLE "spy_product_option_value"
(
    "id_product_option_value" INTEGER NOT NULL,
    "price" INTEGER,
    "sku" VARCHAR(255) NOT NULL,
    "value" VARCHAR(255) NOT NULL,
    "fk_product_option_group" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_option_value"),
    CONSTRAINT "spy_product_option_value-sku" UNIQUE ("sku")
);

CREATE SEQUENCE "spy_product_relation_type_pk_seq";

CREATE TABLE "spy_product_relation_type"
(
    "id_product_relation_type" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation_type")
);

CREATE SEQUENCE "spy_product_relation_pk_seq";

CREATE TABLE "spy_product_relation"
(
    "id_product_relation" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_product_relation_type" INTEGER NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "is_rebuild_scheduled" BOOLEAN DEFAULT \'f\' NOT NULL,
    "query_set_data" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation"),
    CONSTRAINT "spy_product-relation-unique-fk_product_abstract" UNIQUE ("fk_product_abstract","fk_product_relation_type")
);

CREATE SEQUENCE "spy_product_rel_prod_abs_type_pk_seq";

CREATE TABLE "spy_product_relation_product_abstract"
(
    "id_product_relation_product_abstract" INTEGER NOT NULL,
    "fk_product_relation" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "order" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_relation_product_abstract")
);

CREATE SEQUENCE "id_product_review_pk_seq";

CREATE TABLE "spy_product_review"
(
    "id_product_review" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "customer_reference" VARCHAR(255) NOT NULL,
    "rating" INTEGER DEFAULT 0 NOT NULL,
    "summary" TEXT,
    "description" TEXT,
    "nickname" VARCHAR(255),
    "status" INT2 DEFAULT 0 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_review")
);

CREATE INDEX "spy_product_review-fk_product_abstract" ON "spy_product_review" ("fk_product_abstract");

CREATE INDEX "spy_product_review-fk_locale" ON "spy_product_review" ("fk_locale");

CREATE INDEX "spy_product_review-customer_reference" ON "spy_product_review" ("customer_reference");

CREATE SEQUENCE "spy_product_search_pk_seq";

CREATE TABLE "spy_product_search"
(
    "id_product_search" INTEGER NOT NULL,
    "fk_product" INTEGER,
    "fk_locale" INTEGER,
    "is_searchable" BOOLEAN DEFAULT \'t\',
    PRIMARY KEY ("id_product_search")
);

CREATE INDEX "spy_product_search-index-fk-product-fk-locale-is_searchable" ON "spy_product_search" ("fk_product","fk_locale","is_searchable");

CREATE TABLE "spy_product_search_attribute_map"
(
    "fk_product_attribute_key" INTEGER NOT NULL,
    "target_field" VARCHAR NOT NULL,
    "synced" BOOLEAN DEFAULT \'f\',
    PRIMARY KEY ("fk_product_attribute_key","target_field")
);

CREATE INDEX "spy_product_search_attribute_map_i_a1d33d" ON "spy_product_search_attribute_map" ("fk_product_attribute_key");

CREATE SEQUENCE "spy_product_search_attribute_pk_seq";

CREATE TABLE "spy_product_search_attribute"
(
    "id_product_search_attribute" INTEGER NOT NULL,
    "fk_product_attribute_key" INTEGER NOT NULL,
    "filter_type" VARCHAR NOT NULL,
    "position" INTEGER DEFAULT 0 NOT NULL,
    "synced" BOOLEAN DEFAULT \'f\',
    PRIMARY KEY ("id_product_search_attribute"),
    CONSTRAINT "spy_product_search_attribute-unique-fk_product_attribute_key" UNIQUE ("fk_product_attribute_key")
);

CREATE SEQUENCE "spy_product_set_pk_seq";

CREATE TABLE "spy_product_set"
(
    "id_product_set" INTEGER NOT NULL,
    "is_active" BOOLEAN DEFAULT \'f\' NOT NULL,
    "weight" INTEGER DEFAULT 0 NOT NULL,
    "product_set_key" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_set"),
    CONSTRAINT "spy_product_set-product_set_key" UNIQUE ("product_set_key")
);

CREATE SEQUENCE "spy_product_abstract_set_pk_seq";

CREATE TABLE "spy_product_abstract_set"
(
    "id_product_abstract_set" INTEGER NOT NULL,
    "fk_product_set" INTEGER NOT NULL,
    "fk_product_abstract" INTEGER NOT NULL,
    "position" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("id_product_abstract_set"),
    CONSTRAINT "spy_product_abstract_set-unique-fk_product_set" UNIQUE ("fk_product_set","fk_product_abstract")
);

CREATE INDEX "spy_product_abstract_set-fk_product_set" ON "spy_product_abstract_set" ("fk_product_set");

CREATE INDEX "spy_product_abstract_set-fk_product_abstract" ON "spy_product_abstract_set" ("fk_product_abstract");

CREATE SEQUENCE "spy_product_set_data_pk_seq";

CREATE TABLE "spy_product_set_data"
(
    "id_product_set_data" INTEGER NOT NULL,
    "fk_product_set" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "description" TEXT,
    "meta_title" VARCHAR(255),
    "meta_keywords" TEXT,
    "meta_description" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_set_data"),
    CONSTRAINT "spy_product_set_data-unique-fk_product_set" UNIQUE ("fk_product_set","fk_locale")
);

CREATE INDEX "spy_product_set_data-fk_product_set" ON "spy_product_set_data" ("fk_product_set");

CREATE INDEX "spy_product_set_data-fk_locale" ON "spy_product_set_data" ("fk_locale");

CREATE TABLE "spy_propel_heartbeat"
(
    "heartbeat_check" VARCHAR NOT NULL,
    PRIMARY KEY ("heartbeat_check")
);

CREATE SEQUENCE "spy_queue_process_pk_seq";

CREATE TABLE "spy_queue_process"
(
    "id_queue_process" INTEGER NOT NULL,
    "server_id" VARCHAR(255) NOT NULL,
    "process_pid" INTEGER NOT NULL,
    "worker_pid" INTEGER NOT NULL,
    "queue_name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_queue_process"),
    CONSTRAINT "spy_queue_process-unique-key" UNIQUE ("server_id","process_pid","queue_name")
);

CREATE INDEX "spy_queue_process-index-key" ON "spy_queue_process" ("server_id","queue_name");

CREATE SEQUENCE "spy_payment_ratepay_pk_seq";

CREATE TABLE "spy_payment_ratepay"
(
    "id_payment_ratepay" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "payment_type" INT2 NOT NULL,
    "transaction_id" VARCHAR(50),
    "transaction_short_id" VARCHAR(50),
    "result_code" INTEGER,
    "gender" INT2 NOT NULL,
    "date_of_birth" DATE NOT NULL,
    "phone" VARCHAR(32) NOT NULL,
    "ip_address" VARCHAR(50) NOT NULL,
    "customer_allow_credit_inquiry" INTEGER NOT NULL,
    "currency_iso3" VARCHAR(3) NOT NULL,
    "device_fingerprint" VARCHAR(50),
    "debit_pay_type" INT2,
    "installment_total_amount" INTEGER,
    "installment_interest_amount" INTEGER,
    "installment_interest_rate" DOUBLE PRECISION,
    "installment_last_rate" DOUBLE PRECISION,
    "installment_rate" DOUBLE PRECISION,
    "installment_payment_first_day" INTEGER,
    "installment_month" INTEGER,
    "installment_number_rates" INTEGER,
    "installment_calculation_start" VARCHAR(50),
    "installment_service_charge" DOUBLE PRECISION,
    "installment_annual_percentage_rate" DOUBLE PRECISION,
    "installment_month_allowed" INTEGER,
    "bank_account_holder" VARCHAR,
    "bank_account_bic" VARCHAR(100),
    "bank_account_iban" VARCHAR(50),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_ratepay")
);

CREATE SEQUENCE "spy_payment_ratepay_log_pk_seq";

CREATE TABLE "spy_payment_ratepay_log"
(
    "id_payment_ratepay_log" INTEGER NOT NULL,
    "fk_sales_order" INTEGER,
    "message" VARCHAR,
    "payment_method" INT2,
    "request_type" INT2 NOT NULL,
    "request_transaction_id" VARCHAR(50),
    "request_transaction_short_id" VARCHAR(50),
    "request_body" TEXT,
    "response_type" VARCHAR,
    "response_result_code" INTEGER,
    "response_result_text" VARCHAR,
    "response_transaction_id" VARCHAR,
    "response_transaction_short_id" VARCHAR,
    "response_reason_code" INTEGER,
    "response_reason_text" VARCHAR,
    "response_status_code" INTEGER,
    "response_status_text" VARCHAR,
    "response_customer_message" TEXT,
    "item_count" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_payment_ratepay_log")
);

CREATE SEQUENCE "spy_refund_pk_seq";

CREATE TABLE "spy_refund"
(
    "id_refund" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "amount" INTEGER NOT NULL,
    "comment" VARCHAR,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_refund")
);

CREATE SEQUENCE "spy_sales_order_pk_seq";

CREATE TABLE "spy_sales_order"
(
    "customer_reference" VARCHAR(255),
    "id_sales_order" INTEGER NOT NULL,
    "fk_sales_order_address_billing" INTEGER NOT NULL,
    "fk_sales_order_address_shipping" INTEGER NOT NULL,
    "fk_locale" INTEGER,
    "email" VARCHAR(255),
    "salutation" INT2,
    "first_name" VARCHAR(100),
    "last_name" VARCHAR(100),
    "order_reference" VARCHAR(45) NOT NULL,
    "is_test" BOOLEAN DEFAULT \'f\' NOT NULL,
    "store" VARCHAR(255),
    "currency_iso_code" VARCHAR(5),
    "price_mode" INT2,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order"),
    CONSTRAINT "spy_sales_order-order_reference" UNIQUE ("order_reference")
);

CREATE INDEX "spy_sales_order-customer_reference" ON "spy_sales_order" ("customer_reference");

CREATE INDEX "spy_sales_order-store" ON "spy_sales_order" ("store");

CREATE INDEX "spy_sales_order-currency_iso_code" ON "spy_sales_order" ("currency_iso_code");

CREATE SEQUENCE "spy_sales_discount_pk_seq";

CREATE TABLE "spy_sales_discount"
(
    "id_sales_discount" INTEGER NOT NULL,
    "fk_sales_order" INTEGER,
    "fk_sales_order_item" INTEGER,
    "fk_sales_expense" INTEGER,
    "fk_sales_order_item_option" INTEGER,
    "name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(510),
    "display_name" VARCHAR(255) NOT NULL,
    "amount" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_discount")
);

CREATE SEQUENCE "spy_sales_discount_code_pk_seq";

CREATE TABLE "spy_sales_discount_code"
(
    "id_sales_discount_code" INTEGER NOT NULL,
    "fk_sales_discount" INTEGER NOT NULL,
    "code" VARCHAR(255) NOT NULL,
    "codepool_name" VARCHAR(255) NOT NULL,
    "is_reusable" BOOLEAN DEFAULT \'f\',
    "is_once_per_customer" BOOLEAN DEFAULT \'t\',
    "is_refundable" BOOLEAN DEFAULT \'f\',
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_discount_code")
);

CREATE SEQUENCE "spy_sales_order_item_pk_seq";

CREATE TABLE "spy_sales_order_item"
(
    "fk_sales_order_item_bundle" INTEGER,
    "id_sales_order_item" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "fk_oms_order_item_state" INTEGER NOT NULL,
    "fk_oms_order_process" INTEGER,
    "last_state_change" TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "gross_price" INTEGER NOT NULL,
    "canceled_amount" INTEGER DEFAULT 0,
    "tax_rate" NUMERIC(8,2),
    "quantity" INTEGER DEFAULT 1 NOT NULL,
    "group_key" VARCHAR(255),
    "net_price" INTEGER DEFAULT 0,
    "price" INTEGER DEFAULT 0,
    "subtotal_aggregation" INTEGER,
    "tax_amount" INTEGER DEFAULT 0,
    "tax_amount_full_aggregation" INTEGER DEFAULT 0,
    "tax_rate_average_aggregation" NUMERIC(8,2),
    "tax_amount_after_cancellation" INTEGER DEFAULT 0,
    "product_option_price_aggregation" INTEGER DEFAULT 0,
    "expense_price_aggregation" INTEGER DEFAULT 0,
    "discount_amount_aggregation" INTEGER DEFAULT 0,
    "discount_amount_full_aggregation" INTEGER DEFAULT 0,
    "price_to_pay_aggregation" INTEGER DEFAULT 0,
    "refundable_amount" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_item")
);

COMMENT ON COLUMN "spy_sales_order_item"."gross_price" IS \'/price for one unit including tax, without shipping, coupons/\';

COMMENT ON COLUMN "spy_sales_order_item"."quantity" IS \'/Quantity ordered for item/\';

COMMENT ON COLUMN "spy_sales_order_item"."net_price" IS \'/Price for one unit not including tax, without shipping, coupons/\';

COMMENT ON COLUMN "spy_sales_order_item"."price" IS \'/Price for item, can be gross or net price depending on tax mode/\';

COMMENT ON COLUMN "spy_sales_order_item"."subtotal_aggregation" IS \'/Subtotal price amount (item + options + item expenses) before discounts/\';

COMMENT ON COLUMN "spy_sales_order_item"."tax_amount" IS \'/Calculated tax amount based on tax mode/\';

COMMENT ON COLUMN "spy_sales_order_item"."tax_amount_full_aggregation" IS \'/Calculated tax full amount based on tax mode, includes options, item expenses/\';

COMMENT ON COLUMN "spy_sales_order_item"."tax_rate_average_aggregation" IS \'/Calculated tax rate, includes options, item expenses, /\';

COMMENT ON COLUMN "spy_sales_order_item"."tax_amount_after_cancellation" IS \'/Calculated tax full amount based on tax mode, includes options, item expenses, /\';

COMMENT ON COLUMN "spy_sales_order_item"."product_option_price_aggregation" IS \'/Total price amount for item from options/\';

COMMENT ON COLUMN "spy_sales_order_item"."expense_price_aggregation" IS \'/Total price amount for item from item expenses/\';

COMMENT ON COLUMN "spy_sales_order_item"."discount_amount_aggregation" IS \'/Total discount amount for item/\';

COMMENT ON COLUMN "spy_sales_order_item"."discount_amount_full_aggregation" IS \'/Total discount amount for item with options or item expenses/\';

COMMENT ON COLUMN "spy_sales_order_item"."price_to_pay_aggregation" IS \'/Total item price to pay after discounts including options or item expenses/\';

COMMENT ON COLUMN "spy_sales_order_item"."refundable_amount" IS \'/Total item refundable amount/\';

CREATE INDEX "spy_sales_order_item-sku" ON "spy_sales_order_item" ("sku");

CREATE SEQUENCE "spy_sales_order_item_option_pk_seq";

CREATE TABLE "spy_sales_order_item_option"
(
    "id_sales_order_item_option" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "group_name" VARCHAR NOT NULL,
    "value" VARCHAR NOT NULL,
    "gross_price" INTEGER DEFAULT 0 NOT NULL,
    "canceled_amount" INTEGER DEFAULT 0,
    "tax_rate" NUMERIC(8,2) NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "net_price" INTEGER DEFAULT 0,
    "price" INTEGER DEFAULT 0,
    "discount_amount_aggregation" INTEGER DEFAULT 0,
    "tax_amount" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_item_option")
);

COMMENT ON COLUMN "spy_sales_order_item_option"."net_price" IS \'/Price for one unit not including tax, without shipping, coupons/\';

COMMENT ON COLUMN "spy_sales_order_item_option"."price" IS \'/Price for item, can be gross or net price depending on tax mode/\';

COMMENT ON COLUMN "spy_sales_order_item_option"."discount_amount_aggregation" IS \'/Total discount amount for item/\';

COMMENT ON COLUMN "spy_sales_order_item_option"."tax_amount" IS \'/Calculated tax amount based on tax mode/\';

CREATE SEQUENCE "spy_sales_order_address_pk_seq";

CREATE TABLE "spy_sales_order_address"
(
    "id_sales_order_address" INTEGER NOT NULL,
    "fk_country" INTEGER NOT NULL,
    "fk_region" INTEGER,
    "salutation" INT2,
    "first_name" VARCHAR(100) NOT NULL,
    "middle_name" VARCHAR(100),
    "last_name" VARCHAR(100) NOT NULL,
    "address1" VARCHAR(255),
    "address2" VARCHAR(255),
    "address3" VARCHAR(255),
    "company" VARCHAR(255),
    "city" VARCHAR(255) NOT NULL,
    "zip_code" VARCHAR(15) NOT NULL,
    "po_box" VARCHAR(255),
    "phone" VARCHAR(255),
    "cell_phone" VARCHAR(255),
    "description" VARCHAR(255),
    "comment" VARCHAR(255),
    "email" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_address")
);

CREATE SEQUENCE "spy_sales_order_address_history_pk_seq";

CREATE TABLE "spy_sales_order_address_history"
(
    "id_sales_order_address_history" INTEGER NOT NULL,
    "fk_country" INTEGER NOT NULL,
    "fk_region" INTEGER,
    "fk_sales_order_address" INTEGER NOT NULL,
    "is_billing" BOOLEAN DEFAULT \'f\',
    "salutation" INT2,
    "first_name" VARCHAR(100) NOT NULL,
    "middle_name" VARCHAR(100),
    "last_name" VARCHAR(100) NOT NULL,
    "address1" VARCHAR(255),
    "address2" VARCHAR(255),
    "address3" VARCHAR(255),
    "company" VARCHAR(255),
    "city" VARCHAR(255) NOT NULL,
    "zip_code" VARCHAR(15) NOT NULL,
    "po_box" VARCHAR(255),
    "phone" VARCHAR(255),
    "cell_phone" VARCHAR(255),
    "description" VARCHAR(255),
    "comment" VARCHAR(255),
    "email" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_address_history")
);

CREATE SEQUENCE "spy_sales_order_totals_pk_seq";

CREATE TABLE "spy_sales_order_totals"
(
    "id_sales_order_totals" INTEGER NOT NULL,
    "fk_sales_order" INTEGER DEFAULT 0 NOT NULL,
    "subtotal" INTEGER DEFAULT 0,
    "order_expense_total" INTEGER DEFAULT 0,
    "discount_total" INTEGER DEFAULT 0,
    "grand_total" INTEGER DEFAULT 0,
    "refund_total" INTEGER DEFAULT 0,
    "canceled_total" INTEGER DEFAULT 0,
    "tax_total" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_totals")
);

CREATE SEQUENCE "spy_sales_order_note_pk_seq";

CREATE TABLE "spy_sales_order_note"
(
    "id_sales_order_note" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "message" VARCHAR(255) NOT NULL,
    "command" VARCHAR(255) NOT NULL,
    "success" BOOLEAN NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_note")
);

CREATE SEQUENCE "spy_sales_order_comment_pk_seq";

CREATE TABLE "spy_sales_order_comment"
(
    "id_sales_order_comment" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "username" VARCHAR,
    "message" TEXT NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_comment")
);

CREATE SEQUENCE "spy_sales_expense_pk_seq";

CREATE TABLE "spy_sales_expense"
(
    "id_sales_expense" INTEGER NOT NULL,
    "fk_sales_order" INTEGER,
    "type" VARCHAR(150),
    "name" VARCHAR(255),
    "gross_price" INTEGER NOT NULL,
    "tax_rate" NUMERIC(8,2),
    "canceled_amount" INTEGER DEFAULT 0,
    "net_price" INTEGER DEFAULT 0,
    "price" INTEGER DEFAULT 0,
    "discount_amount_aggregation" INTEGER DEFAULT 0,
    "tax_amount" INTEGER DEFAULT 0,
    "refundable_amount" INTEGER DEFAULT 0,
    "price_to_pay_aggregation" INTEGER DEFAULT 0,
    "tax_amount_after_cancellation" INTEGER DEFAULT 0,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_expense"),
    CONSTRAINT "spy_sales_expense-unique-fk_sales_order" UNIQUE ("fk_sales_order","type")
);

COMMENT ON COLUMN "spy_sales_expense"."net_price" IS \'/Price for one unit not including tax, without shipping, coupons/\';

COMMENT ON COLUMN "spy_sales_expense"."price" IS \'/Price for item, can be gross or net price depending on tax mode/\';

COMMENT ON COLUMN "spy_sales_expense"."discount_amount_aggregation" IS \'/Total discount amount for item/\';

COMMENT ON COLUMN "spy_sales_expense"."tax_amount" IS \'/Calculated tax amount based on tax mode/\';

COMMENT ON COLUMN "spy_sales_expense"."refundable_amount" IS \'/Total item refundable amount/\';

COMMENT ON COLUMN "spy_sales_expense"."price_to_pay_aggregation" IS \'/Total item price to pay after discounts/\';

COMMENT ON COLUMN "spy_sales_expense"."tax_amount_after_cancellation" IS \'/Calculated tax full amount based on tax mode, includes options, item expenses, /\';

CREATE SEQUENCE "spy_sales_order_item_metadata_pk_seq";

CREATE TABLE "spy_sales_order_item_metadata"
(
    "id_sales_order_item_metadata" INTEGER NOT NULL,
    "fk_sales_order_item" INTEGER NOT NULL,
    "super_attributes" TEXT NOT NULL,
    "image" TEXT,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_order_item_metadata")
);

CREATE INDEX "spy_sales_order_item_metadata-index-fk_sales_order_item" ON "spy_sales_order_item_metadata" ("fk_sales_order_item");

CREATE SEQUENCE "spy_sales_shipment_pk_seq";

CREATE TABLE "spy_sales_shipment"
(
    "id_sales_shipment" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "fk_sales_expense" INTEGER,
    "name" VARCHAR(255),
    "delivery_time" VARCHAR(255),
    "carrier_name" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_shipment")
);

CREATE SEQUENCE "spy_sales_payment_pk_seq";

CREATE TABLE "spy_sales_payment"
(
    "id_sales_payment" INTEGER NOT NULL,
    "fk_sales_order" INTEGER NOT NULL,
    "fk_sales_payment_method_type" INTEGER NOT NULL,
    "amount" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_sales_payment")
);

CREATE SEQUENCE "spy_sales_payment_method_type_pk_seq";

CREATE TABLE "spy_sales_payment_method_type"
(
    "id_sales_payment_method_type" INTEGER NOT NULL,
    "payment_provider" VARCHAR NOT NULL,
    "payment_method" VARCHAR NOT NULL,
    PRIMARY KEY ("id_sales_payment_method_type")
);

CREATE INDEX "spy_sales_payment_method_type-type" ON "spy_sales_payment_method_type" ("payment_provider","payment_method");

CREATE SEQUENCE "spy_sequence_number_pk_seq";

CREATE TABLE "spy_sequence_number"
(
    "id_sequence_number" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "current_id" INTEGER NOT NULL,
    PRIMARY KEY ("id_sequence_number"),
    CONSTRAINT "spy_sequence_number-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_shipment_carrier_pk_seq";

CREATE TABLE "spy_shipment_carrier"
(
    "id_shipment_carrier" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    PRIMARY KEY ("id_shipment_carrier")
);

CREATE INDEX "spy_shipment_carrier-is_active" ON "spy_shipment_carrier" ("is_active");

CREATE SEQUENCE "spy_shipment_method_pk_seq";

CREATE TABLE "spy_shipment_method"
(
    "id_shipment_method" INTEGER NOT NULL,
    "fk_shipment_carrier" INTEGER NOT NULL,
    "fk_tax_set" INTEGER,
    "name" VARCHAR(255) NOT NULL,
    "shipment_method_key" VARCHAR(255),
    "is_active" BOOLEAN DEFAULT \'t\' NOT NULL,
    "default_price" INTEGER,
    "availability_plugin" VARCHAR(255),
    "price_plugin" VARCHAR(255),
    "delivery_time_plugin" VARCHAR(255),
    PRIMARY KEY ("id_shipment_method")
);

COMMENT ON COLUMN "spy_shipment_method"."default_price" IS \'Deprecated\';

CREATE INDEX "spy_shipment_method-is_active" ON "spy_shipment_method" ("is_active");

CREATE SEQUENCE "spy_shipment_method_price_pk_seq";

CREATE TABLE "spy_shipment_method_price"
(
    "id_shipment_method_price" INTEGER NOT NULL,
    "fk_currency" INTEGER NOT NULL,
    "fk_store" INTEGER,
    "fk_shipment_method" INTEGER NOT NULL,
    "default_gross_price" INTEGER,
    "default_net_price" INTEGER,
    PRIMARY KEY ("id_shipment_method_price"),
    CONSTRAINT "spy_shipment_method_price-fk_shipment_method-fk_currency-fk_sto" UNIQUE ("fk_shipment_method","fk_store","fk_currency")
);

CREATE SEQUENCE "spy_state_machine_transition_log_pk_seq";

CREATE TABLE "spy_state_machine_transition_log"
(
    "id_state_machine_transition_log" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "locked" BOOLEAN,
    "event" VARCHAR(100),
    "hostname" VARCHAR(128) NOT NULL,
    "path" VARCHAR(256),
    "params" TEXT,
    "source_state" VARCHAR(128),
    "target_state" VARCHAR(128),
    "command" VARCHAR,
    "condition" VARCHAR,
    "is_error" BOOLEAN,
    "error_message" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_transition_log")
);

CREATE SEQUENCE "spy_state_machine_process_pk_seq";

CREATE TABLE "spy_state_machine_process"
(
    "id_state_machine_process" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "state_machine_name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_process"),
    CONSTRAINT "spy_state_machine_process-name" UNIQUE ("name","state_machine_name")
);

CREATE INDEX "spy_state_machine_process-state_machine_name" ON "spy_state_machine_process" ("state_machine_name");

CREATE SEQUENCE "spy_state_machine_lock_pk_seq";

CREATE TABLE "spy_state_machine_lock"
(
    "id_state_machine_lock" INTEGER NOT NULL,
    "identifier" VARCHAR(255) NOT NULL,
    "expires" TIMESTAMP NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_lock"),
    CONSTRAINT "spy_state_machine_lock-identifier" UNIQUE ("identifier")
);

CREATE SEQUENCE "spy_state_machine_item_state_pk_seq";

CREATE TABLE "spy_state_machine_item_state"
(
    "id_state_machine_item_state" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" VARCHAR(255),
    PRIMARY KEY ("id_state_machine_item_state"),
    CONSTRAINT "spy_state_machine_item_state-name" UNIQUE ("name","fk_state_machine_process")
);

CREATE SEQUENCE "spy_state_machine_item_state_history_pk_seq";

CREATE TABLE "spy_state_machine_item_state_history"
(
    "id_state_machine_item_state_history" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_item_state_history")
);

CREATE INDEX "spy_state_machine_item_state_history-identifier" ON "spy_state_machine_item_state_history" ("identifier");

CREATE SEQUENCE "spy_state_machine_event_timeout_pk_seq";

CREATE TABLE "spy_state_machine_event_timeout"
(
    "id_state_machine_event_timeout" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER NOT NULL,
    "fk_state_machine_process" INTEGER NOT NULL,
    "identifier" INTEGER NOT NULL,
    "timeout" TIMESTAMP NOT NULL,
    "event" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_state_machine_event_timeout"),
    CONSTRAINT "spy_state_machine_item_state-unique-identifier" UNIQUE ("identifier","fk_state_machine_item_state")
);

CREATE INDEX "spy_state_machine_event_timeout-timeout" ON "spy_state_machine_event_timeout" ("timeout");

CREATE SEQUENCE "pyz_state_machine_example_item_pk_seq";

CREATE TABLE "pyz_state_machine_example_item"
(
    "id_state_machine_example_item" INTEGER NOT NULL,
    "fk_state_machine_item_state" INTEGER,
    "name" VARCHAR,
    PRIMARY KEY ("id_state_machine_example_item")
);

CREATE SEQUENCE "spy_stock_pk_seq";

CREATE TABLE "spy_stock"
(
    "id_stock" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id_stock"),
    CONSTRAINT "spy_stock-name" UNIQUE ("name")
);

CREATE SEQUENCE "spy_stock_product_pk_seq";

CREATE TABLE "spy_stock_product"
(
    "id_stock_product" INTEGER NOT NULL,
    "fk_product" INTEGER NOT NULL,
    "fk_stock" INTEGER NOT NULL,
    "quantity" INTEGER DEFAULT 0,
    "is_never_out_of_stock" BOOLEAN DEFAULT \'f\',
    PRIMARY KEY ("id_stock_product"),
    CONSTRAINT "spy_stock_product-unique-fk_stock" UNIQUE ("fk_stock","fk_product")
);

CREATE INDEX "spy_stock_product-fk_product" ON "spy_stock_product" ("fk_product");

CREATE SEQUENCE "spy_store_pk_seq";

CREATE TABLE "spy_store"
(
    "id_store" INTEGER NOT NULL,
    "name" VARCHAR(255),
    PRIMARY KEY ("id_store")
);

CREATE SEQUENCE "spy_tax_set_pk_seq";

CREATE TABLE "spy_tax_set"
(
    "id_tax_set" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_tax_set")
);

CREATE SEQUENCE "spy_tax_rate_pk_seq";

CREATE TABLE "spy_tax_rate"
(
    "id_tax_rate" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "rate" NUMERIC(8,2) NOT NULL,
    "fk_country" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_tax_rate")
);

CREATE TABLE "spy_tax_set_tax"
(
    "fk_tax_set" INTEGER NOT NULL,
    "fk_tax_rate" INTEGER NOT NULL,
    PRIMARY KEY ("fk_tax_set","fk_tax_rate")
);

CREATE SEQUENCE "spy_touch_pk_seq";

CREATE TABLE "spy_touch"
(
    "id_touch" INTEGER NOT NULL,
    "item_type" VARCHAR(255) NOT NULL,
    "item_event" INT2 NOT NULL,
    "item_id" INTEGER NOT NULL,
    "touched" TIMESTAMP NOT NULL,
    PRIMARY KEY ("id_touch"),
    CONSTRAINT "spy_touch-unique-item_id" UNIQUE ("item_id","item_event","item_type")
);

CREATE INDEX "spy_touch-index-touched" ON "spy_touch" ("touched");

CREATE INDEX "spy_touch-index-item_id" ON "spy_touch" ("item_id");

CREATE INDEX "spy_touch-index-item_type" ON "spy_touch" ("item_type");

CREATE INDEX "spy_touch-index-item_event" ON "spy_touch" ("item_event");

CREATE SEQUENCE "spy_touch_storage_pk_seq";

CREATE TABLE "spy_touch_storage"
(
    "id_touch_storage" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_touch" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    PRIMARY KEY ("id_touch_storage"),
    CONSTRAINT "spy_touch_storage-unique-fk_locale" UNIQUE ("fk_locale","key")
);

CREATE INDEX "spy_touch_storage-index-key" ON "spy_touch_storage" ("key");

CREATE SEQUENCE "spy_touch_search_pk_seq";

CREATE TABLE "spy_touch_search"
(
    "id_touch_search" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "fk_touch" INTEGER NOT NULL,
    "key" VARCHAR NOT NULL,
    PRIMARY KEY ("id_touch_search"),
    CONSTRAINT "spy_touch_search-unique-fk_locale" UNIQUE ("fk_locale","key")
);

CREATE INDEX "spy_touch_search-index-key" ON "spy_touch_search" ("key");

CREATE SEQUENCE "spy_url_pk_seq";

CREATE TABLE "spy_url"
(
    "fk_resource_categorynode" INTEGER,
    "fk_resource_page" INTEGER,
    "fk_resource_product_set" INTEGER,
    "fk_resource_product_abstract" INTEGER,
    "id_url" INTEGER NOT NULL,
    "fk_locale" INTEGER NOT NULL,
    "url" VARCHAR(255) NOT NULL,
    "fk_resource_redirect" INTEGER,
    PRIMARY KEY ("id_url"),
    CONSTRAINT "spy_url_unique_key" UNIQUE ("url")
);

CREATE INDEX "spy_url-fk_resource_product_set" ON "spy_url" ("fk_resource_product_set");

CREATE SEQUENCE "spy_url_redirect_pk_seq";

CREATE TABLE "spy_url_redirect"
(
    "id_url_redirect" INTEGER NOT NULL,
    "to_url" VARCHAR(255) NOT NULL,
    "status" INTEGER DEFAULT 301 NOT NULL,
    PRIMARY KEY ("id_url_redirect")
);

CREATE INDEX "spy_url_redirect-to_url" ON "spy_url_redirect" ("to_url","status");

CREATE SEQUENCE "spy_user_pk_seq";

CREATE TABLE "spy_user"
(
    "id_user" INTEGER NOT NULL,
    "first_name" VARCHAR(45) NOT NULL,
    "last_name" VARCHAR(255) NOT NULL,
    "username" VARCHAR(45) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    "last_login" TIMESTAMP,
    "status" INT2 DEFAULT 0 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_user"),
    CONSTRAINT "spy_user-username" UNIQUE ("username")
);

CREATE SEQUENCE "spy_wishlist_pk_seq";

CREATE TABLE "spy_wishlist"
(
    "id_wishlist" INTEGER NOT NULL,
    "fk_customer" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_wishlist"),
    CONSTRAINT "spy_wishlist-unique-fk_customer-name" UNIQUE ("fk_customer","name")
);

CREATE SEQUENCE "spy_wishlist_item_pk_seq";

CREATE TABLE "spy_wishlist_item"
(
    "id_wishlist_item" INTEGER NOT NULL,
    "fk_wishlist" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_wishlist_item")
);

CREATE TABLE "spy_acl_role_archive"
(
    "id_acl_role" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_role")
);

CREATE INDEX "spy_acl_role_archive_i_d94269" ON "spy_acl_role_archive" ("name");

CREATE TABLE "spy_acl_rule_archive"
(
    "id_acl_rule" INTEGER NOT NULL,
    "fk_acl_role" INTEGER NOT NULL,
    "bundle" VARCHAR(45) NOT NULL,
    "controller" VARCHAR(45) NOT NULL,
    "action" VARCHAR(45) NOT NULL,
    "type" INT2 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_rule")
);

CREATE TABLE "spy_acl_group_archive"
(
    "id_acl_group" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_acl_group")
);

CREATE INDEX "spy_acl_group_archive_i_d94269" ON "spy_acl_group_archive" ("name");

CREATE TABLE "spy_auth_reset_password_archive"
(
    "id_auth_reset_password" INTEGER NOT NULL,
    "fk_user" INTEGER NOT NULL,
    "code" VARCHAR(35) NOT NULL,
    "status" INT2 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_auth_reset_password","fk_user")
);

CREATE INDEX "spy_auth_reset_password_archive_i_4db226" ON "spy_auth_reset_password_archive" ("code");

CREATE TABLE "spy_product_search_attribute_map_archive"
(
    "fk_product_attribute_key" INTEGER NOT NULL,
    "target_field" VARCHAR NOT NULL,
    "synced" BOOLEAN DEFAULT \'f\',
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("fk_product_attribute_key","target_field")
);

CREATE INDEX "spy_product_search_attribute_map_archive_i_a1d33d" ON "spy_product_search_attribute_map_archive" ("fk_product_attribute_key");

CREATE TABLE "spy_product_search_attribute_archive"
(
    "id_product_search_attribute" INTEGER NOT NULL,
    "fk_product_attribute_key" INTEGER NOT NULL,
    "filter_type" VARCHAR NOT NULL,
    "position" INTEGER DEFAULT 0 NOT NULL,
    "synced" BOOLEAN DEFAULT \'f\',
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_product_search_attribute")
);

CREATE INDEX "spy_product_search_attribute_archive_i_a1d33d" ON "spy_product_search_attribute_archive" ("fk_product_attribute_key");

CREATE TABLE "spy_user_archive"
(
    "id_user" INTEGER NOT NULL,
    "first_name" VARCHAR(45) NOT NULL,
    "last_name" VARCHAR(255) NOT NULL,
    "username" VARCHAR(45) NOT NULL,
    "password" VARCHAR(255) NOT NULL,
    "last_login" TIMESTAMP,
    "status" INT2 DEFAULT 0 NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    "archived_at" TIMESTAMP,
    PRIMARY KEY ("id_user")
);

CREATE INDEX "spy_user_archive_i_f86ef3" ON "spy_user_archive" ("username");

ALTER TABLE "spy_cms_block_product_connector" ADD CONSTRAINT "spy_cms_block_product_connector-fk_cms_block"
    FOREIGN KEY ("fk_cms_block")
    REFERENCES "spy_cms_block" ("id_cms_block")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_product_connector" ADD CONSTRAINT "spy_cms_block_product_connector-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON DELETE CASCADE;

ALTER TABLE "spy_acl_rule" ADD CONSTRAINT "spy_acl_rule-fk_acl_role"
    FOREIGN KEY ("fk_acl_role")
    REFERENCES "spy_acl_role" ("id_acl_role")
    ON DELETE CASCADE;

ALTER TABLE "spy_acl_user_has_group" ADD CONSTRAINT "spy_acl_user_has_group-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user")
    ON DELETE CASCADE;

ALTER TABLE "spy_acl_user_has_group" ADD CONSTRAINT "spy_acl_user_has_group-fk_acl_group"
    FOREIGN KEY ("fk_acl_group")
    REFERENCES "spy_acl_group" ("id_acl_group")
    ON DELETE CASCADE;

ALTER TABLE "spy_acl_groups_has_roles" ADD CONSTRAINT "spy_acl_groups_has_roles-fk_acl_role"
    FOREIGN KEY ("fk_acl_role")
    REFERENCES "spy_acl_role" ("id_acl_role")
    ON DELETE CASCADE;

ALTER TABLE "spy_acl_groups_has_roles" ADD CONSTRAINT "spy_acl_groups_has_roles-fk_acl_group"
    FOREIGN KEY ("fk_acl_group")
    REFERENCES "spy_acl_group" ("id_acl_group")
    ON DELETE CASCADE;

ALTER TABLE "spy_auth_reset_password" ADD CONSTRAINT "spy_auth_reset_password-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user")
    ON DELETE CASCADE;

ALTER TABLE "spy_availability" ADD CONSTRAINT "spy_availability-fk_spy_availability_abstract"
    FOREIGN KEY ("fk_availability_abstract")
    REFERENCES "spy_availability_abstract" ("id_availability_abstract");

ALTER TABLE "spy_payment_braintree" ADD CONSTRAINT "spy_payment_braintree-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_payment_braintree_transaction_request_log" ADD CONSTRAINT "spy_braintree_transaction_request_log-fk_payment_braintree"
    FOREIGN KEY ("fk_payment_braintree")
    REFERENCES "spy_payment_braintree" ("id_payment_braintree");

ALTER TABLE "spy_payment_braintree_transaction_status_log" ADD CONSTRAINT "spy_braintree_transaction_status_log-fk_braintree"
    FOREIGN KEY ("fk_payment_braintree")
    REFERENCES "spy_payment_braintree" ("id_payment_braintree");

ALTER TABLE "spy_payment_braintree_order_item" ADD CONSTRAINT "spy_braintree_order_item-fk_braintree"
    FOREIGN KEY ("fk_payment_braintree")
    REFERENCES "spy_payment_braintree" ("id_payment_braintree");

ALTER TABLE "spy_payment_braintree_order_item" ADD CONSTRAINT "spy_payment_braintree_order_item-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_category" ADD CONSTRAINT "spy_category_fk_7e2c46"
    FOREIGN KEY ("fk_category_template")
    REFERENCES "spy_category_template" ("id_category_template");

ALTER TABLE "spy_category_attribute" ADD CONSTRAINT "spy_category_attribute_fk_12b6d0"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_category_attribute" ADD CONSTRAINT "spy_category_attribute_fk_723c48"
    FOREIGN KEY ("fk_category")
    REFERENCES "spy_category" ("id_category");

ALTER TABLE "spy_category_node" ADD CONSTRAINT "spy_category_node_fk_b54a47"
    FOREIGN KEY ("fk_parent_category_node")
    REFERENCES "spy_category_node" ("id_category_node");

ALTER TABLE "spy_category_node" ADD CONSTRAINT "spy_category_node_fk_723c48"
    FOREIGN KEY ("fk_category")
    REFERENCES "spy_category" ("id_category");

ALTER TABLE "spy_category_closure_table" ADD CONSTRAINT "spy_category_closure_table_fk_d3e44d"
    FOREIGN KEY ("fk_category_node")
    REFERENCES "spy_category_node" ("id_category_node");

ALTER TABLE "spy_category_closure_table" ADD CONSTRAINT "spy_category_closure_table_fk_a3476a"
    FOREIGN KEY ("fk_category_node_descendant")
    REFERENCES "spy_category_node" ("id_category_node");

ALTER TABLE "spy_cms_page" ADD CONSTRAINT "spy_cms_page-fk_template"
    FOREIGN KEY ("fk_template")
    REFERENCES "spy_cms_template" ("id_cms_template")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_page_localized_attributes" ADD CONSTRAINT "spy_cms_page_localized_attributes-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_cms_page_localized_attributes" ADD CONSTRAINT "spy_cms_page_localized_attributes-fk_cms_page"
    FOREIGN KEY ("fk_cms_page")
    REFERENCES "spy_cms_page" ("id_cms_page")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_glossary_key_mapping" ADD CONSTRAINT "spy_cms_glossary_key_mapping-fk_glossary_key"
    FOREIGN KEY ("fk_glossary_key")
    REFERENCES "spy_glossary_key" ("id_glossary_key")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_glossary_key_mapping" ADD CONSTRAINT "spy_cms_glossary_key_mapping-fk_page"
    FOREIGN KEY ("fk_page")
    REFERENCES "spy_cms_page" ("id_cms_page")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_version" ADD CONSTRAINT "spy_cms_version-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user");

ALTER TABLE "spy_cms_version" ADD CONSTRAINT "spy_cms_version-fk_cms_page"
    FOREIGN KEY ("fk_cms_page")
    REFERENCES "spy_cms_page" ("id_cms_page")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_glossary_key_mapping" ADD CONSTRAINT "spy_cms_block_glossary_key_mapping-fk_cms_block"
    FOREIGN KEY ("fk_cms_block")
    REFERENCES "spy_cms_block" ("id_cms_block")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_glossary_key_mapping" ADD CONSTRAINT "spy_cms_block_glossary_key_mapping-fk_glossary_key"
    FOREIGN KEY ("fk_glossary_key")
    REFERENCES "spy_glossary_key" ("id_glossary_key")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block" ADD CONSTRAINT "spy_cms_block-fk_template"
    FOREIGN KEY ("fk_template")
    REFERENCES "spy_cms_block_template" ("id_cms_block_template")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_category_connector" ADD CONSTRAINT "spy_cms_block_category_connector-fk_cms_block"
    FOREIGN KEY ("fk_cms_block")
    REFERENCES "spy_cms_block" ("id_cms_block")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_category_connector" ADD CONSTRAINT "spy_cms_block_category_connector-fk_category"
    FOREIGN KEY ("fk_category")
    REFERENCES "spy_category" ("id_category")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_category_connector" ADD CONSTRAINT "spy_cms_block_category_connector-fk_category_template"
    FOREIGN KEY ("fk_category_template")
    REFERENCES "spy_category_template" ("id_category_template")
    ON DELETE CASCADE;

ALTER TABLE "spy_cms_block_category_connector" ADD CONSTRAINT "spy_cms_block_category_connector-fk_cms_block_category_position"
    FOREIGN KEY ("fk_cms_block_category_position")
    REFERENCES "spy_cms_block_category_position" ("id_cms_block_category_position")
    ON DELETE CASCADE;

ALTER TABLE "spy_region" ADD CONSTRAINT "spy_region-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_shipping_address"
    FOREIGN KEY ("default_shipping_address")
    REFERENCES "spy_customer_address" ("id_customer_address")
    ON DELETE SET NULL;

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-fk_user"
    FOREIGN KEY ("fk_user")
    REFERENCES "spy_user" ("id_user")
    ON DELETE NO ACTION;

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_customer" ADD CONSTRAINT "spy_customer-default_billing_address"
    FOREIGN KEY ("default_billing_address")
    REFERENCES "spy_customer_address" ("id_customer_address")
    ON DELETE SET NULL;

ALTER TABLE "spy_customer_address" ADD CONSTRAINT "spy_customer_address-fk_region"
    FOREIGN KEY ("fk_region")
    REFERENCES "spy_region" ("id_region");

ALTER TABLE "spy_customer_address" ADD CONSTRAINT "spy_customer_address-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer")
    ON DELETE CASCADE;

ALTER TABLE "spy_customer_address" ADD CONSTRAINT "spy_customer_address-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");

ALTER TABLE "spy_customer_group_to_customer" ADD CONSTRAINT "spy_customer_group_to_customer-fk_customer_group"
    FOREIGN KEY ("fk_customer_group")
    REFERENCES "spy_customer_group" ("id_customer_group")
    ON DELETE CASCADE;

ALTER TABLE "spy_customer_group_to_customer" ADD CONSTRAINT "spy_customer_group_to_customer-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");

ALTER TABLE "spy_discount" ADD CONSTRAINT "spy_discount-fk_store"
    FOREIGN KEY ("fk_store")
    REFERENCES "spy_store" ("id_store");

ALTER TABLE "spy_discount" ADD CONSTRAINT "spy_discount-fk_discount_voucher_pool"
    FOREIGN KEY ("fk_discount_voucher_pool")
    REFERENCES "spy_discount_voucher_pool" ("id_discount_voucher_pool");

ALTER TABLE "spy_discount_voucher" ADD CONSTRAINT "spy_discount_voucher-fk_discount_voucher_pool"
    FOREIGN KEY ("fk_discount_voucher_pool")
    REFERENCES "spy_discount_voucher_pool" ("id_discount_voucher_pool");

ALTER TABLE "spy_discount_amount" ADD CONSTRAINT "spy_discount_amount-fk_discount"
    FOREIGN KEY ("fk_discount")
    REFERENCES "spy_discount" ("id_discount");

ALTER TABLE "spy_discount_amount" ADD CONSTRAINT "spy_discount_amount-fk_currency"
    FOREIGN KEY ("fk_currency")
    REFERENCES "spy_currency" ("id_currency");

ALTER TABLE "spy_discount_promotion" ADD CONSTRAINT "spy_discount_promotion-fk_discount"
    FOREIGN KEY ("fk_discount")
    REFERENCES "spy_discount" ("id_discount");

ALTER TABLE "spy_glossary_translation" ADD CONSTRAINT "spy_glossary_translation-fk_glossary_key"
    FOREIGN KEY ("fk_glossary_key")
    REFERENCES "spy_glossary_key" ("id_glossary_key")
    ON DELETE CASCADE;

ALTER TABLE "spy_glossary_translation" ADD CONSTRAINT "spy_glossary_translation-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node" ADD CONSTRAINT "spy_navigation_node_fk_6f985c"
    FOREIGN KEY ("fk_navigation")
    REFERENCES "spy_navigation" ("id_navigation")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node" ADD CONSTRAINT "spy_navigation_node_fk_07636b"
    FOREIGN KEY ("fk_parent_navigation_node")
    REFERENCES "spy_navigation_node" ("id_navigation_node")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_12b6d0"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_43843f"
    FOREIGN KEY ("fk_navigation_node")
    REFERENCES "spy_navigation_node" ("id_navigation_node")
    ON DELETE CASCADE;

ALTER TABLE "spy_navigation_node_localized_attributes" ADD CONSTRAINT "spy_navigation_node_localized_attributes_fk_76593a"
    FOREIGN KEY ("fk_url")
    REFERENCES "spy_url" ("id_url");

ALTER TABLE "spy_newsletter_subscriber" ADD CONSTRAINT "spy_newsletter_subscriber-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");

ALTER TABLE "spy_newsletter_subscription" ADD CONSTRAINT "spy_newsletter_subscription-fk_newsletter_subscriber"
    FOREIGN KEY ("fk_newsletter_subscriber")
    REFERENCES "spy_newsletter_subscriber" ("id_newsletter_subscriber");

ALTER TABLE "spy_newsletter_subscription" ADD CONSTRAINT "spy_newsletter_subscription-fk_newsletter_type"
    FOREIGN KEY ("fk_newsletter_type")
    REFERENCES "spy_newsletter_type" ("id_newsletter_type");

ALTER TABLE "spy_nopayment_paid" ADD CONSTRAINT "spy_nopayment_paid-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_oms_transition_log" ADD CONSTRAINT "spy_oms_transition_log-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_oms_transition_log" ADD CONSTRAINT "spy_oms_transition_log-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_oms_transition_log" ADD CONSTRAINT "spy_oms_transition_log-fk_oms_order_process"
    FOREIGN KEY ("fk_oms_order_process")
    REFERENCES "spy_oms_order_process" ("id_oms_order_process");

ALTER TABLE "spy_oms_order_item_state_history" ADD CONSTRAINT "spy_oms_order_item_state_history-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_oms_order_item_state_history" ADD CONSTRAINT "spy_oms_order_item_state_history-fk_oms_order_item_state"
    FOREIGN KEY ("fk_oms_order_item_state")
    REFERENCES "spy_oms_order_item_state" ("id_oms_order_item_state");

ALTER TABLE "spy_oms_event_timeout" ADD CONSTRAINT "spy_oms_event_timeout-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_oms_event_timeout" ADD CONSTRAINT "spy_oms_event_timeout-fk_oms_order_item_state"
    FOREIGN KEY ("fk_oms_order_item_state")
    REFERENCES "spy_oms_order_item_state" ("id_oms_order_item_state");

ALTER TABLE "spy_payment_payolution" ADD CONSTRAINT "spy_payment_payolution-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_payment_payolution_transaction_request_log" ADD CONSTRAINT "spy_payolution_transaction_request_log-fk_payment_payolution"
    FOREIGN KEY ("fk_payment_payolution")
    REFERENCES "spy_payment_payolution" ("id_payment_payolution");

ALTER TABLE "spy_payment_payolution_transaction_status_log" ADD CONSTRAINT "spy_payolution_transaction_status_log-fk_payolution"
    FOREIGN KEY ("fk_payment_payolution")
    REFERENCES "spy_payment_payolution" ("id_payment_payolution");

ALTER TABLE "spy_payment_payolution_order_item" ADD CONSTRAINT "spy_payolution_order_item-fk_payolution"
    FOREIGN KEY ("fk_payment_payolution")
    REFERENCES "spy_payment_payolution" ("id_payment_payolution");

ALTER TABLE "spy_payment_payolution_order_item" ADD CONSTRAINT "spy_payment_payolution_order_item-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_price_product" ADD CONSTRAINT "spy_price_product-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_price_product" ADD CONSTRAINT "spy_price_product-fk_price_type"
    FOREIGN KEY ("fk_price_type")
    REFERENCES "spy_price_type" ("id_price_type");

ALTER TABLE "spy_price_product" ADD CONSTRAINT "spy_price_product-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract" ADD CONSTRAINT "spy_product_abstract-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set");

ALTER TABLE "spy_product_abstract_localized_attributes" ADD CONSTRAINT "spy_product_abstract_localized_attributes-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_abstract_localized_attributes" ADD CONSTRAINT "spy_product_abstract_localized_attributes-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_product" ADD CONSTRAINT "spy_product-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_localized_attributes" ADD CONSTRAINT "spy_product_localized_attributes-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_localized_attributes" ADD CONSTRAINT "spy_product_localized_attributes-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_product_management_attribute" ADD CONSTRAINT "spy_pim_attribute-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key");

ALTER TABLE "spy_product_management_attribute_value" ADD CONSTRAINT "spy_pim_attribute_value-fk_pim_attribute"
    FOREIGN KEY ("fk_product_management_attribute")
    REFERENCES "spy_product_management_attribute" ("id_product_management_attribute");

ALTER TABLE "spy_product_management_attribute_value_translation" ADD CONSTRAINT "spy_pim_attribute_value-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_management_attribute_value_translation" ADD CONSTRAINT "spy_pim_attribute_value_translation-fk_pim_attribute_value"
    FOREIGN KEY ("fk_product_management_attribute_value")
    REFERENCES "spy_product_management_attribute_value" ("id_product_management_attribute_value");

ALTER TABLE "spy_product_bundle" ADD CONSTRAINT "spy_product_bundle-fk_bundled_product"
    FOREIGN KEY ("fk_bundled_product")
    REFERENCES "spy_product" ("id_product")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_product_bundle" ADD CONSTRAINT "spy_product_bundle-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product")
    ON UPDATE CASCADE
    ON DELETE CASCADE;

ALTER TABLE "spy_product_category" ADD CONSTRAINT "spy_product_category-fk_category"
    FOREIGN KEY ("fk_category")
    REFERENCES "spy_category" ("id_category");

ALTER TABLE "spy_product_category" ADD CONSTRAINT "spy_product_category-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract_group" ADD CONSTRAINT "spy_product_abstract_group-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_abstract_group" ADD CONSTRAINT "spy_product_abstract_group-fk_product_group"
    FOREIGN KEY ("fk_product_group")
    REFERENCES "spy_product_group" ("id_product_group");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_resource_product_set"
    FOREIGN KEY ("fk_resource_product_set")
    REFERENCES "spy_product_set" ("id_product_set");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_image_set_to_product_image" ADD CONSTRAINT "spy_product_image_set_to_product_image-fk_product_image"
    FOREIGN KEY ("fk_product_image")
    REFERENCES "spy_product_image" ("id_product_image");

ALTER TABLE "spy_product_image_set_to_product_image" ADD CONSTRAINT "spy_product_image_set_to_product_image-fk_product_image_set"
    FOREIGN KEY ("fk_product_image_set")
    REFERENCES "spy_product_image_set" ("id_product_image_set");

ALTER TABLE "spy_product_label_localized_attributes" ADD CONSTRAINT "spy_product_label_localized_attributes_fk_3dcfb4"
    FOREIGN KEY ("fk_product_label")
    REFERENCES "spy_product_label" ("id_product_label");

ALTER TABLE "spy_product_label_localized_attributes" ADD CONSTRAINT "spy_product_label_localized_attributes_fk_12b6d0"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_label_product_abstract" ADD CONSTRAINT "spy_product_label_product_abstract_fk_3dcfb4"
    FOREIGN KEY ("fk_product_label")
    REFERENCES "spy_product_label" ("id_product_label");

ALTER TABLE "spy_product_label_product_abstract" ADD CONSTRAINT "spy_product_label_product_abstract_fk_371a4f"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_option_group" ADD CONSTRAINT "spy_product_option_group-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set")
    ON DELETE SET NULL;

ALTER TABLE "spy_product_abstract_product_option_group" ADD CONSTRAINT "spy_product_abstract-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_abstract_product_option_group" ADD CONSTRAINT "spy_product_abstract-fk_product_option_group"
    FOREIGN KEY ("fk_product_option_group")
    REFERENCES "spy_product_option_group" ("id_product_option_group");

ALTER TABLE "spy_product_option_value" ADD CONSTRAINT "spy_product_option_value-fk_product_option_group"
    FOREIGN KEY ("fk_product_option_group")
    REFERENCES "spy_product_option_group" ("id_product_option_group");

ALTER TABLE "spy_product_relation" ADD CONSTRAINT "spy_product-relation-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_relation" ADD CONSTRAINT "spy_product-relation-type-fk_product_abstract"
    FOREIGN KEY ("fk_product_relation_type")
    REFERENCES "spy_product_relation_type" ("id_product_relation_type");

ALTER TABLE "spy_product_relation_product_abstract" ADD CONSTRAINT "spy_product-rel-prod-rel-fk_product_relation"
    FOREIGN KEY ("fk_product_relation")
    REFERENCES "spy_product_relation" ("id_product_relation");

ALTER TABLE "spy_product_relation_product_abstract" ADD CONSTRAINT "spy_product-rel-prod-abs-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_review" ADD CONSTRAINT "spy_product_review-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_review" ADD CONSTRAINT "spy_product_review-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_search" ADD CONSTRAINT "spy_product_search-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_search" ADD CONSTRAINT "spy_product_search-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_search_attribute_map" ADD CONSTRAINT "spy_product_search_attribute_map-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_search_attribute" ADD CONSTRAINT "spy_product_search_attribute-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key");

ALTER TABLE "spy_product_abstract_set" ADD CONSTRAINT "spy_product_abstract_set-fk_product_set"
    FOREIGN KEY ("fk_product_set")
    REFERENCES "spy_product_set" ("id_product_set");

ALTER TABLE "spy_product_abstract_set" ADD CONSTRAINT "spy_product_abstract_set-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_set_data" ADD CONSTRAINT "spy_product_set_data-fk_product_set"
    FOREIGN KEY ("fk_product_set")
    REFERENCES "spy_product_set" ("id_product_set")
    ON DELETE CASCADE;

ALTER TABLE "spy_product_set_data" ADD CONSTRAINT "spy_product_set_data-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_payment_ratepay" ADD CONSTRAINT "spy_payment_ratepay-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_payment_ratepay_log" ADD CONSTRAINT "spy_payment_ratepay_log-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_refund" ADD CONSTRAINT "spy_refund-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_order" ADD CONSTRAINT "spy_sales_order-fk_sales_order_address_shipping"
    FOREIGN KEY ("fk_sales_order_address_shipping")
    REFERENCES "spy_sales_order_address" ("id_sales_order_address");

ALTER TABLE "spy_sales_order" ADD CONSTRAINT "spy_sales_order-fk_sales_order_address_billing"
    FOREIGN KEY ("fk_sales_order_address_billing")
    REFERENCES "spy_sales_order_address" ("id_sales_order_address");

ALTER TABLE "spy_sales_order" ADD CONSTRAINT "spy_sales_order-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_sales_discount" ADD CONSTRAINT "spy_sales_discount-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_sales_discount" ADD CONSTRAINT "spy_sales_discount-fk_sales_order_item_option"
    FOREIGN KEY ("fk_sales_order_item_option")
    REFERENCES "spy_sales_order_item_option" ("id_sales_order_item_option");

ALTER TABLE "spy_sales_discount" ADD CONSTRAINT "spy_sales_discount-fk_sales_expense"
    FOREIGN KEY ("fk_sales_expense")
    REFERENCES "spy_sales_expense" ("id_sales_expense");

ALTER TABLE "spy_sales_discount" ADD CONSTRAINT "spy_sales_discount-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_discount_code" ADD CONSTRAINT "spy_sales_discount_code-fk_sales_discount"
    FOREIGN KEY ("fk_sales_discount")
    REFERENCES "spy_sales_discount" ("id_sales_discount");

ALTER TABLE "spy_sales_order_item" ADD CONSTRAINT "spy_sales_order_item-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_order_item" ADD CONSTRAINT "spy_sales_order_item-fk_oms_order_process"
    FOREIGN KEY ("fk_oms_order_process")
    REFERENCES "spy_oms_order_process" ("id_oms_order_process");

ALTER TABLE "spy_sales_order_item" ADD CONSTRAINT "spy_sales_order_item-fk_oms_order_item_state"
    FOREIGN KEY ("fk_oms_order_item_state")
    REFERENCES "spy_oms_order_item_state" ("id_oms_order_item_state");

ALTER TABLE "spy_sales_order_item" ADD CONSTRAINT "spy_sales_order_item-fk_sales_order_item_bundle"
    FOREIGN KEY ("fk_sales_order_item_bundle")
    REFERENCES "spy_sales_order_item_bundle" ("id_sales_order_item_bundle");

ALTER TABLE "spy_sales_order_item_option" ADD CONSTRAINT "spy_sales_order_item_option-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_sales_order_address" ADD CONSTRAINT "spy_sales_order_address-fk_region"
    FOREIGN KEY ("fk_region")
    REFERENCES "spy_region" ("id_region");

ALTER TABLE "spy_sales_order_address" ADD CONSTRAINT "spy_sales_order_address-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");

ALTER TABLE "spy_sales_order_address_history" ADD CONSTRAINT "spy_sales_order_address_history-fk_sales_order_address"
    FOREIGN KEY ("fk_sales_order_address")
    REFERENCES "spy_sales_order_address" ("id_sales_order_address");

ALTER TABLE "spy_sales_order_address_history" ADD CONSTRAINT "spy_sales_order_address_history-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");

ALTER TABLE "spy_sales_order_address_history" ADD CONSTRAINT "spy_sales_order_address_history-fk_region"
    FOREIGN KEY ("fk_region")
    REFERENCES "spy_region" ("id_region");

ALTER TABLE "spy_sales_order_totals" ADD CONSTRAINT "spy_sales_order_totals-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_order_note" ADD CONSTRAINT "spy_sales_order_note-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_order_comment" ADD CONSTRAINT "spy_sales_order_comment-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_expense" ADD CONSTRAINT "spy_sales_expense-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_order_item_metadata" ADD CONSTRAINT "spy_sales_order_item_metadata-fk_sales_order_item"
    FOREIGN KEY ("fk_sales_order_item")
    REFERENCES "spy_sales_order_item" ("id_sales_order_item");

ALTER TABLE "spy_sales_shipment" ADD CONSTRAINT "spy_sales_shipment-fk_sales_expense"
    FOREIGN KEY ("fk_sales_expense")
    REFERENCES "spy_sales_expense" ("id_sales_expense");

ALTER TABLE "spy_sales_shipment" ADD CONSTRAINT "spy_sales_shipment-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_payment" ADD CONSTRAINT "spy_sales_payment-fk_sales_order"
    FOREIGN KEY ("fk_sales_order")
    REFERENCES "spy_sales_order" ("id_sales_order");

ALTER TABLE "spy_sales_payment" ADD CONSTRAINT "spy_sales_payment-fk_sales_payment_method_type"
    FOREIGN KEY ("fk_sales_payment_method_type")
    REFERENCES "spy_sales_payment_method_type" ("id_sales_payment_method_type");

ALTER TABLE "spy_shipment_method" ADD CONSTRAINT "spy_shipment_method-fk_shipment_carrier"
    FOREIGN KEY ("fk_shipment_carrier")
    REFERENCES "spy_shipment_carrier" ("id_shipment_carrier");

ALTER TABLE "spy_shipment_method" ADD CONSTRAINT "spy_shipment_method-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set");

ALTER TABLE "spy_shipment_method_price" ADD CONSTRAINT "spy_shipment_method_price-fk_currency"
    FOREIGN KEY ("fk_currency")
    REFERENCES "spy_currency" ("id_currency");

ALTER TABLE "spy_shipment_method_price" ADD CONSTRAINT "spy_shipment_method_price-fk_store"
    FOREIGN KEY ("fk_store")
    REFERENCES "spy_store" ("id_store");

ALTER TABLE "spy_shipment_method_price" ADD CONSTRAINT "spy_shipment_method_price-fk_shipment_method"
    FOREIGN KEY ("fk_shipment_method")
    REFERENCES "spy_shipment_method" ("id_shipment_method");

ALTER TABLE "spy_state_machine_transition_log" ADD CONSTRAINT "spy_state_machine_transition_log-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "spy_state_machine_item_state" ADD CONSTRAINT "spy_state_machine_item_state-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "spy_state_machine_item_state_history" ADD CONSTRAINT "spy_state_machine_item_state_h-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");

ALTER TABLE "spy_state_machine_event_timeout" ADD CONSTRAINT "spy_state_machine_event_timeout-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");

ALTER TABLE "spy_state_machine_event_timeout" ADD CONSTRAINT "spy_state_machine_event_timeout-fk_state_machine_process"
    FOREIGN KEY ("fk_state_machine_process")
    REFERENCES "spy_state_machine_process" ("id_state_machine_process");

ALTER TABLE "pyz_state_machine_example_item" ADD CONSTRAINT "pyz_state_machine_example_item-fk_state_machine_item_state"
    FOREIGN KEY ("fk_state_machine_item_state")
    REFERENCES "spy_state_machine_item_state" ("id_state_machine_item_state");

ALTER TABLE "spy_stock_product" ADD CONSTRAINT "spy_stock_product-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_stock_product" ADD CONSTRAINT "spy_stock_product-fk_stock"
    FOREIGN KEY ("fk_stock")
    REFERENCES "spy_stock" ("id_stock");

ALTER TABLE "spy_tax_rate" ADD CONSTRAINT "spy_tax_rate-fk_country"
    FOREIGN KEY ("fk_country")
    REFERENCES "spy_country" ("id_country");

ALTER TABLE "spy_tax_set_tax" ADD CONSTRAINT "spy_tax_set_tax-fk_tax_set"
    FOREIGN KEY ("fk_tax_set")
    REFERENCES "spy_tax_set" ("id_tax_set")
    ON DELETE CASCADE;

ALTER TABLE "spy_tax_set_tax" ADD CONSTRAINT "spy_tax_set_tax-fk_tax_rate"
    FOREIGN KEY ("fk_tax_rate")
    REFERENCES "spy_tax_rate" ("id_tax_rate");

ALTER TABLE "spy_touch_storage" ADD CONSTRAINT "spy_touch_storage-fk_touch"
    FOREIGN KEY ("fk_touch")
    REFERENCES "spy_touch" ("id_touch");

ALTER TABLE "spy_touch_storage" ADD CONSTRAINT "spy_touch_storage-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_touch_search" ADD CONSTRAINT "spy_touch_search-fk_touch"
    FOREIGN KEY ("fk_touch")
    REFERENCES "spy_touch" ("id_touch");

ALTER TABLE "spy_touch_search" ADD CONSTRAINT "spy_touch_search-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_page"
    FOREIGN KEY ("fk_resource_page")
    REFERENCES "spy_cms_page" ("id_cms_page")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_product_abstract"
    FOREIGN KEY ("fk_resource_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_redirect"
    FOREIGN KEY ("fk_resource_redirect")
    REFERENCES "spy_url_redirect" ("id_url_redirect")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_product_set"
    FOREIGN KEY ("fk_resource_product_set")
    REFERENCES "spy_product_set" ("id_product_set")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_resource_categorynode"
    FOREIGN KEY ("fk_resource_categorynode")
    REFERENCES "spy_category_node" ("id_category_node")
    ON DELETE CASCADE;

ALTER TABLE "spy_url" ADD CONSTRAINT "spy_url-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale")
    ON DELETE CASCADE;

ALTER TABLE "spy_wishlist" ADD CONSTRAINT "spy_wishlist-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-fk_wishlist"
    FOREIGN KEY ("fk_wishlist")
    REFERENCES "spy_wishlist" ("id_wishlist");

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-sku"
    FOREIGN KEY ("sku")
    REFERENCES "spy_product" ("sku");

COMMIT;
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
BEGIN;

DROP TABLE IF EXISTS "spy_cms_block_product_connector" CASCADE;

DROP SEQUENCE "spy_cms_block_product_connector_pk_seq";

DROP TABLE IF EXISTS "spy_acl_role" CASCADE;

DROP SEQUENCE "spy_acl_role_pk_seq";

DROP TABLE IF EXISTS "spy_acl_rule" CASCADE;

DROP SEQUENCE "spy_acl_rule_pk_seq";

DROP TABLE IF EXISTS "spy_acl_group" CASCADE;

DROP SEQUENCE "spy_acl_group_pk_seq";

DROP TABLE IF EXISTS "spy_acl_user_has_group" CASCADE;

DROP TABLE IF EXISTS "spy_acl_groups_has_roles" CASCADE;

DROP TABLE IF EXISTS "spy_auth_reset_password" CASCADE;

DROP SEQUENCE "spy_auth_reset_password_pk_seq";

DROP TABLE IF EXISTS "spy_availability_abstract" CASCADE;

DROP SEQUENCE "spy_availability_abstract_pk_seq";

DROP TABLE IF EXISTS "spy_availability" CASCADE;

DROP SEQUENCE "spy_availability_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree" CASCADE;

DROP SEQUENCE "spy_payment_braintree_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_transaction_request_log" CASCADE;

DROP SEQUENCE "spy_payment_braintree_transaction_request_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_transaction_status_log" CASCADE;

DROP SEQUENCE "spy_payment_braintree_transaction_status_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_order_item" CASCADE;

DROP TABLE IF EXISTS "spy_category" CASCADE;

DROP SEQUENCE "spy_category_pk_seq";

DROP TABLE IF EXISTS "spy_category_attribute" CASCADE;

DROP SEQUENCE "spy_category_attribute_pk_seq";

DROP TABLE IF EXISTS "spy_category_node" CASCADE;

DROP SEQUENCE "spy_category_node_pk_seq";

DROP TABLE IF EXISTS "spy_category_closure_table" CASCADE;

DROP SEQUENCE "spy_category_closure_table_pk_seq";

DROP TABLE IF EXISTS "spy_category_template" CASCADE;

DROP SEQUENCE "spy_category_template_pk_seq";

DROP TABLE IF EXISTS "spy_cms_template" CASCADE;

DROP SEQUENCE "spy_cms_template_pk_seq";

DROP TABLE IF EXISTS "spy_cms_page" CASCADE;

DROP SEQUENCE "spy_cms_page_pk_seq";

DROP TABLE IF EXISTS "spy_cms_page_localized_attributes" CASCADE;

DROP SEQUENCE "spy_cms_page_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_cms_glossary_key_mapping" CASCADE;

DROP SEQUENCE "spy_cms_glossary_key_mapping_pk_seq";

DROP TABLE IF EXISTS "spy_cms_version" CASCADE;

DROP SEQUENCE "spy_cms_version_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_template" CASCADE;

DROP SEQUENCE "spy_cms_block_template_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_glossary_key_mapping" CASCADE;

DROP SEQUENCE "spy_cms_block_glossary_key_mapping_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block" CASCADE;

DROP SEQUENCE "spy_cms_block_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_category_connector" CASCADE;

DROP SEQUENCE "spy_cms_block_category_connector_pk_seq";

DROP TABLE IF EXISTS "spy_cms_block_category_position" CASCADE;

DROP SEQUENCE "spy_cms_block_category_position_pk_seq";

DROP TABLE IF EXISTS "spy_country" CASCADE;

DROP SEQUENCE "spy_country_pk_seq";

DROP TABLE IF EXISTS "spy_region" CASCADE;

DROP SEQUENCE "spy_region_pk_seq";

DROP TABLE IF EXISTS "spy_currency" CASCADE;

DROP SEQUENCE "spy_currency_pk_seq";

DROP TABLE IF EXISTS "spy_customer" CASCADE;

DROP SEQUENCE "spy_customer_pk_seq";

DROP TABLE IF EXISTS "spy_customer_address" CASCADE;

DROP SEQUENCE "spy_customer_address_pk_seq";

DROP TABLE IF EXISTS "spy_customer_group" CASCADE;

DROP SEQUENCE "spy_customer_group_pk_seq";

DROP TABLE IF EXISTS "spy_customer_group_to_customer" CASCADE;

DROP SEQUENCE "spy_customer_group_to_customer_pk_seq";

DROP TABLE IF EXISTS "spy_discount" CASCADE;

DROP SEQUENCE "spy_discount_pk_seq";

DROP TABLE IF EXISTS "spy_discount_voucher_pool" CASCADE;

DROP SEQUENCE "spy_discount_voucher_pool_pk_seq";

DROP TABLE IF EXISTS "spy_discount_voucher" CASCADE;

DROP SEQUENCE "spy_discount_voucher_pk_seq";

DROP TABLE IF EXISTS "spy_discount_amount" CASCADE;

DROP SEQUENCE "spy_discount_amount_pk_seq";

DROP TABLE IF EXISTS "spy_discount_promotion" CASCADE;

DROP SEQUENCE "spy_discount_promotion_pk_seq";

DROP TABLE IF EXISTS "spy_event_behavior_entity_change" CASCADE;

DROP SEQUENCE "spy_event_behavior_entity_change_pk_seq";

DROP TABLE IF EXISTS "spy_glossary_key" CASCADE;

DROP SEQUENCE "spy_glossary_key_pk_seq";

DROP TABLE IF EXISTS "spy_glossary_translation" CASCADE;

DROP SEQUENCE "spy_glossary_translation_pk_seq";

DROP TABLE IF EXISTS "spy_locale" CASCADE;

DROP SEQUENCE "spy_locale_pk_seq";

DROP TABLE IF EXISTS "spy_navigation" CASCADE;

DROP SEQUENCE "spy_navigation_pk_seq";

DROP TABLE IF EXISTS "spy_navigation_node" CASCADE;

DROP SEQUENCE "spy_navigation_node_pk_seq";

DROP TABLE IF EXISTS "spy_navigation_node_localized_attributes" CASCADE;

DROP SEQUENCE "spy_navigation_node_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_newsletter_subscriber" CASCADE;

DROP SEQUENCE "spy_newsletter_subscriber_pk_seq";

DROP TABLE IF EXISTS "spy_newsletter_type" CASCADE;

DROP SEQUENCE "spy_newsletter_type_pk_seq";

DROP TABLE IF EXISTS "spy_newsletter_subscription" CASCADE;

DROP TABLE IF EXISTS "spy_nopayment_paid" CASCADE;

DROP SEQUENCE "spy_nopayment_paid_pk_seq";

DROP TABLE IF EXISTS "spy_oms_transition_log" CASCADE;

DROP SEQUENCE "spy_oms_transition_log_pk_seq";

DROP TABLE IF EXISTS "spy_oms_order_process" CASCADE;

DROP SEQUENCE "spy_oms_order_process_pk_seq";

DROP TABLE IF EXISTS "spy_oms_state_machine_lock" CASCADE;

DROP SEQUENCE "spy_oms_state_machine_lock_pk_seq";

DROP TABLE IF EXISTS "spy_oms_order_item_state" CASCADE;

DROP SEQUENCE "spy_oms_order_item_state_pk_seq";

DROP TABLE IF EXISTS "spy_oms_order_item_state_history" CASCADE;

DROP SEQUENCE "spy_oms_order_item_state_history_pk_seq";

DROP TABLE IF EXISTS "spy_oms_event_timeout" CASCADE;

DROP SEQUENCE "spy_oms_event_timeout_pk_seq";

DROP TABLE IF EXISTS "spy_oms_product_reservation" CASCADE;

DROP SEQUENCE "spy_oms_product_reservation_pk_seq";

DROP TABLE IF EXISTS "spy_payment_payolution" CASCADE;

DROP SEQUENCE "spy_payment_payolution_pk_seq";

DROP TABLE IF EXISTS "spy_payment_payolution_transaction_request_log" CASCADE;

DROP SEQUENCE "spy_payment_payolution_transaction_request_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_payolution_transaction_status_log" CASCADE;

DROP SEQUENCE "spy_payment_payolution_transaction_status_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_payolution_order_item" CASCADE;

DROP TABLE IF EXISTS "spy_price_product" CASCADE;

DROP SEQUENCE "spy_price_product_pk_seq";

DROP TABLE IF EXISTS "spy_price_type" CASCADE;

DROP SEQUENCE "spy_price_type_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract" CASCADE;

DROP SEQUENCE "spy_product_abstract_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_localized_attributes" CASCADE;

DROP SEQUENCE "spy_product_abstract_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_product" CASCADE;

DROP SEQUENCE "spy_product_pk_seq";

DROP TABLE IF EXISTS "spy_product_localized_attributes" CASCADE;

DROP SEQUENCE "spy_product_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_product_attribute_key" CASCADE;

DROP SEQUENCE "spy_product_attribute_key_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_value" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_value_pk_seq";

DROP TABLE IF EXISTS "spy_product_management_attribute_value_translation" CASCADE;

DROP SEQUENCE "spy_product_management_attribute_value_translation_pk_seq";

DROP TABLE IF EXISTS "spy_product_bundle" CASCADE;

DROP SEQUENCE "spy_product_bundle_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_item_bundle" CASCADE;

DROP SEQUENCE "spy_sales_order_item_bundle_pk_seq";

DROP TABLE IF EXISTS "spy_product_category" CASCADE;

DROP SEQUENCE "spy_product_category_pk_seq";

DROP TABLE IF EXISTS "spy_product_group" CASCADE;

DROP SEQUENCE "spy_product_group_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_group" CASCADE;

DROP TABLE IF EXISTS "spy_product_image_set" CASCADE;

DROP SEQUENCE "spy_product_image_set_pk_seq";

DROP TABLE IF EXISTS "spy_product_image" CASCADE;

DROP SEQUENCE "spy_product_image_pk_seq";

DROP TABLE IF EXISTS "spy_product_image_set_to_product_image" CASCADE;

DROP SEQUENCE "spy_product_image_set_to_product_image_pk_seq";

DROP TABLE IF EXISTS "spy_product_label" CASCADE;

DROP SEQUENCE "spy_product_label_pk_seq";

DROP TABLE IF EXISTS "spy_product_label_localized_attributes" CASCADE;

DROP SEQUENCE "spy_product_label_localized_attributes_pk_seq";

DROP TABLE IF EXISTS "spy_product_label_product_abstract" CASCADE;

DROP SEQUENCE "spy_product_label_product_abstract_pk_seq";

DROP TABLE IF EXISTS "spy_product_option_group" CASCADE;

DROP SEQUENCE "spy_product_option_group_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_product_option_group" CASCADE;

DROP TABLE IF EXISTS "spy_product_option_value" CASCADE;

DROP SEQUENCE "spy_product_option_value_pk_seq";

DROP TABLE IF EXISTS "spy_product_relation_type" CASCADE;

DROP SEQUENCE "spy_product_relation_type_pk_seq";

DROP TABLE IF EXISTS "spy_product_relation" CASCADE;

DROP SEQUENCE "spy_product_relation_pk_seq";

DROP TABLE IF EXISTS "spy_product_relation_product_abstract" CASCADE;

DROP SEQUENCE "spy_product_rel_prod_abs_type_pk_seq";

DROP TABLE IF EXISTS "spy_product_review" CASCADE;

DROP SEQUENCE "id_product_review_pk_seq";

DROP TABLE IF EXISTS "spy_product_search" CASCADE;

DROP SEQUENCE "spy_product_search_pk_seq";

DROP TABLE IF EXISTS "spy_product_search_attribute_map" CASCADE;

DROP TABLE IF EXISTS "spy_product_search_attribute" CASCADE;

DROP SEQUENCE "spy_product_search_attribute_pk_seq";

DROP TABLE IF EXISTS "spy_product_set" CASCADE;

DROP SEQUENCE "spy_product_set_pk_seq";

DROP TABLE IF EXISTS "spy_product_abstract_set" CASCADE;

DROP SEQUENCE "spy_product_abstract_set_pk_seq";

DROP TABLE IF EXISTS "spy_product_set_data" CASCADE;

DROP SEQUENCE "spy_product_set_data_pk_seq";

DROP TABLE IF EXISTS "spy_propel_heartbeat" CASCADE;

DROP TABLE IF EXISTS "spy_queue_process" CASCADE;

DROP SEQUENCE "spy_queue_process_pk_seq";

DROP TABLE IF EXISTS "spy_payment_ratepay" CASCADE;

DROP SEQUENCE "spy_payment_ratepay_pk_seq";

DROP TABLE IF EXISTS "spy_payment_ratepay_log" CASCADE;

DROP SEQUENCE "spy_payment_ratepay_log_pk_seq";

DROP TABLE IF EXISTS "spy_refund" CASCADE;

DROP SEQUENCE "spy_refund_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order" CASCADE;

DROP SEQUENCE "spy_sales_order_pk_seq";

DROP TABLE IF EXISTS "spy_sales_discount" CASCADE;

DROP SEQUENCE "spy_sales_discount_pk_seq";

DROP TABLE IF EXISTS "spy_sales_discount_code" CASCADE;

DROP SEQUENCE "spy_sales_discount_code_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_item" CASCADE;

DROP SEQUENCE "spy_sales_order_item_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_item_option" CASCADE;

DROP SEQUENCE "spy_sales_order_item_option_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_address" CASCADE;

DROP SEQUENCE "spy_sales_order_address_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_address_history" CASCADE;

DROP SEQUENCE "spy_sales_order_address_history_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_totals" CASCADE;

DROP SEQUENCE "spy_sales_order_totals_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_note" CASCADE;

DROP SEQUENCE "spy_sales_order_note_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_comment" CASCADE;

DROP SEQUENCE "spy_sales_order_comment_pk_seq";

DROP TABLE IF EXISTS "spy_sales_expense" CASCADE;

DROP SEQUENCE "spy_sales_expense_pk_seq";

DROP TABLE IF EXISTS "spy_sales_order_item_metadata" CASCADE;

DROP SEQUENCE "spy_sales_order_item_metadata_pk_seq";

DROP TABLE IF EXISTS "spy_sales_shipment" CASCADE;

DROP SEQUENCE "spy_sales_shipment_pk_seq";

DROP TABLE IF EXISTS "spy_sales_payment" CASCADE;

DROP SEQUENCE "spy_sales_payment_pk_seq";

DROP TABLE IF EXISTS "spy_sales_payment_method_type" CASCADE;

DROP SEQUENCE "spy_sales_payment_method_type_pk_seq";

DROP TABLE IF EXISTS "spy_sequence_number" CASCADE;

DROP SEQUENCE "spy_sequence_number_pk_seq";

DROP TABLE IF EXISTS "spy_shipment_carrier" CASCADE;

DROP SEQUENCE "spy_shipment_carrier_pk_seq";

DROP TABLE IF EXISTS "spy_shipment_method" CASCADE;

DROP SEQUENCE "spy_shipment_method_pk_seq";

DROP TABLE IF EXISTS "spy_shipment_method_price" CASCADE;

DROP SEQUENCE "spy_shipment_method_price_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_transition_log" CASCADE;

DROP SEQUENCE "spy_state_machine_transition_log_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_process" CASCADE;

DROP SEQUENCE "spy_state_machine_process_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_lock" CASCADE;

DROP SEQUENCE "spy_state_machine_lock_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_item_state" CASCADE;

DROP SEQUENCE "spy_state_machine_item_state_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_item_state_history" CASCADE;

DROP SEQUENCE "spy_state_machine_item_state_history_pk_seq";

DROP TABLE IF EXISTS "spy_state_machine_event_timeout" CASCADE;

DROP SEQUENCE "spy_state_machine_event_timeout_pk_seq";

DROP TABLE IF EXISTS "pyz_state_machine_example_item" CASCADE;

DROP SEQUENCE "pyz_state_machine_example_item_pk_seq";

DROP TABLE IF EXISTS "spy_stock" CASCADE;

DROP SEQUENCE "spy_stock_pk_seq";

DROP TABLE IF EXISTS "spy_stock_product" CASCADE;

DROP SEQUENCE "spy_stock_product_pk_seq";

DROP TABLE IF EXISTS "spy_store" CASCADE;

DROP SEQUENCE "spy_store_pk_seq";

DROP TABLE IF EXISTS "spy_tax_set" CASCADE;

DROP SEQUENCE "spy_tax_set_pk_seq";

DROP TABLE IF EXISTS "spy_tax_rate" CASCADE;

DROP SEQUENCE "spy_tax_rate_pk_seq";

DROP TABLE IF EXISTS "spy_tax_set_tax" CASCADE;

DROP TABLE IF EXISTS "spy_touch" CASCADE;

DROP SEQUENCE "spy_touch_pk_seq";

DROP TABLE IF EXISTS "spy_touch_storage" CASCADE;

DROP SEQUENCE "spy_touch_storage_pk_seq";

DROP TABLE IF EXISTS "spy_touch_search" CASCADE;

DROP SEQUENCE "spy_touch_search_pk_seq";

DROP TABLE IF EXISTS "spy_url" CASCADE;

DROP SEQUENCE "spy_url_pk_seq";

DROP TABLE IF EXISTS "spy_url_redirect" CASCADE;

DROP SEQUENCE "spy_url_redirect_pk_seq";

DROP TABLE IF EXISTS "spy_user" CASCADE;

DROP SEQUENCE "spy_user_pk_seq";

DROP TABLE IF EXISTS "spy_wishlist" CASCADE;

DROP SEQUENCE "spy_wishlist_pk_seq";

DROP TABLE IF EXISTS "spy_wishlist_item" CASCADE;

DROP SEQUENCE "spy_wishlist_item_pk_seq";

DROP TABLE IF EXISTS "spy_acl_role_archive" CASCADE;

DROP TABLE IF EXISTS "spy_acl_rule_archive" CASCADE;

DROP TABLE IF EXISTS "spy_acl_group_archive" CASCADE;

DROP TABLE IF EXISTS "spy_auth_reset_password_archive" CASCADE;

DROP TABLE IF EXISTS "spy_product_search_attribute_map_archive" CASCADE;

DROP TABLE IF EXISTS "spy_product_search_attribute_archive" CASCADE;

DROP TABLE IF EXISTS "spy_user_archive" CASCADE;

COMMIT;
',
);
    }

}