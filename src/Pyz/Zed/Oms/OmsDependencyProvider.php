<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Availability\Communication\Plugin\AvailabilityHandlerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\PayPlugin;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\ShipPlugin;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Condition\Demo\IsPaymentAuthorizedPlugin;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface[]
     */
    protected function getReservationHandlerPlugins(Container $container)
    {
        return [
            new AvailabilityHandlerPlugin()
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionCollection
     */
    protected function getConditionPlugins(Container $container)
    {
        $collection = parent::getConditionPlugins($container);

        $collection->add(
            new IsPaymentAuthorizedPlugin(), 'Demo/IsPaymentAuthorized'
        );

        return $collection;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandCollection
     */
    protected function getCommandPlugins(Container $container)
    {
        $collection = parent::getCommandPlugins($container);

        $collection->add(new PayPlugin(), 'Demo/Pay');
        $collection->add(new ShipPlugin(), 'Demo/Ship');
        $collection->add(new ShipPlugin(), 'Demo/Return');
        $collection->add(new ShipPlugin(), 'Demo/Close');

        return $collection;
    }

}
