<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\CheckoutAndOrder;

use Pyz\Client\AlexaBot\AlexaBotConfig;
use Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Client\Product\ProductClientInterface;

class AlexaCheckoutAndOrder implements AlexaCheckoutAndOrderInterface
{
    /**
     * @var \Pyz\Client\AlexaBot\AlexaBotConfig
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
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    private $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    private $storageProductMapper;

    /**
     * @var \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator
     */
    private $orderHydrator;

    /**
     * @var \Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface
     */
    private $fileSession;

    /**
     * @param \Pyz\Client\AlexaBot\AlexaBotConfig $alexaBotConfig
     * @param \Spryker\Client\Checkout\CheckoutClientInterface $checkoutClient
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $storageProductMapper
     * @param \Pyz\Client\AlexaBot\Model\CheckoutAndOrder\OrderHydrator $orderHydrator
     * @param \Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface $fileSession
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

        if ($checkoutClient->getIsSuccess()) {
            $this->fileSession->delete($this->alexaBotConfig->getCartSessionName());
            return true;
        }

        return false;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function checkout()
    {
        $quoteTransfer = $this->getQuoteTransferFromSession();
        $quoteTransfer = $this->HydrateQuoteTransfer($quoteTransfer);
        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    private function placeOrder($quoteTransfer)
    {
        $checkoutClient = null; // TODO CheckoutAndOrder-3: call the placeOrder() method from the CheckoutClient.

        return $checkoutClient;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function getQuoteTransferFromSession()
    {
        return unserialize(
            $this->fileSession->read($this->alexaBotConfig->getCartSessionName())
        );
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    private function HydrateQuoteTransfer($quoteTransfer)
    {
        $quoteTransfer = null; // TODO CheckoutAndOrder-2: hydrate the quoteTransfer with customer, address, shipment, and payment data using the OrderHydrator.
        $quoteTransfer->setCheckoutConfirmed(true);

        return $quoteTransfer;
    }
}
