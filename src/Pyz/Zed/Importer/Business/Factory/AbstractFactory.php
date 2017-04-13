<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Factory;

use Pyz\Zed\Importer\ImporterDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\Importer\ImporterConfig getConfig()
 */
abstract class AbstractFactory extends AbstractBusinessFactory
{

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
     * @return \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface
     */
    protected function getShipmentQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_SHIPMENT);
    }

    /**
     * @return \Spryker\Zed\Stock\Business\StockFacadeInterface
     */
    protected function getStockFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_STOCK);
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
     * @return \Spryker\Zed\ProductMANAGEMENT\Business\ProductManagementFacadeInterface
     */
    protected function getProductManagementFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_MANAGEMENT);
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
     * @return \Spryker\Zed\Discount\Business\DiscountFacade
     */
    protected function getDiscountFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_DISCOUNT);
    }

    /**
     * @return \Spryker\Zed\Glossary\Business\GlossaryFacadeInterface
     */
    protected function getGlossaryFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected function getProductSearchFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\Tax\Business\TaxFacadeInterface
     */
    protected function getTaxFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_TAX);
    }

    /**
     * @return \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected function getUrlFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_URL);
    }

    /**
     * @return \Spryker\Zed\Country\Business\CountryFacadeInterface
     */
    protected function getCountryFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_COUNTRY);
    }

    /**
     * @return \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface
     */
    protected function getTaxQueryContainer()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::QUERY_CONTAINER_TAX);
    }

    /**
     * @return \Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface
     */
    protected function getProductOptionFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_OPTION);
    }

    /**
     * @return \Spryker\Zed\ProductRelation\Business\ProductRelationFacadeInterface
     */
    protected function getProductRelationFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_PRODUCT_RELATION);
    }

    /**
     * @return \Spryker\Service\UtilEncoding\UtilEncodingService
     */
    protected function getUtilEncodingService()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    /**
     * @return \Spryker\Zed\Navigation\Business\NavigationFacadeInterface
     */
    protected function getNavigationFacade()
    {
        return $this->getProvidedDependency(ImporterDependencyProvider::FACADE_NAVIGATION);
    }

}
