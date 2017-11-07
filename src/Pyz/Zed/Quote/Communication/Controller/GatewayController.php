<?php

namespace Pyz\Zed\Quote\Communication\Controller;


use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuotesCollectionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Quote\Business\QuoteFacade getFacade()
 */
class GatewayController extends AbstractGatewayController
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function saveQuoteAction(QuoteTransfer $quoteTransfer)
    {
        return $this->getFacade()->save($quoteTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function getQuoteAction(CustomerTransfer $customerTransfer)
    {
        return $this->getFacade()->get($customerTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuotesCollectionTransfer
     */
    public function getAvailableQuotesForPurchaserAction(CustomerTransfer $customerTransfer)
    {
        return $this->getFacade()->getAvailableQuotesForPurchaser($customerTransfer);
    }
    
}