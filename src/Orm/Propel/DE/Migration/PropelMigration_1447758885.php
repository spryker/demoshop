<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1447758885.
 * Generated on 2015-11-17 11:14:45 by vagrant
 */
class PropelMigration_1447758885
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

DROP INDEX `spy_cms_block-fk_page` ON `spy_cms_block`;

CREATE INDEX `spy_cms_block-fk_page` ON `spy_cms_block` (`fk_page`);

DROP INDEX `spy_cms_glossary_key_mapping-fk_page` ON `spy_cms_glossary_key_mapping`;

CREATE INDEX `spy_cms_glossary_key_mapping-fk_page` ON `spy_cms_glossary_key_mapping` (`fk_page`, `placeholder`);

DROP INDEX `spy_cms_template-template_path` ON `spy_cms_template`;

CREATE INDEX `spy_cms_template-template_path` ON `spy_cms_template` (`template_path`);

DROP INDEX `spy_glossary_key-key` ON `spy_glossary_key`;

CREATE INDEX `spy_glossary_key-key` ON `spy_glossary_key` (`key`);

DROP INDEX `spy_locale-locale_name` ON `spy_locale`;

CREATE INDEX `spy_locale-locale_name` ON `spy_locale` (`locale_name`);

DROP INDEX `spy_newsletter_subscriber-email` ON `spy_newsletter_subscriber`;

DROP INDEX `spy_newsletter_subscriber-subscriber_key` ON `spy_newsletter_subscriber`;

CREATE INDEX `spy_newsletter_subscriber-email` ON `spy_newsletter_subscriber` (`email`);

CREATE INDEX `spy_newsletter_subscriber-subscriber_key` ON `spy_newsletter_subscriber` (`subscriber_key`);

DROP INDEX `spy_newsletter_type-name` ON `spy_newsletter_type`;

CREATE INDEX `spy_newsletter_type-name` ON `spy_newsletter_type` (`name`);

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`(255));

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

DROP INDEX `spy_touch-item_id` ON `spy_touch`;

CREATE INDEX `spy_touch-item_id` ON `spy_touch` (`item_id`);

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

DROP INDEX `spy_cms_block-fk_page` ON `spy_cms_block`;

CREATE UNIQUE INDEX `spy_cms_block-fk_page` ON `spy_cms_block` (`fk_page`);

DROP INDEX `spy_cms_glossary_key_mapping-fk_page` ON `spy_cms_glossary_key_mapping`;

CREATE UNIQUE INDEX `spy_cms_glossary_key_mapping-fk_page` ON `spy_cms_glossary_key_mapping` (`fk_page`, `placeholder`);

DROP INDEX `spy_cms_template-template_path` ON `spy_cms_template`;

CREATE UNIQUE INDEX `spy_cms_template-template_path` ON `spy_cms_template` (`template_path`);

DROP INDEX `spy_glossary_key-key` ON `spy_glossary_key`;

CREATE UNIQUE INDEX `spy_glossary_key-key` ON `spy_glossary_key` (`key`);

DROP INDEX `spy_locale-locale_name` ON `spy_locale`;

CREATE UNIQUE INDEX `spy_locale-locale_name` ON `spy_locale` (`locale_name`);

DROP INDEX `spy_newsletter_subscriber-email` ON `spy_newsletter_subscriber`;

DROP INDEX `spy_newsletter_subscriber-subscriber_key` ON `spy_newsletter_subscriber`;

CREATE UNIQUE INDEX `spy_newsletter_subscriber-email` ON `spy_newsletter_subscriber` (`email`);

CREATE UNIQUE INDEX `spy_newsletter_subscriber-subscriber_key` ON `spy_newsletter_subscriber` (`subscriber_key`);

DROP INDEX `spy_newsletter_type-name` ON `spy_newsletter_type`;

CREATE UNIQUE INDEX `spy_newsletter_type-name` ON `spy_newsletter_type` (`name`);

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`);

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

DROP INDEX `spy_touch-item_id` ON `spy_touch`;

CREATE UNIQUE INDEX `spy_touch-item_id` ON `spy_touch` (`item_id`, `item_event`, `item_type`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}