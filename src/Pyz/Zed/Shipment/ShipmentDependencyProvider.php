<?php

namespace Pyz\Zed\Shipment;

use Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime\DHLPacketPlugin as DeliveryTimeDHLPaketPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime\DHLExpressPlugin as DeliveryTimeDHLExpressPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation\DHLPacketPlugin as PriceCalculationDHLPaketPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation\DHLExpressPlugin as PriceCalculationDHLExpressPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\Availability\DHLPacketPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\Availability\DHLExpressPlugin;
use Spryker\Zed\Shipment\ShipmentDependencyProvider as SprykerShipmentDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ShipmentDependencyProvider extends SprykerShipmentDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        parent::provideCommunicationLayerDependencies($container);

        $container[self::PLUGINS] = function (Container $container) {
            return [
                self::AVAILABILITY_PLUGINS => $this->getAvailabilityPlugins($container),
                self::PRICE_PLUGINS => $this->getPriceCalculationPlugins($container),
                self::DELIVERY_TIME_PLUGINS => $this->getDeliveryTimePlugins($container),
            ];
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        $container[self::PLUGINS] = function (Container $container) {
            return [
                self::AVAILABILITY_PLUGINS => $this->getAvailabilityPlugins($container),
                self::PRICE_PLUGINS => $this->getPriceCalculationPlugins($container),
                self::DELIVERY_TIME_PLUGINS => $this->getDeliveryTimePlugins($container),
            ];
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getAvailabilityPlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => new DHLExpressPlugin(),
            ShipmentConfig::DHL_PACKET => new DHLPacketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getPriceCalculationPlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => new PriceCalculationDHLExpressPlugin(),
            ShipmentConfig::DHL_PACKET => new PriceCalculationDHLPaketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getDeliveryTimePlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => new DeliveryTimeDHLExpressPlugin(),
            ShipmentConfig::DHL_PACKET => new DeliveryTimeDHLPaketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getTaxCalculationPlugins(Container $container)
    {
        return [];
    }

}
