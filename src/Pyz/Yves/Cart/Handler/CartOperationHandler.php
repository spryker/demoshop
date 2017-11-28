<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;
use Symfony\Component\HttpFoundation\Request;

class CartOperationHandler extends BaseHandler implements CartOperationInterface
{
    const URL_PARAM_ID_DISCOUNT_PROMOTION = 'idDiscountPromotion';

    /**
     * @var \Spryker\Client\Cart\CartClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $locale
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function __construct(
        CartClientInterface $cartClient,
        $locale,
        FlashMessengerInterface $flashMessenger,
        Request $request
    ) {
        parent::__construct($flashMessenger);
        $this->cartClient = $cartClient;
        $this->locale = $locale;
        $this->request = $request;
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return void
     */
    public function add($sku, $quantity, $optionValueUsageIds = [])
    {
        $quantity = $this->adjustQuantity($quantity);

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setQuantity($quantity);
        $itemTransfer->setIdDiscountPromotion($this->getIdDiscountPromotion());

        $this->addProductOptions($optionValueUsageIds, $itemTransfer);

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer[] $itemTransfers
     *
     * @return void
     */
    public function addItems(array $itemTransfers)
    {
        $quoteTransfer = $this->cartClient->addItems($itemTransfers);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function remove($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->removeItem($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function increase($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->increaseItemQuantity($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->decreaseItemQuantity($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string|null $groupKey
     *
     * @return void
     */
    public function changeQuantity($sku, $quantity, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->changeItemQuantity($sku, $groupKey, $quantity);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param array $optionValueUsageIds
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return void
     */
    protected function addProductOptions(array $optionValueUsageIds, ItemTransfer $itemTransfer)
    {
        foreach ($optionValueUsageIds as $idOptionValueUsage) {
            if (!$idOptionValueUsage) {
                continue;
            }

            $productOptionTransfer = new ProductOptionTransfer();
            $productOptionTransfer->setIdProductOptionValue($idOptionValueUsage);

            $itemTransfer->addProductOption($productOptionTransfer);
        }
    }

    /**
     * @return int
     */
    protected function getIdDiscountPromotion()
    {
        return (int)$this->request->request->get(static::URL_PARAM_ID_DISCOUNT_PROMOTION);
    }

    /**
     * @param int $quantity
     *
     * @return int
     */
    protected function adjustQuantity($quantity)
    {
        if (!$quantity || $quantity <= 0) {
            $quantity = 1;
        }
        return $quantity;
    }
}
