<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;

class AjaxController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cart = $cartClient->getCart();
        foreach ($cart->getItems() as $item) {
            if (empty($item->getName())) {
                $item->setName('Product ' . mt_rand(1, 99));
            }
        }

        return $this->viewResponse([
            'cart' => $cart,
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

        $cartItemTransfer = new CartItemTransfer();

        $cartItemTransfer->setId($sku);
        $cartItemTransfer->setQuantity($quantity);

        foreach ($optionValueUsageIds as $idOptionValueUsage) {
            $productOptionTransfer = (new ProductOptionTransfer)
                ->setIdOptionValueUsage($idOptionValueUsage)
                ->setLocalCode($this->getLocale());
            $cartItemTransfer->addProductOption($productOptionTransfer);
        }

        $cartClient->addItem($cartItemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function removeAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartItemTransfer = new CartItemTransfer();
        $cartItemTransfer->setId($sku);

        $cartClient->removeItem($cartItemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function increaseAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartItemTransfer = new CartItemTransfer();
        $cartItemTransfer->setId($sku);

        $cartClient->increaseItemQuantity($cartItemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function decreaseAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartItemTransfer = new CartItemTransfer();
        $cartItemTransfer->setId($sku);

        $cartClient->decreaseItemQuantity($cartItemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

}
