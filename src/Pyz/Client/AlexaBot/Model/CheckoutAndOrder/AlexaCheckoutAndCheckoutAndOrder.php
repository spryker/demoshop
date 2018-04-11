<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\CheckoutAndOrder;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\AlexaBot\AlexaBotConfig;
use Pyz\Client\AlexaBot\Exception\CheckoutAndOrderException;
use Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Client\Product\ProductClientInterface;

class AlexaCheckoutAndCheckoutAndOrder  implements AlexaCheckoutAndOrderInterface
{
    /**
     * @var AlexaBotConfig
     */
    private $alexaBotConfig;

    /**
     * @var CheckoutClientInterface
     */

    private $checkoutClient;

    /**
     * @var CalculationClientInterface
     */

    private $calculationClient;

    /**
     * @var ProductClientInterface
     */
    private $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    private $storageProductMapper;

    /**
     * @var OrderHydrator
     */
    private $orderHydrator;

    /**
     * @var FileSessionInterface
     */
    private $fileSession;

    /**
     * @param AlexaBotConfig $alexaBotConfig
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param OrderHydrator $orderHydrator
     * @param FileSessionInterface $fileSession
     */
    public function __construct(
        AlexaBotConfig $alexaBotConfig,
        CheckoutClientInterface $checkoutClient,
        CalculationClientInterface $calculationClient,
        ProductClientInterface $productClient,
        StorageProductMapperInterface $storageProductMapper,
        OrderHydrator $orderHydrator,
        FileSessionInterface $fileSession
    ) {
        $this->checkoutClient = $checkoutClient;
        $this->calculationClient = $calculationClient;
        $this->productClient = $productClient;
        $this->storageProductMapper = $storageProductMapper;
        $this->alexaBotConfig = $alexaBotConfig;
        $this->fileSession = $fileSession;
        $this->orderHydrator = $orderHydrator;
    }

    /**
     * @return bool
     */
    public function checkoutAndPlaceOrder()
    {
        $quoteTransfer = $this->checkout();
        $checkoutClient = $this->placeOrder($quoteTransfer);

        return $checkoutClient->getIsSuccess();
    }

    /**
     * @return QuoteTransfer
     */
    private function checkout()
    {
        $quoteTransfer = $this->getQuoteTransferFromSession();
        $quoteTransfer = $this->HydrateQuoteTransfer($quoteTransfer);
        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        return $quoteTransfer;
    }

    /**
     * @return QuoteTransfer
     */
    private function getQuoteTransferFromSession()
    {
        return unserialize(
            $this->fileSession->read($this->alexaBotConfig->getCartSessionName())
        );
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    private function HydrateQuoteTransfer($quoteTransfer)
    {
        $quoteTransfer = $this->orderHydrator->hydrateCustomer($quoteTransfer);
        $quoteTransfer = $this->orderHydrator->hydrateAddress($quoteTransfer);
        $quoteTransfer = $this->orderHydrator->hydrateShipment($quoteTransfer);
        $quoteTransfer = $this->orderHydrator->hydratePayment($quoteTransfer);
        $quoteTransfer->setCheckoutConfirmed(true);

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return CheckoutResponseTransfer
     */
    private function placeOrder($quoteTransfer)
    {
        $checkoutClient = $this->checkoutClient->placeOrder($quoteTransfer);

        return $checkoutClient;
    }
}
