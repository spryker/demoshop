<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Controller;

use Spryker\Yves\StepEngine\Process\StepEngineInterface;

/**
 * @method \Pyz\Yves\Checkout\CheckoutFactory getFactory()
 */
class OfferCheckoutController extends CheckoutController
{
    /**
     * @return \Spryker\Yves\StepEngine\Process\StepEngineInterface
     */
    protected function createStepProcess(): StepEngineInterface
    {
        return $this->getFactory()->createOfferCheckoutProcess();
    }
}
