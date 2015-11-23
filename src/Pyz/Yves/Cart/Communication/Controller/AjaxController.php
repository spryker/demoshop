<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use Generated\Shared\Transfer\ItemConfigurationTransfer;
use Pyz\Yves\Tracking\Business\DataFormatter\CartDataFormatter;
use Pyz\Yves\Tracking\Business\Tracking;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\GlobalTemplateVariablesExtension;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Generated\Shared\Transfer\ItemTransfer;
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

            // TODO: provide item url in template
            //$product = $this->locator->catalog()->client()->createCatalogModel()->getProductDataById($item->getId());
        }

        $tracking = Tracking::getInstance();
        if (count($cart->getItems()) > 0) {
            $tracking->getCartDataContainer()
                ->setCartItems(CartDataFormatter::formatCartItems($cart->getItems()))
                ->setCoupons(CartDataFormatter::formatCoupons($cart->getCouponCodes()))
                ->setExpenses(CartDataFormatter::formatExpenses($cart->getExpenses()))
                ->setTotals(CartDataFormatter::formatTotals($cart->getTotals()))
            ;
        }

        return $this->viewResponse([
            'cart' => $cart,
            GlobalTemplateVariablesExtension::TWIG_TRACKING_CONTAINER => $tracking,
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return RedirectResponse
     */
    public function addAction($sku, $quantity, $ingredients = null)
    {
        $cartClient = $this->getLocator()->cart()->client();

        $itemTransfer = new ItemTransfer();

        $itemTransfer->setSku($sku);
        $itemTransfer->setQuantity($quantity);


        if (is_array($ingredients)) {
            $ingredientItems = [];

            foreach ($ingredients as $groupKey => $groupKeyValues) {
                $ingredientItem = new ItemConfigurationTransfer();

                $ingredientItem->setGroupKey($groupKey);
                $ingredientItem->setGroupValues($groupKeyValues);

                $ingredientItems[] = $ingredientItem;
            }

            $itemTransfer->setConfiguration(new \ArrayObject($ingredientItems));
        }


        $cartClient->addItem($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return RedirectResponse
     */
    public function removeAction($sku, $groupKey = null)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku)->setGroupKey($groupKey);

        $cartClient->removeItem($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return RedirectResponse
     */
    public function increaseAction($sku, $groupKey = null)
    {
        $cartClient = $this->getLocator()->cart()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $cartClient->increaseItemQuantity($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @param string $groupKey
     *
     * @return RedirectResponse
     */
    public function decreaseAction($sku, $groupKey = null)
    {
        $cartClient = $this->getLocator()->cart()->client();

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $cartClient->decreaseItemQuantity($itemTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @param int    $quantity
     * @param string $groupKey
     *
     * @return RedirectResponse
     */
    public function changeAction($sku, $quantity, $groupKey = null)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setGroupKey($groupKey);

        $cartClient->changeItemQuantity($itemTransfer, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

}
