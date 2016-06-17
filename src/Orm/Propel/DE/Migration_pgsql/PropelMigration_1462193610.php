<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1462193610.
 * Generated on 2016-05-02 12:53:30 by vagrant
 */
class PropelMigration_1462193610
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
DROP TABLE IF EXISTS "spy_product_search_attributes_operation" CASCADE;

CREATE TABLE "spy_product_search_attribute_map"
(
    "fk_product_attributes_metadata" INTEGER NOT NULL,
    "target_field" VARCHAR NOT NULL,
    PRIMARY KEY ("fk_product_attributes_metadata","target_field")
);

CREATE INDEX "spy_product_search_attribute_map-k_product_attributes_metadata" ON "spy_product_search_attribute_map" ("fk_product_attributes_metadata");

ALTER TABLE "spy_product_search_attribute_map" ADD CONSTRAINT "spy_product_search_attribute_map-source_attribute_id"
    FOREIGN KEY ("fk_product_attributes_metadata")
    REFERENCES "spy_product_attributes_metadata" ("id_product_attributes_metadata")
    ON DELETE CASCADE;
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
DROP TABLE IF EXISTS "spy_product_search_attribute_map" CASCADE;

CREATE TABLE "spy_product_search_attributes_operation"
(
    "source_attribute_id" INTEGER NOT NULL,
    "operation" VARCHAR NOT NULL,
    "target_field" VARCHAR NOT NULL,
    "weighting" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("source_attribute_id","operation","target_field")
);

CREATE INDEX "spy_product_search_attributes_operation-source_attribute_id" ON "spy_product_search_attributes_operation" ("source_attribute_id","weighting");

ALTER TABLE "spy_product_search_attributes_operation" ADD CONSTRAINT "spy_product_search_attributes_operation-source_attribute_id"
    FOREIGN KEY ("source_attribute_id")
    REFERENCES "spy_product_attributes_metadata" ("id_product_attributes_metadata")
    ON DELETE CASCADE;
',
);
    }

}