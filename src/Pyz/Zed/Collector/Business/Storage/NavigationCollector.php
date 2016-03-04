<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet;
use Spryker\Zed\Collector\CollectorConfig;

class NavigationCollector extends AbstractStoragePdoCollector
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
        $touchKey = $this->collectKey('', $locale->getLocaleName(), []);
        $touchKey = rtrim($touchKey, '.');

        foreach ($collectedSet as $index => $collectedItemData) {
            $formattedCategoryNodes[] = $this->formatCategoryNode($collectedItemData);
            $touchUpdaterSet->add($touchKey, $collectedItemData[CollectorConfig::COLLECTOR_TOUCH_ID], [
                CollectorConfig::COLLECTOR_STORAGE_KEY => $this->getCollectorStorageKeyId($collectedItemData),
                CollectorConfig::COLLECTOR_SEARCH_KEY => $this->getCollectorSearchKeyId($collectedItemData),
            ]);
        }

        $setToExport[$touchKey] = $formattedCategoryNodes;

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
     * @return string
     */
    protected function collectResourceType()
    {
        return CategoryConstants::RESOURCE_TYPE_NAVIGATION;
    }

    /**
     * @param array $categoryNode
     *
     * @return array
     */
    protected function formatCategoryNode(array $categoryNode)
    {
        $categoryUrls = explode(',', $categoryNode['category_urls']);

        return [
            'node_id' => $categoryNode['node_id'],
            'name' => $categoryNode['category_name'],
            'url' => $categoryUrls[0],
            'image' => $categoryNode['category_image_name'],
            'children' => $this->explodeGroupedNodes(
                $categoryNode,
                'category_child_ids',
                'category_child_names',
                'category_child_urls'
            ),
            'parents' => $this->explodeGroupedNodes(
                $categoryNode,
                'category_parent_ids',
                'category_parent_names',
                'category_parent_urls'
            ),
        ];
    }

    /**
     * @param array $data
     * @param string $idsField
     * @param string $namesField
     * @param string $urlsField
     *
     * @return array
     */
    public function explodeGroupedNodes(array $data, $idsField, $namesField, $urlsField)
    {
        if (!$data[$idsField]) {
            return [];
        }
        $ids = explode(',', $data[$idsField]);
        $names = explode(',', $data[$namesField]);
        $urls = explode(',', $data[$urlsField]);
        $nodes = [];

        foreach ($ids as $key => $id) {
            $nodes[$id]['node_id'] = $id;
            $nodes[$id]['name'] = $names[$key];
            $nodes[$id]['url'] = $urls[$key];
        }

        return $nodes;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'category';
    }

}
