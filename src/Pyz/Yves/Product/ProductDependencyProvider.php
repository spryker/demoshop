<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ProductDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_PRODUCT_OPTION = 'CLIENT_PRODUCT_OPTION';
    const CLIENT_AVAILABILITY = 'CLIENT_AVAILABILITY';
    const CLIENT_PRODUCT_GROUP = 'CLIENT_PRODUCT_GROUP';
    const CLIENT_PRICE_PRODUCT = 'CLIENT_PRICE_PRODUCT';
    const CLIENT_CURRENCY = 'CLIENT_CURRENCY';
    const CLIENT_PRICE = 'CLIENT_PRICE';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[static::CLIENT_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->client();
        };

        $container[static::CLIENT_AVAILABILITY] = function (Container $container) {
            return $container->getLocator()->availability()->client();
        };

        $container[static::CLIENT_PRODUCT_GROUP] = function (Container $container) {
            return $container->getLocator()->productGroup()->client();
        };

        $container[static::CLIENT_PRICE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->priceProduct()->client();
        };

        $container = $this->addCurrencyClient($container);
        $container = $this->addPriceClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addPriceClient(Container $container)
    {
        $container[static::CLIENT_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCurrencyClient(Container $container)
    {
        $container[static::CLIENT_CURRENCY] = function (Container $container) {
            return $container->getLocator()->currency()->client();
        };

        return $container;
    }
}
