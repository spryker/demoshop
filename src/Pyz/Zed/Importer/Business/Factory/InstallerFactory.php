<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Factory;

use Pyz\Zed\Importer\Business\Installer\Category\CategoryCatalogInstaller;

use Pyz\Zed\Importer\Business\Installer\Category\CategoryInstaller;
use Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller;
use Pyz\Zed\Importer\Business\Installer\Cms\CmsBlockInstaller;
use Pyz\Zed\Importer\Business\Installer\Cms\CmsPageInstaller;
use Pyz\Zed\Importer\Business\Installer\Discount\DiscountInstaller;
use Pyz\Zed\Importer\Business\Installer\Glossary\GlossaryInstaller;
use Pyz\Zed\Importer\Business\Installer\Navigation\NavigationInstaller;
use Pyz\Zed\Importer\Business\Installer\Navigation\NavigationNodeInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductAbstractInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductAttributeKeyInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductConcreteInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductPriceInstaller;
use Pyz\Zed\Importer\Business\Installer\Product\ProductStockInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductGroup\ProductGroupInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductLabel\ProductLabelInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductManagement\ProductManagementAttributeInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductOption\ProductOptionInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductRelation\ProductRelationInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductSearch\ProductSearchAttributeInstaller;
use Pyz\Zed\Importer\Business\Installer\ProductSearch\ProductSearchAttributeMapInstaller;
use Pyz\Zed\Importer\Business\Installer\Shipment\ShipmentInstaller;
use Pyz\Zed\Importer\Business\Installer\Tax\TaxInstaller;
use Pyz\Zed\Importer\ImporterConfig;
use Pyz\Zed\Importer\ImporterDependencyProvider;

