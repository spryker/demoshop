<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Yves\Wishlist\Communication\Controller;

use Generated\Shared\Transfer\ItemTransfer;
use Pyz\Yves\Wishlist\Communication\Plugin\WishlistControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;


class WishlistController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        return [
          'customerWishlist' => $wishlistClient->getCustomerWishlist()
        ];
    }

    /**
     * @param string $sku
     * @param int    $quantity
     *
     * @return RedirectResponse
     */
    public function addAction($sku, $quantity = 1)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setQuantity($quantity);

        $wishlistClient->addItem($itemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function removeAction($sku)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setQuantity(-1);

        $wishlistClient->removeItem($itemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST);
    }

    /**
     * @param     $sku
     * @param int $quantity
     *
     * @return RedirectResponse
     */
    public function increaseAction($sku, $quantity = 1)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setQuantity($quantity);

        $wishlistClient->increaseItemQuantity($itemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST);
    }

    /**
     * @param     $sku
     * @param int $quantity
     *
     * @return RedirectResponse
     */
    public function reduceAction($sku, $quantity = 1)
    {
        $wishlistClient = $this->getLocator()->wishlist()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setQuantity($quantity);

        $wishlistClient->decreaseItemQuantity($itemTransfer);

        return $this->redirectResponseInternal(WishlistControllerProvider::ROUTE_WISHLIST);
    }
}
