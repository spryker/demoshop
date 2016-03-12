<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Exporter\AbstractPdoCollectorQuery;

class ProductCollectorQuery extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  spy_product.id_product AS id_product,
  spy_product_abstract.sku AS abstract_sku,
  spy_product_abstract_localized_attributes.name AS abstract_name,
  spy_url.url AS abstract_url,
  spy_product_abstract_localized_attributes.attributes AS abstract_localized_attributes,
  abstract_price.price AS abstract_price,
  spy_product.attributes AS concrete_attributes,
  spy_product_localized_attributes.attributes AS concrete_localized_attributes,
  spy_product.sku AS sku,
  t.id_touch AS %s,
  t.item_id AS %s,
  spy_touch_storage.id_touch_storage AS %s
FROM spy_touch t
  INNER JOIN spy_product_abstract ON (t.item_id = spy_product_abstract.id_product_abstract)
  INNER JOIN spy_product_abstract_localized_attributes ON (spy_product_abstract.id_product_abstract = spy_product_abstract_localized_attributes.fk_product_abstract)
  INNER JOIN spy_locale ON (spy_product_abstract_localized_attributes.fk_locale = spy_locale.id_locale AND spy_locale.id_locale = :fk_locale_1)
  LEFT JOIN spy_url ON (spy_product_abstract.id_product_abstract = spy_url.fk_resource_product_abstract AND spy_url.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_price_product abstract_price ON (spy_product_abstract.id_product_abstract = abstract_price.fk_product_abstract)
  LEFT JOIN spy_product ON (spy_product_abstract.id_product_abstract = spy_product.fk_product_abstract AND spy_product.is_active)
  INNER JOIN spy_product_localized_attributes ON (spy_product.id_product = spy_product_localized_attributes.fk_product AND spy_product_localized_attributes.fk_locale = spy_locale.id_locale)
  LEFT JOIN spy_price_product concrete_price_table ON (spy_product.id_product = concrete_price_table.fk_product AND concrete_price_table.fk_price_type = 1)
  LEFT JOIN spy_price_type spy_price_type ON (concrete_price_table.fk_price_type = spy_price_type.id_price_type)
  LEFT JOIN spy_touch_storage ON spy_touch_storage.fk_touch = t.id_touch AND spy_touch_storage.fk_locale = :fk_locale_2
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
