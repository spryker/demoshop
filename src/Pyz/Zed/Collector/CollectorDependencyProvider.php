<?php

namespace Pyz\Zed\Collector;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const FACADE_PRICE = 'price_facade';
    const FACADE_PRODUCT_SEARCH = 'product_search_facade';
    const FACADE_PRODUCT_OPTION_EXPORTER = 'product_option_exporter_facade';
    const FACADE_PROPEL = 'facade propel';
    const FACADE_PRODUCT_DYNAMIC = 'facade_product_dynamic';

    const QUERY_CONTAINER_CATEGORY = 'category_query_container';
    const QUERY_CONTAINER_PRICE = 'price_query_container';
    const QUERY_CONTAINER_PRODUCT_DYNAMIC = 'query_container_product_dynamic';
    const QUERY_CONTAINER_CATEGORY_CMS = 'category_cms_query_container';
    const CMS_BLOCK_FACADE = 'cms_block_facade';
    const CMS_BLOCK_QUERY_CONTAINER = 'cms_block_query_container';

    /**
     * @var Container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->facade();
        };

        $container[self::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_CATEGORY_CMS] = function (Container $container) {
            return $container->getLocator()->categoryCmsConnector()->queryContainer();
        };

        $container[self::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        $container[self::FACADE_PRODUCT_OPTION_EXPORTER] = function (Container $container) {
            return $container->getLocator()->productOptionExporter()->facade();
        };

        $container[self::FACADE_PROPEL] = function (Container $container) {
            return $container->getLocator()->propel()->facade();
        };

        $container[self::FACADE_PRODUCT_DYNAMIC] = function (Container $container) {
            return $container->getLocator()->productDynamic()->facade();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_DYNAMIC] = function (Container $container) {
            return $container->getLocator()->productDynamic()->queryContainer();
        };

        $container[self::CMS_BLOCK_QUERY_CONTAINER] = function (Container $container) {
            return $container->getLocator()->cmsBlock()->queryContainer();
        };

        $container[self::CMS_BLOCK_FACADE] = function (Container $container) {
            return $container->getLocator()->cmsBlock()->facade();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_DYNAMIC] = function (Container $container) {
            return $container->getLocator()->productDynamic()->queryContainer();
        };

        $container[self::SEARCH_PLUGINS] = function (Container $container) {
            return [
                'abstract_product' => $container->getLocator()->collector()->pluginProductCollectorSearchPlugin(),
            ];
        };

        $container[self::STORAGE_PLUGINS] = function (Container $container) {
            return [
                'abstract_product' => $container->getLocator()->collector()->pluginProductCollectorStoragePlugin(),
                'categorynode' => $container->getLocator()->collector()->pluginCategoryNodeCollectorStoragePlugin(),
                'navigation' => $container->getLocator()->collector()->pluginNavigationCollectorStoragePlugin(),
                'translation' => $container->getLocator()->collector()->pluginTranslationCollectorStoragePlugin(),
                'page' => $container->getLocator()->collector()->pluginPageCollectorStoragePlugin(),
                'redirect' => $container->getLocator()->collector()->pluginRedirectCollectorStoragePlugin(),
                'url' => $container->getLocator()->collector()->pluginUrlCollectorStoragePlugin(),
            ];
        };

        return $container;
    }

}
