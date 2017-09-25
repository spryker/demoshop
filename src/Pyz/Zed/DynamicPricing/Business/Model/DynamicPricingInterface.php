<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:52
 */

namespace Pyz\Zed\DynamicPricing\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface DynamicPricingInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return CustomerTransfer $customerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer);
}