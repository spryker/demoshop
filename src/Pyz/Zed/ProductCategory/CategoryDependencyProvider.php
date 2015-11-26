<?php

namespace Pyz\Zed\Category;

use SprykerFeature\Zed\Category\CategoryDependencyProvider as SprykerCategoryDependencyProvider;

use SprykerEngine\Zed\Kernel\Container;

class CategoryDependencyProvider extends SprykerCategoryDependencyProvider
{
    const FACADE_CMS = 'facade cms';

    /**
     * @var Container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->facade();
        };

        return $container;
    }


}
