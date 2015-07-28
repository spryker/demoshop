<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyRedirectTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyUrlTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\ResourceAwareSpyUrlTableMap;

// @TODO Interface for StorageCollectors
class RedirectCollector
{

    use KeyBuilderTrait;

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param $result
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $query = $this->createQuery($baseQuery, $locale);

        $resultSets = $this->getBatchIterator($query);

        $result->setTotalCount($resultSets->count());

        foreach ($resultSets as $resultSet) {
            $collectedData = $this->processData($resultSet, $locale);

            $dataWriter->write($collectedData, '');
            $result->increaseProcessedCount(count($collectedData));
        }
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    private function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyRedirectTableMap::COL_ID_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyRedirectTableMap::COL_ID_REDIRECT,
            SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->clearSelectColumns();
        $baseQuery->withColumn(SpyRedirectTableMap::COL_ID_REDIRECT, 'redirect_id');
        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, 'from_url');
        $baseQuery->withColumn(SpyRedirectTableMap::COL_STATUS, 'status');
        $baseQuery->withColumn(SpyRedirectTableMap::COL_TO_URL, 'to_url');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale)
    {
        $processedResultSet = [];
        foreach ($resultSet as $index => $redirect) {
            $redirectKey = $this->generateResourceKey($redirect['redirect_id'], $locale->getLocaleName());
            $returnedResultSet[$redirectKey] = [
                'from_url' => $redirect['from_url'],
                'to_url' => $redirect['to_url'],
                'status' => $redirect['status'],
                'id' => $redirect['redirect_id'],
            ];
        }

        return $processedResultSet;
    }


    /**
     * @param string $data
     * @param string $localeName
     *
     * @return string
     */
    public function generateResourceKey($data, $localeName)
    {
        $keyParts = [
            Store::getInstance()->getStoreName(),
            $localeName,
            'resource',
            'redirect.' . $data,
        ];

        return $this->escapeKey(implode($this->keySeparator, $keyParts));
    }


    protected function buildKey($data)
    {
        return $data;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'resource';
    }

    /**
     * @param array $url
     *
     * @return array
     */
    protected function findResourceArguments(array $url)
    {
        foreach ($url as $columnName => $value) {
            if (strpos($columnName, 'fk_resource_') !== 0) {
                continue;
            }
            if ($value !== null) {
                $resourceType = str_replace('fk_resource_', '', $columnName);
                $resourceType = str_replace('_id', '', $resourceType);

                return [
                    'resourceType' => $resourceType,
                    'value' => $value,
                ];
            }
        }

        return false;
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