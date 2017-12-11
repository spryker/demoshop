<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Persistence\Search\Pdo\PostgreSql;

use Orm\Zed\ProductReview\Persistence\Map\SpyProductReviewTableMap;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Collector\Persistence\Collector\AbstractPdoCollectorQuery;

class ProductCollectorQuery extends AbstractPdoCollectorQuery
{
    const CONCAT_DELIMITER = "':'";

    /**
     * @return void
     */
    protected function prepareQuery()
    {
        $sql = '
            SELECT
                MIN(spy_product_abstract.id_product_abstract)                                                 AS id_product_abstract,
                MIN(spy_product_abstract.attributes)                                                          AS abstract_attributes,
                MIN(spy_product_abstract_localized_attributes.attributes)                                     AS abstract_localized_attributes,
                GROUP_CONCAT(DISTINCT CONCAT(spy_product.sku, ' . static::CONCAT_DELIMITER . ', spy_product.attributes))                          AS concrete_attributes,
                GROUP_CONCAT(DISTINCT CONCAT(spy_product.sku, ' . static::CONCAT_DELIMITER . ', spy_product_localized_attributes.attributes))     AS concrete_localized_attributes,
                MIN(product_urls.url)                                                                         AS product_urls,
                MIN(spy_product_abstract_localized_attributes.name)                                           AS abstract_name,
                MIN("spy_product_abstract_localized_attributes"."description")                                AS abstract_description,
                GROUP_CONCAT(DISTINCT CONCAT(spy_product.sku, ' . static::CONCAT_DELIMITER . ', spy_product_localized_attributes.name))  AS concrete_names,
                GROUP_CONCAT(spy_product_localized_attributes.description)                                    AS concrete_descriptions,
                MIN(spy_product_abstract.sku)                                                                 AS abstract_sku,
                GROUP_CONCAT(DISTINCT spy_product.sku)                                                        AS concrete_skus,
                GROUP_CONCAT(DISTINCT spy_product_category.fk_category)         AS category_ids,
                GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)       AS category_node_ids,
                GROUP_CONCAT(DISTINCT spy_product_abstract.is_featured)         AS is_featured,
                MIN(spy_product_image_set.id_product_image_set)                 AS id_image_set,
                GROUP_CONCAT(DISTINCT CONCAT(spy_product.sku, ' . static::CONCAT_DELIMITER . ', cast(spy_product.is_active as TEXT))) AS product_status_aggregation,
                GROUP_CONCAT(DISTINCT CONCAT(spy_product.sku, ' . static::CONCAT_DELIMITER . ', cast(spy_product_search.is_searchable as TEXT))) AS product_searchable_status_aggregation,
                AVG(spy_product_review.rating)                                  AS average_rating,
                COUNT(spy_product_review.fk_product_abstract)                   AS review_count,
                spy_product_abstract_store.fk_store                             AS is_in_store,
                spy_touch.id_touch                                              AS %s,
                spy_touch.item_id                                               AS %s,
                spy_touch_search.id_touch_search                                AS %s
            FROM spy_touch
                INNER JOIN spy_product_abstract 
                  ON (spy_touch.item_id = spy_product_abstract.id_product_abstract)
                LEFT JOIN spy_product_abstract_store
                  ON (spy_product_abstract.id_product_abstract = spy_product_abstract_store.fk_product_abstract AND spy_product_abstract_store.fk_store = :id_store)
                INNER JOIN spy_product
                  ON (spy_product_abstract.id_product_abstract = spy_product.fk_product_abstract AND spy_product.is_active)
                INNER JOIN spy_product_abstract_localized_attributes
                  ON (spy_product_abstract.id_product_abstract = spy_product_abstract_localized_attributes.fk_product_abstract)
                INNER JOIN spy_locale 
                  ON (spy_product_abstract_localized_attributes.fk_locale = spy_locale.id_locale)
                INNER JOIN spy_url product_urls
                  ON (spy_product_abstract.id_product_abstract = product_urls.fk_resource_product_abstract AND
                      product_urls.fk_locale = spy_locale.id_locale)
                INNER JOIN spy_product_localized_attributes
                  ON (spy_product.id_product = spy_product_localized_attributes.fk_product AND
                      spy_product_localized_attributes.fk_locale = spy_locale.id_locale)
                INNER JOIN spy_product_search 
                  ON (spy_product.id_product = spy_product_search.fk_product AND
                      spy_product_search.fk_locale = spy_locale.id_locale)
                INNER JOIN spy_product_category 
                  ON (spy_product_category.fk_product_abstract = spy_product_abstract.id_product_abstract)
                INNER JOIN spy_category_node
                  ON (spy_product_category.fk_category = spy_category_node.fk_category)
                INNER JOIN spy_stock_product 
                  ON (spy_product.id_product = spy_stock_product.fk_product)
                LEFT JOIN spy_touch_search 
                  ON (spy_touch_search.fk_touch = spy_touch.id_touch AND
                      spy_touch_search.fk_locale = spy_locale.id_locale)
                LEFT JOIN spy_product_image_set 
                  ON (spy_product_image_set.fk_product_abstract = spy_product_abstract.id_product_abstract AND (
                  spy_product_image_set.fk_locale = spy_locale.id_locale OR spy_product_image_set.fk_locale IS NULL))
                LEFT JOIN spy_product_review
                  ON (spy_product_review.fk_product_abstract = spy_product_abstract.id_product_abstract AND
                      spy_product_review.status = :review_status)
            WHERE
                spy_touch.item_event = :spy_touch_item_event
                AND spy_touch.touched >= :spy_touch_touched
                AND spy_touch.item_type = :spy_touch_item_type
                AND spy_locale.is_active = TRUE
                AND spy_locale.id_locale = :id_locale
        ';

        $this->criteriaBuilder
            ->sql($sql)
            ->setGroupBy('
                spy_touch.id_touch,
                spy_touch_search.id_touch_search,
                spy_product_image_set.id_product_image_set,
                spy_product_abstract_store.fk_store
            ')
            ->setParameter(':id_locale', $this->locale->getIdLocale())
            ->setParameter(':review_status', $this->getApprovedReviewStatus())
            ->setParameter(':id_store', $this->getCurrentIdStore());
    }

    /**
     * @return int
     */
    protected function getCurrentIdStore()
    {
        $currentStoreName = Store::getInstance()->getStoreName();
        $currentIdStore = SpyStoreQuery::create()->findOneByName($currentStoreName)->getIdStore();

        return $currentIdStore;
    }

    /**
     * @return int
     */
    protected function getApprovedReviewStatus()
    {
        $productReviewStatusValueSet = SpyProductReviewTableMap::getValueSet(SpyProductReviewTableMap::COL_STATUS);
        $convertedStatus = array_search(SpyProductReviewTableMap::COL_STATUS_APPROVED, $productReviewStatusValueSet);

        return $convertedStatus;
    }
}
