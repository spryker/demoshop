<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport;

use Generated\Shared\Transfer\DataImporterConfigurationTransfer;
use Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\DataImport\DataImportConfig as SprykerDataImportConfig;

class DataImportConfig extends SprykerDataImportConfig
{

    const IMPORT_TYPE_CATEGORY = 'category';
    const IMPORT_TYPE_GLOSSARY = 'glossary';
    const IMPORT_TYPE_NAVIGATION = 'navigation';
    const IMPORT_TYPE_NAVIGATION_NODE = 'navigation-node';
    const IMPORT_TYPE_PRICE_TYPE = 'price-type';
    const IMPORT_TYPE_PRODUCT_PRICE = 'product-price';
    const IMPORT_TYPE_PRODUCT_STOCK = 'product-stock';
    const IMPORT_TYPE_PRODUCT_ABSTRACT = 'product-abstract';
    const IMPORT_TYPE_PRODUCT_CONCRETE = 'product-concrete';
    const IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY = 'product-attribute-key';
    const IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE = 'product-management-attribute';
    const IMPORT_TYPE_PRODUCT_RELATION = 'product-relation';
    const IMPORT_TYPE_PRODUCT_GROUP = 'product-group';
    const IMPORT_TYPE_PRODUCT_OPTION = 'product-option';
    const IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE_MAP = 'product-search-attribute-map';
    const IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE = 'product-search-attribute';
    const IMPORT_TYPE_SHIPMENT = 'shipment';
    const IMPORT_TYPE_STOCK = 'stock';
    const IMPORT_TYPE_TAX = 'tax';

    /**
     * @return string
     */
    protected function getDataImportRootPath()
    {
        return APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR;
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getGlossaryDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('glossary.csv', static::IMPORT_TYPE_GLOSSARY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getCategoryDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'category.csv', static::IMPORT_TYPE_CATEGORY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getTaxDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('tax.csv', static::IMPORT_TYPE_TAX);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductPriceDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_price.csv', static::IMPORT_TYPE_PRODUCT_PRICE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getPriceTypeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('price_type.csv', static::IMPORT_TYPE_PRICE_TYPE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductStockDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_stock.csv', static::IMPORT_TYPE_PRODUCT_STOCK);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getStockDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('stock.csv', static::IMPORT_TYPE_STOCK);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getShipmentDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('shipment.csv', static::IMPORT_TYPE_SHIPMENT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getNavigationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('navigation.csv', static::IMPORT_TYPE_NAVIGATION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getNavigationNodeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('navigation_node.csv', static::IMPORT_TYPE_NAVIGATION_NODE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductAbstractDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_abstract.csv', static::IMPORT_TYPE_PRODUCT_ABSTRACT);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductConcreteDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('icecat_biz_data' . DIRECTORY_SEPARATOR . 'product_concrete.csv', static::IMPORT_TYPE_PRODUCT_CONCRETE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductAttributeKeyDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_attribute_key.csv', static::IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductManagementAttributeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_management_attribute.csv', static::IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductRelationDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_relation.csv', static::IMPORT_TYPE_PRODUCT_RELATION);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductSearchAttributeMapDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_search_attribute_map.csv', static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE_MAP);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductSearchAttributeDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_search_attribute.csv', static::IMPORT_TYPE_PRODUCT_SEARCH_ATTRIBUTE);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductGroupDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_group.csv', static::IMPORT_TYPE_PRODUCT_GROUP);
    }

    /**
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    public function getProductOptionDataImporterConfiguration()
    {
        return $this->buildImporterConfiguration('product_option.csv', static::IMPORT_TYPE_PRODUCT_OPTION);
    }

    /**
     * @param string $file
     * @param string $importType
     *
     * @return \Generated\Shared\Transfer\DataImporterConfigurationTransfer
     */
    protected function buildImporterConfiguration($file, $importType)
    {
        $dataImportReaderConfigurationTransfer = new DataImporterReaderConfigurationTransfer();
        $dataImportReaderConfigurationTransfer->setFileName($this->getDataImportRootPath() . $file);

        $dataImporterConfigurationTransfer = new DataImporterConfigurationTransfer();
        $dataImporterConfigurationTransfer
            ->setImportType($importType)
            ->setReaderConfiguration($dataImportReaderConfigurationTransfer);

        return $dataImporterConfigurationTransfer;
    }

    /**
     * @return array
     */
    public function getAvailableLocales()
    {
        return Store::getInstance()->getLocales();
    }

}
