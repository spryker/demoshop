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
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Client\Offer\OfferClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Symfony\Component\HttpFoundation\Request;

class PlaceOfferStep extends PlaceOrderStep
{
    /**
     * @var \Spryker\Client\Offer\OfferClientInterface
     */
    protected $offerClient;

    /**
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     * @param \Spryker\Client\Offer\OfferClientInterface $offerClient
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param array $errorCodeToRouteMatching
     */
    public function __construct(
        CheckoutClientInterface $checkoutClient,
        FlashMessengerInterface $flashMessenger,
        OfferClientInterface $offerClient,
        string $stepRoute,
        string $escapeRoute,
        array $errorCodeToRouteMatching = []
    ) {
        parent::__construct($checkoutClient, $flashMessenger, $stepRoute, $escapeRoute, $errorCodeToRouteMatching);

        $this->offerClient = $offerClient;
    }

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
        $offerTransfer = new OfferTransfer();
        $offerTransfer->setQuote($quoteTransfer);

        $offerResponse = $this->offerClient->createOffer($offerTransfer);

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
     * @param \Generated\Shared\Transfer\OfferResponseTransfer $offerResponseTransfer
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
     * @param \Generated\Shared\Transfer\OfferResponseTransfer $offerResponseTransfer
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
