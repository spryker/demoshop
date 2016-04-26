<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class ShipmentDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_SHIPMENT = 'shipment client';
    const CLIENT_GLOSSARY = 'glossary client';

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

        return $container;
    }
}
