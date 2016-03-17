<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business;

use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Importer\Business\Icecat\IcecatImporter;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryHierarchyImporter;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter;
use Pyz\Zed\Importer\Business\Importer\Cms\CmsBlockImporter;
use Pyz\Zed\Importer\Business\Importer\Cms\CmsPageImporter;
use Pyz\Zed\Importer\Business\Importer\Glossary\TranslationImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductAbstractImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductSearchImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter;
use Pyz\Zed\Importer\Business\Installer\Category\CategoryCatalogInstaller;
use Pyz\Zed\Importer\Business\Installer\Category\CategoryInstaller;
use Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller;
use Pyz\Zed\Importer\Business\Installer\Cms\CmsBlockInstaller;
use Pyz\Zed\Importer\Business\Installer\Cms\CmsPageInstaller;
use Pyz\Zed\Importer\Business\Installer\Glossary\GlossaryInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductSearchInstaller;
use Pyz\Zed\Importer\ImporterConfig;
use Pyz\Zed\Importer\ImporterDependencyProvider;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\TransferGenerator;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriter;
use Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter;
use Spryker\Zed\Category\Business\Tree\NodeWriter;
use Spryker\Zed\Cms\Business\Block\BlockManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Page\PageManager;
use Spryker\Zed\Cms\Business\Template\TemplateManager;
use Spryker\Zed\Cms\CmsConfig;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManager;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

