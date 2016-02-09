<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Symfony\Component\HttpFoundation\Request;

class PlaceOrderStep extends BaseStep
{

    /**
     * @var \Spryker\Client\Checkout\CheckoutClientInterface
     */
    protected $checkoutClient;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        CheckoutClientInterface $checkoutClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);

        $this->checkoutClient = $checkoutClient;
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
        return false;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface[] $plugins
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer)
    {
        $checkoutResponseTransfer = $this->checkoutClient->placeOrder($quoteTransfer);
        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $this->externalRedirectUrl = $checkoutResponseTransfer->getRedirectUrl();
        }
        if ($checkoutResponseTransfer->getSaveOrder() !== null) {
            $quoteTransfer->setOrderReference($checkoutResponseTransfer->getSaveOrder()->getOrderReference());
        }

        $this->setCheckoutErrorMessages($checkoutResponseTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null ||
            $quoteTransfer->getShipment() === null ||
            (empty($quoteTransfer->getPayment()) && $quoteTransfer->getPayment()->getPaymentSelection() === null) ||
            $quoteTransfer->getOrderReference() === null
        ) {
            $this->flashMessenger->addErrorMessage('checkout.step.place_order.post_condition_not_met');
            return false;
        }
        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return void
     */
    protected function setCheckoutErrorMessages(CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        foreach ($checkoutResponseTransfer->getErrors() as $checkoutErrorTransfer) {
            $this->flashMessenger->addErrorMessage($checkoutErrorTransfer->getMessage());
        }
    }

}
