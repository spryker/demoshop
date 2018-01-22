<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Storage\Pdo\MySql;

use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use ReflectionClass;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class UrlCollectorQuery extends AbstractPdoCollectorQuery
{
    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $columnsSql = $this->getColumns();

        $sql = '
SELECT
    t.id_touch AS %s,
    t.item_id AS %s,
    spy_touch_storage.id_touch_storage AS %s,
    ' . $columnsSql . '
    u.url AS url
FROM spy_url u
    INNER JOIN spy_locale l ON (u.fk_locale = l.id_locale AND u.fk_locale = :fk_locale_1)
    INNER JOIN spy_touch t ON (
      u.id_url = t.item_id
      AND t.item_event = :spy_touch_item_event
      AND t.touched >= :spy_touch_touched
      AND t.item_type = :spy_touch_item_type
    )
    LEFT JOIN spy_touch_storage ON spy_touch_storage.fk_touch = t.id_touch AND spy_touch_storage.fk_locale = :fk_locale_2 AND spy_touch_storage.fk_store = :id_store
';
        $this->criteriaBuilder->sql($sql)
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale())
            ->setParameter('id_store', $this->idStore);
    }

    /**
     * @param string $alias
     *
     * @return string
     */
    protected function getColumns($alias = 'u')
    {
        $columnsSql = '';
        foreach ($this->getResourceColumnNames() as $value) {
            $columnAlias = strstr($value, 'fk_resource');
            $column = str_replace(SpyUrlTableMap::TABLE_NAME . '.', '', $value);
            $columnsSql .= sprintf(
                '%s.%s AS %s, ',
                $alias,
                $column,
                $columnAlias
            );
        }

        return rtrim($columnsSql, ',');
    }

    /**
     * @return array
     */
    protected function getResourceColumnNames()
    {
        $reflection = new ReflectionClass(SpyUrlTableMap::class);
        $constants = $reflection->getConstants();

        return array_filter($constants, function ($constant) {
            return strpos($constant, 'fk_resource');
        });
    }

    /**
     * @param string $constantName
     *
     * @return mixed
     */
    protected function getConstantValue($constantName)
    {
        $reflection = new ReflectionClass(SpyUrlTableMap::class);

        return $reflection->getConstant($constantName);
    }
}
