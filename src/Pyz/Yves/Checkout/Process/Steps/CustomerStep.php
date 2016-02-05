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
     * @var CheckoutStepHandlerPluginInterface
     */
    protected $authHandler;

    /**
     * @var CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CheckoutStepHandlerPluginInterface $authHandler
     * @param CustomerClientInterface $customerClient
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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer)
    {
        return !$this->isCartEmpty($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
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
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        return $this->authHandler->addToQuote($request, $quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCartEmpty(QuoteTransfer $quoteTransfer)
    {
        return count($quoteTransfer->getItems()) === 0;
    }

}
