<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Collector\Persistence\Storage\Propel\ProductOptionCollectorQuery;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\ProductOption\ProductOptionConfig;

class ProductOptionCollector extends AbstractStoragePropelCollector
{

    /**
     * @param array $collectedSet
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function collectData(array $collectedSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
    {
        $setToExport = [];

        foreach ($collectedSet as $index => $collectedItemData) {
            $touchKey = $this->collectKey(
                $collectedItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
                $locale->getLocaleName(),
                $collectedItemData
            );

            $setToExport = $this->groupOptions($touchUpdaterSet, $touchKey, $collectedItemData, $setToExport);
        }

        return $setToExport;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return [
           ProductOptionCollectorQuery::GROUP_NAME => $collectItemData[ProductOptionCollectorQuery::GROUP_NAME],
           ProductOptionCollectorQuery::ACTIVE => $collectItemData[ProductOptionCollectorQuery::ACTIVE],
           'value' => [
               ProductOptionCollectorQuery::SKU => $collectItemData[ProductOptionCollectorQuery::SKU],
               ProductOptionCollectorQuery::PRICE => $collectItemData[ProductOptionCollectorQuery::PRICE],
               ProductOptionCollectorQuery::VALUE => $collectItemData[ProductOptionCollectorQuery::VALUE],
               ProductOptionCollectorQuery::ID_PRODUCT_OPTION_VALUE => $collectItemData[ProductOptionCollectorQuery::ID_PRODUCT_OPTION_VALUE],
           ]
        ];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductOptionConfig::RESOURCE_TYPE_PRODUCT_OPTION;
    }

    /**
     * @param \Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet $touchUpdaterSet
     * @param string $touchKey
     * @param array $collectedItemData
     * @param array $setToExport
     *
     * @return array
     */
    protected function groupOptions(
        TouchUpdaterSet $touchUpdaterSet,
        $touchKey,
        array $collectedItemData,
        array $setToExport
    ) {
        $productOption = $this->processCollectedItem($touchKey, $collectedItemData, $touchUpdaterSet);

        if (!isset($setToExport[$touchKey])) {
            $setToExport[$touchKey] = [];
        }

        $groupName = $productOption[ProductOptionCollectorQuery::GROUP_NAME];
        if (!isset($setToExport[$touchKey][$groupName])) {
            $setToExport[$touchKey][$groupName] = [];
        }

        $group = $setToExport[$touchKey][$groupName];

        $group[ProductOptionCollectorQuery::GROUP_NAME] = $groupName;
        $group[ProductOptionCollectorQuery::ACTIVE] = $productOption[ProductOptionCollectorQuery::ACTIVE];
        $group['values'][] = $productOption['value'];

        $setToExport[$touchKey][$groupName] = $group;

        return $setToExport;
    }

}
