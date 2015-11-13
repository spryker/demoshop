<?php

namespace Pyz\Zed\Shipment\Business;

use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Shipment\Business\ShipmentFacade as SprykerShipmentFacade;

/**
 * @method ShipmentDependencyContainer getDependencyContainer()
 */
class ShipmentFacade extends SprykerShipmentFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

    /**
     * @param $countryId
     * @return \Generated\Shared\Transfer\ExpenseTransfer
     */
    public function getShipmentMethodByCountryId($countryId)
    {
        return $this->getDependencyContainer()
            ->createShipmentMethodManager()
            ->getShipmentMethod($countryId);
    }
}
