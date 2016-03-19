<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Factory;

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
use Pyz\Zed\Importer\ImporterDependencyProvider;
use Spryker\Zed\Cms\Business\Block\BlockManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Page\PageManager;
use Spryker\Zed\Cms\Business\Template\TemplateManager;
use Spryker\Zed\Cms\CmsConfig;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManager;
use Symfony\Component\Finder\Finder;

/**
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
class ImporterFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter
     */
    public function createCategoryImporter()
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
    public function createCategoryHierarchyImporter()
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
    public function createCategoryRootImporter()
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
    public function createProductCategoryImporter()
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
    public function createProductAbstractImporter()
    {
        $productAbstractImporter = new ProductAbstractImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getIcecatImportDataDirectory()
        );

        $productAbstractImporter->setAttributeManager($this->createAttributeManager());
        $productAbstractImporter->setProductFacade($this->getProductFacade());

        return $productAbstractImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter
     */
    public function createProductPriceImporter()
    {
        $productPriceImporter = new ProductPriceImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getImportDataDirectory()
        );

        $productPriceImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productPriceImporter->setStockFacade($this->getStockFacade());
        $productPriceImporter->setPriceQueryContainer($this->getPriceQueryContainer());

        return $productPriceImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter
     */
    public function createProductStockImporter()
    {
        $productStockImporter = new ProductStockImporter(
            $this->getLocaleFacade(),
            $this->getConfig()->getImportDataDirectory()
        );

        $productStockImporter->setProductQueryContainer($this->getProductQueryContainer());
        $productStockImporter->setStockFacade($this->getStockFacade());

        return $productStockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductSearchImporter
     */
    public function createProductSearchImporter()
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
    public function createGlossaryImporter()
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
    public function createCmsBlockImporter()
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
    public function createCmsPageImporter()
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
     * @return \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected function createProductSearchOperationManager()
    {
        return new OperationManager(
            $this->getProductSearchQueryContainer()
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

}
