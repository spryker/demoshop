<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Category\CategoryConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Collector\Business\Exporter\Writer\Storage\TouchUpdaterSet;
use Spryker\Zed\Collector\CollectorConfig;

class CategoryNodeCollector extends AbstractStoragePdoCollector
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

        foreach ($collectedSet as $collectedItemData) {
            $touchKey = $this->collectKey(
                $collectedItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
                $locale->getLocaleName(),
                $collectedItemData
            );

            $collectedItemData['children'] = $this->getChildren($collectedItemData, $collectedSet);
            $collectedItemData['parents'] = $this->getParents($collectedItemData, $collectedSet);

            $setToExport[$touchKey] = $this->processCollectedItem($touchKey, $collectedItemData, $touchUpdaterSet);
        }

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
        $touchKey = $this->collectKey(
            $collectedItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            $localeTransfer->getLocaleName(),
            $collectedItemData
        );

        return $touchKey;
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
            'template_path' => $collectItemData['template_path'],
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
     * @param array $node
     * @param array $data
     *
     * @return array
     */
    protected function getChildren(array $node, array $data)
    {
        $children = array_filter($data, function ($item) use ($node) {
            return ((int)$item['fk_parent_category_node'] === (int)$node['id_category_node']);
        });

        foreach (array_keys($children) as $index) {
            $children[$index]['children'] = $this->getChildren($children[$index], $data);
            $children[$index] = $this->formatCategoryNode($children[$index]);
        }

        return $children;
    }

    /**
     * @param array $node
     * @param array $data
     *
     * @return array
     */
    protected function getParents(array $node, array $data)
    {
        $parents = array_filter($data, function ($item) use ($node) {
            return ((int)$item['id_category_node'] === (int)$node['fk_parent_category_node']);
        });

        foreach (array_keys($parents) as $index) {
            $parents[$index]['parents'] = $this->getParents($parents[$index], $data);
            $parents[$index] = $this->formatCategoryNode($parents[$index]);
        }

        return $parents;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE;
    }
}
