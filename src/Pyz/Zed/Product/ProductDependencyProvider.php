<?php

namespace Pyz\Zed\Product;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;

class ProductDependencyProvider extends SprykerProductDependencyProvider
{

    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'query container product category';
    const FACADE_PRODUCT_DYNAMIC_IMPORTER = 'product dynamic importer';
    const FACADE_CATEGORIES = 'facade categories';
    const FACADE_PRODUCT_DYNAMIC = 'facade product dynamic';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {

        $container = parent::provideCommunicationLayerDependencies($container);

        $container[self::FACADE_CATEGORIES] = function (Container $container) {
            return $container->getLocator()->category()->facade();
        };

        $container[self::FACADE_PRODUCT_DYNAMIC] = function (Container $container) {
            return $container->getLocator()->productDynamic()->facade();
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::FACADE_PRODUCT_CATEGORIES] = function (Container $container) {
            return $container->getLocator()->productCategory()->facade();
        };

        $container[self::FACADE_PRODUCT_OPTIONS] = function (Container $container) {
            return $container->getLocator()->productOption()->facade();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[self::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->queryContainer();
        };

        $container[self::FACADE_PRODUCT_DYNAMIC_IMPORTER] = function (Container $container) {
            return $container->getLocator()->productDynamicImporter()->facade();
        };

        return $container;
    }

}
