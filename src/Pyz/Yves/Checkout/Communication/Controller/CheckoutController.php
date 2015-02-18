<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use ProjectA\Shared\Sales\Transfer\Order;
use ProjectA\Shared\Sales\Transfer\Payment;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Cart\Communication\Helper\CartControllerTrait;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\Tracking;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Sdk\Cart\CartSdk;
use SprykerFeature\Sdk\Checkout\CheckoutSdk;
use SprykerFeature\Sdk\Payment\PaymentSdk;
use SprykerFeature\Sdk\Payone\PayoneSdk;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;

/**
 * Class CheckoutController
 * @package Pyz\Yves\Checkout\Communication\Controller
 */
class CheckoutController extends AbstractController
{

    use CartControllerTrait;

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_CHECKOUT)
            ->buildTracking();

        $response = $this->handleRequest($request);
        if ($response instanceof Response) {
            return $response;
        }

        if (is_array($response)) {
            $payoneSdk = $this->getPayoneSdk();
            $requestContainer = $payoneSdk->creditCardCheck();
            $response['payoneCreditcardCheckData'] = $requestContainer->toArray();
        }

        return $response;
    }

    /**
     * @param Request $request
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

//        $customerModel = Factory::getInstance()
//            ->createCustomerModelCustomer($this->getApplication());
//
//        $customer = $order->getCustomer();
//        $customerModel->refreshCustomerInSession($customer);

        $cart->clear();
        $productData = $this->getCartSdk()->getProductDataForCartItems($cartItems);
        $cartModel = $this->locator->cart()->pluginCartSession()->createCartSession($this->getTransferSession());
        $cartModel->clear();
        $cartItemCount = $this->locator->cart()
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
     * @param PaymentMethodCollection $paymentMethods
     * @return \Pyz\Yves\Sales\Form\OrderType
     */
    protected function createOrderForm(PaymentMethodCollection $paymentMethods)
    {
        return $this->locator->sales()->pluginOrderTypeForm()->createOrderTypeForm($paymentMethods);
    }

    /**
     * @param Request $request
     * @param FormInterface $form
     * @return null|RedirectResponse
     */
    protected function validateForm(Request $request, FormInterface $form)
    {
        if ($form->isValid()) {
            $paymentSdk = $this->getPaymentSdk();
            $paymentSdk->registerPaymentToZedRequest($request->getClientIp(), $request->server->get('HTTP_USER_AGENT'));

            $checkoutSdk = $this->getCheckoutSdk($request);
            /** @var Order $orderTransfer */
            $orderTransfer = $form->getData();

//            $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
//            $orderTransfer->setCustomer($customerModel->getTransfer());

            /** @var Payment $payment */
            $payment = $this->locator->sales()->transferPayment();
            $payment->setMethod('payment.payone.prepayment');

            $orderTransfer->setPayment($payment);

            $transferResponse = $checkoutSdk->saveOrder($orderTransfer);
            $order = $transferResponse->getTransfer();
            $cart = $this->getCart($request);
            $cart->setOrder($order);

            /** @var  \ProjectA\Shared\Sales\Transfer\Order $order */
//            $order = $transferResponse->getTransfer();
//            $customerModel->refreshCustomerInSession($order->getCustomer());

            $this->addMessagesFromZedResponse($transferResponse);

            if ($transferResponse->isSuccess()) {
                $redirectUrl = $order->getPayment()->getRedirectUrl();
                if (!empty($redirectUrl)) {
                    return $this->redirectResponseExternal($redirectUrl);
                } else {
                    return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS);
                }
            } elseif ($transferResponse->hasErrorMessage(
                \ProjectA_Shared_Checkout_Code_Messages::ERROR_ORDER_IS_ALREADY_SAVED
            )
            ) {
                $cart->setOrder($this->locator->sales()->transferSalesOrder());
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

//        $userTransfer = $this->getApplication()['security']->getToken()->getUser()->getTransfer();
//        $customer = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
        /* @var $userTransferUpdated Customer */
//        $userTransferUpdated = $customer->updateTransfer($userTransfer)->getTransfer();

        $order = $cart->getOrder();
        $checkoutSdk = $this->getCheckoutSdk($request);
        $checkoutSdk->clearReferences($order);
        $checkoutSdk->clearPayment($order);
        $cart->setOrder($order);

//        $this->getApplication()['security']->getToken()->getUser()->setTransfer($userTransferUpdated);

        // This is really ugly, but i need this to have valid data for the payment control
        // This needs to be refactored after discussion...
        $all = $request->request->all();
        $billingAddress = $this->locator->sales()->transferAddress();
        if (isset($all['salesOrder']) && isset($all['salesOrder']['billingAddress'])) {
            $billingAddress->fromArray($all['salesOrder']['billingAddress'], true);
        }
//        else {
//            $billingAddress->fromArray($userTransferUpdated->getBillingAddress()->toArray(), true);
//        }

        $shippingAddress = $this->locator->sales()->transferAddress();
        if (isset($all['salesOrder']) && isset($all['salesOrder']['shippingAddress'])) {
            $shippingAddress->fromArray($all['salesOrder']['shippingAddress'], true);
        }
//        else {
//            $shippingAddress->fromArray($userTransferUpdated->getShippingAddress()->toArray(), true);
//        }

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

        $paymentSdk = $this->getPaymentSdk();
        $methods = $paymentSdk->getOfferedPaymentMethods(
            $order,
            $request->getClientIp(),
            $request->server->get('HTTP_USER_AGENT')
        );
        $form = $this->createForm($this->createOrderForm($methods), $order);

        if (($parameters = $this->validateForm($request, $form)) !== null) {
            return $parameters;
        }
        $productData = $this->getCartSdk()->getProductDataForCartItems($cart->getItems());

//        $userAddresses = $customer->getAddresses($userTransferUpdated)->getTransfer();
//        $userAddressesJson = ($userAddresses) ? json_encode($userAddresses->toArray()) : null;

        return [
            'form' => $form->createView(),
            'cartItems' => $cart->getItems(),
            'totals' => $order->getTotals(),
            'products' => $productData,
            'userAddresses' => [],//$userAddresses,
            'userAddressesJson' => [],//$userAddressesJson,
            'paymentMethodCollection' => $methods
        ];
    }

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    //public function triggerPaymentCancelledRegularAction(Request $request)
    public function regularRedirectPaymentCancellationAction(Request $request)
    {
        $checkoutSdk = $this->getCheckoutSdk($request);
        $cart = $this->getCart($request);
        $order = $cart->getOrder();
        $checkoutSdk->setOrderInvalid($order);
        $checkoutSdk->clearReferences($order);
        $checkoutSdk->clearPayment($order);
        $cart->setOrder($order);

        return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT);
    }

    /**
     * @return CheckoutSdk
     */
    protected function getCheckoutSdk()
    {
        return $this->locator->checkout()->sdk();
    }

    /**
     * @return PaymentSdk
     */
    protected function getPaymentSdk()
    {
        return $this->locator->payment()->sdk();
    }

    /**
     * @return CartSdk
     */
    protected function getCartSdk()
    {
        return $this->locator->cart()->sdk();
    }

    /**
     * @return PayoneSdk
     */
    protected function getPayoneSdk()
    {
        return $this->locator->payone()->sdk();
    }

    /**
     * @return LocatorLocatorInterface
     */
    protected function getLocator()
    {
        return $this->locator;
    }
}