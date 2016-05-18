<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment\Plugin;

use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Shipment\ShipmentFactory getFactory()
 */
class ShipmentSubFormPlugin extends AbstractPlugin implements SubFormPluginInterface
{

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Form\SubFormInterface
     */
    public function createSubForm()
    {
        return $this->getFactory()->createShipmentForm();
    }

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Form\DataProviderInterface
     */
    public function createSubFormDataProvider()
    {
        return $this->getFactory()->createShipmentDataProvider();
    }

}
