<?php

namespace Pyz\Zed\Cms\Communication\Table;

use PavFeature\Zed\Cms\Communication\Table\CmsPageTable as PavCmsPageTable;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use SprykerFeature\Zed\Gui\Communication\Table\TableConfiguration;

class CmsPageTable extends PavCmsPageTable
{
    const IS_ACTIVE = 'is_active';
    const LINKED_CATEGORY = 'linked_category';
    const LINKED_PRODUCT = 'linked_product';

    /**
     * @var int
     */
    protected $defaultLimit = 100;

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            SpyCmsPageTableMap::COL_ID_CMS_PAGE => 'Page Id',
            CmsQueryContainer::URL => 'url',
            CmsQueryContainer::TEMPLATE_NAME => 'Template',
            self::LINKED_PRODUCT => 'Linked Product',
            self::LINKED_CATEGORY => 'Linked Category',
            self::IS_ACTIVE => 'Is Active',
            self::ACTIONS => self::ACTIONS,
        ]);
        $config->setSortable([
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
        ]);

        $config->setSearchable([
            SpyCmsPageTableMap::COL_ID_CMS_PAGE,
            CmsQueryContainer::TEMPLATE_NAME,
            CmsQueryContainer::URL,
        ]);

        return $config;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config)
    {
        $query = $this->pageQuery;
        $queryResults = $this->runQuery($query, $config);
        $results = [];

        foreach ($queryResults as $item) {
            $results[] = [
                SpyCmsPageTableMap::COL_ID_CMS_PAGE => $item[SpyCmsPageTableMap::COL_ID_CMS_PAGE],
                CmsQueryContainer::TEMPLATE_NAME => $item[CmsQueryContainer::TEMPLATE_NAME],
                CmsQueryContainer::URL => $item[CmsQueryContainer::URL],
                self::LINKED_CATEGORY => $this->createCategoryLabel($item),
                self::LINKED_PRODUCT => $this->createProductLabel($item),
                self::IS_ACTIVE => $this->createIsActiveLabel($item[SpyCmsPageTableMap::COL_IS_ACTIVE]),
                self::ACTIONS => $this->buildLinks($item),
            ];
        }
        unset($queryResults);

        return $results;
    }

    /**
     * @param array $item
     *
     * @return string
     */
    private function buildLinks($item)
    {
        $buttons = [
            $this->generateEditButton(sprintf('/cms/page/edit/?id-page=%s', $item[SpyCmsPageTableMap::COL_ID_CMS_PAGE]), 'Edit page'),
        ];
        return implode('<br/><br/>', $buttons);
    }

    /**
     * @param bool $isActive
     * @param string $activeLabel
     * @param string $inactiveLabel
     *
     * @return string
     */
    protected function createIsActiveLabel($isActive, $activeLabel = 'Active', $inactiveLabel = 'Deactivated')
    {
        if ($isActive === true) {
            $statusLabel = sprintf(
                '<span class="label label-success" title="%s">%s</span>',
                $activeLabel,
                $activeLabel
            );
        } else {
            $statusLabel = sprintf(
                '<span class="label label-danger" title="%s">%s</span>',
                $inactiveLabel,
                $inactiveLabel
            );
        }

        return $statusLabel;
    }

    /**
     * @param array $pageItem
     *
     * @return string
     */
    protected function createCategoryLabel(array $pageItem)
    {
        $categoryLabel = [];

        if ($pageItem[CmsQueryContainer::ID_CATEGORY]) {
            $categoryLabel = [
                $pageItem[CmsQueryContainer::CATEGORY_NAME],
                $this->createIsActiveLabel($pageItem[CmsQueryContainer::CATEGORY_IS_ACTIVE]),
                $this->createIsActiveLabel($pageItem[CmsQueryContainer::CATEGORY_IN_MENU], 'In Menu', 'Not in Menu'),
                $this->generateViewButton(
                    sprintf('/product-category/edit?id-category=%s', $pageItem[CmsQueryContainer::ID_CATEGORY]),
                    'Show Category'
                ),
            ];
        }

        return implode('<br/><br/>', $categoryLabel);
    }

    /**
     * @param array $pageItem
     *
     * @return string
     */
    protected function createProductLabel(array $pageItem)
    {
        $productLabel = [];

        if ($pageItem[CmsQueryContainer::ID_ABSTRACT_PRODUCT]) {
            $productLabel = [
                'SKU: ' . $pageItem[CmsQueryContainer::ABSTRACT_PRODUCT_SKU],
                'Name: ' . $pageItem[CmsQueryContainer::ABSTRACT_PRODUCT_NAME],
                $this->generateViewButton(
                    sprintf('/product/index/view/?id-abstract-product=%s', $pageItem[CmsQueryContainer::ID_ABSTRACT_PRODUCT]),
                    'Show Product'
                ),
            ];
        }

        return implode('<br/><br/>', $productLabel);
    }
}
