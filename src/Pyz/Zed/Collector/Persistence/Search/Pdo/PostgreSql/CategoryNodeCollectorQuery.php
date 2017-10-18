<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class CategoryNodeCollectorQuery extends AbstractPdoCollectorQuery
{
    const COL_IS_ACTIVE = 'is_active';
    const COL_IS_SEARCHABLE = 'is_searchable';

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
            SELECT 
                spy_category.id_category,
                spy_category.is_searchable as ' . static::COL_IS_SEARCHABLE . ',
                spy_category.is_active as ' . static::COL_IS_ACTIVE . ',
                spy_category_node.id_category_node,
                spy_category_attribute.name,
                spy_category_attribute.meta_keywords,
                spy_category_attribute.meta_description,
                spy_category_attribute.meta_title,
                spy_url.url,
                spy_touch.id_touch AS %s,
                spy_touch.item_id AS %s,
                spy_touch_search.id_touch_search AS %s
            FROM spy_category_node
                INNER JOIN spy_category ON spy_category_node.fk_category = spy_category.id_category AND spy_category.is_active = TRUE
                INNER JOIN spy_category_attribute ON spy_category.id_category = spy_category_attribute.fk_category
                INNER JOIN spy_touch ON (
                    spy_category_node.id_category_node = spy_touch.item_id
                    AND spy_touch.item_event = :spy_touch_item_event
                    AND spy_touch.touched >= :spy_touch_touched
                    AND spy_touch.item_type = :spy_touch_item_type
                )
                INNER JOIN spy_url ON (
                    spy_url.fk_resource_categorynode = spy_category_node.id_category_node
                    AND spy_url.fk_locale = :fk_locale_1
                )
                LEFT JOIN spy_touch_search ON spy_touch.id_touch = spy_touch_search.fk_touch AND spy_touch_search.fk_locale = :fk_locale_2
            WHERE
                spy_category_attribute.fk_locale = :fk_locale_3
        ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale())
        ->setParameter('fk_locale_3', $this->locale->getIdLocale());
    }
}
