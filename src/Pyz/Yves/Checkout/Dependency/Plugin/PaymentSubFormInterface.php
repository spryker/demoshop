<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;

interface PaymentSubFormInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return mixed
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer);

}
