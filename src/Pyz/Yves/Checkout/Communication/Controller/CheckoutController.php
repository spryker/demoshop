<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use SprykerFeature\Client\Checkout\CheckoutClient;
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
        $response = $this->handleRequest($request);
        if ($response instanceof Response) {
            return $response;
        }

        return $response;
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function successAction(Request $request)
    {
        $cart = $this->getDependencyContainer()->createCartClient()->getCart();
        $cartItems = $cart->getItems();
        $order = $cart->getOrder();

        if (!$order->getIdSalesOrder()) {
            return $this->redirectResponseInternal('home');
        }

        $cart->clear();
        $productData = $this->getCartClient()->getProductDataForCartItems($cartItems);
        $cartModel = $this->getLocator()->cart()->pluginCartSession()->createCartSession($this->getTransferSession());
        $cartModel->clear();
        $cartItemCount = $this->getLocator()->cart()
            ->pluginCartSessionCount()
            ->createCartSessionCount($request->getSession())->getCount();

        return [
            'order' => $order,
            'cartItems' => $cartItems,
            'totals' => $order->getTotals(),
            'products' => $productData,
            'cartItemCount' => $cartItemCount,
        ];
    }

    }

    /**
     * @param Request $request
     * @param FormInterface $form
     * @return null|RedirectResponse
     */
    protected function validateForm(Request $request, FormInterface $form)
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

        return null;
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
    private function getCheckoutClient()
    {
        return $this->getDependencyContainer()->createCheckoutClient();
    }

    /**
     * @return CartClientInterface
     */
    private function getCartClient()
    {
        return $this->getDependencyContainer()->createCartClient();
    }

}
