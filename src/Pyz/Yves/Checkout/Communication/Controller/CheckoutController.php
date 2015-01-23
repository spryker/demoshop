<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use ProjectA\Shared\Library\TransferLoader;
use ProjectA\Shared\Sales\Transfer\Order;
use ProjectA\Shared\Sales\Transfer\Payment;
use Generated\Yves\Factory;
use ProjectA\Yves\Cart\Communication\Plugin\CartControllerProvider;
use ProjectA\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use Pyz\Yves\Sales\Communication\Form\OrderType;
use ProjectA\Yves\Checkout\Communication\Controller\CheckoutController as CoreCheckoutController;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ProjectA\Shared\Payment\Transfer\PaymentMethodCollection;

class CheckoutController extends CoreCheckoutController
{

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_CHECKOUT)
            ->buildTracking();

        $response = parent::indexAction($request);
        if ($response instanceof Response) {
            return $response;
        }

        if (is_array($response)) {
            $payoneClientApi = Factory::getInstance()->createPayoneModelClientApiClientApi();
            $requestContainer = $payoneClientApi->creditCardCheck();
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
        /* @todo fix tracking providers
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_SUCCESS)
            ->buildTracking();
        */
        return parent::successAction($request);
    }

    /**
     * @param PaymentMethodCollection $paymentMethods
     * @return OrderType
     */
    protected function createOrderType(PaymentMethodCollection $paymentMethods)
    {
//        $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
        return new OrderType($paymentMethods);//, $customerModel);
    }

    protected function validateForm(Request $request, FormInterface $form)
    {
        if ($form->isValid()) {

            $this->getFactory()->createPaymentModelPayment($request)->registerPaymentToZedRequest();

            $orderManager = $this->getOrderManager($request);
            /** @var Order $orderTransfer */
            $orderTransfer = $form->getData();

//            $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
//            $orderTransfer->setCustomer($customerModel->getTransfer());

            /** @var Payment $payment */
            $payment = TransferLoader::loadSalesPayment();
            $payment->setMethod('payment.payone.prepayment');

            $orderTransfer->setPayment($payment);

            $transferResponse = $orderManager->saveOrder($orderTransfer);

            /** @var  \ProjectA\Shared\Sales\Transfer\Order $order */
//            $order = $transferResponse->getTransfer();
//            $customerModel->refreshCustomerInSession($order->getCustomer());

            $this->addMessagesFromZedResponse($transferResponse);

            if ($transferResponse->isSuccess()) {
                $redirectUrl = $this->getCart($request)->getOrder()->getPayment()->getRedirectUrl();
                if (!empty($redirectUrl)) {
                    return $this->redirectResponseExternal($redirectUrl);
                } else {
                    return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS);
                }
            } elseif ($transferResponse->hasErrorMessage(\ProjectA_Shared_Checkout_Code_Messages::ERROR_ORDER_IS_ALREADY_SAVED)) {
                $this->getCart($request)->setOrder(TransferLoader::loadSalesOrder());
                return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
            }
        }

        return null;
    }
}
