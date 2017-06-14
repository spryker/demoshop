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
     * @param array|null $itemAttributes
     *
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

        $itemAttributesBySku = $this->getFactory()->createCartItemsAttributeMapper()->buildMap($quoteTransfer->getItems());

        $itemAttributesBySku = $this->narrowDownOptions($itemAttributes, $itemAttributesBySku);

        return $this->viewResponse([
            'cart' => $quoteTransfer,
            'cartItems' => $cartItems,
            'attributes' => $itemAttributesBySku,
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
     * @param array $optionValueIds
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateAction($sku, $quantity, $selectedAttributes, $groupKey = null, $optionValueIds = [])
    {
        $cartItemHandler = $this->getFactory()->createCartItemHandler();

        //here we do narrowing down
        $storageProductTransfer = $cartItemHandler->getProductStorageTransfer($sku, $selectedAttributes);

        if ($storageProductTransfer->getIsVariant() === true) {

            $cartItemHandler->replaceCartItem($sku, $storageProductTransfer, $quantity, $groupKey, $optionValueIds);
            $cartItemHandler->addSuccessFlashMessage('Cart item updated');
            return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
        }

        return $this->redirectResponseInternal(
            CartControllerProvider::ROUTE_CART,
            [
                'availableAttributes' => [$sku => $cartItemHandler->arrayRemoveEmpty($selectedAttributes)],
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

    /**
     * @param array $itemAttributes
     * @param array $itemAttributesBySku
     *
     * @return mixed
     */
    protected function narrowDownOptions($itemAttributes, $itemAttributesBySku)
    {
        if ($itemAttributes) {
            foreach ($itemAttributes as $sku => $attributes) {
                foreach ($attributes as $key => $attribute) {
                    unset($itemAttributesBySku[$sku][$key]);
                    $itemAttributesBySku[$sku][$key][$attribute]['selected'] = true;
                    $itemAttributesBySku[$sku][$key][$attribute]['available'] = true;
                }
                $cartItemHandler = $this->getFactory()->createCartItemHandler();
                $storageProductTransfer = $cartItemHandler->getProductStorageTransfer($sku, $itemAttributes[$sku]);
                $shit1 = $storageProductTransfer->getAvailableAttributes();
                continue;
            }

            foreach ($itemAttributesBySku[$sku] as $key => $attributes) {
                foreach ($attributes as $attribute => $options) {
                    if (array_key_exists($key, $shit1)) {
                        if (in_array($attribute, $shit1[$key]) === false) {
                            unset($itemAttributesBySku[$sku][$key][$attribute]);
                        }
                    }
                }
            }
        }
        return $itemAttributesBySku;
    }

}
