<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use Orm\Zed\Url\Persistence\Map\SpyUrlRedirectTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;

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
     * @param \Orm\Zed\Touch\Persistence\SpyTouchQuery $baseQuery
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Orm\Zed\Touch\Persistence\SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT,
            SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT,
            Criteria::INNER_JOIN
        );

        $baseQuery->clearSelectColumns();
        $baseQuery->withColumn(SpyUrlRedirectTableMap::COL_ID_URL_REDIRECT, self::KEY_ID);
        $baseQuery->withColumn(SpyUrlTableMap::COL_URL, self::KEY_FROM_URL);
        $baseQuery->withColumn(SpyUrlRedirectTableMap::COL_STATUS, self::KEY_STATUS);
        $baseQuery->withColumn(SpyUrlRedirectTableMap::COL_TO_URL, self::KEY_TO_URL);
        $baseQuery->withColumn(
            SpyTouchTableMap::COL_ID_TOUCH,
            self::TOUCH_EXPORTER_ID
        );

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet $touchUpdaterSet
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

            $touchUpdaterSet->add($redirectKey, $redirect[self::TOUCH_EXPORTER_ID]);
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

    /**
     * @param mixed $data
     *
     * @return mixed
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
