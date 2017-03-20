<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClient getClient()
 */
class CustomerStepHandler extends AbstractPlugin implements StepHandlerPluginInterface
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
     * Iterate through the authentication handler plugin stack and handle authentication with the first one which can
     * handle the request. The QuoteTransfer input parameter should contain the request. The handler plugin will update
     * the quote with the appropriate CustomerTransfer and return it, e.g. the output QuoteTransfer should contain
     * the response.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer|\Spryker\Shared\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToDataClass(Request $request, AbstractTransfer $quoteTransfer)
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
