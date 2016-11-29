<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Controller;

use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Spryker\Client\Cart\CartClientInterface getClient()
 * @method \Pyz\Yves\Cart\CartFactory getFactory()
 */
class CartController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $quoteTransfer = $this->getClient()->getQuote();

        $groupedBundleQuantity = [];
        foreach ($quoteTransfer->getBundleProducts() as $bundleProductTransfer) {
            if (!isset($groupedBundleQuantity[$bundleProductTransfer->getSku()])) {
                $groupedBundleQuantity[$bundleProductTransfer->getSku()] = $bundleProductTransfer->getQuantity();
            } else {
                $groupedBundleQuantity[$bundleProductTransfer->getSku()] += $bundleProductTransfer->getQuantity();
            }
        }

        $singleItems = [];
        $bundleItems = [];
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            if (!$itemTransfer->getRelatedBundleItemIdentifier()) {
                $singleItems[] = $itemTransfer;
            }

            foreach ($quoteTransfer->getBundleProducts() as $bundleItemTransfer) {
                if ($bundleItemTransfer->getBundleItemIdentifier() !== $itemTransfer->getRelatedBundleItemIdentifier()) {
                    continue;
                }

                if (!isset($bundleItems[$bundleItemTransfer->getSku()])) {
                    $bundleProduct = clone $bundleItemTransfer;
                    $bundleProduct->setQuantity($groupedBundleQuantity[$bundleProduct->getSku()]);

                    $bundleItems[$bundleProduct->getSku()] = [
                        'bundleProduct' => $bundleProduct,
                        'bundleItems' => [],
                    ];
                }

                $currentBundle = $bundleItems[$bundleItemTransfer->getSku()];
                if ($currentBundle['bundleProduct']->getBundleItemIdentifier() !== $itemTransfer->getRelatedBundleItemIdentifier()) {
                    continue;
                }

                $currentBundleIdentifer = $itemTransfer->getSku() . $itemTransfer->getRelatedBundleItemIdentifier();
                if (!isset($currentBundle['bundleItems'][$currentBundleIdentifer])) {
                    $currentBundle['bundleItems'][$currentBundleIdentifer] = clone $itemTransfer;
                } else {
                    $currentBundleItem = $currentBundle['bundleItems'][$currentBundleIdentifer];
                    $currentBundleItem->setQuantity($currentBundleItem->getQuantity() + $itemTransfer->getQuantity());
                }

                $bundleItems[$bundleItemTransfer->getSku()] = $currentBundle;

            }

        }

        $cartItems = array_merge($singleItems, $bundleItems);

        $voucherForm = $this->getFactory()->createVoucherForm();

        return $this->viewResponse([
            'cart' => $quoteTransfer,
            'cartItems' => $cartItems,
            'voucherForm' => $voucherForm->createView(),
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueIds
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction($sku, $quantity, $optionValueIds = [])
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->add($sku, $quantity, $optionValueIds);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction($sku, $groupKey = null)
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->remove($sku, $groupKey);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string|null $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function changeAction($sku, $quantity, $groupKey = null)
    {
        $cartOperationHandler = $this->getCartOperationHandler();
        $cartOperationHandler->changeQuantity($sku, $quantity, $groupKey);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\CartOperationHandler
     */
    protected function getCartOperationHandler()
    {
        return $this->getFactory()->createCartOperationHandler();
    }

}
