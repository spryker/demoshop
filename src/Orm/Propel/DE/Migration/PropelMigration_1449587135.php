<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1449587135.
 * Generated on 2015-12-08 15:05:35 by vagrant
 */
class PropelMigration_1449587135
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

DROP TABLE IF EXISTS `spy_distributor_item`;

DROP TABLE IF EXISTS `spy_distributor_item_type`;

DROP TABLE IF EXISTS `spy_distributor_receiver`;

DROP TABLE IF EXISTS `spy_search_document_attribute`;

DROP TABLE IF EXISTS `spy_search_page_element`;

DROP TABLE IF EXISTS `spy_search_page_element_template`;

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`(255));

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.0 NOT NULL;

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

DROP INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log`;

CREATE UNIQUE INDEX `spy_payment_payolution_transaction_request_log_u_052e1d` ON `spy_payment_payolution_transaction_request_log` (`transaction_id`);

ALTER TABLE `spy_sales_order_item_option`

  CHANGE `tax_percentage` `tax_percentage` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

ALTER TABLE `spy_tax_rate`

  CHANGE `rate` `rate` DECIMAL(8,2) DEFAULT 0.00 NOT NULL;

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
    CONSTRAINT `spy_distributor_item-fk_glossary_translation`
        FOREIGN KEY (`fk_glossary_translation`)
        REFERENCES `spy_glossary_translation` (`id_glossary_translation`),
    CONSTRAINT `spy_distributor_item-fk_item_type`
        FOREIGN KEY (`fk_item_type`)
        REFERENCES `spy_distributor_item_type` (`id_distributor_item_type`)
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

CREATE TABLE `spy_distributor_receiver`
(
    `id_distributor_receiver` INTEGER NOT NULL AUTO_INCREMENT,
    `receiver_key` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_distributor_receiver`),
    UNIQUE INDEX `spy_distributor_receiver-receiver_key` (`receiver_key`)
) ENGINE=InnoDB;

CREATE TABLE `spy_search_document_attribute`
(
    `id_search_document_attribute` INTEGER NOT NULL AUTO_INCREMENT,
    `attribute_name` VARCHAR(255) NOT NULL,
    `attribute_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_document_attribute`),
    UNIQUE INDEX `spy_search_document_attribute-attribute_name` (`attribute_name`)
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

CREATE TABLE `spy_search_page_element_template`
(
    `id_search_page_element_template` INTEGER NOT NULL AUTO_INCREMENT,
    `template_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_search_page_element_template`),
    UNIQUE INDEX `spy_search_page_element_template-template_name` (`template_name`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}