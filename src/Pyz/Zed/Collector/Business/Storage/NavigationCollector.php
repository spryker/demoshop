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
            $collectedSet[$index]['children'] = [];
            $collectedSet[$index]['parents'] = [];
        }

        foreach ($collectedSet as $index => $collectedItemData) {
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
            'node_id' => $collectItemData['id_category_node'],
            'name' => $collectItemData['name'],
            'url' => $collectItemData['url'],
            'image' => $collectItemData['category_image_name'],
            'children' => $collectItemData['children'],
            'parents' => $collectItemData['parents'],
        ];
    }

    /**
     * @param array $node
     * @param array $data
     * @param bool $nested
     *
     * @return array
     */
    protected function getChildren(array $node, array $data, $nested = true)
    {
        $children = array_filter($data, function ($item) use ($node) {
            return ((int)$item['fk_parent_category_node'] === (int)$node['id_category_node']);
        });

        foreach ($children as $index => $child) {
            if ($nested) {
                $children[$index]['children'] = $this->getChildren($children[$index], $data);
            }

            $children[$index] = $this->formatCategoryNode($children[$index]);
        }

        return $children;
    }

    /**
     * @param array $node
     * @param array $data
     * @param bool $nested
     *
     * @return array
     */
    protected function getParents(array $node, array $data, $nested = true)
    {
        $parents = array_filter($data, function ($item) use ($node) {
            return ((int)$item['id_category_node'] === (int)$node['fk_parent_category_node']);
        });

        foreach ($parents as $index => $parent) {
            if ($nested) {
                $parents[$index]['parents'] = $this->getParents($parents[$index], $data);
            }
            $parents[$index] = $this->formatCategoryNode($parents[$index]);
        }

        return $parents;
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
