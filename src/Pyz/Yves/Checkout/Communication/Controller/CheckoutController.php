<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderItemsTransfer;
use Generated\Shared\Transfer\OrderItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CheckoutDependencyContainer getDependencyContainer()
 */
class CheckoutController extends AbstractController
{

    /**
     * @return CartTransfer
     */
    public function getCart()
    {
        return $this->getLocator()->cart()->client()->getCart();
    }

    /**
     * @param Request $request
     *
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
                $checkoutClient = $this->getLocator()->checkout()->client();

                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();

                $checkoutRequest->setCart($this->getCart());
                $checkoutRequest->setShippingAddress($checkoutRequest->getBillingAddress());

                /** @var CheckoutResponseTransfer $checkoutResponseTransfer */
                $checkoutResponseTransfer = $checkoutClient->requestCheckout($checkoutRequest);

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    $this->saveSuccessData($checkoutResponseTransfer->getOrder());
                    $this->getLocator()->cart()->client()->clearCart();
                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

        return [
            'form' => $form->createView(),
            'cart' => $this->getCart(),
        ];
    }

    /**
     * @param OrderTransfer $orderTransfer
     */
    private function saveSuccessData(OrderTransfer $orderTransfer)
    {
        $session = $this->getLocator()->session()->client();
        $customer = $orderTransfer->getCustomer();
        $invoice = $orderTransfer->getInvoice();
        $isStarted = $session->isStarted();
        $session->set('email', $customer->getEmail());
        $session->set('orderId', $orderTransfer->getIdSalesOrder());
        //$session->set('orderNr', $orderTransfer->getIdSalesOrder());
        $sessionTest = $session->get('email');
        $session->set('orderItemsData', json_encode($this->getOrderItemsData($orderTransfer->getItems())));
       // $session->save();

    }

    /**
     * @param OrderItem[]
     *
     * @return array
     */
    private function getOrderItemsData($orderItemsTransfer)
    {
        $orderItemsData = [];

        /** @var OrderItemTransfer $orderItem */
        foreach ($orderItemsTransfer as $orderItem) {
            $orderItemsData[] = [
                'name'      => $orderItem->getName(),
                'quantity'  => $orderItem->getQuantity(),
                'unitPrice' => $orderItem->getPriceToPay(),
            ];
        }

        return $orderItemsData;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function successAction(Request $request)
    {
        //@todo copy look and feel from invision!
        //@todo add finish form?
        $session =  $this->getLocator()->session()->client();
        $orderItemData = json_decode($session->get('orderItemsData'));
        $customer = $this->getLocator()->customer();
        //$customer->pluginTwigCustomer()->getFunctions($this->getApplication())->
        return [
            'email' => $session->get('email'),
            'orderNr' => $session->get('orderNr'),
            'orderItemsData' => json_decode($session->get('orderItemsData')),
            'customer' => $customer,
            'isLoggedInCustomer' => $customer->pluginTwigCustomer()->getFunctions($this->getApplication()),
        ];
    }

    /**
     * @param CheckoutErrorTransfer[] $errors
     *
     * @return JsonResponse
     */
    protected function errors($errors)
    {
        $returnErrors = [];
        foreach ($errors as $error) {
            $returnErrors[] = [
                'errorCode' => $error->getErrorCode(),
                'message' => $error->getMessage(),
                'step' => $error->getStep(),
            ];
        }

        return new JsonResponse([
            'success' => false,
            'errors' => $returnErrors,
        ]);
    }

    /**
     * @param CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return JsonResponse
     */
    public function redirect(CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        $redirectUrl = $checkoutResponseTransfer->getIsExternalRedirect()
            ? $checkoutResponseTransfer->getRedirectUrl()
            : CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS;

        return new JsonResponse([
            'success' => true,
            'url' => $redirectUrl,
        ]);
    }

}
