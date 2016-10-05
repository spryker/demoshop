<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class AttributeMapCollectorQuery extends AbstractPdoCollectorQuery
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
  spy_product_localized_attributes.attributes AS localized_attributes,
  t.id_touch AS %s,
  t.item_id AS %s,
  spy_touch_storage.id_touch_storage AS %s
FROM spy_touch t
  INNER JOIN spy_product ON (t.item_id = spy_product.fk_product_abstract)
  INNER JOIN spy_product_localized_attributes ON (spy_product.id_product = spy_product_localized_attributes.fk_product)
  LEFT JOIN spy_touch_storage ON (spy_touch_storage.fk_touch = t.id_touch AND spy_touch_storage.fk_locale = :fk_locale_1)
WHERE
  t.item_event = :spy_touch_item_event
  AND t.touched >= :spy_touch_touched
  AND t.item_type = :spy_touch_item_type
  AND spy_product_localized_attributes.fk_locale = :fk_locale_2
        ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale());

    }
}
