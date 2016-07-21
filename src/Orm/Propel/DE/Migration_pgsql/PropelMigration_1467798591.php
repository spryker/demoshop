<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1467798591.
 * Generated on 2016-07-06 09:49:51 by vagrant
 */
class PropelMigration_1467798591
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
DROP TABLE IF EXISTS "spy_payment_braintree" CASCADE;

DROP SEQUENCE "spy_payment_braintree_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_transaction_request_log" CASCADE;

DROP SEQUENCE "spy_payment_braintree_transaction_request_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_transaction_status_log" CASCADE;

DROP SEQUENCE "spy_payment_braintree_transaction_status_log_pk_seq";

DROP TABLE IF EXISTS "spy_payment_braintree_order_item" CASCADE;
',
);
    }

}