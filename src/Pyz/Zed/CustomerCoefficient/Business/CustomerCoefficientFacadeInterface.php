<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 14:18
 */

namespace Pyz\Zed\CustomerCoefficient\Business;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerCoefficientFacadeInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return float
     */
    public function getCustomerCoefficient(CustomerTransfer $customerTransfer);
}