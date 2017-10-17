<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet;

use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ProductSetDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_CART = 'CLIENT_CART';
    const CLIENT_PRODUCT = 'CLIENT_PRODUCT';
    const CLIENT_PRODUCT_SET = 'CLIENT_PRODUCT_SET';

    const PLUGIN_STORAGE_PRODUCT_MAPPER = 'PLUGIN_STORAGE_PRODUCT_MAPPER';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $this->provideCartClient($container);
        $this->provideProductClient($container);
        $this->provideProductSetClient($container);

        $this->provideStorageProductMapperPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideCartClient(Container $container)
    {
        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductClient(Container $container)
    {
        $container[self::CLIENT_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->client();
        };
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideProductSetClient(Container $container)
    {
        $container[self::CLIENT_PRODUCT_SET] = function (Container $container) {
            return $container->getLocator()->productSet()->client();
        };
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return void
     */
    protected function provideStorageProductMapperPlugin(Container $container)
    {
        $container[self::PLUGIN_STORAGE_PRODUCT_MAPPER] = function (Container $container) {
            return new StorageProductMapperPlugin();
        };
    }
}
