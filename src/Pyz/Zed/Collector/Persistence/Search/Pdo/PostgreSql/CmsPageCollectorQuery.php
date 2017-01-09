<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql;

use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class CmsPageCollectorQuery extends AbstractPdoCollectorQuery
{

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
            SELECT
                spy_cms_page.id_cms_page,
                MIN(spy_url.url) AS url,
                MIN(spy_cms_page_localized_attributes.name) AS name,
                MIN(spy_cms_page_localized_attributes.meta_title) AS meta_title,
                MIN(spy_cms_page_localized_attributes.meta_keywords) AS meta_keywords,
                MIN(spy_cms_page_localized_attributes.meta_description) AS meta_description,
                GROUP_CONCAT(spy_glossary_translation.value) AS content,
                MIN(spy_touch.id_touch) AS %s,
                MIN(spy_touch.item_id) AS %s,
                MIN(spy_touch_search.id_touch_search) AS %s
            FROM spy_cms_page
                INNER JOIN spy_cms_page_localized_attributes ON (
                    spy_cms_page.id_cms_page = spy_cms_page_localized_attributes.fk_cms_page
                    AND spy_cms_page_localized_attributes.fk_locale = :fk_locale_1
                ) 
                INNER JOIN spy_url ON (
                    spy_url.fk_resource_page = spy_cms_page.id_cms_page
                    AND spy_url.fk_locale = :fk_locale_2
                )
                INNER JOIN spy_cms_glossary_key_mapping ON spy_cms_page.id_cms_page = spy_cms_glossary_key_mapping.fk_page
                INNER JOIN spy_glossary_key ON spy_cms_glossary_key_mapping.fk_glossary_key = spy_glossary_key.id_glossary_key
                INNER JOIN spy_glossary_translation ON (
                    spy_glossary_key.id_glossary_key = spy_glossary_translation.fk_glossary_key
                    AND spy_glossary_translation.fk_locale = :fk_locale_3
                )
                INNER JOIN spy_touch ON (
                    spy_cms_page.id_cms_page = spy_touch.item_id
                    AND spy_touch.item_event = :spy_touch_item_event
                    AND spy_touch.touched >= :spy_touch_touched
                    AND spy_touch.item_type = :spy_touch_item_type
                )
                LEFT JOIN spy_touch_search ON spy_touch.id_touch = spy_touch_search.fk_touch
            WHERE
                spy_cms_page.is_active = TRUE
                AND spy_cms_page.is_searchable = TRUE
            GROUP BY
                spy_cms_page.id_cms_page
        ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setParameter('fk_locale_1', $this->locale->getIdLocale())
            ->setParameter('fk_locale_2', $this->locale->getIdLocale())
            ->setParameter('fk_locale_3', $this->locale->getIdLocale());
    }

}
