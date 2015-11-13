<?php

namespace Pyz\Zed\ShipmentCartConnector\Communication\Plugin;

use Pyz\Zed\Cart\Dependency\Plugin\OrderShipmentMethodInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use Pyz\Zed\ShipmentCartConnector\Business\ShipmentCartConnectorFacade;
use Generated\Shared\Transfer\ExpenseTransfer;

/**
 * @method ShipmentCartConnectorFacade getFacade()
 */
class OrderShipmentMethodPlugin extends AbstractPlugin implements OrderShipmentMethodInterface
{
    /**
     * @param int $countryId
     * @return ExpenseTransfer
     */
    public function getShipmentMethodByCountry($countryId)
    {
        $shipmentMethod =  $this->getFacade()->getShipmentMethodByCountryId($countryId);

        return $this->getFacade()->getShipmentMethodAsCartExpense($shipmentMethod);
    }
}
