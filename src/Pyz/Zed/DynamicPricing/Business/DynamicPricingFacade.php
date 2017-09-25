<?php
/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 25.09.17
 * Time: 22:06
 */

namespace Pyz\Zed\DynamicPricing\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * Class DynamicPricingFacade
 * @package Pyz\Zed\DynamicPricing\Business
 *
 * @method DynamicPricingBusinessFactory getFactory()
 */
class DynamicPricingFacade extends AbstractFacade implements DynamicPricingFacadeInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return CustomerTransfer
     */
    public function attachPricingFactors(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()->createDynamicPricing()->attachPricingFactors($customerTransfer);
    }
}