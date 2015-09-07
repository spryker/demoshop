<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment;

use SprykerFeature\Zed\Shipment\ShipmentDependencyProvider as SprykerShipmentDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class ShipmentDependencyProvider extends SprykerShipmentDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        parent::provideCommunicationLayerDependencies($container);

        $container[self::PLUGINS] = function (Container $container) {
            return [
                self::AVAILABILITY_PLUGINS => $this->getAvailabilityPlugins($container),
                self::PRICE_CALCULATION_PLUGINS => $this->getPriceCalculationPlugins($container),
                self::DELIVERY_TIME_PLUGINS => $this->getDeliveryTimePlugins($container),
                self::TAX_CALCULATION_PLUGINS => $this->getTaxCalculationPlugins($container),
            ];
        };

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        $container[self::PLUGINS] = function (Container $container) {
            return [
                self::AVAILABILITY_PLUGINS => $this->getAvailabilityPlugins($container),
                self::PRICE_CALCULATION_PLUGINS => $this->getPriceCalculationPlugins($container),
                self::DELIVERY_TIME_PLUGINS => $this->getDeliveryTimePlugins($container),
                self::TAX_CALCULATION_PLUGINS => $this->getTaxCalculationPlugins($container),
            ];
        };

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return array
     */
    private function getAvailabilityPlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => $container->getLocator()
                ->shipment()
                ->pluginAvailabilityDHLExpressPlugin(),
            ShipmentConfig::DHL_PAKET => $container->getLocator()
                ->shipment()
                ->pluginAvailabilityDHLPaketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param Container $container
     *
     * @return array
     */
    private function getPriceCalculationPlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => $container->getLocator()
                ->shipment()
                ->pluginPriceCalculationDHLExpressPlugin(),
            ShipmentConfig::DHL_PAKET => $container->getLocator()
                ->shipment()
                ->pluginPriceCalculationDHLPaketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param Container $container
     *
     * @return array
     */
    private function getDeliveryTimePlugins(Container $container)
    {
        $plugins = [
            ShipmentConfig::DHL_EXPRESS => $container->getLocator()
                ->shipment()
                ->pluginDeliveryTimeDHLExpressPlugin(),
            ShipmentConfig::DHL_PAKET => $container->getLocator()
                ->shipment()
                ->pluginDeliveryTimeDHLPaketPlugin(),
        ];

        return $plugins;
    }

    /**
     * @param $container
     *
     * @return array
     */
    private function getTaxCalculationPlugins($container)
    {
        return [];
    }

}
