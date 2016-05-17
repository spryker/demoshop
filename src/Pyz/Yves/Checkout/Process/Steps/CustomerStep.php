<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

class CustomerStep extends BaseStep
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected $customerStepHandler;

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface $customerStepHandler
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CustomerClientInterface $customerClient,
        CartClientInterface $cartClient,
        StepHandlerPluginInterface $customerStepHandler,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
        $this->customerStepHandler = $customerStepHandler;
    }

    /**
     * Require input for customer authentication if the customer is not logged in already, or haven't authenticated yet.
     *
     * @return bool
     */
    public function requireInput()
    {
        if ($this->isCustomerInQuote($this->getDataClass())) {
            return false;
        }

        if ($this->isCustomerLoggedIn()) {
            return false;
        }

        return true;
    }

    /**
     * Update QuoteTransfer with customer step handler plugin.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $quoteTransfer = $this->getDataClass();
        $quoteTransfer->fromArray($updatedQuoteTransfer->modifiedToArray());

        $this->setDataClass($this->customerStepHandler->addToDataClass($request, $quoteTransfer));
    }

    /**
     * The customer step is considered done (return true) if he QuoteTransfer contains a non empty CustomerTransfer.
     * If the CustomerTransfer is guest and the customer is logged in, then we override the guest customer with the
     * logged in customer, e.g. return false and execute() will do the rest.
     *
     * @return bool
     */
    public function postCondition()
    {
        $quoteTransfer = $this->getDataClass();
        if ($this->isCustomerInQuote($quoteTransfer) === false) {
            return false;
        }

        if ($this->isGuestCustomerSelected($quoteTransfer) && $this->isCustomerLoggedIn()) {
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
    protected function isCustomerLoggedIn()
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
