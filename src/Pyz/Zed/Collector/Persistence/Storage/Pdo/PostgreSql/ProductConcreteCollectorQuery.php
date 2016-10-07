<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class ProductConcreteCollectorQuery extends AbstractPdoCollectorQuery
{
    /**
     * @return void
     */
    protected function prepareQuery()
    {
         $sql = '
SELECT
  spy_product.id_product AS id_product,
  spy_product.sku AS sku,
  spy_product_localized_attributes.name AS name,
  spy_product.attributes AS attributes,
  abstract_price.price AS abstract_price,
  concrete_price_table.price AS concrete_price,
  spy_product_abstract.attributes AS abstract_attributes,
  spy_product.attributes AS concrete_attributes,
  spy_product_abstract_localized_attributes.attributes AS abstract_localized_attributes,
  spy_product_localized_attributes.description AS concrete_description,
  spy_product_localized_attributes.attributes AS concrete_localized_attributes,
  spy_product_abstract_localized_attributes.description as abstract_description,
  spy_product_image_set.id_product_image_set AS id_image_set,
  (SELECT SUM(spy_stock_product.quantity)
    FROM spy_stock_product
    WHERE spy_stock_product.fk_product = spy_product.id_product) AS quantity,
  t.id_touch AS %s,
  t.item_id AS %s,
  spy_touch_storage.id_touch_storage AS %s
FROM spy_touch t
  INNER JOIN spy_product ON (t.item_id = spy_product.id_product)
  INNER JOIN spy_product_abstract ON (spy_product_abstract.id_product_abstract = spy_product.fk_product_abstract)
  INNER JOIN spy_product_abstract_localized_attributes ON (spy_product_abstract_localized_attributes.fk_product_abstract = spy_product_abstract.id_product_abstract)
  INNER JOIN spy_product_localized_attributes ON (spy_product_localized_attributes.fk_product = spy_product.id_product)
  INNER JOIN spy_locale ON (spy_product_localized_attributes.fk_locale = spy_locale.id_locale AND spy_locale.id_locale = :fk_locale_1)
  LEFT JOIN spy_price_product abstract_price ON (spy_product.fk_product_abstract = abstract_price.fk_product_abstract)
  LEFT JOIN spy_price_product concrete_price_table ON (spy_product.id_product = concrete_price_table.fk_product AND concrete_price_table.fk_price_type = 1)
  LEFT JOIN spy_price_type spy_price_type ON (concrete_price_table.fk_price_type = spy_price_type.id_price_type)
  LEFT JOIN spy_touch_storage ON spy_touch_storage.fk_touch = t.id_touch AND spy_touch_storage.fk_locale = :fk_locale_2
  LEFT JOIN spy_product_image_set ON (spy_product_image_set.fk_product = spy_product.id_product OR spy_product_image_set.fk_product_abstract = spy_product_abstract.id_product_abstract) AND spy_product_image_set.fk_locale = spy_locale.id_locale
WHERE
  t.item_event = :spy_touch_item_event
  AND t.touched >= :spy_touch_touched
  AND t.item_type = :spy_touch_item_type
         ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale());
    }

}
