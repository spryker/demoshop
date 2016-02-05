<?php

namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CustomerFactory getFactory()
 * @method CustomerClient getClient()
 */
class CustomerStepHandler extends AbstractPlugin implements CheckoutStepHandlerPluginInterface
{

    /**
     * @var \Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface[]
     */
    protected $authenticationHandlerPlugins;

    /**
     * @param \Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface[] $authenticationHandlerPlugins
     */
    public function __construct(array $authenticationHandlerPlugins)
    {
        $this->authenticationHandlerPlugins = $authenticationHandlerPlugins;
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
