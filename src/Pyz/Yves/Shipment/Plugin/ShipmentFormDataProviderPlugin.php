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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData(AbstractTransfer $quoteTransfer)
    {
        return $this->getFactory()
            ->createShipmentDataProvider()
            ->getData($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getOptions(AbstractTransfer $quoteTransfer)
    {
        return $this->getFactory()
            ->createShipmentDataProvider()
            ->getOptions($quoteTransfer);
    }
}
