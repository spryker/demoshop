<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\CheckoutTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Checkout\CheckoutClientInterface;

class PlaceOrderStep extends BaseStep implements StepInterface
{
    /**
     * @var CheckoutClientInterface
     */
    protected $checkoutClient;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CheckoutClientInterface $checkoutClient
     */
    public function __construct(
        $stepRoute,
        $escapeRoute,
        CheckoutClientInterface $checkoutClient
    ) {
        parent::__construct($stepRoute, $escapeRoute);
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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer)
    {
        $checkoutTransfer = $this->getCheckoutTranfer($quoteTransfer);

        //$checkoutResponseTransfer = $this->checkoutClient->requestCheckout($quoteTransfer);

        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->setIsExternalRedirect(false);
        $checkoutResponseTransfer->setRedirectUrl('http://www.google.lt');
        $checkoutResponseTransfer->setIsSuccess(true);

        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $this->externalRedirectUrl = $checkoutResponseTransfer->getRedirectUrl();
        }

        $checkoutTransfer->setOrderPlaced($checkoutResponseTransfer->getIsSuccess());

        $quoteTransfer->setCheckout($checkoutTransfer);

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
            $quoteTransfer->getPayment()->getPaymentId() === null ||
            ($quoteTransfer->getCheckout() && $quoteTransfer->getCheckout()->getOrderPlaced() === false)
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return CheckoutTransfer
     */
    protected function getCheckoutTranfer(QuoteTransfer $quoteTransfer)
    {
        $checkoutTransfer = $quoteTransfer->getCheckout();
        if ($checkoutTransfer === null) {
            $checkoutTransfer = new CheckoutTransfer();
        }
        return $checkoutTransfer;
    }
}
