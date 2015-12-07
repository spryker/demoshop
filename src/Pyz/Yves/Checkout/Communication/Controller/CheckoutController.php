<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;
use Generated\Shared\Transfer\AdyenHppPaymentReturnCheckTransfer;
use Generated\Shared\Transfer\AdyenPaymentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\AdyenPaymentMethodsTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Tracking\Business\Tracking;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Tracking\Business\DataFormatter\CartDataFormatter;
use Pyz\Yves\Tracking\Business\DataFormatter\CheckoutDataFormatter;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use SprykerFeature\Shared\Library\Log;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use PavFeature\Client\Adyen\Service\AdyenClientInterface;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;
use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;

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
        return $this->getDependencyContainer()->getCart();
    }

    /**
     * @return AdyenClientInterface
     */
    protected function getAdyenClient()
    {
        $container = $this->getDependencyContainer();

        return $container->createAdyenClient();
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $container = $this->getDependencyContainer();


        if (count($container->createCartClient()->getCart()->getItems()) < 1) {
            $this->addInfoMessage('Your cart is empty.');
            return $this->redirectResponseInternal('/');
        }

        $paymentMethodsTransfer = $this->getPaymentMethods();
        $paymentMethodsTransfer->getClientSideEncryptionPublicKey();

        $checkoutForm = $container->createCheckoutForm($paymentMethodsTransfer);
        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutTransfer->setIsGuest(false); // for now there is no guest checkout. When an order is performed the customer is saved

        $customerClient = $this->getDependencyContainer()->createCustomerClient();
        $customerTransfer = $customerClient->getCustomer();

        $form = $this->createForm($checkoutForm, $checkoutTransfer);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $checkoutClient = $this->getDependencyContainer()->createCheckoutClient();

                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();

                $this->setShippingAddress($checkoutRequest);

                if ($customerTransfer !== null) {
                    $checkoutRequest->setIdUser($customerTransfer->getIdCustomer());
                    $checkoutRequest->setEmail($customerTransfer->getEmail());
                }

                $paymentMethod = $checkoutRequest->getAdyenPayment()->getPaymentMethod();

                $adyenPaymentTransfer = $checkoutRequest->getAdyenPayment();
                $adyenPaymentDetails = $adyenPaymentTransfer->getPaymentDetail();

                if($paymentMethod === AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE) {
                    $adyenPaymentDetails->setEncryptedCardData($request->get('adyen-encrypted-data'));
                }

                /** @TODO remove hardcoded values */
                $adyenPaymentDetails->setCountry('DE');
                /** End of TODO */
                $adyenPaymentDetails->setIp($request->getClientIp());

                $adyenPaymentTransfer->setPaymentMethod($paymentMethod);
                $adyenPaymentTransfer->setPaymentDetail($adyenPaymentDetails);
                $checkoutRequest->setAdyenPayment($adyenPaymentTransfer);

                $checkoutRequest->setCart($this->getCart());

                $checkoutRequest->setPaymentMethod($paymentMethod);

                /** @var CheckoutResponseTransfer $checkoutResponseTransfer */
                $checkoutResponseTransfer = $checkoutClient->requestCheckout($checkoutRequest);

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    $checkoutClient->setOrderSuccess($checkoutResponseTransfer->getOrder());

                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

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


        $trackingPurchase = CheckoutDataFormatter::formatPurchase(
            null,
            $this->getCart()->getTotals(),
            $this->getCart()->getExpenses()
        );

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_CHECKOUT)
            ->setByKey(CheckoutDataFormatter::PURCHASE, $trackingPurchase)
            ->setByKey(CheckoutDataFormatter::PRODUCTS, CartDataFormatter::formatCartItems($this->getCart()->getItems()));

        return [
            'form' => $form->createView(),
            'cart' => $this->getCart(),
            'products' => $products,
        ];
    }

    /**
     * @return \Generated\Shared\Adyen\AdyenPaymentMethodsInterface
     */
    protected function getPaymentMethods()
    {
        $adyenClient = $this->getAdyenClient();

        return $adyenClient->getAvailablePaymentMethods(
            new AdyenPaymentMethodAvailabilityTransfer()
        );
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setShippingAddress(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $shippingAddressTransfer = $checkoutRequestTransfer->getShippingAddress();
        if ($shippingAddressTransfer === null) {
            $checkoutRequestTransfer->setShippingAddress($checkoutRequestTransfer->getBillingAddress());
        }
    }

    /**
     * @return array
     */
    public function successAction()
    {
        $checkoutClient = $this->getDependencyContainer()->createCheckoutClient();
        $orderTransfer = $checkoutClient->getOrderSuccess();

        if ($orderTransfer === null) {
            return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT);
        }

        $cartClient = $this->getDependencyContainer()->createCartClient();
        $cartClient->clearCart();

        $checkoutClient->clearOrderSuccess();


        //@todo add finish form?

        $trackingPurchase = CheckoutDataFormatter::formatPurchase(
            $orderTransfer->getIdSalesOrder(),
            $orderTransfer->getTotals(),
            $orderTransfer->getExpenses()
        );

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_CHECKOUT_SUCCESS)
            ->setByKey(CheckoutDataFormatter::PURCHASE, $trackingPurchase)
            ->setByKey(CheckoutDataFormatter::PRODUCTS, CartDataFormatter::formatCartItems($orderTransfer->getItems()))
        ;

        $result = [
            'order' => $orderTransfer->toArray(true),
        ];

        $customer = $orderTransfer->getCustomer();

        if ($customer->getPassword() === null) {
            $result['form'] = $this->createForm(
                $this->getLocator()->customer()->pluginCreatePasswordForm()->createPasswordForm(),
                [ 'restore_key' => $customer->getRestorePasswordKey() ]
            )->createView();
        }

        return $result;
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

        // TODO Building redirect url is not final !!!!

        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $redirectUrl = $checkoutResponseTransfer->getRedirectUrl() .
                '&' . http_build_query($checkoutResponseTransfer->getRedirectPayload(), null, '&');
        } else {
            $redirectUrl = '/' . CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS;
        }
