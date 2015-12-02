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
     * @param string $countryIso2
     * @return ExpenseTransfer
     */
    public function getShipmentMethodByCountryIso2($countryIso2)
    {
        $shipmentMethod =  $this->getFacade()->getShipmentMethodByCountryIso2($countryIso2);

        return $this->getFacade()->getShipmentMethodAsCartExpense($shipmentMethod);
    }
}
