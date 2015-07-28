<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyUrlTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\ResourceAwareSpyUrlTableMap;

// @TODO Interface for StorageCollectors
class UrlCollector
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
            SpyUrlTableMap::COL_ID_URL,
            Criteria::INNER_JOIN
        );

        foreach (ResourceAwareSpyUrlTableMap::getResourceColumnNames() as $constantName => $value) {
            $alias = strstr($value, 'fk_resource');
            $baseQuery->withColumn(ResourceAwareSpyUrlTableMap::getConstantValue($constantName), $alias);
        }

        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, 'url');

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
        foreach ($resultSet as $index => $url) {
            $resourceArguments = $this->findResourceArguments($url);

            if (!$resourceArguments) {
                continue;
                // @TODO log a warning about a faulty url
            }

            $indexKey = $this->generateKey($url['url'], $locale->getLocaleName());
            $referenceKey = $this->generateResouceKey($resourceArguments, $locale->getLocaleName());
            $processedResultSet[$indexKey] = [
                'reference_key' => $referenceKey,
                'type' => $resourceArguments['resourceType'],
            ];
        }

        return $processedResultSet;
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
        return 'url';
    }

    /**
     * @param array $data
     * @param string $localeName
     *
     * @return string
     */
    public function generateResouceKey($data, $localeName)
    {
        $keyParts = [
            Store::getInstance()->getStoreName(),
            $localeName,
           'resource',
            $data['resourceType'].$data['value'],
        ];

        return $this->escapeKey(implode($this->keySeparator, $keyParts));
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