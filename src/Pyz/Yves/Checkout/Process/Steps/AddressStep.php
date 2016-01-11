<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Shared\Kernel\Store;

class AddressStep extends BaseStep implements StepInterface
{
    /**
     * @var Store
     */
    private $storeConfiguration;

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
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer)
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
            // add message: billing address is not set
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
