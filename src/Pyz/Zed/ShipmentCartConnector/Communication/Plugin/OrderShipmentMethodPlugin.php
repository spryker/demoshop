<?php

namespace Pyz\Zed\ShipmentCartConnector\Communication\Plugin;

use Pyz\Zed\Cart\Dependency\Plugin\OrderShipmentMethodInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use Pyz\Zed\ShipmentCartConnector\Business\ShipmentCartConnectorFacade;

/**
 * @method ShipmentCartConnectorFacade getFacade()
 */
class OrderShipmentMethodPlugin extends AbstractPlugin implements OrderShipmentMethodInterface
{

    public function getShipmentMethodByCountry($countryId)
    {
        return $this->getFacade()->getShipmentMethodByCountryId($countryId);
    }
}
