<?php

namespace Pyz\Zed\Shipment\Communication\Controller;

use Generated\Shared\Transfer\CountryTransfer;
use SprykerFeature\Zed\Shipment\Communication\Controller\GatewayController as SpyGatewayController;
use Pyz\Zed\Shipment\Business\ShipmentFacade;

/**
 * @method ShipmentFacade getFacade()
 */
class GatewayController extends SpyGatewayController
{

    /**
     * @param CountryTransfer $countryTransfer
     * @return \Orm\Zed\Shipment\Persistence\SpyShipmentMethod
     */
    public function getShipmentMethodAction(CountryTransfer $countryTransfer)
    {
         return $this->getFacade()->getShipmentMethod($countryTransfer);
    }
}
