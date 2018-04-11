<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot;

use Pyz\Client\AlexaBot\Model\AlexaProductPlugin;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class AlexaBotDependencyProvider extends AbstractDependencyProvider
{
    const CLIENT_CATALOG        = 'CLIENT_CATALOG';
    const CLIENT_PRODUCT        = 'CLIENT_PRODUCT';
    const CLIENT_PRICE_PRODUCT  = 'CLIENT_PRICE_PRODUCT';
    const CLIENT_CART           = 'CLIENT_CART';
    const CLIENT_CHECKOUT       = 'CLIENT_CHECKOUT';
    const CLIENT_CALCULATION    = 'CLIENT_CALCULATION';
    const PRODUCT_PLUGIN        = 'PRODUCT_PLUGIN';


    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = $this->addCatalogClient($container);
        $container = $this->addProductClient($container);
        $container = $this->addClientPriceProduct($container);
        $container = $this->addCartClient($container);
        $container = $this->addCheckoutClient($container);
        $container = $this->addCalculationClient($container);
        $container = $this->addProductPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCatalogClient(Container $container)
    {
        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addProductClient(Container $container)
    {
        $container[static::CLIENT_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addClientPriceProduct(Container $container)
    {
        $container[static::CLIENT_PRICE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->priceProduct()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCartClient(Container $container)
    {
        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCheckoutClient(Container $container)
    {
        $container[self::CLIENT_CHECKOUT] = function (Container $container) {
            return $container->getLocator()->checkout()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addCalculationClient(Container $container)
    {
        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    protected function addProductPlugin(Container $container)
    {
        $container[self::PRODUCT_PLUGIN] = function () {
            return new AlexaProductPlugin();
        };

        return $container;
    }
}
