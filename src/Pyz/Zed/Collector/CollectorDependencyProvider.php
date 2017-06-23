<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

use Pyz\Zed\Category\Communication\Plugin\CategoryNodeDataPageMapPlugin;
use Pyz\Zed\Collector\Communication\Plugin\AttributeMapCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\AvailabilityCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\CategoryNodeCollectorSearchPlugin;
use Pyz\Zed\Collector\Communication\Plugin\CategoryNodeCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\NavigationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductAbstractCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductCollectorSearchPlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductConcreteCollectorPlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductOptionCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\RedirectCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\TranslationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\UrlCollectorStoragePlugin;
use Pyz\Zed\ProductSearch\Communication\Plugin\ProductDataPageMapPlugin;
use Spryker\Shared\Availability\AvailabilityConfig;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Shared\CmsBlock\CmsBlockConstants;
use Spryker\Shared\CmsBlockCategoryConnector\CmsBlockCategoryConnectorConstants;
use Spryker\Shared\CmsBlockProductConnector\CmsBlockProductConnectorConstants;
use Spryker\Shared\Navigation\NavigationConfig;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Shared\ProductGroup\ProductGroupConfig;
use Spryker\Shared\ProductLabel\ProductLabelConstants;
use Spryker\Shared\ProductRelation\ProductRelationConstants;
use Spryker\Shared\ProductSearch\ProductSearchConfig;
use Spryker\Shared\ProductSet\ProductSetConfig;
use Spryker\Zed\CmsBlockCategoryConnector\Communication\Plugin\CmsBlockCategoryConnectorCollectorPlugin;
use Spryker\Zed\CmsBlockCollector\Communication\Plugin\CmsBlockCollectorStoragePlugin;
use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductConnectorCollectorPlugin;
use Spryker\Zed\CmsCollector\Communication\Plugin\CmsVersionPageCollectorSearchPlugin;
use Spryker\Zed\CmsCollector\Communication\Plugin\CmsVersionPageCollectorStoragePlugin;
use Spryker\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;
use Spryker\Zed\Glossary\Business\Translation\TranslationManager;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\NavigationCollector\Communication\Plugin\NavigationMenuCollectorStoragePlugin;
use Spryker\Zed\ProductGroupCollector\Communication\Plugin\ProductAbstractGroupsCollectorStoragePlugin;
use Spryker\Zed\ProductGroupCollector\Communication\Plugin\ProductGroupCollectorStoragePlugin;
use Spryker\Zed\ProductLabelCollector\Communication\Plugin\ProductLabelDictionaryCollectorStoragePlugin;
use Spryker\Zed\ProductLabelCollector\Communication\Plugin\ProductLabelProductAbstractRelationCollectorStoragePlugin;
use Spryker\Zed\ProductOption\ProductOptionConfig;
use Spryker\Zed\ProductRelationCollector\Communication\Plugin\ProductRelationCollectorPlugin;
use Spryker\Zed\ProductSearch\Communication\Plugin\ProductSearchConfigExtensionCollectorPlugin;
use Spryker\Zed\ProductSetCollector\Communication\Plugin\ProductSetCollectorSearchPlugin;
use Spryker\Zed\ProductSetCollector\Communication\Plugin\ProductSetCollectorStoragePlugin;
use Spryker\Zed\Url\UrlConfig;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const SERVICE_UTIL_DATE_TIME = 'util date time service';

    const SERVICE_NETWORK = 'util network service';

    const SERVICE_UTIL_IO = 'util io service';

    const SERVICE_DATA = 'util data service';

    const FACADE_PROPEL = 'propel facade';
    const FACADE_PRICE = 'price facade';
    const FACADE_SEARCH = 'search facade';
    const FACADE_PRODUCT_SEARCH = 'product search facade';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_PRODUCT_IMAGE = 'FACADE_PRODUCT_IMAGE';
    const FACADE_PRODUCT_OPTION_EXPORTER = 'product option exporter facade';

    const QUERY_CONTAINER_PRICE = 'price query container';
    const QUERY_CONTAINER_CATEGORY = 'category query container';
    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'product category query container';
    const QUERY_CONTAINER_PRODUCT_IMAGE = 'product image query container';

    const PLUGIN_PRODUCT_DATA_PAGE_MAP = 'PLUGIN_PRODUCT_DATA_PAGE_MAP';
    const PLUGIN_CATEGORY_NODE_DATA_PAGE_MAP = 'PLUGIN_CATEGORY_NODE_DATA_PAGE_MAP';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_PROPEL] = function (Container $container) {
            return $container->getLocator()->propel()->facade();
        };

        $container[self::FACADE_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->facade();
        };

        $container[self::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->queryContainer();
        };

        $container[self::FACADE_SEARCH] = function (Container $container) {
            return $container->getLocator()->search()->facade();
        };

        $container[self::FACADE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[static::FACADE_PRODUCT_IMAGE] = function (Container $container) {
            return $container->getLocator()->productImage()->facade();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_IMAGE] = function (Container $container) {
            return $container->getLocator()->productImage()->queryContainer();
        };

        $container[self::SEARCH_PLUGINS] = function (Container $container) {
            return [
                ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT => new ProductCollectorSearchPlugin(),
                CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE => new CategoryNodeCollectorSearchPlugin(),
                CmsConstants::RESOURCE_TYPE_PAGE => new CmsVersionPageCollectorSearchPlugin(),
                ProductSetConfig::RESOURCE_TYPE_PRODUCT_SET => new ProductSetCollectorSearchPlugin(),
            ];
        };

        $container[self::STORAGE_PLUGINS] = function (Container $container) {
            return [
                ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT => new ProductAbstractCollectorStoragePlugin(),
                ProductConfig::RESOURCE_TYPE_PRODUCT_CONCRETE => new ProductConcreteCollectorPlugin(),
                ProductConfig::RESOURCE_TYPE_ATTRIBUTE_MAP => new AttributeMapCollectorStoragePlugin(),
                AvailabilityConfig::RESOURCE_TYPE_AVAILABILITY_ABSTRACT => new AvailabilityCollectorStoragePlugin(),
                CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE => new CategoryNodeCollectorStoragePlugin(),
                CategoryConstants::RESOURCE_TYPE_NAVIGATION => new NavigationCollectorStoragePlugin(),
                NavigationConfig::RESOURCE_TYPE_NAVIGATION_MENU => new NavigationMenuCollectorStoragePlugin(),
                TranslationManager::TOUCH_TRANSLATION => new TranslationCollectorStoragePlugin(),
                CmsConstants::RESOURCE_TYPE_PAGE => new CmsVersionPageCollectorStoragePlugin(),
                CmsBlockConstants::RESOURCE_TYPE_CMS_BLOCK => new CmsBlockCollectorStoragePlugin(),
                CmsBlockCategoryConnectorConstants::RESOURCE_TYPE_CMS_BLOCK_CATEGORY_CONNECTOR => new CmsBlockCategoryConnectorCollectorPlugin(),
                CmsBlockProductConnectorConstants::RESOURCE_TYPE_CMS_BLOCK_PRODUCT_CONNECTOR => new CmsBlockProductConnectorCollectorPlugin(),
                UrlConfig::RESOURCE_TYPE_REDIRECT => new RedirectCollectorStoragePlugin(),
                UrlConfig::RESOURCE_TYPE_URL => new UrlCollectorStoragePlugin(),
                ProductSearchConfig::RESOURCE_TYPE_PRODUCT_SEARCH_CONFIG_EXTENSION => new ProductSearchConfigExtensionCollectorPlugin(),
                ProductOptionConfig::RESOURCE_TYPE_PRODUCT_OPTION => new ProductOptionCollectorStoragePlugin(),
                ProductRelationConstants::RESOURCE_TYPE_PRODUCT_RELATION => new ProductRelationCollectorPlugin(),
                ProductGroupConfig::RESOURCE_TYPE_PRODUCT_GROUP => new ProductGroupCollectorStoragePlugin(),
                ProductGroupConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT_GROUPS => new ProductAbstractGroupsCollectorStoragePlugin(),
                ProductLabelConstants::RESOURCE_TYPE_PRODUCT_LABEL_DICTIONARY => new ProductLabelDictionaryCollectorStoragePlugin(),
                ProductLabelConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT_PRODUCT_LABEL_RELATIONS => new ProductLabelProductAbstractRelationCollectorStoragePlugin(),
                ProductSetConfig::RESOURCE_TYPE_PRODUCT_SET => new ProductSetCollectorStoragePlugin(),
            ];
        };

        $container[self::PLUGIN_PRODUCT_DATA_PAGE_MAP] = function (Container $container) {
            return new ProductDataPageMapPlugin();
        };

        $container[self::PLUGIN_CATEGORY_NODE_DATA_PAGE_MAP] = function (Container $container) {
            return new CategoryNodeDataPageMapPlugin();
        };

        $container[static::SERVICE_DATA] = function (Container $container) {
            return $container->getLocator()->utilDataReader()->service();
        };

        return $container;
    }

}
