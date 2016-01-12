<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class CustomerStep extends BaseStep implements StepInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return false;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(true);
        $quoteTransfer->setCustomer($customerTransfer);

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getCustomer() === null) {
            $this->flashMessenger->addErrorMessage('checkout.step.customer.customer_not_set');
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCartEmpty(QuoteTransfer $quoteTransfer)
    {
        return count($quoteTransfer->getItems()) === 0;
    }
}
