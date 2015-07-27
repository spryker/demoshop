<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Product\Persistence\ProductQueryContainerInterface;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyAbstractProductTableMap;

// @TODO Interface for StorageCollectors
class ProductCollector
{
    public function __construct(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }


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
            //$this->writeExportableData($exportableData, $type);
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

        $this->productQueryContainer
            ->joinConcreteProducts($baseQuery)
            ->joinProductQueryWithLocalizedAttributes($baseQuery, $locale);

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