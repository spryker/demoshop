<?php

namespace Pyz\Zed\ShipmentCartConnector\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ShipmentCartConnectorDependencyContainer getDependencyContainer()
 */
class ShipmentCartConnectorFacade extends AbstractFacade
{
    /**
     * @param $countryId
     * @return \Generated\Shared\Transfer\ExpenseTransfer
     */
    public function getShipmentMethodByCountryId($countryId)
    {
        return $this->getDependencyContainer()->createShipmentFacade()->getShipmentMethodByCountryId($countryId);
    }
}
