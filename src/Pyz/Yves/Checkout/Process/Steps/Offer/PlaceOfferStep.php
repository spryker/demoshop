<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps\Offer;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OfferResponseTransfer;
use Generated\Shared\Transfer\OfferTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep;
use Spryker\Client\Offer\OfferClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Shared\Offer\OfferConfig;
use Spryker\Yves\Kernel\Locator;
use Symfony\Component\HttpFoundation\Request;

class PlaceOfferStep extends PlaceOrderStep
{
    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer): bool
    {
        if (!$quoteTransfer->getCheckoutConfirmed()) {
            return false;
        }

        if ($this->checkoutResponseTransfer && !$this->checkoutResponseTransfer->getIsSuccess()) {
            $this->setPostConditionErrorRoute($this->checkoutResponseTransfer);

            return false;
        }

        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer): AbstractTransfer
    {
        $quoteTransfer->setType(OfferConfig::ORDER_TYPE_OFFER);

        /** @var OfferClientInterface $offerClient */
        //todo: go through DP
        $offerClient = Locator::getInstance()->offer()->client();

        $offerTransfer = new OfferTransfer();
        $offerTransfer->setQuote($quoteTransfer);

        $offerResponse = $offerClient->placeOffer($offerTransfer);

        if ($offerResponse->getIsSuccessful()) {
            $this->setOfferInfoMessages($offerResponse);
        } else {
            $this->setOfferErrorMessages($offerResponse);
        }

        $this->checkoutResponseTransfer = (new CheckoutResponseTransfer())
            ->setIsSuccess($offerResponse->getIsSuccessful());

        return $quoteTransfer;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $dataTransfer
     *
     * @return bool
     */
    public function preCondition(AbstractTransfer $dataTransfer): bool
    {
        if ($this->isCartEmpty($dataTransfer)) {
            return false;
        }

        if (!$dataTransfer->getCheckoutConfirmed()) {
            $this->escapeRoute = CheckoutControllerProvider::CHECKOUT_SUMMARY;
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCartEmpty(QuoteTransfer $quoteTransfer): bool
    {
        return count($quoteTransfer->getItems()) === 0;
    }

    /**
     * @param OfferResponseTransfer $offerResponseTransfer
     *
     * @return void
     */
    protected function setOfferErrorMessages(OfferResponseTransfer $offerResponseTransfer): void
    {
        foreach ($offerResponseTransfer->getMessages() as $responseMessageTransfer) {
            $this->flashMessenger->addErrorMessage($responseMessageTransfer->getMessage());
        }
    }

    /**
     * @param OfferResponseTransfer $offerResponseTransfer
     *
     * @return void
     */
    protected function setOfferInfoMessages(OfferResponseTransfer $offerResponseTransfer): void
    {
        foreach ($offerResponseTransfer->getMessages() as $responseMessageTransfer) {
            $this->flashMessenger->addInfoMessage($responseMessageTransfer->getMessage());
        }
    }
}
