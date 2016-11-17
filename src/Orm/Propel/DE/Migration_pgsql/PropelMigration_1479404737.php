<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1479404737.
 * Generated on 2016-11-17 17:45:37 by vagrant
 */
class PropelMigration_1479404737
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

ALTER TABLE "spy_customer_group_to_customer" ADD CONSTRAINT "spy_customer_group_to_customer-fk_customer_group"
    FOREIGN KEY ("fk_customer_group")
    REFERENCES "spy_customer_group" ("id_customer_group")
    ON DELETE CASCADE;

ALTER TABLE "spy_customer_group_to_customer" ADD CONSTRAINT "spy_customer_group_to_customer-fk_customer"
    FOREIGN KEY ("fk_customer")
    REFERENCES "spy_customer" ("id_customer");
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
DROP TABLE IF EXISTS "spy_customer_group" CASCADE;

DROP SEQUENCE "spy_customer_group_pk_seq";

DROP TABLE IF EXISTS "spy_customer_group_to_customer" CASCADE;

DROP SEQUENCE "spy_customer_group_to_customer_pk_seq";
',
);
    }

}
