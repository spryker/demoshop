<?php

namespace Pyz\Zed\ShipmentCartConnector\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;
use Generated\Shared\Transfer\ExpenseTransfer;

/**
 * @method ShipmentCartConnectorDependencyContainer getDependencyContainer()
 */
class ShipmentCartConnectorFacade extends AbstractFacade
{
    /**
     * @param $countryIso2
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryIso2($countryIso2)
    {
        return $this->getDependencyContainer()->createShipmentFacade()->getShipmentMethodByCountryIso2($countryIso2);
    }

    /**
     * @param SpyShipmentMethod $shipmentMethod
     * @return ExpenseTransfer
     */
    public function getShipmentMethodAsCartExpense(SpyShipmentMethod $shipmentMethod)
    {
        return $this->getDependencyContainer()->createShipmentFacade()->getShipmentMethodAsCartExpense($shipmentMethod);
    }
}
