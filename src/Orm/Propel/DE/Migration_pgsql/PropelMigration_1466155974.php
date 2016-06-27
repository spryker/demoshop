<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1466155974.
 * Generated on 2016-06-17 09:32:54 by vagrant
 */
class PropelMigration_1466155974
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
CREATE SEQUENCE "spy_product_image_set_pk_seq";

CREATE TABLE "spy_product_image_set"
(
    "id_product_image_set" INTEGER NOT NULL,
    "name" VARCHAR(255),
    "fk_locale" INTEGER NOT NULL,
    "fk_product" INTEGER,
    "fk_product_abstract" INTEGER,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_image_set"),
    CONSTRAINT "fk_locale-fk_product-fk_product_abstract" UNIQUE ("fk_locale","fk_product","fk_product_abstract")
);

CREATE SEQUENCE "spy_product_image_pk_seq";

CREATE TABLE "spy_product_image"
(
    "id_product_image" INTEGER NOT NULL,
    "external_url_small" VARCHAR(1024),
    "external_url_large" VARCHAR(1024),
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_image")
);

CREATE SEQUENCE "spy_product_image_set_to_product_image_pk_seq";

CREATE TABLE "spy_product_image_set_to_product_image"
(
    "id_product_image_set_to_product_image" INTEGER NOT NULL,
    "fk_product_image_set" INTEGER NOT NULL,
    "fk_product_image" INTEGER NOT NULL,
    "sort" INTEGER NOT NULL,
    "created_at" TIMESTAMP,
    "updated_at" TIMESTAMP,
    PRIMARY KEY ("id_product_image_set_to_product_image"),
    CONSTRAINT "fk_product_image_set-fk_product_image" UNIQUE ("fk_product_image_set","fk_product_image")
);

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_locale"
    FOREIGN KEY ("fk_locale")
    REFERENCES "spy_locale" ("id_locale");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_product"
    FOREIGN KEY ("fk_product")
    REFERENCES "spy_product" ("id_product");

ALTER TABLE "spy_product_image_set" ADD CONSTRAINT "spy_product_image_set-fk_product_abstract"
    FOREIGN KEY ("fk_product_abstract")
    REFERENCES "spy_product_abstract" ("id_product_abstract");

ALTER TABLE "spy_product_image_set_to_product_image" ADD CONSTRAINT "spy_product_image_set_to_product_image-fk_product_image_set"
    FOREIGN KEY ("fk_product_image_set")
    REFERENCES "spy_product_image_set" ("id_product_image_set");

ALTER TABLE "spy_product_image_set_to_product_image" ADD CONSTRAINT "spy_product_image_set_to_product_image-fk_product_image"
    FOREIGN KEY ("fk_product_image")
    REFERENCES "spy_product_image" ("id_product_image");
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
DROP TABLE IF EXISTS "spy_product_image_set" CASCADE;

DROP SEQUENCE "spy_product_image_set_pk_seq";

DROP TABLE IF EXISTS "spy_product_image" CASCADE;

DROP SEQUENCE "spy_product_image_pk_seq";

DROP TABLE IF EXISTS "spy_product_image_set_to_product_image" CASCADE;

DROP SEQUENCE "spy_product_image_set_to_product_image_pk_seq";
',
);
    }

}
