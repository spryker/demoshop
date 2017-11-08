<?php

namespace Pyz\Zed\Quote\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

interface ReaderInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function get(CustomerTransfer $customerTransfer);
}