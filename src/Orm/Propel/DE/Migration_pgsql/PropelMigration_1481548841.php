<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1481548841.
 * Generated on 2016-12-12 13:20:41 by vagrant
 */
class PropelMigration_1481548841
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
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
BEGIN;

    ALTER TABLE "spy_wishlist" DROP CONSTRAINT "spy_wishlist-unique-fk_customer";
    
ALTER TABLE "spy_wishlist"

  ADD "name" VARCHAR(255) NOT NULL,

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP;

CREATE UNIQUE INDEX "spy_wishlist-unique-fk_customer-name" ON "spy_wishlist" ("fk_customer","name");

ALTER TABLE "spy_wishlist_item" DROP CONSTRAINT "spy_wishlist_item-fk_product";

ALTER TABLE "spy_wishlist_item" DROP CONSTRAINT "spy_wishlist_item-fk_product_abstract";

ALTER TABLE "spy_wishlist_item"

  ADD "sku" VARCHAR(255) NOT NULL,

  ADD "created_at" TIMESTAMP,

  ADD "updated_at" TIMESTAMP,

  DROP COLUMN "fk_product",

  DROP COLUMN "quantity",

  DROP COLUMN "added_at",

  DROP COLUMN "group_key",

  DROP COLUMN "fk_product_abstract";

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-sku"
    FOREIGN KEY ("sku")
    REFERENCES "spy_product" ("sku");

COMMIT;
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
BEGIN;

    ALTER TABLE "spy_wishlist" DROP CONSTRAINT "spy_wishlist-unique-fk_customer-name";
    
ALTER TABLE "spy_wishlist"

  DROP COLUMN "name",

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

CREATE UNIQUE INDEX "spy_wishlist-unique-fk_customer" ON "spy_wishlist" ("fk_customer");

ALTER TABLE "spy_wishlist_item" DROP CONSTRAINT "spy_wishlist_item-sku";

ALTER TABLE "spy_wishlist_item"

  ADD "fk_product" INTEGER,

  ADD "quantity" INTEGER NOT NULL,

  ADD "added_at" TIMESTAMP NOT NULL,

  ADD "group_key" VARCHAR,

  ADD "fk_product_abstract" INTEGER NOT NULL,

  DROP COLUMN "sku",

  DROP COLUMN "created_at",

  DROP COLUMN "updated_at";

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_wishlist_item" ADD CONSTRAINT "spy_wishlist_item-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

COMMIT;
',
);
    }

}