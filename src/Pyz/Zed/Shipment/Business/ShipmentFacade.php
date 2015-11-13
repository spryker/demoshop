<?php

namespace Pyz\Zed\Shipment\Business;

use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;
use Pyz\Zed\ShipmentCheckoutConnector\Dependency\Facade\ShipmentCheckoutConnectorToShipmentInterface;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Shipment\Business\ShipmentFacade as SprykerShipmentFacade;
use Generated\Shared\Transfer\ExpenseTransfer;

/**
 * @method ShipmentDependencyContainer getDependencyContainer()
 */
class ShipmentFacade extends SprykerShipmentFacade implements ShipmentCheckoutConnectorToShipmentInterface
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
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryId($countryId)
    {
        return $this->getDependencyContainer()
            ->createShipmentMethodManager()
            ->getShipmentMethod($countryId);
    }

    /**
     * @param SpyShipmentMethod $shipmentMethod
     * @return ExpenseTransfer
     */
    public function getShipmentMethodAsCartExpense(SpyShipmentMethod $shipmentMethod)
    {
        return $this->getDependencyContainer()
            ->createShipmentMethodManager()
            ->getShipmentMethodAsCartExpenseTransfer($shipmentMethod);
    }
}