/**
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
class ImporterBusinessFactory extends SprykerInstallerBusinessFactory
{

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getInstallerCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->createCategoryRootInstaller(),
            ImporterConfig::RESOURCE_CATEGORY => $this->createCategoryInstaller(),
            ImporterConfig::RESOURCE_CATEGORY_CATALOG => $this->createCategoryCatalogInstaller(),
            ImporterConfig::RESOURCE_PRODUCT => $this->createProductInstaller(),
            ImporterConfig::RESOURCE_PRODUCT_SEARCH => $this->createProductSearchInstaller(),
            ImporterConfig::RESOURCE_GLOSSARY => $this->createGlossaryInstaller(),
            ImporterConfig::RESOURCE_CMS_PAGE => $this->createCmsPageInstaller(),
            ImporterConfig::RESOURCE_CMS_BLOCK => $this->createCmsBlockInstaller(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY => $this->createCategoryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryCatalogCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_CATALOG => $this->createCategoryHierarchyImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryRootCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->createCategoryRootImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT => $this->createProductAbstractImporter(),
            ImporterConfig::RESOURCE_PRODUCT_CATEGORY => $this->createProductCategoryImporter(),
            ImporterConfig::RESOURCE_PRODUCT_STOCK => $this->createProductStockImporter(),
            ImporterConfig::RESOURCE_PRODUCT_PRICE => $this->createProductPriceImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterProductSearchCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_SEARCH => $this->createProductSearchImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterGlossaryCollection()
    {
        return [
            ImporterConfig::RESOURCE_GLOSSARY_TRANSLATION => $this->createGlossaryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterCmsBlockCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_BLOCK => $this->createCmsBlockImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterCmsPageCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_PAGE => $this->createCmsPageImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter
     */
    protected function createCategoryImporter()
    {
        $categoryImporter = new CategoryImporter(
            $this->getLocaleFacade()
        );

        $categoryImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryImporter->setTouchFacade($this->getTouchFacade());
        $categoryImporter->setUrlFacade($this->getUrlFacade());
        $categoryImporter->setNodeUrlManager($this->createNodeUrlManager());
        $categoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());

        return $categoryImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter
     */
    protected function createCategoryHierarchyImporter()
    {
        $categoryHierarchyImporter = new CategoryHierarchyImporter(
            $this->getLocaleFacade()
        );

        $categoryHierarchyImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryHierarchyImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryHierarchyImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());

        return $categoryHierarchyImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter
     */
    protected function createCategoryRootImporter()
    {
        $categoryRootImporter = new CategoryRootImporter(
            $this->getLocaleFacade()
        );

        $categoryRootImporter->setCategoryFacade($this->getCategoryFacade());
        $categoryRootImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $categoryRootImporter->setTouchFacade($this->getTouchFacade());
        $categoryRootImporter->setUrlFacade($this->getUrlFacade());
        $categoryRootImporter->setNodeUrlManager($this->createNodeUrlManager());
        $categoryRootImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());

        return $categoryRootImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter
     */
    protected function createProductCategoryImporter()
    {
        $productCategoryImporter = new ProductCategoryImporter(
            $this->getLocaleFacade()
        );

        $productCategoryImporter->setCategoryFacade($this->getCategoryFacade());
        $productCategoryImporter->setCategoryQueryContainer($this->getCategoryQueryContainer());
        $productCategoryImporter->setProductFacade($this->getProductFacade());
        $productCategoryImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productCategoryImporter->setProductCategoryFacade($this->getProductCategoryFacade());
        $productCategoryImporter->setProductCategoryQueryContainer($this->getProductCategoryQueryContainer());
        $productCategoryImporter->setTouchFacade($this->getTouchFacade());

        return $productCategoryImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductAbstractImporter
     */
    protected function createProductAbstractImporter()
    {
        $productAbstractImporter = new ProductAbstractImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getImportDataPath()
        );

        $productAbstractImporter->setAttributeManager($this->createAttributeManager());
        $productAbstractImporter->setProductFacade($this->getProductFacade());

        return $productAbstractImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter
     */
    protected function createProductPriceImporter()
    {
        $productPriceImporter = new ProductPriceImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getImportDataPath()
        );

        $productPriceImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productPriceImporter->setStockFacade($this->getStockFacade());
        $productPriceImporter->setPriceQueryContainer($this->getPriceQueryContainer());

        return $productPriceImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter
     */
    protected function createProductStockImporter()
    {
        $productStockImporter = new ProductStockImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getImportDataPath()
        );

        $productStockImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productStockImporter->setStockFacade($this->getStockFacade());

        return $productStockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductSearchImporter
     */
    protected function createProductSearchImporter()
    {
        $productSearchImporter = new ProductSearchImporter(
            $this->getLocaleFacade()
        );

        $productSearchImporter->setProductSearchFacade($this->getProductSearchFacade());
        $productSearchImporter->setOperationManager($this->createProductSearchOperationManager());

        return $productSearchImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Glossary\TranslationImporter
     */
    protected function createGlossaryImporter()
    {
        $translationImporter = new TranslationImporter(
            $this->getLocaleFacade()
        );

        $translationImporter->setGlossaryFacade($this->getGlossaryFacade());

        return $translationImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Cms\CmsBlockImporter
     */
    protected function createCmsBlockImporter()
    {
        $cmsBlockImporter = new CmsBlockImporter(
            $this->getLocaleFacade()
        );

        $cmsBlockImporter->setBlockManager($this->createCmsBlockManager());
        $cmsBlockImporter->setPageManager($this->createCmsPageManager());
        $cmsBlockImporter->setKeyMappingManager($this->createCmsGlossaryKeyMappingManager());
        $cmsBlockImporter->setTemplateManager($this->createCmsTemplateManager());

        $cmsBlockImporter->setGlossaryFacade($this->getCmsToGlossaryBridge());
        $cmsBlockImporter->setCmsQueryContainer($this->getCmsQueryContainer());
        $cmsBlockImporter->setLocaleFacade($this->getLocaleFacade());
        $cmsBlockImporter->setUrlFacade($this->getCmsToUrlBridge());

        return $cmsBlockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Cms\CmsPageImporter
     */
    protected function createCmsPageImporter()
    {
        $cmsPageImporter = new CmsPageImporter(
            $this->getLocaleFacade()
        );

        $cmsPageImporter->setBlockManager($this->createCmsBlockManager());
        $cmsPageImporter->setPageManager($this->createCmsPageManager());
        $cmsPageImporter->setKeyMappingManager($this->createCmsGlossaryKeyMappingManager());
        $cmsPageImporter->setTemplateManager($this->createCmsTemplateManager());

        $cmsPageImporter->setGlossaryFacade($this->getCmsToGlossaryBridge());
        $cmsPageImporter->setCmsQueryContainer($this->getCmsQueryContainer());
        $cmsPageImporter->setLocaleFacade($this->getLocaleFacade());
        $cmsPageImporter->setUrlFacade($this->getCmsToUrlBridge());

        return $cmsPageImporter;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Importer\Business\Icecat\IcecatImporter
     */
    public function createIcecatImporter(OutputInterface $output, MessengerInterface $messenger)
    {
        return new IcecatImporter(
            $output,
            $messenger,
            $this->getInstallerCollection()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryInstaller
     */
    protected function createCategoryInstaller()
    {
        $categoryInstaller = new CategoryInstaller(
            $this->getImporterCategoryCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $categoryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryCatalogInstaller
     */
    protected function createCategoryCatalogInstaller()
    {
        $categoryHierarchyInstaller = new CategoryCatalogInstaller(
            $this->getImporterCategoryCatalogCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $categoryHierarchyInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller
     */
    protected function createCategoryRootInstaller()
    {
        $categoryRootInstaller = new CategoryRootInstaller(
            $this->getImporterCategoryRootCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $categoryRootInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductInstaller
     */
    protected function createProductInstaller()
    {
        $productInstaller = new ProductInstaller(
            $this->getImporterProductCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $productInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductSearchInstaller
     */
    protected function createProductSearchInstaller()
    {
        $productSearchInstaller = new ProductSearchInstaller(
            $this->getImporterProductSearchCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $productSearchInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Glossary\GlossaryInstaller
     */
    protected function createGlossaryInstaller()
    {
        $glossaryInstaller = new GlossaryInstaller(
            $this->getImporterGlossaryCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $glossaryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Cms\CmsBlockInstaller
     */
    protected function createCmsBlockInstaller()
    {
        $cmsBlockInstaller = new CmsBlockInstaller(
            $this->getImporterCmsBlockCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Cms\CmsPageInstaller
     */
    protected function createCmsPageInstaller()
    {
        $cmsBlockInstaller = new CmsPageInstaller(
            $this->getImporterCmsPageCollection(),
            $this->getConfig()->getImportDataPath()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    public function createCsvReader()
    {
        return new CsvReader();
    }

    /**
     * @return \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected function createAttributeManager()
    {
        return new AttributeManager(
            $this->getProductQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected function getProductQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Persistence\ProductSearchQueryContainerInterface
     */
    protected function getProductSearchQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected function getPriceQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_PRICE);
    }

    /**
     * @return \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface
     */
    protected function getCmsQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_CMS);
    }

    /**
     * @return \Spryker\Zed\Stock\Business\StockFacadeInterface
     */
    protected function getStockFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_STOCK);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
     */
    protected function getProductCategoryFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected function getCategoryFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected function getTouchFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Glossary\Business\GlossaryFacadeInterface
     */
    protected function getGlossaryFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected function getUrlFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_URL);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected function getProductSearchFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface
     */
    protected function getCategoryToTouchBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CATEGORY_TO_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToUrlInterface
     */
    protected function getCategoryToUrlBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CATEGORY_TO_URL);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface
     */
    protected function getCategoryToLocaleBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CATEGORY_TO_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface
     */
    protected function getCmsToGlossaryBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CMS_TO_GLOSSARY);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToTouchInterface
     */
    protected function getCmsToTouchBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CMS_TO_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface
     */
    protected function getCmsToUrlBridge()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::BRIDGE_CMS_TO_URL);
    }

    /**
     * @return \Pyz\Zed\Category\Business\Manager\NodeUrlManager
     */
    protected function createNodeUrlManager()
    {
        return new NodeUrlManager(
            $this->createCategoryTreeReader(),
            $this->createUrlPathGenerator(),
            $this->getCategoryToUrlBridge(),
            $this->getCategoryQueryContainer(),
            $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_LOCALE)
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\CategoryTreeWriter
     */
    public function createCategoryTreeWriter()
    {
        return new CategoryTreeWriter(
            $this->createNodeWriter(),
            $this->createClosureTableWriter(),
            $this->createCategoryTreeReader(),
            $this->createNodeUrlManager(),
            $this->getCategoryToTouchBridge(),
            $this->getQueryContainer()->getConnection()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\CategoryTreeReader
     */
    public function createCategoryTreeReader()
    {
        return new CategoryTreeReader(
            $this->getCategoryQueryContainer(),
            $this->createCategoryTreeFormatter()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\NodeWriterInterface
     */
    public function createNodeWriter()
    {
        return new NodeWriter(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface
     */
    public function createUrlPathGenerator()
    {
        return new UrlPathGenerator();
    }

    /**
     * @param array $category
     *
     * @return \Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter
     */
    public function createCategoryTreeStructure(array $category)
    {
        return new CategoryTreeFormatter($category);
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\ClosureTableWriterInterface
     */
    protected function createClosureTableWriter()
    {
        return new ClosureTableWriter(
            $this->getCategoryQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter
     */
    protected function createCategoryTreeFormatter()
    {
        return new CategoryTreeFormatter();
    }

    /**
     * @return \Spryker\Zed\Category\Business\TransferGeneratorInterface
     */
    protected function createCategoryTransferGenerator()
    {
        return new TransferGenerator();
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected function createProductSearchOperationManager()
    {
        return new OperationManager(
            $this->getProductSearchQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface
     */
    protected function createCmsGlossaryKeyMappingManager()
    {
        return new GlossaryKeyMappingManager(
            $this->getCmsToGlossaryBridge(),
            $this->getCmsQueryContainer(),
            $this->createCmsTemplateManager(),
            $this->createCmsPageManager(),
            $this->getProvidedDependency(ImporterDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

    /**
     * @return \Spryker\Zed\Cms\Business\Template\TemplateManagerInterface
     */
    protected function createCmsTemplateManager()
    {
        return new TemplateManager(
            $this->getCmsQueryContainer(),
            $this->createCmsConfig(),
            $this->createFinder()
        );
    }

    /**
     * @return \Spryker\Zed\Cms\CmsConfig
     */
    protected function createCmsConfig()
    {
        return new CmsConfig();
    }

    /**
     * @return \Symfony\Component\Finder\Finder
     */
    protected function createFinder()
    {
        return new Finder();
    }

    /**
     * @return \Spryker\Zed\Cms\Business\Page\PageManagerInterface
     */
    protected function createCmsPageManager()
    {
        return new PageManager(
            $this->getCmsQueryContainer(),
            $this->createCmsTemplateManager(),
            $this->createCmsBlockManager(),
            $this->getCmsToGlossaryBridge(),
            $this->getCmsToTouchBridge(),
            $this->getCmsToUrlBridge()
        );
    }

    /**
     * @return \Spryker\Zed\Cms\Business\Block\BlockManagerInterface
     */
    protected function createCmsBlockManager()
    {
        return new BlockManager(
            $this->getCmsQueryContainer(),
            $this->getCmsToTouchBridge(),
            $this->getProvidedDependency(ImporterDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

}
