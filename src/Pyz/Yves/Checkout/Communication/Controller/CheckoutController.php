<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Adyen\AdyenHppPaymentReturnCheckResponseInterface;
use Generated\Shared\Transfer\AdyenHppPaymentReturnCheckTransfer;
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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use PavFeature\Client\Adyen\Service\AdyenClientInterface;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;

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
            return $this->redirectResponseInternal(ApplicationControllerProvider::ROUTE_HOME);
        }

        $paymentMethodsTransfer = new AdyenPaymentMethodsTransfer();

        // @TODO in future, discuss if this list should be retrieved from Adyen
        $paymentMethodsTransfer->setPaymentMethods(new \ArrayObject([
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_CREDIT_CARD_CSE,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_OPEN_INVOICE_KLARNA,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SOFORTUEBERWEISUNG,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA,

            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_BANCONTACT_MISTER_CASH,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_DISCOVER,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_DUTCH_BANK_TRANSFER,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GERMAN_BANK_TRANSFER,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_GIROPAY,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_IDEAL,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_ELECTRONIC_DIRECT_DEBIT,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_DOTPAY,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_FINNISH_E_BANKING,
            AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_INTERNATIONAL_BANK_TRANSFER_IBAN
        ]));

        $checkoutForm = $container->createCheckoutForm($paymentMethodsTransfer);
        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutTransfer->setIsGuest(false); // for now there is no guest checkout. When an order is performed the customer is saved

        $form = $this->createForm($checkoutForm, $checkoutTransfer);


        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $checkoutClient = $this->getDependencyContainer()->createCheckoutClient();
                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();

                $this->setShippingAddress($checkoutRequest);

                /** TODO: START OF HACK PAYMENT METHOD */


                $paymentMethod = $checkoutRequest->getAdyenPayment()->getPaymentMethod();

                $adyenPaymentTransfer = $checkoutRequest->getAdyenPayment();
                $adyenPaymentDetails = $checkoutRequest->getAdyenPayment()->getPaymentDetail();
                $adyenPaymentDetails->setAmount($this->getCart()->getTotals()->getGrandTotal());

                /** @TODO remove hardcoded values */
                $adyenPaymentDetails->setCountry('DE');
                $adyenPaymentDetails->setIp('127.0.0.1');
                $adyenPaymentDetails->setCurrency('EUR');
                /** End of TODO */

                $adyenPaymentTransfer->setPaymentMethod($paymentMethod);
                $adyenPaymentTransfer->setPaymentDetail($adyenPaymentDetails);
                $checkoutRequest->setAdyenPayment($adyenPaymentTransfer);

                $checkoutRequest->setCart($this->getCart());

                $checkoutRequest->setShippingAddress($checkoutRequest->getBillingAddress());
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
        ];
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setShippingAddress(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $shippingAddressTransfer = $checkoutRequestTransfer->getShippingAddress();
        if ($shippingAddressTransfer->getAddress1() === null) {
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

        return [
            'order' => $orderTransfer->toArray(true),
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

        // TODO Building redirect url is not final !!!!

        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $redirectUrl = $checkoutResponseTransfer->getRedirectUrl() .
                '&' . http_build_query($checkoutResponseTransfer->getRedirectPayload(), null, '&');
        } else {
            $redirectUrl = CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS;
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

        $hppCheckPaymentReturnTransfer = new AdyenHppPaymentReturnCheckTransfer();
        $hppCheckPaymentReturnTransfer->fromArray($params, true);

        $adyenClient = $this->getAdyenClient();
        $checkResponse = $adyenClient->checkHppPaymentReturn($hppCheckPaymentReturnTransfer);

        $this->handleRedirectPaymentReturnCustomerMessage($checkResponse);
        $redirectUrl = $checkResponse->getRedirectUrl();

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
