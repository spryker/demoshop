<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Symfony\Component\HttpFoundation\Request;

class CustomerStep extends BaseStep
{

    /**
     * @var \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface
     */
    protected $authHandler;

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface $authHandler
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        $stepRoute,
        $escapeRoute,
        CheckoutStepHandlerPluginInterface $authHandler,
        CustomerClientInterface $customerClient
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->authHandler = $authHandler;
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getCustomer() !== null) {
            return false;
        }

        if ($this->customerClient->getCustomer() !== null) {
            return false;
        }

        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        return $this->authHandler->addToQuote($request, $quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getCustomer() === null) {
            return false;
        }

        if ($quoteTransfer->getCustomer()->getIsGuest() && $this->customerClient->getCustomer()) {
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
    protected function isCartEmpty(QuoteTransfer $quoteTransfer)
    {
        return count($quoteTransfer->getItems()) === 0;
    }

}
