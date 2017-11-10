<?php

namespace Pyz\Client\Cart;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuotesCollectionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Cart\CartClient as SprykerCartClient;

/**
 * @method \Pyz\Client\Cart\CartFactory getFactory()
 */
class CartClient extends SprykerCartClient
{

    /**
     * @param CustomerTransfer|null $customerTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuote(CustomerTransfer $customerTransfer = null)
    {
        return $this->getQuoteClient()->getQuote($customerTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     */
    public function setQuote(QuoteTransfer $quoteTransfer)
    {
        return $this->getQuoteClient()->setQuote($quoteTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     */
    public function saveQuoteToPersistence(QuoteTransfer $quoteTransfer)
    {
        return $this->getQuoteClient()->saveQuoteToPersistence($quoteTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuotesCollectionTransfer
     */
    public function getAvailableQuotesForPurchaser(CustomerTransfer $customerTransfer)
    {
        return $this->getQuoteClient()->getAvailableQuotesForPurchaser($customerTransfer);
    }

    /**
     * @return \Pyz\Client\Quote\QuoteClient
     */
    protected function getQuoteClient()
    {
        return $this->getFactory()->getQuoteClient();
    }


}