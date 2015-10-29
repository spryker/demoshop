<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Shared\Kernel\Store;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;

class UrlCollector extends AbstractPropelCollectorPlugin
{

    use KeyBuilderTrait;

    protected function getTouchItemType()
    {
        return 'url';
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyUrlTableMap::COL_ID_URL,
            Criteria::INNER_JOIN
        );

        foreach ($this->getResourceColumnNames() as $constantName => $value) {
            $alias = strstr($value, 'fk_resource');
            $baseQuery->withColumn($this->getConstantValue($constantName), $alias);
        }

        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, 'url');

        return $baseQuery;
    }

    /**
     * @return array
     */
    public function getResourceColumnNames()
    {
        $reflection = new \ReflectionClass('Orm\Zed\Url\Persistence\Map\SpyUrlTableMap');
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
    public function getConstantValue($constantName)
    {
        $reflection = new \ReflectionClass('Orm\Zed\Url\Persistence\Map\SpyUrlTableMap');

        return $reflection->getConstant($constantName);
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $processedResultSet = [];
        foreach ($resultSet as $index => $url) {
            $resourceArguments = $this->findResourceArguments($url);

            if (!$resourceArguments) {
                continue;
                // @TODO log a warning about a faulty url
            }

            $indexKey = $this->generateKey($url['url'], $locale->getLocaleName());
            $referenceKey = $this->generateResourceKey($resourceArguments, $locale->getLocaleName());
            $processedResultSet[$indexKey] = [
                'reference_key' => $referenceKey,
                'type' => $resourceArguments['resourceType'],
            ];
        }

        return $processedResultSet;
    }

    /**
     * @param string $data
     *
     * @return string
     */
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
    public function generateResourceKey($data, $localeName)
    {
        $keyParts = [
            Store::getInstance()->getStoreName(),
            $localeName,
            'resource',
            $data['resourceType'] . '.' . $data['value'],
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

}
