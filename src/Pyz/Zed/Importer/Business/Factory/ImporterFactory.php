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
use Pyz\Zed\Importer\Business\Importer\Discount\DiscountImporter;
use Pyz\Zed\Importer\Business\Importer\Glossary\TranslationImporter;
use Pyz\Zed\Importer\Business\Importer\ProductManagement\ProductManagementAttributeImporter;
use Pyz\Zed\Importer\Business\Importer\ProductOption\ProductOptionImporter;
use Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeImporter;
use Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeMapImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductAbstractImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductAttributeKeyImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductConcreteImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductSearchImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductTaxImporter;
use Pyz\Zed\Importer\Business\Importer\Shipment\ShipmentImporter;
use Pyz\Zed\Importer\Business\Importer\Tax\TaxImporter;
use Pyz\Zed\Importer\ImporterDependencyProvider;
use Spryker\Zed\Cms\Business\Block\BlockManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Page\PageManager;
use Spryker\Zed\Cms\Business\Template\TemplateManager;
use Spryker\Zed\Cms\CmsConfig;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Spryker\Zed\Shipment\Business\Model\Method;
use Symfony\Component\Finder\Finder;

/**
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
class ImporterFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter
     */
    public function createCategoryRootImporter()
    {
        $categoryRootImporter = new CategoryRootImporter(
            $this->getLocaleFacade(),
            $this->getCategoryFacade(),
            $this->getTouchFacade()
        );

        return $categoryRootImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter
     */
    public function createCategoryImporter()
    {
        $categoryImporter = new CategoryImporter(
            $this->getLocaleFacade(),
            $this->getCategoryFacade()
        );

        return $categoryImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Category\CategoryHierarchyImporter
     */
    public function createCategoryHierarchyImporter()
    {
        $categoryHierarchyImporter = new CategoryHierarchyImporter(
            $this->getLocaleFacade(),
            $this->getCategoryFacade(),
            $this->getCategoryQueryContainer()
        );

        return $categoryHierarchyImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter
     */
    public function createProductCategoryImporter()
    {
        $productCategoryImporter = new ProductCategoryImporter(
            $this->getLocaleFacade(),
            $this->getTouchFacade(),
            $this->getCategoryQueryContainer(),
            $this->getProductQueryContainer()
        );

        return $productCategoryImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductTaxImporter
     */
    public function createProductTaxImporter()
    {
        $productTaxImporter = new ProductTaxImporter(
            $this->getLocaleFacade(),
            $this->getTouchFacade(),
            $this->getProductQueryContainer()
        );

        return $productTaxImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductAbstractImporter
     */
    public function createProductAbstractImporter()
    {
        $productAbstractImporter = new ProductAbstractImporter(
            $this->getLocaleFacade(),
            $this->getProductFacade(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productAbstractImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductConcreteImporter
     */
    public function createProductConcreteImporter()
    {
        $productConcreteImporter = new ProductConcreteImporter(
            $this->getLocaleFacade(),
            $this->getProductFacade(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productConcreteImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductAttributeKeyImporter
     */
    public function createProductAttributeKeyImporter()
    {
        $productAbstractImporter = new ProductAttributeKeyImporter(
            $this->getLocaleFacade(),
            $this->getProductFacade(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productAbstractImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter
     */
    public function createProductPriceImporter()
    {
        $productPriceImporter = new ProductPriceImporter(
            $this->getLocaleFacade(),
            $this->getProductQueryContainer(),
            $this->getPriceQueryContainer()
        );

        return $productPriceImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ProductManagement\ProductManagementAttributeImporter
     */
    public function createProductManagementAttributeImporter()
    {
        $productManagementAttributeImporter = new ProductManagementAttributeImporter(
            $this->getProductManagementFacade(),
            $this->getLocaleFacade()
        );

        return $productManagementAttributeImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeImporter
     */
    public function createProductSearchAttributeImporter()
    {
        $productSearchAttributeImporter = new ProductSearchAttributeImporter(
            $this->getProductSearchFacade(),
            $this->getLocaleFacade()
        );

        return $productSearchAttributeImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeMapImporter
     */
    public function createProductSearchAttributeMapImporter()
    {
        $productSearchImporter = new ProductSearchAttributeMapImporter(
            $this->getLocaleFacade(),
            $this->getProductSearchFacade()
        );

        return $productSearchImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter
     */
    public function createProductStockImporter()
    {
        $productStockImporter = new ProductStockImporter(
            $this->getLocaleFacade(),
            $this->getStockFacade(),
            $this->getProductQueryContainer(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productStockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Product\ProductSearchImporter
     */
    public function createProductSearchImporter()
    {
        $productSearchImporter = new ProductSearchImporter(
            $this->getLocaleFacade(),
            $this->getProductSearchFacade()
        );

        return $productSearchImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Glossary\TranslationImporter
     */
    public function createGlossaryImporter()
    {
        $translationImporter = new TranslationImporter(
            $this->getLocaleFacade(),
            $this->getGlossaryFacade()
        );

        return $translationImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Discount\DiscountImporter
     */
    public function createDiscountImporter()
    {
        $discountImporter = new DiscountImporter(
            $this->getLocaleFacade(),
            $this->getDiscountFacade()
        );

        return $discountImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Cms\CmsBlockImporter
     */
    public function createCmsBlockImporter()
    {
        $cmsBlockImporter = new CmsBlockImporter(
            $this->getLocaleFacade(),
            $this->createCmsBlockManager(),
            $this->createCmsPageManager(),
            $this->createCmsGlossaryKeyMappingManager(),
            $this->createCmsTemplateManager(),
            $this->getCmsToGlossaryBridge(),
            $this->getCmsToUrlBridge(),
            $this->getCmsQueryContainer()
        );

        return $cmsBlockImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Cms\CmsPageImporter
     */
    public function createCmsPageImporter()
    {
        $cmsPageImporter = new CmsPageImporter(
            $this->getLocaleFacade(),
            $this->createCmsBlockManager(),
            $this->createCmsPageManager(),
            $this->createCmsGlossaryKeyMappingManager(),
            $this->createCmsTemplateManager(),
            $this->getCmsToGlossaryBridge(),
            $this->getCmsToUrlBridge(),
            $this->getCmsQueryContainer()
        );

        return $cmsPageImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Shipment\ShipmentImporter
     */
    public function createShipmentImporter()
    {
        $shipmentImporter = new ShipmentImporter(
            $this->getLocaleFacade(),
            $this->getShipmentQueryContainer(),
            $this->createShipmentMethod(),
            $this->createShipmentCarrier(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $shipmentImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Tax\TaxImporter
     */
    public function createTaxImporter()
    {
        return new TaxImporter(
            $this->getLocaleFacade(),
            $this->getCountryFacade(),
            $this->getTaxQueryContainer(),
            $this->getShipmentQueryContainer()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ProductOption\ProductOptionImporter
     */
    public function createProductOptionImporter()
    {
        return new ProductOptionImporter(
            $this->getLocaleFacade(),
            $this->getGlossaryFacade(),
            $this->getProductOptionFacade()
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

    /**
     * @return \Spryker\Zed\Shipment\Business\Model\Carrier
     */
    public function createShipmentCarrier()
    {
        return new Carrier();
    }

    /**
     * @return \Spryker\Zed\Shipment\Business\Model\Method
     */
    public function createShipmentMethod()
    {
        return new Method(
            $this->getShipmentQueryContainer(),
            []
        );
    }

}
