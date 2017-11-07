<?php

namespace Pyz\Zed\Quote\Business;

use Generated\Shared\Transfer\QuoteTransfer;

interface WriterInterface
{
    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function save(QuoteTransfer $quoteTransfer);
}