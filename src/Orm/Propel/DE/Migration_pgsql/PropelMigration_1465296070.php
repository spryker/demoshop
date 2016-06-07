<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1465296070.
 * Generated on 2016-06-07 10:41:10 by vagrant
 */
class PropelMigration_1465296070
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
DROP TABLE IF EXISTS "spy_discount_collector" CASCADE;

DROP TABLE IF EXISTS "spy_discount_decision_rule" CASCADE;

DROP TABLE IF EXISTS "spy_discount_voucher_pool_category" CASCADE;

ALTER TABLE "spy_discount" RENAME COLUMN "is_privileged" TO "is_exclusive";

ALTER TABLE "spy_discount"

  ADD "decision_rule_query_string" VARCHAR,

  ADD "collector_query_string" VARCHAR,

  DROP COLUMN "collector_logical_operator";

CREATE UNIQUE INDEX "spy_discount-unique-display_name" ON "spy_discount" ("display_name");

ALTER TABLE "spy_discount_voucher_pool"

  DROP COLUMN "fk_discount_voucher_pool_category",

  DROP COLUMN "template";
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
CREATE TABLE "spy_discount_collector"
(
    "id_discount_collector" INTEGER NOT NULL,
    "fk_discount" INTEGER NOT NULL,
    "collector_plugin" VARCHAR(255),
    "value" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount_collector")
);

CREATE TABLE "spy_discount_decision_rule"
(
    "id_discount_decision_rule" INTEGER NOT NULL,
    "fk_discount" INTEGER,
    "name" VARCHAR(255) NOT NULL,
    "decision_rule_plugin" VARCHAR(255) NOT NULL,
    "value" VARCHAR(255),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount_decision_rule")
);

CREATE TABLE "spy_discount_voucher_pool_category"
(
    "id_discount_voucher_pool_category" INTEGER NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_discount_voucher_pool_category")
);

    ALTER TABLE "spy_discount" DROP CONSTRAINT "spy_discount-unique-display_name";
    
ALTER TABLE "spy_discount" RENAME COLUMN "is_exclusive" TO "is_privileged";

ALTER TABLE "spy_discount"

  ADD "collector_logical_operator" VARCHAR(16),

  DROP COLUMN "decision_rule_query_string",

  DROP COLUMN "collector_query_string";

ALTER TABLE "spy_discount_voucher_pool"

  ADD "fk_discount_voucher_pool_category" INTEGER,

  ADD "template" VARCHAR(255);

ALTER TABLE "spy_discount_voucher_pool" ADD CONSTRAINT "spy_discount_voucher_pool-fk_discount_voucher_pool_category"
    FOREIGN KEY ("fk_discount_voucher_pool_category")
    REFERENCES "spy_discount_voucher_pool_category" ("id_discount_voucher_pool_category");

ALTER TABLE "spy_discount_collector" ADD CONSTRAINT "spy_discount_collector-fk_discount"
    FOREIGN KEY ("fk_discount")
    REFERENCES "spy_discount" ("id_discount");

ALTER TABLE "spy_discount_decision_rule" ADD CONSTRAINT "spy_discount_decision_rule-fk_discount"
    FOREIGN KEY ("fk_discount")
    REFERENCES "spy_discount" ("id_discount");
',
);
    }

}
