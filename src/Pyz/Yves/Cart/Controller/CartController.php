<?php

namespace Pyz\Yves\Cart\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Spryker\Client\Cart\CartClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Cart\CartClientInterface getClient()
 */
class CartController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction(Request $request)
    {
        $cartClient = $this->getClient();
        $quoteTransfer = $cartClient->getQuote();

        return $this->viewResponse([
            'cartItems' => $quoteTransfer->getItems(),
            'totals' => $quoteTransfer->getTotals(),
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction($sku, $quantity, $optionValueUsageIds = [])
    {
        $cartClient = $this->getClient();

        $itemTransfer = new ItemTransfer();

        $itemTransfer->setId($sku);
        $itemTransfer->setQuantity($quantity);

        foreach ($optionValueUsageIds as $idOptionValueUsage) {
            $productOptionTransfer = new ProductOptionTransfer();
            $productOptionTransfer->setIdOptionValueUsage($idOptionValueUsage)
                ->setLocaleCode($this->getLocale());
            $itemTransfer->addProductOption($productOptionTransfer);
        }

        $cartClient->addItem($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($sku, $groupKey = null)
    {
        $cartClient = $this->getClient();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setId($sku);
        $itemTransfer->setGroupKey($groupKey);

        $cartClient->removeItem($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function changeAction($sku, $quantity, $groupKey = null)
    {
        $cartClient = $this->getClient();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);
        $cartClient->changeItemQuantity($itemTransfer, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

}
