<?php

namespace Pyz\Zed\Collector;

use Pyz\Zed\Collector\Communication\Plugin\UrlCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\RedirectCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\BlockCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\PageCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\TranslationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\NavigationCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\CategoryNodeCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductCollectorStoragePlugin;
use Pyz\Zed\Collector\Communication\Plugin\ProductCollectorSearchPlugin;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Collector\CollectorDependencyProvider as SprykerCollectorDependencyProvider;

class CollectorDependencyProvider extends SprykerCollectorDependencyProvider
{

    const FACADE_PRICE = 'price_facade';

    const QUERY_CONTAINER_PRICE = 'price_query_container';

    const QUERY_CONTAINER_CATEGORY = 'category_query_container';

    const FACADE_PRODUCT_SEARCH = 'product_search_facade';

    const FACADE_PRODUCT_OPTION_EXPORTER = 'product_option_exporter_facade';

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

        $container[self::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        $container[self::FACADE_PRODUCT_OPTION_EXPORTER] = function (Container $container) {
            return $container->getLocator()->productOptionExporter()->facade();
        };

        $container[self::SEARCH_PLUGINS] = function (Container $container) {
            return [
                'abstract_product' => new ProductCollectorSearchPlugin(),
            ];
        };

        $container[self::STORAGE_PLUGINS] = function (Container $container) {
            return [
                'abstract_product' => new ProductCollectorStoragePlugin(),
                'categorynode' => new CategoryNodeCollectorStoragePlugin(),
                'navigation' => new NavigationCollectorStoragePlugin(),
                'translation' => new TranslationCollectorStoragePlugin(),
                'page' => new PageCollectorStoragePlugin(),
                'block' => new BlockCollectorStoragePlugin(),
                'redirect' => new RedirectCollectorStoragePlugin(),
                'url' => new UrlCollectorStoragePlugin(),
            ];
        };

        return $container;
    }

}
