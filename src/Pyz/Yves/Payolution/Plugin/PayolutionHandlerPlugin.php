<?php

namespace Pyz\Yves\Payolution\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerInterface;
use Pyz\Yves\Payolution\PayolutionFactory;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method PayolutionFactory getFactory()
 */
class PayolutionHandlerPlugin extends AbstractPlugin implements CheckoutStepHandlerInterface
{

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createPayolutionHandler()->addPaymentToQuote($request, $quoteTransfer);
    }

}