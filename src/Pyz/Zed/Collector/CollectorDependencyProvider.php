<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector;

use Pyz\Zed\Collector\Communication\Plugin\AttributeMapCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\AvailabilityCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\BlockCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\CategoryNodeCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\NavigationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\PageCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductAbstractCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductCollectorSearchPlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductConcreteCollectorPlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductOptionCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\RedirectCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\TranslationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\UrlCollectorStoragePlugin;
use Pyz\Zed\ProductSearch\Communication\Plugin\ProductDataPageMapPlugin;
use Spryker\Shared\ProductSearch\ProductSearchConfig;
use Spryker\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductSearch\Communication\Plugin\ProductSearchConfigExtensionCollectorPlugin;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const FACADE_PROPEL = 'propel facade';
    const FACADE_PRICE = 'price facade';
    const FACADE_SEARCH = 'search facade';
    const FACADE_PRODUCT_SEARCH = 'product search facade';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_PRODUCT_OPTION_EXPORTER = 'product option exporter facade';

    const QUERY_CONTAINER_PRICE = 'price query container';
    const QUERY_CONTAINER_CATEGORY = 'category query container';
    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'product category query container';
    const QUERY_CONTAINER_PRODUCT_IMAGE = 'product image query container';

    const PLUGIN_PAGE_MAP = 'page map plugin';

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

        $container[self::QUERY_CONTAINER_PRODUCT_IMAGE] = function (Container $container) {
            return $container->getLocator()->productImage()->queryContainer();
        };

        $container[self::SEARCH_PLUGINS] = function (Container $container) {
            return [
                'product_abstract' => new ProductCollectorSearchPlugin(),
            ];
        };

        $container[self::STORAGE_PLUGINS] = function (Container $container) {
            return [
                'product_abstract' => new ProductAbstractCollectorStoragePlugin(),
                'product_concrete' => new ProductConcreteCollectorPlugin(),
                'attribute_map' => new AttributeMapCollectorStoragePlugin(),
                'availability_abstract' => new AvailabilityCollectorStoragePlugin(),
                'categorynode' => new CategoryNodeCollectorStoragePlugin(),
                'navigation' => new NavigationCollectorStoragePlugin(),
                'translation' => new TranslationCollectorStoragePlugin(),
                'page' => new PageCollectorStoragePlugin(),
                'block' => new BlockCollectorStoragePlugin(),
                'redirect' => new RedirectCollectorStoragePlugin(),
                'url' => new UrlCollectorStoragePlugin(),
                ProductSearchConfig::RESOURCE_TYPE_PRODUCT_SEARCH_CONFIG_EXTENSION => new ProductSearchConfigExtensionCollectorPlugin(),
                'product_option' => new ProductOptionCollectorStoragePlugin(),
            ];
        };

        $container[self::PLUGIN_PAGE_MAP] = function (Container $container) {
            return new ProductDataPageMapPlugin();
        };

        return $container;
    }

}