/**
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 *
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
class InstallerFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Zed\Importer\Business\Factory\ImporterFactory
     */
    protected function createImporterFactory()
    {
        return new ImporterFactory();
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryInstaller
     */
    public function createCategoryInstaller()
    {
        $categoryInstaller = new CategoryInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterCategoryCollection(),
            $this->getConfig()->getIcecatImportDataDirectory()
        );

        return $categoryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryCatalogInstaller
     */
    public function createCategoryCatalogInstaller()
    {
        $categoryHierarchyInstaller = new CategoryCatalogInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterCategoryCatalogCollection(),
            $this->getConfig()->getIcecatImportDataDirectory()
        );

        return $categoryHierarchyInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Category\CategoryRootInstaller
     */
    public function createCategoryRootInstaller()
    {
        $categoryRootInstaller = new CategoryRootInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterCategoryRootCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $categoryRootInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductAbstractInstaller
     */
    public function createProductAbstractInstaller()
    {
        $productInstaller = new ProductAbstractInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductAbstractCollection(),
            $this->getConfig()->getIcecatImportDataDirectory()
        );

        return $productInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductConcreteInstaller
     */
    public function createProductConcreteInstaller()
    {
        $productInstaller = new ProductConcreteInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductConcreteCollection(),
            $this->getConfig()->getIcecatImportDataDirectory()
        );

        return $productInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductPriceInstaller
     */
    public function createProductPriceInstaller()
    {
        $productPriceInstaller = new ProductPriceInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductPriceCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productPriceInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductStockInstaller
     */
    public function createProductStockInstaller()
    {
        $productStockInstaller = new ProductStockInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductStockCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productStockInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Product\ProductAttributeKeyInstaller
     */
    public function createProductAttributeKeyInstaller()
    {
        $productInstaller = new ProductAttributeKeyInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductAttributeKeyCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Glossary\GlossaryInstaller
     */
    public function createGlossaryInstaller()
    {
        $glossaryInstaller = new GlossaryInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterGlossaryCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $glossaryInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Discount\DiscountInstaller
     */
    public function createDiscountInstaller()
    {
        $discountInstaller = new DiscountInstaller(
            $this->getUtilDataReaderService(),
            $this->getDiscountImporterCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $discountInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Cms\CmsBlockInstaller
     */
    public function createCmsBlockInstaller()
    {
        $cmsBlockInstaller = new CmsBlockInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterCmsBlockCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Cms\CmsPageInstaller
     */
    public function createCmsPageInstaller()
    {
        $cmsBlockInstaller = new CmsPageInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterCmsPageCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $cmsBlockInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Shipment\ShipmentInstaller
     */
    public function createShipmentInstaller()
    {
        $shipmentInstaller = new ShipmentInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterShipmentCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $shipmentInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductOption\ProductOptionInstaller
     */
    public function createProductOptionsInstaller()
    {
        return new ProductOptionInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductOptionCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductOptionCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_OPTIONS => $this->createImporterFactory()->createProductOptionImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductGroup\ProductGroupInstaller
     */
    public function createProductGroupInstaller()
    {
        return new ProductGroupInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductGroupCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductGroupCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_GROUPS => $this->createImporterFactory()->createProductGroupImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductRelation\ProductRelationInstaller
     */
    public function createProductRelationsInstaller()
    {
        return new ProductRelationInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductRelationCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductRelationCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_RELATIONS => $this->createImporterFactory()->createProductRelationImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Tax\TaxInstaller
     */
    public function createTaxInstaller()
    {
        return new TaxInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterTaxCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductManagement\ProductManagementAttributeInstaller
     */
    public function createProductManagementAttributeInstaller()
    {
        return new ProductManagementAttributeInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductManagementAttributeCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductSearch\ProductSearchAttributeInstaller
     */
    public function createProductSearchAttributeInstaller()
    {
        return new ProductSearchAttributeInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductSearchAttributeCollection(),
            $this->getConfig()->getImportDataDirectory(),
            $this->getProductSearchFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\ProductSearch\ProductSearchAttributeMapInstaller
     */
    public function createProductSearchAttributeMapInstaller()
    {
        return new ProductSearchAttributeMapInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductSearchAttributeMapCollection(),
            $this->getConfig()->getImportDataDirectory(),
            $this->getProductSearchFacade()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Navigation\NavigationInstaller
     */
    public function createNavigationInstaller()
    {
        $navigationInstaller = new NavigationInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterNavigationCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $navigationInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\Navigation\NavigationNodeInstaller
     */
    public function createNavigationNodeInstaller()
    {
        $navigationNodeInstaller = new NavigationNodeInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterNavigationNodesCollection(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $navigationNodeInstaller;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface
     */
    public function createProductLabelInstaller()
    {
        return new ProductLabelInstaller(
            $this->getUtilDataReaderService(),
            $this->getImporterProductLabelCollection(),
            $this->getConfig()->getImportDataDirectory()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterTaxCollection()
    {
        return [
            ImporterConfig::RESOURCE_TAX => $this->createImporterFactory()->createTaxImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY => $this->createImporterFactory()->createCategoryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryCatalogCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_CATALOG => $this->createImporterFactory()->createCategoryHierarchyImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterCategoryRootCollection()
    {
        return [
            ImporterConfig::RESOURCE_CATEGORY_ROOT => $this->createImporterFactory()->createCategoryRootImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductAbstractCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_ABSTRACT => $this->createImporterFactory()->createProductAbstractImporter(),
            ImporterConfig::RESOURCE_PRODUCT_CATEGORY => $this->createImporterFactory()->createProductCategoryImporter(),
            ImporterConfig::RESOURCE_PRODUCT_TAX => $this->createImporterFactory()->createProductTaxImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductConcreteCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_ABSTRACT => $this->createImporterFactory()->createProductConcreteImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductPriceCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_PRICE => $this->createImporterFactory()->createProductPriceImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductStockCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_STOCK => $this->createImporterFactory()->createProductStockImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductAttributeKeyCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_ATTRIBUTE_KEY => $this->createImporterFactory()->createProductAttributeKeyImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductManagementAttributeCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_MANAGEMENT_ATTRIBUTE => $this->createImporterFactory()->createProductManagementAttributeImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductSearchAttributeCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_SEARCH_ATTRIBUTE => $this->createImporterFactory()->createProductSearchAttributeImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    public function getImporterProductSearchAttributeMapCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_SEARCH_ATTRIBUTE_MAP => $this->createImporterFactory()->createProductSearchAttributeMapImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterGlossaryCollection()
    {
        return [
            ImporterConfig::RESOURCE_GLOSSARY_TRANSLATION => $this->createImporterFactory()->createGlossaryImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getDiscountImporterCollection()
    {
        return [
            ImporterConfig::RESOURCE_DISCOUNT => $this->createImporterFactory()->createDiscountImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterCmsBlockCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_BLOCK => $this->createImporterFactory()->createCmsBlockImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterCmsPageCollection()
    {
        return [
            ImporterConfig::RESOURCE_CMS_PAGE => $this->createImporterFactory()->createCmsPageImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterShipmentCollection()
    {
        return [
            ImporterConfig::RESOURCE_SHIPMENT => $this->createImporterFactory()->createShipmentImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterNavigationCollection()
    {
        return [
            ImporterConfig::RESOURCE_NAVIGATION => $this->createImporterFactory()->createNavigationImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getImporterNavigationNodesCollection()
    {
        return [
            ImporterConfig::RESOURCE_NAVIGATION_NODE => $this->createImporterFactory()->createNavigationNodeImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    protected function getImporterProductLabelCollection()
    {
        return [
            ImporterConfig::RESOURCE_PRODUCT_LABELS => $this->createImporterFactory()->createProductLabelImporter(),
        ];
    }

    /**
     * @return \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface
     */
    protected function getUtilDataReaderService()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::SERVICE_DATA);
    }

}
