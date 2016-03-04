<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Shipment\Business;

use Pyz\Zed\Shipment\Business\Internal\DemoData\ShipmentInstall;
use Pyz\Zed\Shipment\ShipmentDependencyProvider;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Spryker\Zed\Shipment\Business\Model\Method;
use Spryker\Zed\Shipment\Business\ShipmentBusinessFactory as SprykerShipmentBusinessFactory;

/**
 * @method \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainer getQueryContainer()
 * @method \Pyz\Zed\Shipment\ShipmentConfig getConfig()
 */
class ShipmentBusinessFactory extends SprykerShipmentBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Shipment\Business\Internal\DemoData\ShipmentInstall
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
     * @return \Spryker\Zed\Shipment\Business\Model\Carrier
     */
    public function createCarrier()
    {
        return new Carrier();
    }

    /**
     * @return \Spryker\Zed\Shipment\Business\Model\Method
     */
    public function createMethod()
    {
        return new Method(
            $this->getQueryContainer(),
            $this->getProvidedDependency(ShipmentDependencyProvider::PLUGINS)
        );
    }

}
