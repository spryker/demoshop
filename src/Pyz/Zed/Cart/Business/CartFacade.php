<?php

namespace Pyz\Zed\Cart\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Cart\Business\CartFacade as SprykerCartFacade;

/**
 * @method \Pyz\Zed\Cart\Business\CartBusinessFactory getFactory()
 */
class CartFacade extends SprykerCartFacade
{

    public function getAvailableCarts(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()->getQuoteFacade()->getAvailableQuotesForPurchaser($customerTransfer);
    }

}