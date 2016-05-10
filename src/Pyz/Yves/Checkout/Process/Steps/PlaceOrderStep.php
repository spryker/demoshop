<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Yves\CheckoutStepEngine\Process\Steps\BaseStep;
use Spryker\Yves\CheckoutStepEngine\Process\Steps\StepWithExternalRedirectInterface;
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
        parent::__construct($stepRoute, $escapeRoute);

        $this->flashMessenger = $flashMessenger;
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
        return $quoteTransfer->getOrderReference() !== null;
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
