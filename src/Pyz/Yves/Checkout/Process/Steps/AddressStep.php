<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\CheckoutFactory;
use Spryker\Shared\Kernel\Store;
use Symfony\Component\HttpFoundation\Request;

class AddressStep extends BaseStep implements StepInterface
{
    /**
     * @var Store
     */
    protected $storeConfiguration;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param Store $storeConfiguration
     */
    public function __construct(FlashMessengerInterface $flashMessenger, $stepRoute, $escapeRoute, Store $storeConfiguration)
    {
        parent::__construct($flashMessenger, $stepRoute, $escapeRoute);
        $this->storeConfiguration = $storeConfiguration;
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
        return true;
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
        $quoteTransfer->getShippingAddress()->setIso2Code($this->storeConfiguration->getCurrentCountry());

        if ($this->isBillingAddressEmpty($quoteTransfer))  {
            $quoteTransfer->setBillingAddress($quoteTransfer->getShippingAddress());
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
        if (empty($quoteTransfer->getBillingAddress())) {
            $this->flashMessenger->addErrorMessage('checkout.step.address.address_missing');
            return false;
        }

        return true;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isBillingAddressEmpty(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null) {
            return true;
        }

        if (empty($quoteTransfer->getBillingAddress()->getAddress1()) ||
            empty($quoteTransfer->getBillingAddress()->getFirstName()) ||
            empty($quoteTransfer->getBillingAddress()->getLastName())
        ) {
            return true;
        }

        return false;
    }
}
