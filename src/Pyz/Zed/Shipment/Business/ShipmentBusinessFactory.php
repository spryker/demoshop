<?php

namespace Pyz\Zed\Shipment\Business;

use Pyz\Zed\Shipment\ShipmentDependencyProvider;
use Spryker\Zed\Shipment\Business\Model\Method;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Pyz\Zed\Shipment\Business\Internal\DemoData\ShipmentInstall;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Shipment\Business\ShipmentBusinessFactory as SprykerShipmentBusinessFactory;
use Spryker\Zed\Shipment\Persistence\ShipmentQueryContainer;
use Pyz\Zed\Shipment\ShipmentConfig;

/**
 * @method ShipmentQueryContainer getQueryContainer()
 * @method ShipmentConfig getConfig()
 */
class ShipmentBusinessFactory extends SprykerShipmentBusinessFactory
{

    /**
     * @param MessengerInterface $messenger
     *
     * @return ShipmentInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new ShipmentInstall(
            $this->getQueryContainer(),
            $this->createCarrier(),
            $this->createMethod()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return Carrier
     */
    public function createCarrier()
    {
        return new Carrier();
    }

    /**
     * @return Method
     */
    public function createMethod()
    {
        return new Method(
            $this->getQueryContainer(),
            $this->getProvidedDependency(ShipmentDependencyProvider::PLUGINS)
        );
    }

}
