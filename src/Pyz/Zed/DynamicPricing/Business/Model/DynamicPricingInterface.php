<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DynamicPricing\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

/**
 * Interface DynamicPricingInterface
 * @package Pyz\Zed\DynamicPricing\Business\Model
 */
interface DynamicPricingInterface
{

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer);

}
