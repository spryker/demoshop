<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business;

use Pyz\Zed\DataImport\Business\Model\Category\AddCategoryKeysStep;
use Pyz\Zed\DataImport\Business\Model\Category\CategoryRebuildCacheStep;
use Pyz\Zed\DataImport\Business\Model\Category\CategoryWriterStep;
use Pyz\Zed\DataImport\Business\Model\Country\CountryNameToIdCountryStep;
use Pyz\Zed\DataImport\Business\Model\Glossary\GlossaryWriterStep;
use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep;
use Pyz\Zed\DataImport\Business\Model\Navigation\NavigationKeyToIdNavigationStep;
use Pyz\Zed\DataImport\Business\Model\Navigation\NavigationWriterStep;
use Pyz\Zed\DataImport\Business\Model\NavigationNode\NavigationNodeWriterStep;
use Pyz\Zed\DataImport\Business\Model\Price\PriceTypeToIdPriceTypeStep;
use Pyz\Zed\DataImport\Business\Model\Price\PriceWriterStep;
use Pyz\Zed\DataImport\Business\Model\Product\AttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Product\LocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\AbstractSkuToIdAbstractProductStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\AddProductAbstractSkusStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\ProductAbstractWriter;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\ProductAttributeKeyWriter;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ConcreteSkuToIdProductStep;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ProductConcreteWriter;
use Pyz\Zed\DataImport\Business\Model\ProductManagementAttribute\ProductManagementAttributeWriter;
use Pyz\Zed\DataImport\Business\Model\ProductRelation\ProductRelationWriter;
use Pyz\Zed\DataImport\Business\Model\ProductSearchAttribute\ProductSearchAttributeWriter;
use Pyz\Zed\DataImport\Business\Model\ProductSearchAttributeMap\ProductSearchAttributeMapWriter;
use Pyz\Zed\DataImport\Business\Model\Shipment\ShipmentWriterStep;
use Pyz\Zed\DataImport\Business\Model\Stock\StockNameToIdStockStep;
use Pyz\Zed\DataImport\Business\Model\Stock\StockWriterStep;
use Pyz\Zed\DataImport\Business\Model\Tax\TaxSetNameToIdTaxSetStep;
use Pyz\Zed\DataImport\Business\Model\Tax\TaxWriterStep;
use Pyz\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Shared\ProductSearch\Code\KeyBuilder\FilterGlossaryKeyBuilder;
use Spryker\Zed\DataImport\Business\DataImportBusinessFactory as SprykerDataImportBusinessFactory;

/**
 * @method \Pyz\Zed\DataImport\DataImportConfig getConfig()
 */
class DataImportBusinessFactory extends SprykerDataImportBusinessFactory
{

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    public function getImporter()
    {
        $dataImporterCollection = $this->createDataImporterCollection();
        $dataImporterCollection
            ->addDataImporter($this->createCategoryImporter())
            ->addDataImporter($this->createGlossaryImporter())
            ->addDataImporter($this->createNavigationImporter())
            ->addDataImporter($this->createNavigationNodeImporter())
            ->addDataImporter($this->createProductAbstractImporter())
            ->addDataImporter($this->createProductConcreteImporter())
            ->addDataImporter($this->createProductAttributeKeyImporter())
            ->addDataImporter($this->createProductManagementAttributeImporter())
            ->addDataImporter($this->createProductRelationImporter())
            ->addDataImporter($this->createProductSearchAttributeMapImporter())
            ->addDataImporter($this->createProductSearchAttributeImporter())
            ->addDataImporter($this->createPriceImporter())
            ->addDataImporter($this->createStockImporter())
            ->addDataImporter($this->createShipmentImporter())
            ->addDataImporter($this->createTaxImporter());

        return $dataImporterCollection;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    protected function createGlossaryImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getGlossaryDataImporterConfiguration());

        $dataSetImporter = $this->createDataSetImporter();
        $dataSetImporter->addDataImportStep($this->createLocaleNameToIdStep());
        $dataSetImporter->addDataImportStep(new GlossaryWriterStep());

