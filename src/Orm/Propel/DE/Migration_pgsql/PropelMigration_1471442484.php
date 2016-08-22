<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1471442484.
 * Generated on 2016-08-17 14:01:24 by vagrant
 */
class PropelMigration_1471442484
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
CREATE SEQUENCE "spy_product_search_attribute_pk_seq";

CREATE TABLE "spy_product_search_attribute"
(
    "id_product_search_attribute" INTEGER NOT NULL,
    "fk_product_attribute_key" INTEGER NOT NULL,
    "filter_type" VARCHAR NOT NULL,
    "position" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("id_product_search_attribute"),
    CONSTRAINT "spy_product_search_attribute-unique-fk_product_attribute_key" UNIQUE ("fk_product_attribute_key")
);

ALTER TABLE "spy_product_search_attribute" ADD CONSTRAINT "spy_product_search_attribute-fk_product_attribute_key"
    FOREIGN KEY ("fk_product_attribute_key")
    REFERENCES "spy_product_attribute_key" ("id_product_attribute_key");
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
DROP TABLE IF EXISTS "spy_product_search_attribute" CASCADE;

DROP SEQUENCE "spy_product_search_attribute_pk_seq";
',
);
    }

}
