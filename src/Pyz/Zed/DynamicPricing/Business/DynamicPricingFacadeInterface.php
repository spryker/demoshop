<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:07
 */

namespace Pyz\Zed\DynamicPricing\Business;

use Generated\Shared\Transfer\CustomerTransfer;

interface DynamicPricingFacadeInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return CustomerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer);
}