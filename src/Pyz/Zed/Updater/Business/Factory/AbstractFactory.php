<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Factory;

use Pyz\Zed\Category\Business\Manager\NodeUrlManager;
use Pyz\Zed\Updater\UpdaterDependencyProvider;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReader;
use Spryker\Zed\Category\Business\Tree\CategoryTreeWriter;
use Spryker\Zed\Category\Business\Tree\ClosureTableWriter;
use Spryker\Zed\Category\Business\Tree\Formatter\CategoryTreeFormatter;
use Spryker\Zed\Category\Business\Tree\NodeWriter;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;

/**
 * @method \Pyz\Zed\Updater\UpdaterConfig getConfig()
 */
abstract class AbstractFactory extends AbstractBusinessFactory
{

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
            $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_LOCALE)
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
    protected function createCategoryTreeReader()
    {
        return new CategoryTreeReader(
            $this->getCategoryQueryContainer(),
            $this->createCategoryTreeFormatter()
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
     * @return \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface
     */
    protected function createUrlPathGenerator()
    {
        return new UrlPathGenerator();
    }

    /**
     * @return \Spryker\Zed\Category\Business\Tree\NodeWriterInterface
     */
    protected function createNodeWriter()
    {
        return new NodeWriter(
            $this->getCategoryQueryContainer()
        );
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
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected function getProductQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected function getProductCategoryQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_PRODUCT_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected function getPriceQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_PRICE);
    }

    /**
     * @return \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface
     */
    protected function getCmsQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_CMS);
    }

    /**
     * @return \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface
     */
    protected function getShipmentQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_SHIPMENT);
    }

    /**
     * @return \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface
     */
    protected function getStockQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_STOCK);
    }

    /**
     * @return \Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface
     */
    protected function getSalesQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_SALES);
    }

    /**
     * @return \Spryker\Zed\Stock\Business\StockFacadeInterface
     */
    protected function getStockFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_STOCK);
    }

    /**
     * @return \Spryker\Zed\Oms\Business\OmsFacadeInterface
     */
    protected function getOmsFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_OMS);
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface
     */
    protected function getProductCategoryFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_PRODUCT_CATEGORY);
    }

    /**
     * @return \Pyz\Zed\Category\Business\CategoryFacadeInterface
     */
    protected function getCategoryFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_CATEGORY);
    }

    /**
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\Touch\Business\TouchFacadeInterface
     */
    protected function getTouchFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Discount\Business\DiscountFacade
     */
    protected function getDiscountFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_DISCOUNT);
    }

    /**
     * @return \Spryker\Zed\Glossary\Business\GlossaryFacadeInterface
     */
    protected function getGlossaryFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return \Spryker\Zed\Url\Business\UrlFacadeInterface
     */
    protected function getUrlFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_URL);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected function getProductSearchFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_PRODUCT_SEARCH);
    }

    /**
     * @return \Spryker\Zed\Tax\Business\TaxFacadeInterface
     */
    protected function getTaxFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_TAX);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface
     */
    protected function getCategoryToTouchBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CATEGORY_TO_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToUrlInterface
     */
    protected function getCategoryToUrlBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CATEGORY_TO_URL);
    }

    /**
     * @return \Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface
     */
    protected function getCategoryToLocaleBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CATEGORY_TO_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface
     */
    protected function getCmsToGlossaryBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CMS_TO_GLOSSARY);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToTouchInterface
     */
    protected function getCmsToTouchBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CMS_TO_TOUCH);
    }

    /**
     * @return \Spryker\Zed\Cms\Dependency\Facade\CmsToUrlInterface
     */
    protected function getCmsToUrlBridge()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::BRIDGE_CMS_TO_URL);
    }

    /**
     * @return \Spryker\Service\UtilDataReader\Model\Reader\Csv\CsvReader
     */
    public function getUtilDataReaderService()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::SERVICE_UTIL_IO);
    }

}
