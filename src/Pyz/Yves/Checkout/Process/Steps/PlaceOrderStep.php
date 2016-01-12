<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\CheckoutFactory;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Symfony\Component\HttpFoundation\Request;

class PlaceOrderStep extends BaseStep implements StepInterface
{
    /**
     * @var CheckoutClientInterface
     */
    protected $checkoutClient;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CheckoutClientInterface $checkoutClient
     */
    public function __construct(FlashMessengerInterface $flashMessenger, $stepRoute, $escapeRoute, CheckoutClientInterface $checkoutClient)
    {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);
        $this->checkoutClient = $checkoutClient;
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
     * @return bool
     */
    public function requireInput()
    {
        return false;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutFactory $checkoutFactory
     *
     * @return QuoteTransfer
     */
    public function execute(Request $request, QuoteTransfer $quoteTransfer, CheckoutFactory $checkoutFactory)
    {
        $checkoutResponseTransfer = $this->checkoutClient->placeOrder($quoteTransfer);

        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $this->externalRedirectUrl = $checkoutResponseTransfer->getRedirectUrl();
        }

        if ($checkoutResponseTransfer->getSaveOrder() !== null) {
            $quoteTransfer->setOrderReference($checkoutResponseTransfer->getSaveOrder()->getOrderReference());
        }

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null ||
            $quoteTransfer->getShipmentMethod() === null ||
            $quoteTransfer->getPayment()->getPaymentSelection() === null ||
            ($quoteTransfer->getCheckout() && $quoteTransfer->getCheckout()->getOrderPlaced() === false)
        ) {
            $this->flashMessenger->addErrorMessage('checkout.step.place_order.post_condition_not_met');
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return CheckoutTransfer
     */
    protected function getCheckoutTransfer(QuoteTransfer $quoteTransfer)
    {
        $checkoutTransfer = $quoteTransfer->getCheckout();
        if ($checkoutTransfer === null) {
            $checkoutTransfer = new CheckoutTransfer();
        }
        return $checkoutTransfer;
    }

}
