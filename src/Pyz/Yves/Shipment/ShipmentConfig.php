<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment;

use Spryker\Yves\Shipment\ShipmentConfig as SprykerShipmentConfig;

class ShipmentConfig extends SprykerShipmentConfig
{
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getNoShipmentMethodName()
    {
        return 'No shipment';
    }
}
