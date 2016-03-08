<?php

namespace Pyz\Yves\Shipment\Plugin;

use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Shipment\ShipmentFactory getFactory()
 */
class ShipmentSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    public function createSubFrom()
    {
        return $this->getFactory()->createShipmentForm();
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider()
    {
        return $this->getFactory()->createShipmentDataProvider();
    }

}
