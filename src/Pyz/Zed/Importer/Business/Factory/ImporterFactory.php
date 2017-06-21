<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Factory;

use Pyz\Zed\Importer\Business\Importer\Category\CategoryHierarchyImporter;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryImporter;
use Pyz\Zed\Importer\Business\Importer\Category\CategoryRootImporter;
use Pyz\Zed\Importer\Business\Importer\CmsBlock\CmsBlockImporter;
use Pyz\Zed\Importer\Business\Importer\Cms\CmsPageImporter;
use Pyz\Zed\Importer\Business\Importer\Discount\DiscountImporter;
use Pyz\Zed\Importer\Business\Importer\Glossary\TranslationImporter;
use Pyz\Zed\Importer\Business\Importer\Navigation\NavigationImporter;
use Pyz\Zed\Importer\Business\Importer\Navigation\NavigationNodeImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductAbstractImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductAttributeKeyImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductCategoryImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductConcreteImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductPriceImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductStockImporter;
use Pyz\Zed\Importer\Business\Importer\Product\ProductTaxImporter;
use Pyz\Zed\Importer\Business\Importer\ProductGroup\ProductGroupImporter;
use Pyz\Zed\Importer\Business\Importer\ProductManagement\ProductManagementAttributeImporter;
use Pyz\Zed\Importer\Business\Importer\ProductOption\ProductOptionImporter;
use Pyz\Zed\Importer\Business\Importer\ProductRelation\ProductRelationImporter;
use Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeImporter;
use Pyz\Zed\Importer\Business\Importer\ProductSearch\ProductSearchAttributeMapImporter;
use Pyz\Zed\Importer\Business\Importer\Shipment\ShipmentImporter;
use Pyz\Zed\Importer\Business\Importer\Tax\TaxImporter;
use Pyz\Zed\Importer\ImporterDependencyProvider;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Spryker\Zed\Shipment\Business\Model\Method;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
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
     * @return \Pyz\Zed\Importer\Business\Importer\CmsBlock\CmsBlockImporter
     */
    public function createCmsBlockImporter()
    {
        $cmsBlockImporter = new CmsBlockImporter(
            $this->getLocaleFacade(),
            $this->getCmsBlockFacade(),
            $this->getCmsBlockQueryContainer()
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
            $this->getCmsFacade(),
            $this->getUrlFacade(),
            $this->getCmsQueryContainer()
        );

        return $cmsPageImporter;
    }

    /**
     * @return \Pyz\Zed\Cms\Business\CmsFacadeInterface
     */
    protected function getCmsFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_CMS);
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
     * @return \Pyz\Zed\Importer\Business\Importer\ProductGroup\ProductGroupImporter
     */
    public function createProductGroupImporter()
    {
        return new ProductGroupImporter(
            $this->getLocaleFacade(),
            $this->getProductGroupFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ProductRelation\ProductRelationImporter
     */
    public function createProductRelationImporter()
    {
        return new ProductRelationImporter(
            $this->getLocaleFacade(),
            $this->getProductRelationFacade(),
            $this->getUtilEncodingService(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Navigation\NavigationImporter
     */
    public function createNavigationImporter()
    {
        $navigationImporter = new NavigationImporter(
            $this->getLocaleFacade(),
            $this->getNavigationFacade()
        );

        return $navigationImporter;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\Navigation\NavigationNodeImporter
     */
    public function createNavigationNodeImporter()
    {
        $navigationImporter = new NavigationNodeImporter(
            $this->getLocaleFacade(),
            $this->getNavigationFacade(),
            $this->getUrlFacade()
        );

        return $navigationImporter;
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
