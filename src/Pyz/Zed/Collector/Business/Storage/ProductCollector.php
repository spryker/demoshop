<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyAbstractProductTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyLocalizedAbstractProductAttributesTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyLocalizedProductAttributesTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyProductTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyUrlTableMap;

// @TODO Interface for StorageCollectors
class ProductCollector
{
    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param $result
     *
     * @return array
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $query = $this->createQuery($baseQuery, $locale);

        $resultSets = $this->getBatchIterator($query);

        $result->setTotalCount($resultSets->count());

        foreach ($resultSets as $resultSet) {
            $exportableData = $this->processData($resultSet);

            $dataWriter->write($exportableData, 'abstract_product');
            $result->increaseProcessedCount(count($exportableData));
        }

        return $baseQuery;
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    private function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->clearSelectColumns();

        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ),
            'concreteProductJoin'
        );

        $baseQuery->addJoinCondition(
            'concreteProductJoin',
            SpyProductTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product.sku)',
            'concrete_skus'
        );

        $baseQuery->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $locale->getIdLocale(),
            Criteria::EQUAL
        );
        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->addJoinObject(
            (new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('product_urls'),
            'productUrlsJoin'
        );

        $baseQuery->addJoinCondition(
            'productUrlsJoin',
            'product_urls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'productAttributesJoin'
        );

        $baseQuery->addJoinCondition(
            'productAttributesJoin',
            SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');

        $baseQuery->withColumn(
            SpyAbstractProductTableMap::COL_ATTRIBUTES,
            'abstract_attributes'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES,
            'abstract_localized_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product.attributes SEPARATOR '$%')",
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product_localized_attributes.attributes SEPARATOR '$%')",
            'concrete_localized_attributes'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(product_urls.url)',
            'product_urls'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product_localized_attributes.name)',
            'concrete_names'
        );

        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_SKU, 'abstract_sku');
        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ATTRIBUTES, 'abstract_attributes');
        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');
        $baseQuery->groupBy('abstract_sku');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     *
     * @return array
     */
    protected function processData($resultSet)
    {
        $processedResultSet = [];

        $processedResultSet[] = $resultSet;

        return $processedResultSet;
    }

    /**
     * @param $baseQuery
     * @param int $chunkSize
     *
     * @return \SprykerFeature\Zed\Collector\Business\Exporter\BatchIterator
     */
    public function getBatchIterator($baseQuery, $chunkSize = 1000)
    {
        return new \SprykerFeature\Zed\Collector\Business\Exporter\BatchIterator($baseQuery, $chunkSize);
    }

}