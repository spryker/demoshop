<?php

namespace Pyz\Zed\Category;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Category\CategoryDependencyProvider as SprykerFeatureCategoryDependencyProvider;

class CategoryDependencyProvider extends SprykerFeatureCategoryDependencyProvider
{

    const FACADE_LOCALE = 'locale facade';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        return $container;
    }

}
