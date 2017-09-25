<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class DynamicPricingFacade
 * @package Pyz\Zed\DynamicPricing\Business
 *
 * @method \Pyz\Zed\DynamicPricing\Business\DynamicPricingBusinessFactory getFactory()
 */
class DynamicPricingFacade extends AbstractFacade implements DynamicPricingFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()->createDynamicPricing()->attachPricingFactors($customerTransfer);
    }

}
