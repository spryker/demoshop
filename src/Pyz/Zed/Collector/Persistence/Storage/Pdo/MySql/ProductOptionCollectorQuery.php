<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class ProductOptionCollectorQuery extends AbstractPdoCollectorQuery
{

    const ID_PRODUCT_OPTION_GROUP = 'id_product_option_group';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
SELECT
  GROUP_CONCAT(spy_product_abstract_product_option_group.fk_product_option_group) AS ' . static::ID_PRODUCT_OPTION_GROUP . ',
  spy_touch.id_touch                                                              AS %s,
  spy_touch.item_id                                                               AS %s,
  spy_touch_storage.id_touch_storage                                              AS %s
FROM spy_touch
  LEFT JOIN spy_touch_storage ON (spy_touch.id_touch = spy_touch_storage.fk_touch AND spy_touch_storage.fk_locale = :fk_storage_locale)
  INNER JOIN spy_product_abstract_product_option_group ON (spy_touch.item_id = spy_product_abstract_product_option_group.fk_product_abstract)
WHERE spy_touch.item_event = :spy_touch_item_event
  AND spy_touch.touched >= :spy_touch_touched
  AND spy_touch.item_type = :spy_touch_item_type
GROUP BY 
spy_touch.id_touch,  
spy_touch.item_id, 
spy_touch_storage.id_touch_storage
';
        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_storage_locale', $this->getLocale()->requireIdLocale()->getIdLocale());
    }

}
