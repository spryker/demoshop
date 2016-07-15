<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467715418.
 * Generated on 2016-07-05 10:43:38 by vagrant
 */
class PropelMigration_1467715418
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
CREATE SEQUENCE "spy_oms_product_reservation_pk_seq";

CREATE TABLE "spy_oms_product_reservation"
(
    "id_oms_product_reservation" INTEGER NOT NULL,
    "sku" VARCHAR(255) NOT NULL,
    "reservation_quantity" INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY ("id_oms_product_reservation"),
    CONSTRAINT "spy_oms_product_reservation-sku" UNIQUE ("sku")
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

ALTER TABLE "spy_availability" ADD CONSTRAINT "spy_availability-fk_spy_availability_abstract"
    FOREIGN KEY ("fk_availability_abstract")
    REFERENCES "spy_availability_abstract" ("id_availability_abstract");
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
DROP TABLE IF EXISTS "spy_oms_product_reservation" CASCADE;

DROP SEQUENCE "spy_oms_product_reservation_pk_seq";

DROP TABLE IF EXISTS "spy_availability_abstract" CASCADE;

DROP SEQUENCE "spy_availability_abstract_pk_seq";

DROP TABLE IF EXISTS "spy_availability" CASCADE;

DROP SEQUENCE "spy_availability_pk_seq";

',
);
    }

}
