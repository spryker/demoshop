<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Process\Steps\StepWithExternalRedirectInterface;
use Symfony\Component\HttpFoundation\Request;

class PlaceOrderStep extends BaseStep implements StepWithExternalRedirectInterface
{

    /**
     * @var \Spryker\Client\Checkout\CheckoutClientInterface
     */
    protected $checkoutClient;

    /**
     * @var string
     */
    protected $externalRedirectUrl;

    /**
     * @var \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CheckoutClientInterface $checkoutClient,
        CartClientInterface $cartClient,
        FlashMessengerInterface $flashMessenger,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->flashMessenger = $flashMessenger;
        $this->checkoutClient = $checkoutClient;
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return false;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $quoteTransfer = $this->getDataClass();

        $checkoutResponseTransfer = $this->checkoutClient->placeOrder($quoteTransfer);
        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $this->externalRedirectUrl = $checkoutResponseTransfer->getRedirectUrl();
        }
        if ($checkoutResponseTransfer->getSaveOrder() !== null) {
            $quoteTransfer->setOrderReference($checkoutResponseTransfer->getSaveOrder()->getOrderReference());
        }

        $this->setCheckoutErrorMessages($checkoutResponseTransfer);

        $this->setDataClass($quoteTransfer);
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        return ($this->getDataClass()->getOrderReference() !== null);
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

    /**
     * @return string
     */
    public function getExternalRedirectUrl()
    {
        return $this->externalRedirectUrl;
    }

}
