<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1452763735.
 * Generated on 2016-01-14 09:28:55 by vagrant
 */
class PropelMigration_1452763735
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
                SET FOREIGN_KEY_CHECKS = 0;

                ALTER TABLE `spy_shipment_carrier`

                    DROP `glossary_key_name`;

                ALTER TABLE `spy_shipment_method`

                    CHANGE `price` `default_price` INTEGER,

                    ADD `price_plugin` VARCHAR(255) AFTER `availability_plugin`,

                    DROP `glossary_key_name`,

                    DROP `glossary_key_description`,

                    DROP `price_calculation_plugin`,

                    DROP `tax_calculation_plugin`;

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
                SET FOREIGN_KEY_CHECKS = 0;

                ALTER TABLE `spy_shipment_carrier`

                    ADD `glossary_key_name` VARCHAR(255) AFTER `id_shipment_carrier`;

                ALTER TABLE `spy_shipment_method`

                    CHANGE `default_price` `price` INTEGER,

                    ADD `glossary_key_name` VARCHAR(255) AFTER `fk_tax_set`,

                    ADD `glossary_key_description` VARCHAR(255) AFTER `glossary_key_name`,

                    ADD `price_calculation_plugin` VARCHAR(255) AFTER `availability_plugin`,

                    ADD `tax_calculation_plugin` VARCHAR(255) AFTER `delivery_time_plugin`,

                    DROP `price_plugin`;

                SET FOREIGN_KEY_CHECKS = 1;
            ',
        );
    }

}
