<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method CustomerClient getClient()
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
