<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet;
use Spryker\Zed\Collector\CollectorConfig;

class NavigationCollector extends CategoryNodeCollector
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
        $formattedCategoryNodes = [];
        $touchKey = $this->generateTouchKey($locale, []);

        foreach ($collectedSet as $collectedItemData) {
            $parentId = $collectedItemData['fk_parent_category_node'];

            if ($parentId !== null) {
                continue;
            }

            $collectedItemData['children'] = $this->getChildren($collectedItemData, $collectedSet);
            $collectedItemData['parents'] = $this->getParents($collectedItemData, $collectedSet);

            $formattedCategoryNodes[] = $this->collectItem($touchKey, $collectedItemData);

            $touchUpdaterSet->add($touchKey, $collectedItemData[CollectorConfig::COLLECTOR_TOUCH_ID], [
                CollectorConfig::COLLECTOR_STORAGE_KEY => $this->getCollectorStorageKeyId($collectedItemData),
                CollectorConfig::COLLECTOR_SEARCH_KEY => $this->getCollectorSearchKeyId($collectedItemData),
            ]);
        }

        $setToExport[$touchKey] = current($formattedCategoryNodes)['children'];

        return $setToExport;
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param array $collectedItemData
     *
     * @return string
     */
    protected function generateTouchKey(LocaleTransfer $localeTransfer, array $collectedItemData)
    {
        $touchKey = $this->collectKey('', $localeTransfer->getLocaleName(), []);
        $touchKey = rtrim($touchKey, '.');

        return $touchKey;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CategoryConstants::RESOURCE_TYPE_NAVIGATION;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'category';
    }

}
