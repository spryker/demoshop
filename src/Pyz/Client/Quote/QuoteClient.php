<?php

namespace Pyz\Client\Quote;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClient;
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
        $quoteTransfer =parent::getQuote();

        if ($customerTransfer == null) {
            $customerTransfer = (new CustomerClient())->getCustomer();
        }

        if ($customerTransfer == null) {
//            $quoteTransfer = new QuoteTransfer();
        } else {
            $quoteTransfer = $this->getFactory()->createQuoteStub()->getQuote($customerTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @return void
     */
    public function clearQuote()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setCustomer((new CustomerClient())->getCustomer());
        $this->getFactory()->createQuoteStub()->saveQuote($quoteTransfer);
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

    /**
     * @param QuoteTransfer $quoteTransfer
     */
    public function saveQuoteToPersistence(QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createQuoteStub()->saveQuote($quoteTransfer);
    }

}