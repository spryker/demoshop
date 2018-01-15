<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Availability\Communication\Plugin\AvailabilityHandlerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderConfirmationPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderShippedPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\ReservationHandler\ReservationVersionHandlerPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\ReservationImport\ReservationExportPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\ReservationSynchronization\SynchronizeReservationWithStorePlugin;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandCollectionInterface;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Spryker\Zed\ProductBundle\Communication\Plugin\Oms\ProductBundleAvailabilityHandlerPlugin;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container->extend(self::COMMAND_PLUGINS, function (CommandCollectionInterface $commandCollection) {
            $commandCollection->add(new SendOrderConfirmationPlugin(), 'Oms/SendOrderConfirmation');
            $commandCollection->add(new SendOrderShippedPlugin(), 'Oms/SendOrderShipped');

            return $commandCollection;
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface[]
     */
    protected function getReservationHandlerPlugins(Container $container)
    {
        return [
            new AvailabilityHandlerPlugin(),
            new ProductBundleAvailabilityHandlerPlugin(),
            new ReservationVersionHandlerPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Oms\Dependency\Plugin\ReservationSynchronizationPluginInterface[]
     */
    protected function getReservationSynchronizationPlugins()
    {
        return [
            new SynchronizeReservationWithStorePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Oms\Dependency\Plugin\ReservationExportPluginInterface[]
     */
    protected function getReservationExportPlugins()
    {
        return [
            new ReservationExportPlugin(),
        ];
    }
}
