<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\CountryTransfer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\CartTransfer;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AjaxController extends AbstractController
{
    /**
     * @return CartTransfer
     */
    public function getCart()
    {
        return $this->getLocator()->cart()->client()->getCart();
    }

    /**
     * @return array
     */
    public function cartAction()
    {
        $cart = $this->getCart();

        $products = [];
        foreach ($this->getCart()->getItems() as $item) {
            if (empty($item->getName())) {
                $item->setName('Product ' . mt_rand(1, 99));
            }

            $sku = $item->getSku();
            $product = $this->locator->catalog()->client()->createCatalogModel()->getProductDataById($item->getIdAbstractProduct());

            $products[$sku] = [
                'url' => $product['abstract_attributes']['url'],
                'media' => $product['abstract_attributes']['media'],
            ];
        }

        return $this->viewResponse([
            'cart' => $cart,
            'products' => $products,
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addCouponAction(Request $request)
    {
        $couponCode = $request->get('couponCode');
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->addCoupon($couponCode);

        $products = [];
        foreach ($this->getCart()->getItems() as $item) {
            if (empty($item->getName())) {
                $item->setName('Product ' . mt_rand(1, 99));
            }

            $sku = $item->getSku();
            $product = $this->locator->catalog()->client()->createCatalogModel()->getProductDataById($item->getIdAbstractProduct());

            $products[$sku] = [
                'url' => $product['abstract_attributes']['url'],
                'media' => $product['abstract_attributes']['media'],
            ];
        }

        return $this->viewResponse([
            'cart' => $cartClient->getCart(),
            'products' => $products,
        ]);

        // @Todo: replace with this once coupon error messages are fixed by Spryker
        //return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_AJAX_CART);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function removeCouponAction(Request $request)
    {
        $couponCode = $request->get('couponCode');
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->removeCoupon($couponCode);

        return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_AJAX_CART);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function getShipmentFeeAction(Request $request)
    {
        $countryTransfer = new CountryTransfer();
        $countryTransfer->setIdCountry($request->get('fkCountry'));

        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->addExpenseByCountryId($countryTransfer);

        return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_AJAX_CART);
    }
}
