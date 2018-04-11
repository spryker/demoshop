<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\Cart;

use Generated\Shared\Transfer\ItemTransfer;
use Pyz\Client\AlexaBot\Model\Product\AlexaProductInterface;
use Spryker\Client\Cart\CartClientInterface;

class AlexaCart implements AlexaCartInterface
{
    const CART_SESSION_NAME = 'alexa-cart.session';

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    private $cartClient;

    /**
     * @var AlexaProductInterface
     */
    private $alexaProduct;

    /**
     * @param CartClientInterface $cartClient
     * @param AlexaProductInterface $alexaProduct
     */
    public function __construct(
        CartClientInterface $cartClient,
        AlexaProductInterface $alexaProduct
    ) {
        $this->cartClient = $cartClient;
        $this->alexaProduct = $alexaProduct;
    }

    /**
     * @param string $variantName
     *
     * @return bool
     */
    public function addVariantToCart($variantName)
    {
        $abstractId = $this
            ->alexaProduct
            ->getAbstractIdBySession();

        $concreteSku = $this->alexaProduct
            ->getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName);

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($concreteSku);
        $itemTransfer->setQuantity(1);
        $itemTransfer->setIdDiscountPromotion(0);

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);

        $quoteSerialised = serialize($quoteTransfer);
        $filePath = getcwd() . DIRECTORY_SEPARATOR . self::CART_SESSION_NAME;
        $fp = fopen($filePath, "w");
        fwrite($fp, $quoteSerialised);
        fclose($fp);

        $itemsArray = $quoteTransfer->getItems();
        if (isset($itemsArray[0]) && $itemsArray[0]->getSku() === $concreteSku) {
            return true;
        }

        return false;
    }
}
