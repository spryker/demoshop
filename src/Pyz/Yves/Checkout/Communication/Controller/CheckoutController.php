<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\Service\CheckoutClient;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

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
        $checkoutForm = $container->createCheckoutForm();

        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutTransfer->setGuest(true); // @TODO: only for Development

        $form = $this->createForm($checkoutForm, $checkoutTransfer);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $checkoutSdk = $this->getLocator()->checkout()->sdk();

                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();

                $checkoutRequest->setCart($this->demoCart());

                $response = $checkoutSdk->requestCheckout($form->getData());

                /** @var CheckoutResponseTransfer $checkoutResponseTransfer */
                $checkoutResponseTransfer = $response->getTransfer();

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

        return [
            'form' => $form->createView(),
            'cart' => $this->demoCart()
        ];
    }

    /**
     * @param CheckoutErrorTransfer[] $errors
     *
     * @return JsonResponse
     */
    protected function errors($errors)
    {
        $cart = $this->getDependencyContainer()->createCartClient()->getCart();
        $cartItems = $cart->getItems();
        $order = $cart->getOrder();

        if (!$order->getIdSalesOrder()) {
            return $this->redirectResponseInternal('home');
        }


        return new JsonResponse([
            'success' => false,
            'errors' => $returnErrors
        ]);
    }

    /**
     * @param CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return RedirectResponse
     */
    public function redirect(CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        if ($form->isValid()) {
            $checkoutClient = $this->getCheckoutClient($request);
            /** @var Order $orderTransfer */
            $orderTransfer = $form->getData();

            $transferResponse = $checkoutClient->saveOrder($orderTransfer);
            $order = $transferResponse->getTransfer();
            $cart = $this->getCart($request);
            $cart->setOrder($order);
            $this->addMessagesFromZedResponse($transferResponse);

            if ($transferResponse->isSuccess()) {
                return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS);
            } elseif ($transferResponse->hasErrorMessage(
                \SprykerFeature_Shared_Checkout_Code_Messages::ERROR_ORDER_IS_ALREADY_SAVED
            )
            ) {
                $cart->setOrder(new \Generated\Shared\Transfer\SalesOrderTransfer());

                return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
            }
        }
        return new RedirectResponse($checkoutResponseTransfer->getRedirectUrl());
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
     * @return CartTransfer
     */
    private function demoCart()
    {
        $cart = new CartTransfer();

        $item = new CartItemTransfer();
        $item->setId(1);
        $item->setGrossPrice(200);
        $item->setQuantity(3);
        $item->setSku('Batman');
        $item->setPriceToPay(1900);
        $item->setUniqueIdentifier(123);
        $cart->addItems($item);

        $item2 = new CartItemTransfer();
        $item2->setId(2);
        $item2->setGrossPrice(200);
        $item2->setQuantity(5);
        $item2->setSku('Brillenpinguin');
        $item2->setPriceToPay(2450);
        $item2->setUniqueIdentifier(123);
        $cart->addItems($item2);

        $item3 = new CartItemTransfer();
        $item3->setId(2);
        $item3->setGrossPrice(200);
        $item3->setQuantity(2);
        $item3->setSku('DRACHENRITTER BERSERKER');
        $item3->setPriceToPay(3250);
        $item3->setUniqueIdentifier(123);
        $cart->addItems($item3);

        return $cart;
    }

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    protected function handleRequest(Request $request)
    {
        $cart = $this->getCart($request);
        if ($cart->getItems()->count() < 1) {
            return $this->redirectResponseInternal('home');
        }

        $order = $cart->getOrder();
        $checkoutClient = $this->getCheckoutClient($request);
        $checkoutClient->clearReferences($order);
        $cart->setOrder($order);

        // This is really ugly, but i need this to have valid data for the payment control
        // This needs to be refactored after discussion...
        $all = $request->request->all();
        $billingAddress = new \Generated\Shared\Transfer\SalesAddressTransfer();
        if (isset($all['salesOrder']) && isset($all['salesOrder']['billingAddress'])) {
            $billingAddress->fromArray($all['salesOrder']['billingAddress'], true);
        }

        $shippingAddress = new \Generated\Shared\Transfer\SalesAddressTransfer();
        if (isset($all['salesOrder']) && isset($all['salesOrder']['shippingAddress'])) {
            $shippingAddress->fromArray($all['salesOrder']['shippingAddress'], true);
        }

        $orderBillingAddressArray = $order->getBillingAddress()->toArray();
        unset($orderBillingAddressArray['id_sales_order_address'], $orderBillingAddressArray['id_customer_address']);
        $billingAddressArray = $billingAddress->toArray();
        unset($billingAddressArray['id_sales_order_address'], $billingAddressArray['id_customer_address']);
        if ($order->getBillingAddress()->isEmpty() || $orderBillingAddressArray !== $billingAddressArray) {
            $order->setBillingAddress($billingAddress);
        }

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


        if (($parameters = $this->validateForm($request, $form)) !== null) {
            return $parameters;
        }
        $productData = $this->getCartClient()->getProductDataForCartItems($cart->getItems());

        return [
            'form' => $form->createView(),
            'cartItems' => $cart->getItems(),
            'totals' => $order->getTotals(),
            'products' => $productData,
            'userAddresses' => [],//$userAddresses,
            'userAddressesJson' => [],//$userAddressesJson,
        ];
    }

    /**
     * @return CheckoutClient
     */
    private function demoSuccessResponse()
    {
        $response = new CheckoutResponseTransfer();
    }

    /**
     * @return CartClientInterface
     */
    private function getCartClient()
    {
        return $this->getDependencyContainer()->createCartClient();
    }


}
