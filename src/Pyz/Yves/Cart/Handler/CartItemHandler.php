<?php


namespace Pyz\Yves\Cart\Handler;


use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Product\ProductClientInterface;

class CartItemHandler implements CartItemHandlerInterface
{

    /**
     * @var CartOperationHandler
     */
    protected $cartOperationHandler;
    /**
     * @var CartClientInterface
     */
    protected $cartClient;
    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;
    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapper
     */
    protected $productMapper;

    /**
     * @param CartOperationHandler $cartOperationHandler
     * @param CartClientInterface $cartClient
     * @param ProductClientInterface $productClient
     * @param StorageProductMapper $productMapper
     */
    public function __construct(
        CartOperationHandler $cartOperationHandler,
        CartClientInterface $cartClient,
        ProductClientInterface $productClient,
        StorageProductMapper $productMapper
    ) {
        $this->cartOperationHandler = $cartOperationHandler;
        $this->cartClient = $cartClient;
        $this->productClient = $productClient;
        $this->productMapper = $productMapper;
    }

    /**
     * @param $sku
     * @param $selectedAttributes
     * @return StorageProductTransfer
     */
    public function getProductStorageTransfer($sku, $selectedAttributes)
    {
        //find out if we have a concrete product
        $quoteTransfer = $this->getQuoteTransfer();
        return $this->mapSelectedAttributesToStorageProduct($sku, $selectedAttributes, $quoteTransfer);
    }

    /**
     * @param string $message
     */
    public function addSuccessFlashMessage($message)
    {
        $this->cartOperationHandler->addSuccessFlashMessage($message);
    }

    /**
     * @param string $message
     */
    public function addInfoFlashMessage($message)
    {
        $this->cartOperationHandler->addInfoFlashMessage($message);
    }

    /**
     * @param string $currentItemSku
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param int $quantity
     * @param string $groupKey
     */
    public function replaceCartItem(
        $currentItemSku,
        StorageProductTransfer $storageProductTransfer,
        $quantity,
        $groupKey
    ) {

        $quoteTransfer = $this->getQuoteTransfer();
        $productOptions = $this->removeItemFromCart($currentItemSku, $quoteTransfer, $groupKey);

        $newItemSku = $storageProductTransfer->getSku();
        $this->cartOperationHandler->add($newItemSku, $quantity, array_keys($productOptions->getArrayCopy()));
    }

    /**
     * @param $selectedAttributes
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function mergeProductAttributesWithSelectedAttributes(
        $selectedAttributes,
        StorageProductTransfer $storageProductTransfer
    ) {
        $availableAttributes = [];

        foreach ($storageProductTransfer->getAvailableAttributes() as $key => $attributes) {
            $availableAttributes[$key] = array_map(function ($item) {
                return false;
            }, array_flip($attributes));
        }

        $selectedAttributes = $this->arrayRemoveEmpty($selectedAttributes);
        return array_merge($availableAttributes, (array)$selectedAttributes);

    }

    /**
     * @param string $sku
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapSelectedAttributesToStorageProduct($sku, array $selectedAttributes, $quoteTransfer)
    {
        $items = $quoteTransfer->getItems();

        foreach ($items as $item) {
            if ($item->getSku() === $sku) {
                return $this->getStorageProductForSelectedAttributes($selectedAttributes, $item);
            }
        }

        return new StorageProductTransfer();
    }

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\ItemTransfer $item
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function getStorageProductForSelectedAttributes(array $selectedAttributes, $item)
    {
        $productData = $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale(
            $item->getIdProductAbstract()
        );
        return $this->productMapper->mapStorageProduct($productData, $selectedAttributes);
    }

    /**
     * @return CartClientInterface
     */
    protected function getCartClient()
    {
        return $this->cartClient;
    }

    /**
     * @return QuoteTransfer
     */
    protected function getQuoteTransfer()
    {
        return $this->cartClient->getQuote();
    }


    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\ItemTransfer
     */
    public function findItemInCartBySku($sku, $quoteTransfer)
    {
        $items = $quoteTransfer->getItems();

        foreach ($items as $item) {
            if ($item->getSku() === $sku) {
                return $item;
            }
        }
    }

    /**
     * Removes empty nodes from array
     *
     * @param array $haystack
     * @return mixed
     */
    public function arrayRemoveEmpty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->arrayRemoveEmpty($haystack[$key]);
            }

            if (empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }

    /**
     * @param $sku
     * @param QuoteTransfer $quoteTransfer
     * @param $groupKey
     * @return \ArrayObject|\Generated\Shared\Transfer\ProductOptionTransfer[]
     */
    protected function removeItemFromCart($sku, QuoteTransfer $quoteTransfer, $groupKey)
    {
        $cartItem = $this->findItemInCartBySku($sku, $quoteTransfer);
        $productOptions = $cartItem->getProductOptions(); //we must not lose the options
        $this->cartOperationHandler->remove($sku, $groupKey);
        return $productOptions;  //removing the existing items
    }
}

