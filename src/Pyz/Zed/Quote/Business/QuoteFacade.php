<?php

namespace Pyz\Zed\Quote\Business;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Quote\Business\QuoteBusinessFactory getFactory()
 */
class QuoteFacade extends AbstractFacade
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function save(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()
            ->createWriter()
            ->save($quoteTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function get(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()
            ->createReader()
            ->get($customerTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\QuotesCollectionTransfer
     */
    public function getAvailableQuotesForPurchaser(CustomerTransfer $customerTransfer)
    {
        return $this->getFactory()
            ->createReader()
            ->getAvailableQuotesForPurchaser($customerTransfer);
    }
    
}