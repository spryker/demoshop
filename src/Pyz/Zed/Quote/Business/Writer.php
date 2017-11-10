<?php

namespace Pyz\Zed\Quote\Business;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Orm\Zed\Product\Persistence\PyzQuote;
use Pyz\Zed\Quote\Persistence\QuoteQueryContainer;
use Spryker\Zed\Currency\Business\CurrencyFacade;

class Writer implements WriterInterface
{

    /**
     * @var QuoteQueryContainer
     */
    private $queryContainer;

    /**
     * Writer constructor.
     *
     * @param QuoteQueryContainer $queryContainer
     */
    public function __construct(QuoteQueryContainer $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function save(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getCustomer() == null) {
            return $quoteTransfer;
        }

        $quoteTransfer->setCurrency((new CurrencyFacade())->getCurrent());

        if ($quoteTransfer->getShipment() == null) {
            $shipmentTransfer = new ShipmentTransfer();
            $quoteTransfer->setShipment($shipmentTransfer);
        }

        if ($quoteTransfer->getPayment() == null) {
            $paymentTransfer = new PaymentTransfer();
            $quoteTransfer->setPayment($paymentTransfer);
        }

        $customer = $quoteTransfer->getCustomer();
        $quoteTransferString = json_encode($quoteTransfer->toArray(true));

        $quote = $this->queryContainer->getQuote($customer->getIdCustomer())->findOne();

        if (!$quote) {
            $quote = new PyzQuote();
            $quote->setFkCustomer($customer->getIdCustomer());
        }

        $quote->setQuoteTransfer($quoteTransferString);
        $quote->save();

        return $quoteTransfer;
    }

}