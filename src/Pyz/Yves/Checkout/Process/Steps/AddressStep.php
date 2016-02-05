<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Spryker\Shared\Kernel\Store;
use Symfony\Component\HttpFoundation\Request;

class AddressStep extends BaseStep
{
    /**
     * @var Store
     */
    protected $storeConfiguration;

    /**
     * @param FlashMessengerInterface $flashMessenger
     * @param Store $storeConfiguration
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        FlashMessengerInterface $flashMessenger,
        Store $storeConfiguration,
        $stepRoute,
        $escapeRoute
    ) {
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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(QuoteTransfer $quoteTransfer)
    {
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
        // FIXME: maybe use isBillingAddressEmpty()?
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
