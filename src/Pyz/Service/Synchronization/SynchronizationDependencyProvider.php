<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Service\Synchronization;

use Pyz\Service\Synchronization\Dependency\Plugin\KeyBuilderMapperSynchronizationKeyGeneratorPlugin;
use Spryker\Client\Product\KeyBuilder\ProductConcreteResourceKeyBuilder;
use Spryker\Service\Kernel\Container;
use Spryker\Service\Synchronization\SynchronizationDependencyProvider as SprykerSynchronizationDependencyProvider;

class SynchronizationDependencyProvider extends SprykerSynchronizationDependencyProvider
{
    /**
     * @param \Spryker\Service\Kernel\Container $container
     *
     * @return array
     */
    protected function getStorageKeyGeneratorPlugins(Container $container): array
    {
        return [
            'product_concrete' => new KeyBuilderMapperSynchronizationKeyGeneratorPlugin(new ProductConcreteResourceKeyBuilder()),
//            'price_product_abstract' => new KeyBuilderMapperSynchronizationKeyGeneratorPlugin(new PriceResourceKeyBuilder()),
        ];
    }
}
