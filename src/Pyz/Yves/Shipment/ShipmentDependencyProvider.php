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
    const PLUGIN_MONEY = 'money plugin';

    const STORE = 'store';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipment()->client();
        };

        $container[self::CLIENT_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->client();
        };

        $container[static::STORE] = function () {
            return Store::getInstance();
        };

        $container[static::PLUGIN_MONEY] = function () {
            return new MoneyPlugin();
        };

        return $container;
    }
}
