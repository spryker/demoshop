<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\CartItemsTransfer;
use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Transfer\CheckoutTransfer;
use Generated\Shared\Transfer\OrderItemsTransfer;
use Generated\Shared\Transfer\OrderItemTransfer;
use Generated\Shared\Transfer\TaxItemTransfer;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Sdk\Cart\CartSdk;
use SprykerFeature\Sdk\Checkout\CheckoutSdk;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method CheckoutDependencyContainer getDependencyContainer()
 */
class CheckoutController extends AbstractController
{

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $container = $this->getDependencyContainer();
        $orderForm = $container->createFormOrder();
        $form = $this->createForm($orderForm);

        if ($form->isValid()) {
            $addressTransfer = new \Generated\Shared\Transfer\CustomerAddressTransfer();
            $addressTransfer->fromArray($form->getData());
            $addressTransfer->setEmail($this->getUsername());
            $addressTransfer = $this->getLocator()->customer()->sdk()->newAddress($addressTransfer);
            if ($addressTransfer) {
                $this->addMessageSuccess(Messages::CUSTOMER_ADDRESS_ADDED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
            $this->addMessageError(Messages::CUSTOMER_ADDRESS_NOT_ADDED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEW_ADDRESS);
        }


        return ['form' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function successAction(Request $request)
    {

    }

    /**
     * @param Request $request
     * @param FormInterface $form
     * @return null|RedirectResponse
     */
    protected function validateForm(Request $request, FormInterface $form)
    {
        if ($form->isValid()) {
            $checkoutSdk = $this->getCheckoutSdk($request);
            /** @var Order $orderTransfer */
            $orderTransfer = $form->getData();
        }

        return null;
    }

    private function demoCheckoutTransfer()
    {
        $checkoutData = new CheckoutTransfer();
        $checkoutData->setCart($this->demoCart());
        $checkoutData->setBillingAddress('Julie-Wolfthorn-Straße 1, 10115 Berlin');
        $checkoutData->setEmail('konstantin.scheumann@spryker.com');
        $checkoutData->setPaymentMethod('paypal');
        $checkoutData->setUserId(null);

        return $checkoutData;
    }

    /**
     * @return CartItemsTransfer
     */
    private function demoCart()
    {
        $cart = new CartItemsTransfer();

        $item = new CartItemTransfer();
        $item->setId(1);
        $item->setGrossPrice(200);
        $item->setQuantity(1);
        $item->setSku(13424234235);
        $item->setPriceToPay(190);
        $item->setUniqueIdentifier(123);
        $cart->addCartItem($item);

        return $cart;
    }

    /**
     * @return CheckoutSdk
     */
    protected function getCheckoutSdk()
    {
        return $this->getLocator()->checkout()->sdk();
    }

    /**
     * @return CartSdk
     */
    protected function getCartSdk()
    {
        return $this->getLocator()->cart()->sdk();
    }

}
