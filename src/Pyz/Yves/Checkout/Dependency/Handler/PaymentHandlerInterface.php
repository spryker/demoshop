<?php

namespace Pyz\Yves\Checkout\Dependency\Handler;

use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\QuoteTransfer;

interface PaymentHandlerInterface
{

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addPaymentToQuote(Request $request, QuoteTransfer $quoteTransfer);

}
