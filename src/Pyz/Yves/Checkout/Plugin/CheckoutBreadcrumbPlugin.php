<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Plugin;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Checkout\CheckoutFactory getFactory()
 * @method \Spryker\Client\Checkout\CheckoutClientInterface getClient()
 */
class CheckoutBreadcrumbPlugin extends AbstractPlugin
{

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|null $dataTransfer
     *
     * @return \Generated\Shared\Transfer\StepBreadcrumbTransfer
     */
    public function generateStepBreadcrumb(AbstractTransfer $dataTransfer = null)
    {
        $stepFactory = $this->getFactory()->createStepFactory();
        $stepCollection = $stepFactory->createStepCollection();

        return $stepFactory->createStepBreadcrumbGenerator()->generateStepBreadcrumb($stepCollection, $dataTransfer);
    }

}
