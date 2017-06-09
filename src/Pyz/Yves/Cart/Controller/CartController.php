<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Controller;

use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Spryker\Yves\Kernel\Controller\AbstractController;

/**
 * @method \Spryker\Client\Cart\CartClientInterface getClient()
 * @method \Pyz\Yves\Cart\CartFactory getFactory()
 */
class CartController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction($itemAttributes = null)
    {
        $quoteTransfer = $this->getClient()
            ->getQuote();

        $voucherForm = $this->getFactory()
            ->createVoucherForm();

        $cartItems = $this->getFactory()
            ->createProductBundleGrouper()
            ->getGroupedBundleItems($quoteTransfer->getItems(), $quoteTransfer->getBundleItems());

        $stepBreadcrumbsTransfer = $this->getFactory()
            ->getCheckoutBreadcrumbPlugin()
            ->generateStepBreadcrumbs($quoteTransfer);

        //remove selected attributes for sku that was changes

        $availableAttributesForAllItemsBySku = $this->getFactory()->createCartItemsAttributeMapper()->buildMap($quoteTransfer->getItems());

        if ($itemAttributes) {
            unset($availableAttributesForAllItemsBySku[key($itemAttributes)]);
            $availableAttributesForAllItemsBySku = array_merge_recursive($itemAttributes, $availableAttributesForAllItemsBySku);
        }

        return $this->viewResponse([
            'cart' => $quoteTransfer,
            'cartItems' => $cartItems,
            'attributes' => $availableAttributesForAllItemsBySku,
            'voucherForm' => $voucherForm->createView(),
            'stepBreadcrumbs' => $stepBreadcrumbsTransfer,
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
     * @param string $sku
     * @param int $quantity
     * @param array $selectedAttributes
     * @param string|null $groupKey
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($sku, $quantity, $selectedAttributes, $groupKey = null)
    {

        $quoteTransfer = $this->getClient()->getQuote();
        $cartOperationHandler = $this->getCartOperationHandler();

        //find out if we have a concrete product
        $storageProductTransfer = $cartOperationHandler->mapSelectedAttributesToStorageProduct($sku, $selectedAttributes, $quoteTransfer);

        if ($storageProductTransfer->getIsVariant() === true) {

            $cartItem = $cartOperationHandler->findItemInCartBySku($sku, $quoteTransfer);
            $productOptions = $cartItem->getProductOptions(); //we must not lose the options
            $cartOperationHandler->remove($sku, $groupKey);  //removing the existing items

            $sku = $storageProductTransfer->getSku();
            $cartOperationHandler->add($sku, $quantity, array_keys($productOptions->getArrayCopy()));
            $cartOperationHandler->setSuccessMessage('Cart item updated');
            return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);

        }

        $cartOperationHandler->changeQuantity($sku, $quantity, $groupKey);
        $cartOperationHandler->setFlashMessagesFromLastZedRequest($this->getClient());

        $mergedAttributes = [];

        foreach ($storageProductTransfer->getAvailableAttributes() as $key => $attributes) {
            $mergedAttributes[$key] = array_map(function ($item) { return false; }, array_flip($attributes));
        }

        $selectedAttributes = $this->array_remove_empty($selectedAttributes);

        $shit = array_merge($mergedAttributes, (array)$selectedAttributes);

        $cartOperationHandler->addInfoMessage('Please continue narrowing down variants');

        return $this->redirectResponseInternal(
            CartControllerProvider::ROUTE_CART,
            [
                'availableAttributes' => [$sku => ['attributes' => $shit]]
            ]
        );
    }

    /**
     * @return \Pyz\Yves\Cart\Handler\ProductBundleCartOperationHandler
     */
    protected function getCartOperationHandler()
    {
        return $this->getFactory()->createProductBundleCartOperationHandler();
    }

    protected function array_remove_empty($haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->array_remove_empty($haystack[$key]);
            }

            if (empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }

}
