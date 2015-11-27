<?php

namespace Pyz\Zed\ProductGroup;
use PavFeature\Zed\ProductGroup\ProductGroupDependencyProvider as PavProductGroupDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ProductGroupDependencyProvider extends PavProductGroupDependencyProvider
{

    const FACADE_PRODUCT_GROUP = 'facade product group';
    const FACADE_GLOSSARY = 'facade glossary';
    const FACADE_LOCALE = 'facade locale';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_PRODUCT_GROUP] = function (Container $container) {
            return $container->getLocator()->productGroup()->facade();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        return $container;
    }
}
