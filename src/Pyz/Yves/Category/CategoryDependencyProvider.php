<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Category;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CategoryDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CATEGORY_EXPORTER = 'category exporter client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_CATEGORY_EXPORTER] = function (Container $container) {
            return $container->getLocator()->categoryExporter()->client();
        };

        return $container;
    }

}
