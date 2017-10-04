<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Category\CategoryConfig;
use Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet;
use Spryker\Zed\Collector\CollectorConfig;

class NavigationCollector extends CategoryNodeCollector
{

    /**
     * @var array
     */
    protected $allChunkCollectedSets = [];

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
        $this->allChunkCollectedSets = array_merge($this->allChunkCollectedSets, $collectedSet);

        foreach ($this->allChunkCollectedSets as $collectedItemData) {
            $parentId = $collectedItemData['fk_parent_category_node'];

            if ($parentId !== null) {
                continue;
            }

            $collectedItemData['children'] = $this->getChildren($collectedItemData, $this->allChunkCollectedSets);
            $collectedItemData['parents'] = $this->getParents($collectedItemData, $this->allChunkCollectedSets);

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
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return $this->formatCategoryNode($collectItemData);
    }

    /**
     * @param array $collectItemData
     *
     * @return array
     */
    protected function formatCategoryNode(array $collectItemData)
    {
        return [
            'node_id' => (int)$collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            'name' => $collectItemData['name'],
            'url' => $collectItemData['url'],
            'image' => $collectItemData['category_image_name'],
            'children' => $collectItemData['children'],
            'parents' => $collectItemData['parents'],
            'order' => (int)$collectItemData['node_order'],
            'meta_title' => $collectItemData['meta_title'],
            'meta_description' => $collectItemData['meta_description'],
            'meta_keywords' => $collectItemData['meta_keywords'],
        ];
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
        return CategoryConfig::RESOURCE_TYPE_NAVIGATION;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'category';
    }

}
