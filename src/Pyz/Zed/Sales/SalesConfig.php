<?php

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Sales\SalesConfig as SprykerSalesConfig;
use Generated\Shared\Transfer\ItemTransfer;

class SalesConfig extends SprykerSalesConfig
{

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param ItemTransfer $itemTransfer
     *
     * @return string
     */
    public function determineProcessForOrderItem(QuoteTransfer $quoteTransfer, ItemTransfer $itemTransfer)
    {
        return 'Prepayment01';
    }

}
