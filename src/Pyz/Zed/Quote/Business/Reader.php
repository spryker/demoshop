<?php

namespace Pyz\Zed\Quote\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuotesCollectionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Zed\Quote\Persistence\QuoteQueryContainer;

class Reader implements ReaderInterface
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
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function get(CustomerTransfer $customerTransfer)
    {
        $quoteTransfer = new QuoteTransfer();
        $quote = $this->queryContainer->getQuote($customerTransfer->getIdCustomer())->findOne();

        if ($quote) {
            $quoteTransfer->fromArray(json_decode($quote->getQuoteTransfer(), true));
        }

        return $quoteTransfer;
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuotesCollectionTransfer
     */
    public function getAvailableQuotesForPurchaser(CustomerTransfer $customerTransfer)
    {
        $customer = $this->queryContainer->getCustomer($customerTransfer->getIdCustomer())->findOne();
        $group = $customer->getSpyCustomerGroupToCustomers();
        $groupId = $group->getFirst()->getFkCustomerGroup();

        $quotes = $this->queryContainer
            ->getAvailableQuotesForPurchaser($groupId, $customer->getIdCustomer())
            ->find();
        $quotesCollection = new QuotesCollectionTransfer();

        foreach ($quotes as $quote) {
            $quoteTransfer = new QuoteTransfer();
            $quoteTransfer->fromArray(json_decode($quote->getQuoteTransfer(), true));
            $quotesCollection->addQuotes($quoteTransfer);
        }

        return $quotesCollection;
    }

}