<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment;

use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Money\Plugin\MoneyPlugin;

class ShipmentDependencyProvider extends AbstractBundleDependencyProvider
{
    const CLIENT_SHIPMENT = 'shipment client';
    const CLIENT_GLOSSARY = 'glossary client';
    const CLIENT_PRICE = 'client price';

    const PLUGIN_MONEY = 'money plugin';
    const STORE = 'store';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->addShipmentClient($container);
        $container = $this->addGlossaryClient($container);
        $container = $this->addPriceClient($container);
        $container = $this->addStore($container);
        $container = $this->addMoneyPlugin($container);

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
    protected function addGlossaryClient(Container $container)
    {
        $container[static::CLIENT_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->client();
        };
        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addShipmentClient(Container $container)
    {
        $container[static::CLIENT_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipment()->client();
        };
        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addStore(Container $container)
    {
        $container[static::STORE] = function () {
            return Store::getInstance();
        };
        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function addMoneyPlugin(Container $container)
    {
        $container[static::PLUGIN_MONEY] = function () {
            return new MoneyPlugin();
        };
        return $container;
    }
}
