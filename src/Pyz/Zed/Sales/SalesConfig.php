<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Sales\SalesConfig as SprykerSalesConfig;

class SalesConfig extends SprykerSalesConfig
{

    /**
     * @var array
     */
    protected static $stateMachineMapper = [
        PaymentTransfer::PAYOLUTION_INVOICE => 'PayolutionPayment01',
        PaymentTransfer::PAYOLUTION_INSTALLMENT => 'PayolutionPayment01',
    ];

    /**
     * This method determines state machine process from the given quote transfer and order item.
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @throws \BadMethodCallException
     *
     * @return string
     */
    public function determineProcessForOrderItem(QuoteTransfer $quoteTransfer, ItemTransfer $itemTransfer)
    {
        if (!array_key_exists($quoteTransfer->getPayment()->getPaymentSelection(), self::$stateMachineMapper)) {
            return parent::determineProcessForOrderItem($quoteTransfer, $itemTransfer);
        }

        return self::$stateMachineMapper[$quoteTransfer->getPayment()->getPaymentSelection()];
    }

    /**
     * This method provides list of urls to render blocks inside order detail page.
     * URL defines path to external bundle controller. For example: /discount/sales/list would call discount bundle, sales controller, list action.
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
