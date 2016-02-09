<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Kernel\AbstractClient;

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

        $this->cartClient->addItem($itemTransfer);
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
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setGroupKey($groupKey);

        $this->cartClient->removeItem($itemTransfer);
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
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $this->cartClient->increaseItemQuantity($itemTransfer);
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
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $this->cartClient->decreaseItemQuantity($itemTransfer);
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
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $this->cartClient->changeItemQuantity($itemTransfer, $quantity);
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
