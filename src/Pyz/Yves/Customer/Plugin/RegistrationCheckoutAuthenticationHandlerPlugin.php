<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 */
class RegistrationCheckoutAuthenticationHandlerPlugin extends AbstractPlugin implements CheckoutAuthenticationHandlerPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToQuote(QuoteTransfer $quoteTransfer)
    {
        $customerResponseTransfer = $this->getFactory()
            ->getAuthenticationHandler()
            ->registerCustomer($quoteTransfer->getCustomer());

        $this->processErrorMessages($customerResponseTransfer);

        if ($customerResponseTransfer->getIsSuccess() === true) {
            $quoteTransfer->setCustomer($customerResponseTransfer->getCustomerTransfer());
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerResponseTransfer $customerResponseTransfer
     *
     * @return void
     */
    protected function processErrorMessages(CustomerResponseTransfer $customerResponseTransfer)
    {
        foreach ($customerResponseTransfer->getErrors() as $errorTransfer) {
            $this->getMessenger()->addErrorMessage($errorTransfer->getMessage());
        }
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getMessenger()
    {
        return $this->getFactory()->getMessenger();
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function canHandle(QuoteTransfer $quoteTransfer)
    {
        return ($quoteTransfer->getCustomer() !== null);
    }
}
