<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyRedirectTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyUrlTableMap;

class RedirectCollector extends AbstractPropelCollectorPlugin
{
    use KeyBuilderTrait;

    const KEY_FROM_URL = 'from_url';
    const KEY_TO_URL = 'to_url';
    const KEY_STATUS = 'status';
    const KEY_ID = 'id';

    /**
     * @return string
     */
    protected function getTouchItemType()
    {
        return 'redirect';
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
            SpyRedirectTableMap::COL_ID_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyRedirectTableMap::COL_ID_REDIRECT,
            SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->clearSelectColumns();
        $baseQuery->withColumn(SpyRedirectTableMap::COL_ID_REDIRECT, self::KEY_ID);
        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, self::KEY_FROM_URL);
        $baseQuery->withColumn(SpyRedirectTableMap::COL_STATUS, self::KEY_STATUS);
        $baseQuery->withColumn(SpyRedirectTableMap::COL_TO_URL, self::KEY_TO_URL);

        return $baseQuery;
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
        foreach ($resultSet as $redirect) {
            $redirectKey = $this->generateResourceKey($redirect[self::KEY_ID], $locale->getLocaleName());
            $processedResultSet[$redirectKey] = [
                self::KEY_FROM_URL => $redirect[self::KEY_FROM_URL],
                self::KEY_TO_URL => $redirect[self::KEY_TO_URL],
                self::KEY_STATUS => $redirect[self::KEY_STATUS],
                self::KEY_ID => $redirect[self::KEY_ID],
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

}