/*
        // TODO can be use for testing hmac
        $redirectUrl = 'https://ca-test.adyen.com/ca/ca/skin/checkhmac.shtml?brandCode=paypal' .
            '&' . http_build_query($checkoutResponseTransfer->getRedirectPayload(), null, '&');
*/
        return new JsonResponse([
            'success' => true,
            'url' => $redirectUrl
        ]);
    }


    /**
     * @param Request $request
     * @return array
     */
    public function redirectPaymentReturnAction(Request $request)
    {
        $params = $request->query->all();
        Log::logRaw($params, 'hpp-payment-return.log');

        $hppCheckPaymentReturnTransfer = new AdyenHppPaymentReturnCheckTransfer();
        $hppCheckPaymentReturnTransfer->fromArray($params, true);

        $adyenClient = $this->getAdyenClient();
        $checkResponse = $adyenClient->checkHppPaymentReturn($hppCheckPaymentReturnTransfer);

        $this->handleRedirectPaymentReturnCustomerMessage($checkResponse);
        $redirectUrl = $checkResponse->getRedirectRoute();

        return $this->redirectResponseInternal($redirectUrl);
    }

    /**
     * @param AdyenHppPaymentReturnCheckResponseInterface $checkResponse
     * @return void
     */
    protected function handleRedirectPaymentReturnCustomerMessage(AdyenHppPaymentReturnCheckResponseInterface $checkResponse)
    {
        if ($checkResponse->getIsSuccess()) {
            $this->addSuccessMessage($checkResponse->getCustomerMessage());
        } else {
            $this->addErrorMessage($checkResponse->getCustomerMessage());
        }
    }

}
