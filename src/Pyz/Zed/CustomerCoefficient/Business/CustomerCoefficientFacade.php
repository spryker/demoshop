<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 14:14
 */

namespace Pyz\Zed\CustomerCoefficient\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class CustomerCoefficientFacade
 * @package Pyz\Zed\CustomerCoefficient\Business
 *
 * @method CustomerCoefficientBusinessFactory getFactory()
 */
class CustomerCoefficientFacade extends AbstractFacade implements CustomerCoefficientFacadeInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return float
     */
    public function getCustomerCoefficient(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()->createCustomerCoefficientCalculator()->getCustomerCoefficient($customerTransfer);
    }
}