<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Cart\Communication\Helper\CartControllerTrait;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Sdk\Cart\CartSdk;
use SprykerFeature\Sdk\Checkout\CheckoutSdk;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends AbstractController
{

    use CartControllerTrait;

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
        $cart = $this->getCart($request);
        $cartItems = $cart->getItems();
        $order = $cart->getOrder();

        if (!$order->getIdSalesOrder()) {
            return $this->redirectResponseInternal('home');
        }

        $cart->clear();
        $productData = $this->getCartSdk()->getProductDataForCartItems($cartItems);
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
            'cartItemCount' => $cartItemCount
        ];
    }

    /**
     * @return mixed
     */
    protected function createOrderForm()
    {
        return $this->getLocator()->sales()->pluginOrderTypeForm()->createOrderTypeForm();
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

            $transferResponse = $checkoutSdk->saveOrder($orderTransfer);
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
        $checkoutSdk = $this->getCheckoutSdk($request);
        $checkoutSdk->clearReferences($order);
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

        $orderShippingAddressArray = $order->getShippingAddress()->toArray();
        unset($orderShippingAddressArray['id_sales_order_address'], $orderShippingAddressArray['id_customer_address']);
        $shippingAddressArray = $shippingAddress->toArray();
        unset($shippingAddressArray['id_sales_order_address'], $shippingAddressArray['id_customer_address']);
        if ($order->getShippingAddress()->isEmpty() || $orderShippingAddressArray !== $shippingAddressArray) {
            $order->setShippingAddress($shippingAddress);
        }

        if ($order->getShippingAddress()->isEmpty()) {
            $order->setShippingAddress($order->getBillingAddress());
        }

        if (is_null($order->getFirstName()) || $order->getBillingAddress()->getFirstName() !== $order->getFirstName()) {
            $order->setFirstName($order->getBillingAddress()->getFirstName());
        }
        if (is_null($order->getLastName()) || $order->getBillingAddress()->getLastName() !== $order->getLastName()) {
            $order->setLastName($order->getBillingAddress()->getLastName());
        }

        $form = $this->createForm($this->createOrderForm(), $order);

        if (($parameters = $this->validateForm($request, $form)) !== null) {
            return $parameters;
        }
        $productData = $this->getCartSdk()->getProductDataForCartItems($cart->getItems());

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
