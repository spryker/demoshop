<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business;

use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Importer\Business\Icecat\IcecatDataImporterConsole;
use Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryHierarchyImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryRootImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Cms\CmsBlockImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Cms\CmsPageImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Glossary\TranslationImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductAbstractImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductCategoryImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductPriceImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductSearchImporter;
use Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductStockImporter;
use Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryCatalogInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryRootInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Cms\CmsBlockInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Cms\CmsPageInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Glossary\GlossaryInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Product\ProductInstaller;
use Pyz\Zed\Importer\Business\Icecat\Installer\Product\ProductSearchInstaller;
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    public function getIcecatDataInstallerCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->getCategoryRootInstaller(),
            ImporterConfig::RESOURCE_CATEGORY => $this->getCategoryInstaller(),
            ImporterConfig::RESOURCE_CATEGORY_CATALOG => $this->getCategoryCatalogInstaller(),
            ImporterConfig::RESOURCE_PRODUCT => $this->getProductInstaller(),
            ImporterConfig::RESOURCE_PRODUCT_SEARCH => $this->getProductSearchInstaller(),
            ImporterConfig::RESOURCE_GLOSSARY => $this->getGlossaryInstaller(),
            ImporterConfig::RESOURCE_CMS_PAGE => $this->getCmsPageInstaller(),
            ImporterConfig::RESOURCE_CMS_BLOCK => $this->getCmsBlockInstaller(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    public function getIcecatImporterCategoryCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY => $this->getCategoryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    public function getIcecatImporterCategoryCatalogCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_CATALOG => $this->getCategoryHierarchyImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    public function getIcecatImporterCategoryRootCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->getCategoryRootImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    public function getIcecatImporterProductCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT => $this->getProductAbstractImporter(),
            ImporterConfig::RESOURCE_PRODUCT_CATEGORY => $this->getProductCategoryImporter(),
            ImporterConfig::RESOURCE_PRODUCT_STOCK => $this->getProductStockImporter(),
            ImporterConfig::RESOURCE_PRODUCT_PRICE => $this->getProductPriceImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\IcecatImporterInterface[]
     */
    public function getIcecatImporterProductSearchCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_SEARCH => $this->getProductSearchImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\IcecatImporterInterface[]
     */
    public function getIcecatImporterGlossaryCollection()
    {
        return [
            ImporterConfig::RESOURCE_GLOSSARY_TRANSLATION => $this->getGlossaryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\IcecatImporterInterface[]
     */
    public function getIcecatImporterCmsBlockCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_BLOCK => $this->getCmsBlockImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\IcecatImporterInterface[]
     */
    public function getIcecatImporterCmsPageCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_PAGE => $this->getCmsPageImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryImporter
     */
    protected function getCategoryImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryImporter
     */
    protected function getCategoryHierarchyImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Category\CategoryRootImporter
     */
    protected function getCategoryRootImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductCategoryImporter
     */
    protected function getProductCategoryImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductAbstractImporter
     */
    protected function getProductAbstractImporter()
    {
        $productAbstractImporter = new ProductAbstractImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getIcecatDataPath()
        );

        $productAbstractImporter->setAttributeManager($this->createAttributeManager());
        $productAbstractImporter->setProductFacade($this->getProductFacade());

        return $productAbstractImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductPriceImporter
     */
    protected function getProductPriceImporter()
    {
        $productPriceImporter = new ProductPriceImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getIcecatDataPath()
        );

        $productPriceImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productPriceImporter->setStockFacade($this->getStockFacade());
        $productPriceImporter->setPriceQueryContainer($this->getPriceQueryContainer());

        return $productPriceImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductStockImporter
     */
    protected function getProductStockImporter()
    {
        $productStockImporter = new ProductStockImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getIcecatDataPath()
        );

        $productStockImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productStockImporter->setStockFacade($this->getStockFacade());

        return $productStockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Product\ProductSearchImporter
     */
    protected function getProductSearchImporter()
    {
        $productSearchImporter = new ProductSearchImporter(
            $this->getLocaleFacade()
        );

        $productSearchImporter->setProductSearchFacade($this->getProductSearchFacade());
        $productSearchImporter->setOperationManager($this->createProductSearchOperationManager());

        return $productSearchImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Glossary\TranslationImporter
     */
    protected function getGlossaryImporter()
    {
        $translationImporter = new TranslationImporter(
            $this->getLocaleFacade()
        );

        $translationImporter->setGlossaryFacade($this->getGlossaryFacade());

        return $translationImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Cms\CmsBlockImporter
     */
    protected function getCmsBlockImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\Importer\Cms\CmsPageImporter
     */
    protected function getCmsPageImporter()
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
     * @return \Pyz\Zed\Importer\Business\Icecat\IcecatDataImporterConsole
     */
    public function getIcecatDataImporterConsole(OutputInterface $output, MessengerInterface $messenger)
    {
        return new IcecatDataImporterConsole(
            $output,
            $messenger,
            $this->getIcecatDataInstallerCollection()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryInstaller
     */
    protected function getCategoryInstaller()
    {
        $categoryInstaller = new CategoryInstaller(
            $this->getIcecatImporterCategoryCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $categoryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryCatalogInstaller
     */
    protected function getCategoryCatalogInstaller()
    {
        $categoryHierarchyInstaller = new CategoryCatalogInstaller(
            $this->getIcecatImporterCategoryCatalogCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $categoryHierarchyInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Category\CategoryRootInstaller
     */
    protected function getCategoryRootInstaller()
    {
        $categoryRootInstaller = new CategoryRootInstaller(
            $this->getIcecatImporterCategoryRootCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $categoryRootInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Product\ProductInstaller
     */
    protected function getProductInstaller()
    {
        $productInstaller = new ProductInstaller(
            $this->getIcecatImporterProductCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $productInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Product\ProductSearchInstaller
     */
    protected function getProductSearchInstaller()
    {
        $productSearchInstaller = new ProductSearchInstaller(
            $this->getIcecatImporterProductSearchCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $productSearchInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Glossary\GlossaryInstaller
     */
    protected function getGlossaryInstaller()
    {
        $glossaryInstaller = new GlossaryInstaller(
            $this->getIcecatImporterGlossaryCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $glossaryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Cms\CmsBlockInstaller
     */
    protected function getCmsBlockInstaller()
    {
        $cmsBlockInstaller = new CmsBlockInstaller(
            $this->getIcecatImporterCmsBlockCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Icecat\Installer\Cms\CmsPageInstaller
     */
    protected function getCmsPageInstaller()
    {
        $cmsBlockInstaller = new CmsPageInstaller(
            $this->getIcecatImporterCmsPageCollection(),
            $this->getConfig()->getIcecatDataPath()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    public function getCsvReader()
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
