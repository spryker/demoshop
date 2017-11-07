<?php

namespace Pyz\Client\Quote;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Quote\QuoteClient as SprykerQuoteClient;

/**
 * @method \Pyz\Client\Quote\QuoteFactory getFactory()
 */
class QuoteClient extends SprykerQuoteClient
{

    /**
     * @param QuoteTransfer $quoteTransfer
     */
    public function setQuote(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createQuoteStub()->saveQuote($quoteTransfer);
        parent::setQuote($quoteTransfer);
    }

    /**
     * @param CustomerTransfer|null $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function getQuote(CustomerTransfer $customerTransfer = null)
    {
        $quoteTransfer = parent::getQuote();

        if ($customerTransfer == null) {
            if ($quoteTransfer->getCustomer() != null) {
                $quoteTransfer = $this->getFactory()->createQuoteStub()->getQuote($quoteTransfer->getCustomer());
            }
        } else {
            $quoteTransfer = $this->getFactory()->createQuoteStub()->getQuote($customerTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return mixed
     */
    public function getAvailableQuotesForPurchaser(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()->createQuoteStub()->getAvailableQuotesForPurchaser($customerTransfer);
    }

}