<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Cart\CartClientInterface;

class CartOperationHandler extends BaseHandler
{

    /**
     * @var \Spryker\Client\Cart\CartClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $locale
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     */
    public function __construct(CartClientInterface $cartClient, $locale, FlashMessengerInterface $flashMessenger)
    {
        parent::__construct($flashMessenger);
        $this->cartClient = $cartClient;
        $this->locale = $locale;
    }

    /**
     * @param string $sku
     * @param string $quantity
     * @param array $optionValueUsageIds
     *
     * @return void
     */
    public function add($sku, $quantity, $optionValueUsageIds = [])
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setQuantity($quantity);

        $this->addProductOptions($optionValueUsageIds, $itemTransfer);

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);
        $this->cartClient->storeQuote($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->cartClient);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return void
     */
    public function remove($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->removeItem($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->cartClient);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return void
     */
    public function increase($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->increaseItemQuantity($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->cartClient);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->decreaseItemQuantity($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->cartClient);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string $groupKey
     *
     * @return void
     */
    public function changeQuantity($sku, $quantity, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->changeItemQuantity($sku, $groupKey, $quantity);
        $this->cartClient->storeQuote($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->cartClient);
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
            $productOptionTransfer = new ProductOptionTransfer();
            $productOptionTransfer
                ->setIdOptionValueUsage($idOptionValueUsage)
                ->setLocaleCode($this->locale);

            $itemTransfer->addProductOption($productOptionTransfer);
        }
    }
}