        $dataImporter->addDataSetImporter($dataSetImporter);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    protected function createCategoryImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getCategoryDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createLocaleNameToIdStep());
        $dataSet->addDataImportStep(new CategoryWriterStep());
        $dataSet->addDataImportStep($this->createCategoryRebuildCacheStep());
        $dataSet->addDataImportStep($this->createTouchStep(CategoryWriterStep::TOUCH_ITEM_TYPE_KEY, CategoryWriterStep::TOUCH_ITEM_ID_KEY));
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Category\CategoryRebuildCacheStep
     */
    protected function createCategoryRebuildCacheStep()
    {
        return new CategoryRebuildCacheStep(
            $this->getCategoryFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Category\Business\CategoryFacade
     */
    protected function getCategoryFacade()
    {
        return $this->getProvidedDependency(DataImportDependencyProvider::FACADE_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createPriceImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getPriceDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createPriceTypeToIdPriceTypeStep());
        $dataSet->addDataImportStep($this->createAbstractSkuToIdAbstractProductStep());
        $dataSet->addDataImportStep($this->createConcreteSkuToIdProductStep());
        $dataSet->addDataImportStep(new PriceWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createStockImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getStockDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createStockNameToIdStockStep());
        $dataSet->addDataImportStep($this->createConcreteSkuToIdProductStep());
        $dataSet->addDataImportStep(new StockWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createShipmentImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getShipmentDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createTaxSetNameToIdTaxSetStep());
        $dataSet->addDataImportStep(new ShipmentWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createTaxImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getTaxDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createCountryNameToIdCountryStep());
        $dataSet->addDataImportStep(new TaxWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createNavigationImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getNavigationDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep(new NavigationWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createNavigationNodeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getNavigationNodeDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddLocalesStep());
        $dataSet->addDataImportStep($this->createNavigationKeyToIdNavigationStep('navigation_key'));
        $dataSet->addDataImportStep($this->createLocalizedAttributesExtractorStep(['title', 'url', 'css_class']));
        $dataSet->addDataImportStep(new NavigationNodeWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Navigation\NavigationKeyToIdNavigationStep
     */
    protected function createNavigationKeyToIdNavigationStep($source = NavigationKeyToIdNavigationStep::KEY_SOURCE, $target = NavigationKeyToIdNavigationStep::KEY_TARGET)
    {
        return new NavigationKeyToIdNavigationStep($source, $target);
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductAbstractImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductAbstractDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddLocalesStep());
        $dataSet->addDataImportStep($this->createAddCategoryKeysStep());
        $dataSet->addDataImportStep($this->createTaxSetNameToIdTaxSetStep('tax_set_name'));
        $dataSet->addDataImportStep($this->createAttributesExtractorStep());
        $dataSet->addDataImportStep($this->createLocalizedAttributesExtractorStep([
            'name',
            'description',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ]));
        $dataSet->addDataImportStep(new ProductAbstractWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductConcreteImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductConcreteDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAbstractSkuToIdAbstractProductStep('abstract_sku'));
        $dataSet->addDataImportStep($this->createAddLocalesStep());
        $dataSet->addDataImportStep($this->createAttributesExtractorStep());
        $dataSet->addDataImportStep($this->createLocalizedAttributesExtractorStep([
            'name',
            'description',
            'is_searchable',
        ]));
        $dataSet->addDataImportStep(new ProductConcreteWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductAttributeKeyImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductAttributeKeyDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep(new ProductAttributeKeyWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductManagementAttributeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductManagementAttributeDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddLocalesStep());
        $dataSet->addDataImportStep($this->createAddProductAttributeKeysStep());
        $dataSet->addDataImportStep($this->createLocalizedAttributesExtractorStep([
            'key',
            'values',
        ]));
        $dataSet->addDataImportStep(new ProductManagementAttributeWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductRelationImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductRelationDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddProductAbstractSkusStep());
        $dataSet->addDataImportStep(new ProductRelationWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductSearchAttributeMapImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductSearchAttributeMapDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddProductAttributeKeysStep());
        $dataSet->addDataImportStep(new ProductSearchAttributeMapWriter());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporterAwareInterface
     */
    protected function createProductSearchAttributeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductSearchAttributeDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createAddLocalesStep());
        $dataSet->addDataImportStep($this->createAddProductAttributeKeysStep());
        $dataSet->addDataImportStep($this->createLocalizedAttributesExtractorStep(['key']));
        $dataSet->addDataImportStep(new ProductSearchAttributeWriter($this->createSearchGlossaryKeyBuilder()));
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Shared\ProductSearch\Code\KeyBuilder\FilterGlossaryKeyBuilder
     */
    protected function createSearchGlossaryKeyBuilder()
    {
        return new FilterGlossaryKeyBuilder();
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep
     */
    protected function createAddLocalesStep()
    {
        return new AddLocalesStep($this->getConfig()->getAvailableLocales());
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Category\AddCategoryKeysStep
     */
    protected function createAddCategoryKeysStep()
    {
        return new AddCategoryKeysStep();
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Product\AttributesExtractorStep
     */
    protected function createAttributesExtractorStep()
    {
        return new AttributesExtractorStep();
    }

    /**
     * @param array $defaultAttributes
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Product\LocalizedAttributesExtractorStep
     */
    protected function createLocalizedAttributesExtractorStep(array $defaultAttributes = [])
    {
        return new LocalizedAttributesExtractorStep($defaultAttributes);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\ProductAbstract\AbstractSkuToIdAbstractProductStep
     */
    protected function createAbstractSkuToIdAbstractProductStep($source = AbstractSkuToIdAbstractProductStep::KEY_SOURCE, $target = AbstractSkuToIdAbstractProductStep::KEY_TARGET)
    {
        return new AbstractSkuToIdAbstractProductStep($source, $target);
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\ProductAbstract\AddProductAbstractSkusStep
     */
    protected function createAddProductAbstractSkusStep()
    {
        return new AddProductAbstractSkusStep();
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Stock\StockNameToIdStockStep
     */
    protected function createStockNameToIdStockStep($source = StockNameToIdStockStep::KEY_SOURCE, $target = StockNameToIdStockStep::KEY_TARGET)
    {
        return new StockNameToIdStockStep($source, $target);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\ProductConcrete\ConcreteSkuToIdProductStep
     */
    protected function createConcreteSkuToIdProductStep($source = ConcreteSkuToIdProductStep::KEY_SOURCE, $target = ConcreteSkuToIdProductStep::KEY_TARGET)
    {
        return new ConcreteSkuToIdProductStep($source, $target);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Price\PriceTypeToIdPriceTypeStep
     */
    protected function createPriceTypeToIdPriceTypeStep($source = PriceTypeToIdPriceTypeStep::KEY_SOURCE, $target = PriceTypeToIdPriceTypeStep::KEY_TARGET)
    {
        return new PriceTypeToIdPriceTypeStep($source, $target);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep
     */
    protected function createLocaleNameToIdStep($source = LocaleNameToIdLocaleStep::KEY_SOURCE, $target = LocaleNameToIdLocaleStep::KEY_TARGET)
    {
        return new LocaleNameToIdLocaleStep($source, $target);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Country\CountryNameToIdCountryStep
     */
    protected function createCountryNameToIdCountryStep($source = CountryNameToIdCountryStep::KEY_SOURCE, $target = CountryNameToIdCountryStep::KEY_TARGET)
    {
        return new CountryNameToIdCountryStep($source, $target);
    }

    /**
     * @param string $source
     * @param string $target
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Tax\TaxSetNameToIdTaxSetStep
     */
    protected function createTaxSetNameToIdTaxSetStep($source = TaxSetNameToIdTaxSetStep::KEY_SOURCE, $target = TaxSetNameToIdTaxSetStep::KEY_TARGET)
    {
        return new TaxSetNameToIdTaxSetStep($source, $target);
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep
     */
    protected function createAddProductAttributeKeysStep()
    {
        return new AddProductAttributeKeysStep();
    }

}
