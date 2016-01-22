<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutStepHandlerInterface[] $plugins
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer, $plugins = [])
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(false);
        $customerTransfer->setEmail('test@test.test' . rand(0, 1000));
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