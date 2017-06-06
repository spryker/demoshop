<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business;

use Pyz\Zed\DataImport\Business\Model\Category\AddCategoryKeysStep;
use Pyz\Zed\DataImport\Business\Model\Category\CategoryWriterStep;
use Pyz\Zed\DataImport\Business\Model\Category\Hook\CategoryAfterImportHook;
use Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepository;
use Pyz\Zed\DataImport\Business\Model\CmsBlock\CmsBlockWriterStep;
use Pyz\Zed\DataImport\Business\Model\CmsPage\CmsPageWriterStep;
use Pyz\Zed\DataImport\Business\Model\CmsPage\PlaceholderExtractorStep;
use Pyz\Zed\DataImport\Business\Model\CmsTemplate\CmsTemplateWriterStep;
use Pyz\Zed\DataImport\Business\Model\Country\Repository\CountryRepository;
use Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Discount\DiscountWriterStep;
use Pyz\Zed\DataImport\Business\Model\DiscountVoucher\DiscountVoucherWriterStep;
use Pyz\Zed\DataImport\Business\Model\Glossary\GlossaryWriterStep;
use Pyz\Zed\DataImport\Business\Model\Locale\AddLocalesStep;
use Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep;
use Pyz\Zed\DataImport\Business\Model\Navigation\NavigationKeyToIdNavigationStep;
use Pyz\Zed\DataImport\Business\Model\Navigation\NavigationWriterStep;
use Pyz\Zed\DataImport\Business\Model\NavigationNode\NavigationNodeWriterStep;
use Pyz\Zed\DataImport\Business\Model\Price\PriceTypeToIdPriceTypeStep;
use Pyz\Zed\DataImport\Business\Model\Price\PriceTypeWriterStep;
use Pyz\Zed\DataImport\Business\Model\Product\AttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\AbstractSkuToIdAbstractProductStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\AddProductAbstractSkusStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\ProductAbstractWriter;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\AddProductAttributeKeysStep;
use Pyz\Zed\DataImport\Business\Model\ProductAttributeKey\ProductAttributeKeyWriter;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ConcreteSkuToAbstractSkuStep;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ConcreteSkuToIdProductStep;
use Pyz\Zed\DataImport\Business\Model\ProductConcrete\ProductConcreteWriter;
use Pyz\Zed\DataImport\Business\Model\ProductGroup\ProductGroupWriter;
use Pyz\Zed\DataImport\Business\Model\ProductManagementAttribute\ProductManagementAttributeWriter;
use Pyz\Zed\DataImport\Business\Model\ProductOption\ProductOptionWriterStep;
use Pyz\Zed\DataImport\Business\Model\ProductPrice\ProductPriceWriterStep;
use Pyz\Zed\DataImport\Business\Model\ProductRelation\Hook\ProductRelationAfterImportHook;
use Pyz\Zed\DataImport\Business\Model\ProductRelation\ProductRelationWriter;
use Pyz\Zed\DataImport\Business\Model\ProductSearchAttribute\ProductSearchAttributeWriter;
use Pyz\Zed\DataImport\Business\Model\ProductSearchAttributeMap\ProductSearchAttributeMapWriter;
use Pyz\Zed\DataImport\Business\Model\ProductStock\ProductStockWriterStep;
use Pyz\Zed\DataImport\Business\Model\Shipment\ShipmentWriterStep;
use Pyz\Zed\DataImport\Business\Model\Stock\StockWriterStep;
use Pyz\Zed\DataImport\Business\Model\Tax\TaxSetNameToIdTaxSetStep;
use Pyz\Zed\DataImport\Business\Model\Tax\TaxWriterStep;
use Pyz\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Shared\ProductSearch\Code\KeyBuilder\FilterGlossaryKeyBuilder;
use Spryker\Zed\DataImport\Business\DataImportBusinessFactory as SprykerDataImportBusinessFactory;
use Spryker\Zed\Discount\DiscountConfig;

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
            ->addDataImporter($this->createCmsTemplateImporter())
            ->addDataImporter($this->createCmsPageImporter())
            ->addDataImporter($this->createCmsBlockImporter())
            ->addDataImporter($this->createDiscountImporter())
            ->addDataImporter($this->createDiscountVoucherImporter())
            ->addDataImporter($this->createTaxImporter())
            ->addDataImporter($this->createStockImporter())
            ->addDataImporter($this->createPriceTypeImporter())
            ->addDataImporter($this->createProductAttributeKeyImporter())
            ->addDataImporter($this->createProductManagementAttributeImporter())
            ->addDataImporter($this->createProductAbstractImporter())
            ->addDataImporter($this->createProductConcreteImporter())
            ->addDataImporter($this->createProductOptionImporter())
            ->addDataImporter($this->createProductGroupImporter())
            ->addDataImporter($this->createProductPriceImporter())
            ->addDataImporter($this->createProductRelationImporter())
            ->addDataImporter($this->createProductSearchAttributeMapImporter())
            ->addDataImporter($this->createProductSearchAttributeImporter())
            ->addDataImporter($this->createProductStockImporter())
            ->addDataImporter($this->createShipmentImporter());

        return $dataImporterCollection;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    protected function createGlossaryImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getGlossaryDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(GlossaryWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createLocaleNameToIdStep())
            ->addStep(new GlossaryWriterStep($this->getTouchFacade(), GlossaryWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    protected function createCategoryImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getCategoryDataImporterConfiguration());
        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(CategoryWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createLocalizedAttributesExtractorStep([
                'name',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ]))
            ->addStep(new CategoryWriterStep(
                $this->createCategoryRepository(),
                $this->getTouchFacade()
            ));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);
        $dataImporter->addAfterImportHook($this->createCategoryAfterImportHook());

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Category\Repository\CategoryRepository
     */
    protected function createCategoryRepository()
    {
        return new CategoryRepository();
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Category\Hook\CategoryAfterImportHook
     */
    protected function createCategoryAfterImportHook()
    {
        return new CategoryAfterImportHook(
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
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createCmsTemplateImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getCmsTemplateDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep(new CmsTemplateWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createCmsPageImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getCmsPageDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(CmsPageWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createPlaceholderExtractorStep())
            ->addStep($this->createLocalizedAttributesExtractorStep([
                CmsPageWriterStep::KEY_URL,
                CmsPageWriterStep::KEY_NAME,
                CmsPageWriterStep::KEY_META_TITLE,
                CmsPageWriterStep::KEY_META_DESCRIPTION,
                CmsPageWriterStep::KEY_META_KEYWORDS,
            ]))
            ->addStep(new CmsPageWriterStep($this->getTouchFacade(), CmsPageWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createCmsBlockImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getCmsBlockDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(CmsPageWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createPlaceholderExtractorStep())
            ->addStep(new CmsBlockWriterStep($this->getTouchFacade(), CmsPageWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\CmsPage\PlaceholderExtractorStep
     */
    protected function createPlaceholderExtractorStep()
    {
        return new PlaceholderExtractorStep();
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\CmsPage\PlaceholderExtractorStep
     */
    protected function createCmsPlaceholderExtractorStep()
    {
        return new PlaceholderExtractorStep();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createDiscountImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getDiscountDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(DiscountWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep(new DiscountWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createDiscountVoucherImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getDiscountVoucherDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(DiscountVoucherWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep(new DiscountVoucherWriterStep($this->createDiscountConfig()));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\Discount\DiscountConfig
     */
    protected function createDiscountConfig()
    {
        return new DiscountConfig();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductPriceImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductPriceDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ProductPriceWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createPriceTypeToIdPriceTypeStep())
            ->addStep($this->createAbstractSkuToIdAbstractProductStep())
            ->addStep($this->createConcreteSkuToIdProductStep())
            ->addStep(new ProductPriceWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductOptionImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductOptionDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createTaxSetNameToIdTaxSetStep(ProductOptionWriterStep::KEY_TAX_SET_NAME))
            ->addStep($this->createLocalizedAttributesExtractorStep([
                ProductOptionWriterStep::KEY_GROUP_NAME,
                ProductOptionWriterStep::KEY_OPTION_NAME,
            ]))
            ->addStep(new ProductOptionWriterStep($this->getTouchFacade(), ProductOptionWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductStockImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductStockDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ProductStockWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createConcreteSkuToIdProductStep())
            ->addStep($this->createConcreteSkuToAbstractSkuStep())
            ->addStep(new ProductStockWriterStep($this->getTouchFacade(), ProductStockWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\ProductConcrete\ConcreteSkuToAbstractSkuStep
     */
    protected function createConcreteSkuToAbstractSkuStep()
    {
        return new ConcreteSkuToAbstractSkuStep();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createStockImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getStockDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep(new StockWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createShipmentImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getShipmentDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ShipmentWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createTaxSetNameToIdTaxSetStep())
            ->addStep(new ShipmentWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createTaxImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getTaxDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(TaxWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep(new TaxWriterStep($this->createCountryRepository()));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createPriceTypeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getPriceTypeDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep(new PriceTypeWriterStep());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Country\Repository\CountryRepository
     */
    protected function createCountryRepository()
    {
        return new CountryRepository();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createNavigationImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getNavigationDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(NavigationWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep(new NavigationWriterStep($this->getTouchFacade(), NavigationWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createNavigationNodeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getNavigationNodeDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(NavigationNodeWriterStep::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createNavigationKeyToIdNavigationStep(NavigationNodeWriterStep::DATA_SET_KEY_NAVIGATION_KEY))
            ->addStep($this->createLocalizedAttributesExtractorStep([
                NavigationNodeWriterStep::DATA_SET_KEY_TITLE,
                NavigationNodeWriterStep::DATA_SET_KEY_URL,
                NavigationNodeWriterStep::DATA_SET_KEY_CSS_CLASS,
            ]))
            ->addStep(new NavigationNodeWriterStep($this->getTouchFacade(), NavigationNodeWriterStep::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

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
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductAbstractImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductAbstractDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ProductAbstractWriter::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createAddCategoryKeysStep())
            ->addStep($this->createTaxSetNameToIdTaxSetStep('tax_set_name'))
            ->addStep($this->createAttributesExtractorStep())
            ->addStep($this->createProductLocalizedAttributesExtractorStep([
                'name',
                'description',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ]))
            ->addStep(new ProductAbstractWriter($this->getTouchFacade(), ProductAbstractWriter::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductConcreteImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductConcreteDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ProductConcreteWriter::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAbstractSkuToIdAbstractProductStep('abstract_sku'))
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createAttributesExtractorStep())
            ->addStep($this->createProductLocalizedAttributesExtractorStep([
                'name',
                'description',
                'is_searchable',
            ]))
            ->addStep(new ProductConcreteWriter($this->getTouchFacade(), ProductConcreteWriter::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductAttributeKeyImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductAttributeKeyDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep(new ProductAttributeKeyWriter());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductManagementAttributeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductManagementAttributeDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createAddProductAttributeKeysStep())
            ->addStep($this->createLocalizedAttributesExtractorStep([
                'key',
                'values',
            ]))
            ->addStep(new ProductManagementAttributeWriter());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductGroupImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductGroupDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker(ProductGroupWriter::BULK_SIZE);
        $dataSetStepBroker
            ->addStep($this->createAbstractSkuToIdAbstractProductStep(ProductGroupWriter::KEY_ABSTRACT_SKU))
            ->addStep(new ProductGroupWriter($this->getTouchFacade(), ProductGroupWriter::BULK_SIZE));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductRelationImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductRelationDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep($this->createAddProductAbstractSkusStep())
            ->addStep(new ProductRelationWriter());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);
        $dataImporter->addAfterImportHook($this->createProductRelationAfterImportHook());

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\ProductRelation\Hook\ProductRelationAfterImportHook
     */
    protected function createProductRelationAfterImportHook()
    {
        return new ProductRelationAfterImportHook();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductSearchAttributeMapImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductSearchAttributeMapDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep($this->createAddProductAttributeKeysStep())
            ->addStep(new ProductSearchAttributeMapWriter());

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

        return $dataImporter;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface|\Spryker\Zed\DataImport\Business\Model\DataSet\DataSetStepBrokerAwareInterface
     */
    protected function createProductSearchAttributeImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getProductSearchAttributeDataImporterConfiguration());

        $dataSetStepBroker = $this->createTransactionAwareDataSetStepBroker();
        $dataSetStepBroker
            ->addStep($this->createAddLocalesStep())
            ->addStep($this->createAddProductAttributeKeysStep())
            ->addStep($this->createLocalizedAttributesExtractorStep(['key']))
            ->addStep(new ProductSearchAttributeWriter($this->createSearchGlossaryKeyBuilder()));

        $dataImporter->addDataSetStepBroker($dataSetStepBroker);

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
     * @return \Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep
     */
    protected function createLocalizedAttributesExtractorStep(array $defaultAttributes = [])
    {
        return new LocalizedAttributesExtractorStep($defaultAttributes);
    }

    /**
     * @param array $defaultAttributes
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Product\ProductLocalizedAttributesExtractorStep
     */
    protected function createProductLocalizedAttributesExtractorStep(array $defaultAttributes = [])
    {
        return new ProductLocalizedAttributesExtractorStep($defaultAttributes);
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
