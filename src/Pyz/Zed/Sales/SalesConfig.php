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
     * This method determines state machine process from the given quote transfer and order item.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
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

    /**
     * This method provides list of urls to render blocks inside order detail page.
     * Url defines path to external bundle controller.  For example: /discount/sales/list would call discount bundle, sales controller, list action.
     * Action should return return array or redirect response.
     *
     * example:
     * [
     *    'discount' => '/discount/sales/index',
     * ]
     *
     * @return array
     */
    public function getSalesDetailExternalBlocksUrls()
    {
        $projectExternalBlocks = [
            'totals' => '/sales-aggregator/sales/list',
            'shipment' => '/shipment/sales/list',
            'discount' => '/discount/sales/list',
        ];

        $externalBlocks = parent::getSalesDetailExternalBlocksUrls();

        return array_merge($externalBlocks, $projectExternalBlocks);
    }

}
