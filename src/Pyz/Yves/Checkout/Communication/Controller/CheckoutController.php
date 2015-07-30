<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\OrderItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use SprykerFeature\Shared\Customer\Code\Messages;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
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
    const REGISTRATION_PASSWORD = 'password';

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
        $session->set('email', $customer->getEmail());
        $session->set('orderId', $orderTransfer->getIdSalesOrder());
        $session->set('orderItemsData', json_encode($this->getOrderItemsData($orderTransfer->getItems())));

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
        $form = $this->createForm($this->getDependencyContainer()->createQuickRegistrationForm());
        $formData = $form->getData();
        $session =  $this->getLocator()->session()->client();
        $customer = $this->getLocator()->customer();

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setEmail($session->get('email'));
            $customerTransfer->setPassword($formData[self::REGISTRATION_PASSWORD]);

            $customerTransfer = $customer
                ->client()
                ->registerCustomer($customerTransfer)
            ;

            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
            }
        }

        return [
            'email' => $session->get('email'),
            'orderNr' => $session->get('orderId'),
            'orderItemsData' => json_decode($session->get('orderItemsData')),
            'isLoggedInCustomer' => $customer->pluginTwigCustomer()->getFunctions($this->getApplication()),
            'quickRegForm' => $form->createView(),
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
