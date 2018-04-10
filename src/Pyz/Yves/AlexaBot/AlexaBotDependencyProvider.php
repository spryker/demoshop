<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot;

use Pyz\Yves\AlexaBot\Plugin\AlexaProductPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class AlexaBotDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_CATALOG        = 'CLIENT_CATALOG';
    const CLIENT_CART           = 'CLIENT_CART';
    const CLIENT_CHECKOUT       = 'CLIENT_CHECKOUT';
    const PRODUCT_PLUGIN        = 'PRODUCT_PLUGIN';
    const CLIENT_PRODUCT        = 'CLIENT_PRODUCT';
    const CLIENT_PRICE_PRODUCT  = 'CLIENT_PRICE_PRODUCT';
    const CLIENT_CALCULATION    = 'FACADE_CALCULATION';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addCatalogClient($container);
        $container = $this->addCartClient($container);
        $container = $this->addCheckoutClient($container);
        $container = $this->addProductPlugin($container);
        $container = $this->addProductClient($container);
        $container = $this->addClientPriceProduct($container);
        $container = $this->addCalculationClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCatalogClient(Container $container)
    {
        $container[self::CLIENT_CATALOG] = function (Container $container) {
            return $container->getLocator()->catalog()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCartClient(Container $container)
    {
        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCheckoutClient(Container $container)
    {
        $container[self::CLIENT_CHECKOUT] = function (Container $container) {
            return $container->getLocator()->checkout()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addProductPlugin(Container $container)
    {
        $container[self::PRODUCT_PLUGIN] = function () {
            return new AlexaProductPlugin();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addProductClient(Container $container)
    {
        $container[static::CLIENT_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addClientPriceProduct(Container $container)
    {
        $container[static::CLIENT_PRICE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->priceProduct()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addCalculationClient(Container $container)
    {
        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        return $container;
    }

}
