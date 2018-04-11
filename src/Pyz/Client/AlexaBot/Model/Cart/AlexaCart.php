<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Cart;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\AlexaBot\AlexaBotConfig;
use Pyz\Client\AlexaBot\Model\FileSession\FileSessionInterface;
use Pyz\Client\AlexaBot\Model\Product\AlexaProductInterface;
use Spryker\Client\Cart\CartClientInterface;

class AlexaCart implements AlexaCartInterface
{
    /**
     * @var AlexaBotConfig
     */
    private $alexaBotConfig;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    private $cartClient;

    /**
     * @var AlexaProductInterface
     */
    private $alexaProduct;

    /**
     * @var FileSessionInterface
     */
    private $fileSession;

    /**
     * AlexaCart constructor.
     * @param AlexaBotConfig $alexaBotConfig
     * @param CartClientInterface $cartClient
     * @param AlexaProductInterface $alexaProduct
     * @param FileSessionInterface $fileSession
     */
    public function __construct(
        AlexaBotConfig $alexaBotConfig,
        CartClientInterface $cartClient,
        AlexaProductInterface $alexaProduct,
        FileSessionInterface $fileSession
    ) {
        $this->cartClient = $cartClient;
        $this->alexaProduct = $alexaProduct;
        $this->alexaBotConfig = $alexaBotConfig;
        $this->fileSession = $fileSession;
    }

    /**
     * @param string $variantName
     *
     * @return bool
     */
    public function addVariantToCart($variantName)
    {
        $quoteTransfer = $this->addToCart($variantName);

        $items = $quoteTransfer->getItems();
        if (!empty($items)) {
            $this->StoreCartIntoSession($quoteTransfer);
            return true;
        }

        return false;
    }

    /**
     * @param string $variantName
     *
     * @return QuoteTransfer
     */
    private function addToCart($variantName)
    {
        $variantSku = $this->getVariantSku($variantName);
        $itemTransfer = $this->HydrateItemTransfer($variantSku);
        $quoteTransfer = null; // TODO Cart-2: call the addItem() method in the CartClient.

        return $quoteTransfer;
    }

    /**
     * @param string $variantName
     *
     * @return string
     */
    private function getVariantSku($variantName)
    {
        $abstractProductId = $this
            ->fileSession
            ->read($this->alexaBotConfig->getProductSessionName());

        $variantSku = $this
            ->alexaProduct
            ->getVariantSkuByAbstractProductIdAndVariantName($abstractProductId, $variantName);

        return $variantSku;
    }

    /**
     * @param string $variantSku
     *
     * @return ItemTransfer
     */
    private function HydrateItemTransfer($variantSku)
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($variantSku);
        $itemTransfer->setQuantity(1);
        $itemTransfer->setIdDiscountPromotion(0);

        return $itemTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    private function StoreCartIntoSession($quoteTransfer)
    {
        $quoteSerialised = serialize($quoteTransfer);

        // TODO Cart-3: write the quote transfer to the file session to be used by the checkout and order action.
    }
}
