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
        $stateMachineMapper = array_merge(static::$stateMachineMapper, SprykerSalesConfig::$stateMachineMapper);
        if (array_key_exists($quoteTransfer->getPayment()->getPaymentSelection(), $stateMachineMapper) === true) {
            return $stateMachineMapper[$quoteTransfer->getPayment()->getPaymentSelection()];
        }
    }

}
