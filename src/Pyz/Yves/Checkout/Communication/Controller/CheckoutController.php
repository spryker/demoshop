<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\AdyenPaymentDetailTransfer;
use Generated\Shared\Transfer\AdyenPaymentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\AdyenPaymentTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use SprykerFeature\Shared\Library\Log;
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

/* TODO START HACK FETCH PAYMENT METHODS */
        $adyenPaymentAvailabilityTransfer = new AdyenPaymentMethodAvailabilityTransfer();
        $adyenPaymentAvailabilityTransfer->setAmount(10000);
        $adyenPaymentAvailabilityTransfer->setCurrency('EUR');
        $adyenPaymentAvailabilityTransfer->setCountry('DE');
        $adyenPaymentAvailabilityTransfer->setSessionValidity(date("c", strtotime("+1 days")));

        $paymentMethodsTransfer = $container->createAdyenClient()
            ->getAvailablePaymentMethods($adyenPaymentAvailabilityTransfer);
/* TODO END HACK FETCH PAYMENT METHODS */

        $shipmentMethodAvailabilityTransfer = new ShipmentMethodAvailabilityTransfer();
        $shipmentMethodAvailabilityTransfer->setCart($this->getCart());


        $checkoutForm = $container->createCheckoutForm($paymentMethodsTransfer);
        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutTransfer->setIsGuest(false); // for now there is no guest checkout. When an order is performed the customer is saved

        $form = $this->createForm($checkoutForm, $checkoutTransfer);


        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $checkoutClient = $this->getLocator()->checkout()->client();
                /** @var CheckoutRequestTransfer $checkoutRequest */
                $checkoutRequest = $form->getData();

/* TODO START HACK SET PAYMENT METHOD */
                $adyenPaymentDetails = new AdyenPaymentDetailTransfer();
                $adyenPaymentDetails->setAmount(6000);
                $adyenPaymentDetails->setIban('DE87123456781234567890');
                $adyenPaymentDetails->setBic('HUHUBIC');
                $adyenPaymentDetails->setOwnerName('A. Schneider');
                $adyenPaymentDetails->setCountry('DE');
                $adyenPaymentDetails->setIp('127.0.0.1');
                $adyenPaymentDetails->setCurrency('EUR');

                $adyenPaymentTransfer = new AdyenPaymentTransfer();
                $adyenPaymentTransfer->setPaymentMethod(AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL);
                $adyenPaymentTransfer->setPaymentDetail($adyenPaymentDetails);
                $checkoutRequest->setAdyenPayment($adyenPaymentTransfer);

                $checkoutRequest->setPaymentMethod(AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL);
                //$checkoutRequest->setPaymentMethod('prepayment');
/* TODO END HACK SET PAYMENT METHOD */

                $checkoutRequest->setCart($this->getCart());
                $checkoutRequest->setShippingAddress($checkoutRequest->getBillingAddress());

                //Log::logRaw($checkoutRequest, 'yhundnase.log');

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
        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            $redirectUrl = $checkoutResponseTransfer->getRedirectUrl() .
                '&' . http_build_query($checkoutResponseTransfer->getRedirectPayload(), null, '&');
        } else {
            $redirectUrl = CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS;
        }

        return new JsonResponse([
            'success' => true,
            'url' => $redirectUrl
        ]);
    }

}
