<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467191590.
 * Generated on 2016-06-29 09:13:10 by vagrant
 */
class PropelMigration_1467191590
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
ALTER TABLE "spy_product_abstract_localized_attributes"

  ADD "description" TEXT,

  ADD "meta_title" VARCHAR(255),

  ADD "meta_keywords" TEXT,

  ADD "meta_description" TEXT;

ALTER TABLE "spy_product_localized_attributes"

  ADD "description" TEXT;
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
ALTER TABLE "spy_product_abstract_localized_attributes"

  DROP COLUMN "description",

  DROP COLUMN "meta_title",

  DROP COLUMN "meta_keywords",

  DROP COLUMN "meta_description";

ALTER TABLE "spy_product_localized_attributes"

  DROP COLUMN "description";
',
);
    }

}