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
     * @param $countryIso2
     * @return SpyShipmentMethod
     */
    public function getShipmentMethodByCountryIso2($countryIso2)
    {
        return $this->getDependencyContainer()
            ->createShipmentMethodManager()
            ->getShipmentMethod($countryIso2);
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
