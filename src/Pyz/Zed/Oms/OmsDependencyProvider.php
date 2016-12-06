<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Availability\Communication\Plugin\AvailabilityHandlerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\CloseCommand;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\PayCommand;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\ReturnCommand;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Command\Demo\ShipCommand;
use Pyz\Zed\Oms\Communication\Plugin\Oms\Condition\Demo\IsPaymentAuthorizedCondition;

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
            new IsPaymentAuthorizedCondition(), 'Demo/IsPaymentAuthorized'
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

        $collection->add(new PayCommand(), 'Demo/Pay');
        $collection->add(new ShipCommand(), 'Demo/Ship');
        $collection->add(new ReturnCommand(), 'Demo/Return');
        $collection->add(new CloseCommand(), 'Demo/Close');

        return $collection;
    }

}
