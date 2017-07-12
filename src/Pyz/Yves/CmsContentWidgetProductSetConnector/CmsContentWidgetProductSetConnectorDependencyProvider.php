<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductSetConnector;

use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Spryker\Yves\CmsContentWidgetProductSetConnector\CmsContentWidgetProductSetConnectorDependencyProvider as SprykerCmsContentWidgetProductSetConnectorDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CmsContentWidgetProductSetConnectorDependencyProvider extends SprykerCmsContentWidgetProductSetConnectorDependencyProvider
{

    const STORAGE_PRODUCT_MAPPER_PLUGIN = 'storage product mapper plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = parent::provideDependencies($container);

        $container[static::STORAGE_PRODUCT_MAPPER_PLUGIN] = function (Container $container) {
            return new StorageProductMapperPlugin();
        };

        return $container;
    }

}
