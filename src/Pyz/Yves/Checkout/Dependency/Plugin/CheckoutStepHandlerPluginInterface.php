<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutStepHandlerPluginInterface
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer);

}
