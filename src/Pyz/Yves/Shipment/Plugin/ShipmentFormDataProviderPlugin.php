<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment\Plugin;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;

/**
 * @method \Pyz\Yves\Shipment\ShipmentFactory getFactory()
 */
class ShipmentFormDataProviderPlugin extends AbstractPlugin implements StepEngineFormDataProviderInterface
{
    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function getData(AbstractTransfer $dataTransfer)
    {
        return $this->getFactory()
            ->createShipmentDataProvider()
            ->getData($dataTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $dataTransfer
     *
     * @return array
     */
    public function getOptions(AbstractTransfer $dataTransfer)
    {
        return $this->getFactory()
            ->createShipmentDataProvider()
            ->getOptions($dataTransfer);
    }
}
