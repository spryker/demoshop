<?php

namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClient getClient()
 */
class CustomerStepHandler extends AbstractPlugin implements CheckoutStepHandlerPluginInterface
{

    /**
     * @var \Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface[]
     */
    protected $authenticationHandlerPlugins;

    public function __construct()
    {
        $this->authenticationHandlerPlugins = $this
            ->getFactory()
            ->createCustomerAuthenticationHandlerPlugins();
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        foreach ($this->authenticationHandlerPlugins as $authHandlerPlugin) {
            if ($authHandlerPlugin->canHandle($quoteTransfer)) {
                $quoteTransfer = $authHandlerPlugin->addToQuote($quoteTransfer);
                break;
            }
        }

        return $quoteTransfer;
    }

}
