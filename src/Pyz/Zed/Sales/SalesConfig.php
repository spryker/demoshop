<?php

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Sales\SalesConfig as SprykerSalesConfig;
use Generated\Shared\Transfer\ItemTransfer;

class SalesConfig extends SprykerSalesConfig
{

    /**
     * @var array
     */
    protected static $stateMachineMapper = [
        'payolution_invoice' => 'PayolutionPayment01',
        'payolution_installment' => 'PayolutionPayment01',
    ];

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param ItemTransfer $itemTransfer
     *
     * @return string
     */
    public function determineProcessForOrderItem(QuoteTransfer $quoteTransfer, ItemTransfer $itemTransfer)
    {
        return self::$stateMachineMapper[$quoteTransfer->getPayment()->getPaymentSelection()];
    }

}
