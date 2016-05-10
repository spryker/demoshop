<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment\Plugin;

use Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Shipment\ShipmentFactory getFactory()
 */
class ShipmentSubFormPlugin extends AbstractPlugin implements CheckoutSubFormPluginInterface
{

    /**
     * @return \Spryker\Yves\CheckoutStepEngine\Dependency\Form\SubFormInterface
     */
    public function createSubForm()
    {
        return $this->getFactory()->createShipmentForm();
    }

    /**
     * @return \Spryker\Yves\CheckoutStepEngine\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider()
    {
        return $this->getFactory()->createShipmentDataProvider();
    }

}
