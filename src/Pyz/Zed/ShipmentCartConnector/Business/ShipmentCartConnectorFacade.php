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
     * @param $countryId
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryId($countryId)
    {
        return $this->getDependencyContainer()->createShipmentFacade()->getShipmentMethodByCountryId($countryId);
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
