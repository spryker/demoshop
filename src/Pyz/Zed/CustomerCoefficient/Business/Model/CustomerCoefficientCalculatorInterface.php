<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 15:32
 */

namespace Pyz\Zed\CustomerCoefficient\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface CustomerCoefficientCalculatorInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return \Orm\Zed\CustomerCoefficient\Persistence\SpyCustomerCoefficientQuery
     */
    public function getCustomerCoefficient(CustomerTransfer $customerTransfer);
}