<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\PostgreSql;

use Spryker\Shared\Navigation\NavigationConfig;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class NavigationMenuCollectorQuery extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
            SELECT
                n.id_navigation,
                n.key,
                t.id_touch AS %s,
                t.item_id AS %s,
                spy_touch_storage.id_touch_storage AS %s
            FROM spy_navigation n
                INNER JOIN spy_touch t ON (
                    n.id_navigation = t.item_id
                    AND t.item_event = :spy_touch_item_event
                    AND t.touched >= :spy_touch_touched
                    AND t.item_type = :spy_touch_item_type
                )
                LEFT JOIN spy_touch_storage ON (
                    spy_touch_storage.fk_touch = t.id_touch AND
                    spy_touch_storage.fk_locale = :fk_locale
                )
        ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_locale', $this->locale->getIdLocale());
    }

}
