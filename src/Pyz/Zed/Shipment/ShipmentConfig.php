<?php

namespace Pyz\Zed\Shipment;

use SprykerFeature\Zed\Shipment\ShipmentConfig as SprykerShipmentConfig;

class ShipmentConfig extends SprykerShipmentConfig
{

    const DHL_PAKET = 'DHL Paket';
    const DHL_EXPRESS = 'DHL Express';

    /**
     * @return array
     */
    public function getAvailabilityPlugins()
    {
        $plugins = [
            self::DHL_EXPRESS => $this->getLocator()->shipment()->pluginAvailabilityDHLExpressPlugin(),
            self::DHL_PAKET => $this->getLocator()->shipment()->pluginAvailabilityDHLPaketPlugin()
        ];

        return $plugins;
    }

    /**
     * @return array
     */
    public function getPriceCalculationPlugins()
    {
        $plugins = [
            self::DHL_EXPRESS => $this->getLocator()->shipment()->pluginPriceCalculationDHLExpressPlugin(),
            self::DHL_PAKET => $this->getLocator()->shipment()->pluginPriceCalculationDHLPaketPlugin()
        ];

        return $plugins;
    }

    /**
     * @return array
     */
    public function getDeliveryTimePlugins()
    {
        $plugins = [
            self::DHL_EXPRESS => $this->getLocator()->shipment()->pluginDeliveryTimeDHLExpressPlugin(),
            self::DHL_PAKET => $this->getLocator()->shipment()->pluginDeliveryTimeDHLPaketPlugin()
        ];

        return $plugins;
    }
}
