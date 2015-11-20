<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\AdyenHppPaymentReturnCheckTransfer;
use Generated\Shared\Transfer\AdyenPaymentDetailTransfer;
use Generated\Shared\Transfer\AdyenPaymentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\AdyenPaymentTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
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

/** TODO: START OF HACK FETCH PAYMENT METHODs */
        $adyenPaymentAvailabilityTransfer = new AdyenPaymentMethodAvailabilityTransfer();
        $adyenPaymentAvailabilityTransfer->setAmount(10000);
        $adyenPaymentAvailabilityTransfer->setCurrency('EUR');
        $adyenPaymentAvailabilityTransfer->setCountry('DE');
        $adyenPaymentAvailabilityTransfer->setSessionValidity(date("c", strtotime("+1 days")));

        $paymentMethodsTransfer = $container->createAdyenClient()
            ->getAvailablePaymentMethods($adyenPaymentAvailabilityTransfer);
/** TODO: START OF HACK FETCH PAYMENT METHODs */


        $checkoutForm = $container->createCheckoutForm($paymentMethodsTransfer);
        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutTransfer->setIsGuest(false); // for now there is no guest checkout. When an order is performed the customer is saved

        $form = $this->createForm($checkoutForm, $checkoutTransfer);


        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $checkoutClient = $this->getLocator()->checkout()->client();
                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();


/** TODO: START OF HACK PAYMENT METHOD */
                $paymentMethod = $checkoutRequest->getPaymentMethod();

                $adyenPaymentDetails = new AdyenPaymentDetailTransfer();
                $adyenPaymentDetails->setAmount(6000);

                if ($paymentMethod == 'adyen.payment.method.sepa.directdebit') {
                    $adyenPaymentDetails->setIban('DE87123456781234567890');
                    $adyenPaymentDetails->setBic('HUHUBIC');
                    $adyenPaymentDetails->setOwnerName('A. Schneider');
                }

                if ($paymentMethod == 'adyen.payment.method.creditcard.cse') {
                    $adyenPaymentDetails->setEncryptedCardData(
                        'adyenjs_0_1_15...'
                    );
                }

                $adyenPaymentDetails->setCountry('DE');
                $adyenPaymentDetails->setIp('127.0.0.1');
                $adyenPaymentDetails->setCurrency('EUR');
                //$adyenPaymentDetails->setDateOfBirth('07071960');
                //$adyenPaymentDetails->setGender('male');
                //$adyenPaymentDetails->setPhoneNumber('01522113356');

                $adyenPaymentTransfer = new AdyenPaymentTransfer();
                $adyenPaymentTransfer->setPaymentMethod($paymentMethod);
                $adyenPaymentTransfer->setPaymentDetail($adyenPaymentDetails);
                $checkoutRequest->setAdyenPayment($adyenPaymentTransfer);


                //$checkoutRequest->setPaymentMethod('prepayment');
/** TODO: END OF HACK PAYMENT METHOD */

                $checkoutRequest->setCart($this->getCart());
                $checkoutRequest->setShippingAddress($checkoutRequest->getBillingAddress());


                /** @var CheckoutResponseTransfer $checkoutResponseTransfer */
                $checkoutResponseTransfer = $checkoutClient->requestCheckout($checkoutRequest);

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    $this->getLocator()->cart()->client()->clearCart();

                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_CHECKOUT)
            ->setByKey(CheckoutDataFormatter::PURCHASE, CheckoutDataFormatter::formatPurchase($this->getCart()))
            ->setByKey(CheckoutDataFormatter::PRODUCTS, CartDataFormatter::formatCartItems($this->getCart()->getItems()));

        return [
            'form' => $form->createView(),
            'cart' => $this->getCart(),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function successAction(Request $request)
    {
        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_CHECKOUT_SUCCESS);

        //@todo copy look and feel from invision!
        //@todo add finish form?

        return [];
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

        //$this->getApplication()->getSession()->getFlashBag()->add('xx', $checkResponse->getCustomerMessage());

        $redirectUrl = $checkResponse->getRedirectUrl();

        return $this->redirectResponseInternal($redirectUrl);
    }

}
