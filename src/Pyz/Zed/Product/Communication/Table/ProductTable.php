<?php

namespace Pyz\Zed\Product\Communication\Table;

use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Pyz\Zed\Product\Persistence\ProductQueryContainer;
use SprykerFeature\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use SprykerFeature\Zed\Product\Communication\Table\ProductTable as SprykerProductTable;

class ProductTable extends SprykerProductTable
{
    const OLD_SKU = 'old_sku';
    const CONFIGURED_PRODUCTS = 'configured_products';

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
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT => 'Id Abstract Product',
            SpyAbstractProductTableMap::COL_SKU => 'SKU',
            SpyAbstractProductTableMap::COL_TYPE => 'Type',
            ProductQueryContainer::ABSTRACT_PRODUCT_NAME => 'Name',
            self::OLD_SKU => 'Magento SKU',
            self::CONFIGURED_PRODUCTS => 'Configured Products',
            self::OPTIONS => self::OPTIONS,
        ]);

        $config->setSearchable([
            SpyAbstractProductTableMap::COL_SKU,
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
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
        $queryResults = $this->runQuery($this->productQuery, $config);

        $abstractProducts = [];
        foreach ($queryResults as $item) {
            $itemAttributes = json_decode($item[SpyAbstractProductTableMap::COL_ATTRIBUTES], true);
            $abstractProducts[] = [
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT => $item[SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT],
                SpyAbstractProductTableMap::COL_SKU => $item[SpyAbstractProductTableMap::COL_SKU],
                SpyAbstractProductTableMap::COL_TYPE => $item[SpyAbstractProductTableMap::COL_TYPE],
                ProductQueryContainer::ABSTRACT_PRODUCT_NAME => $item[ProductQueryContainer::ABSTRACT_PRODUCT_NAME],
                self::OLD_SKU => $itemAttributes[self::OLD_SKU],
                self::CONFIGURED_PRODUCTS => $this->extractConfiguredProducts($item),
                self::OPTIONS => $this->createActionColumn($item),
            ];
        }

        return $abstractProducts;
    }

    /**
     * @param array $item
     *
     * @return string
     */
    protected function extractConfiguredProducts(array $item)
    {
        $configuredProductSkus = json_decode($item[ProductQueryContainer::CONFIGURED_PRODUCT_SKUS], true);
        $configuredProductNames = json_decode($item[ProductQueryContainer::CONFIGURED_PRODUCT_NAMES], true);

        $configuredProducts = '';
        foreach ($configuredProductSkus as $index => $sku) {
            if ($sku === null) {
                break;
            }
            $configuredProducts .= sprintf(
                '<b>SKU:</b> %s <b>Name:</b> %s <br/>',
                $sku,
                $configuredProductNames[$index]
            );
        }

        return $configuredProducts;
    }
}
