<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;

class CartController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartItems = $cartClient->getCart()->getItems();

        return $this->viewResponse([
            'cartItems' => $cartItems,
            'totals' => $cartClient->getCart()->getTotals(),
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return RedirectResponse
     */
    public function addAction($sku, $quantity, $optionValueUsageIds = [])
    {
        $cartClient = $this->getLocator()->cart()->client();

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
     *
     * @return RedirectResponse
     */
    public function removeAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setId($sku);

        $cartClient->removeItem($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return RedirectResponse
     */
    public function changeAction($sku, $quantity)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setId($sku);
        $cartClient->changeItemQuantity($itemTransfer, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

}
