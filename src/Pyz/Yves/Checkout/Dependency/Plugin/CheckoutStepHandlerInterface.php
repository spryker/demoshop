<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\QuoteTransfer;

interface CheckoutStepHandlerInterface
{

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer);

}
