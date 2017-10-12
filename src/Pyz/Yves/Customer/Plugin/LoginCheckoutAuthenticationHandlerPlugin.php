<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Client\Customer\CustomerClient getClient()
 */
class LoginCheckoutAuthenticationHandlerPlugin extends AbstractPlugin implements CheckoutAuthenticationHandlerPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToQuote(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->setCustomer($this->getClient()->getCustomer());

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function canHandle(QuoteTransfer $quoteTransfer)
    {
        return ($this->getClient()->getCustomer() !== null);
    }
}
