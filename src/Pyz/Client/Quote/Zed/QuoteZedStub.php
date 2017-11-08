<?php

namespace Pyz\Client\Quote\Zed;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuotesCollectionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\ZedRequest\ZedRequestClient;

class QuoteZedStub
{

    /**
     * @var ZedRequestClient
     */
    private $zedRequestClient;

    /**
     * QuoteZedStub constructor.
     *
     * @param ZedRequestClient $zedRequestClient
     */
    public function __construct(ZedRequestClient $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function saveQuote(QuoteTransfer $quoteTransfer)
    {
        return $this->zedRequestClient->call('/quote/gateway/save-quote', $quoteTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface|QuoteTransfer
     */
    public function getQuote(CustomerTransfer $customerTransfer)
    {
        return $this->zedRequestClient->call('/quote/gateway/get-quote', $customerTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface|QuotesCollectionTransfer
     */
    public function getAvailableQuotesForPurchaser(CustomerTransfer $customerTransfer)
    {
        return $this->zedRequestClient->call('/quote/gateway/get-available-quotes-for-purchaser', $customerTransfer);
    }

}