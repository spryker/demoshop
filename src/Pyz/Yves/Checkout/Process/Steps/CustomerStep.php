<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface;
use Spryker\Yves\CheckoutStepEngine\Process\Steps\BaseStep;
use Symfony\Component\HttpFoundation\Request;

class CustomerStep extends BaseStep
{

    /**
     * @var \Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface
     */
    protected $customerStepHandler;

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param \Spryker\Yves\CheckoutStepEngine\Dependency\Plugin\Handler\CheckoutStepHandlerPluginInterface $customerStepHandler
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     */
    public function __construct(
        $stepRoute,
        $escapeRoute,
        CheckoutStepHandlerPluginInterface $customerStepHandler,
        CustomerClientInterface $customerClient
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->customerStepHandler = $customerStepHandler;
        $this->customerClient = $customerClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * Require input for customer authentication if the customer is not logged in already, or haven't authenticated yet.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
        if ($this->isCustomerInQuote($quoteTransfer)) {
            return false;
        }

        if ($this->isCustomerLogedIn()) {
            return false;
        }

        return true;
    }

    /**
     * Update QuoteTransfer with customer step handler plugin.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        return $this->customerStepHandler->addToQuote($request, $quoteTransfer);
    }

    /**
     * The customer step is considered done (return true) if he QuoteTransfer contains a non empty CustomerTransfer.
     * If the CustomerTransfer is guest and the customer is logged in, then we override the guest customer with the
     * logged in customer, e.g. return false and execute() will do the rest.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($this->isCustomerInQuote($quoteTransfer) === false) {
            return false;
        }

        if ($this->isGuestCustomerSelected($quoteTransfer) && $this->isCustomerLogedIn()) {
            // override guest user with logged in user
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCustomerInQuote(QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer->getCustomer() !== null;
    }

    /**
     * @return bool
     */
    protected function isCustomerLogedIn()
    {
        return $this->customerClient->getCustomer() !== null;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \ArrayObject|bool
     */
    protected function isGuestCustomerSelected(QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer->getCustomer()->getIsGuest();
    }

}
