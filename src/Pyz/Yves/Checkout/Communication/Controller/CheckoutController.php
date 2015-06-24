<?php
namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\CartItemsTransfer;
use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
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
     * @param Request $request
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
                $checkoutSdk = $this->getLocator()->checkout()->sdk();
                $response = $checkoutSdk->requestCheckout($form->getData());

                /** @var CheckoutResponseTransfer $checkoutResponseTransfer */
                $checkoutResponseTransfer = $response->getTransfer();

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

        return [
            'form' => $form->createView(),
            'cart' => $this->demoCart()
        ];
    }

    /**
     * @param CheckoutErrorTransfer[] $errors
     *
     * @return JsonResponse
     */
    protected function errors($errors)
    {
        $returnErrors = array();
        foreach ($errors as $error) {
            $returnErrors[] = [
                'errorCode' => $error->getErrorCode(),
                'message' => $error->getMessage(),
                'step' => $error->getStep()
            ];
        }



        return new JsonResponse([
            'success' => false,
            'errors' => $returnErrors
        ]);
    }

    /**
     * @param CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return RedirectResponse
     */
    public function redirect(CheckoutResponseTransfer $checkoutResponseTransfer)
    {
        if ($checkoutResponseTransfer->getIsExternalRedirect()) {
            return new RedirectResponse($checkoutResponseTransfer->getRedirectUrl());
        }
        return new RedirectResponse($checkoutResponseTransfer->getRedirectUrl());
    }

    /**
     * @return CartItemsTransfer
     */
    private function demoCart()
    {
        $cart = new CartTransfer();

        $item = new CartItemTransfer();
        $item->setId(1);
        $item->setGrossPrice(200);
        $item->setQuantity(3);
        $item->setSku('Batman');
        $item->setPriceToPay(1900);
        $item->setUniqueIdentifier(123);
        $cart->addItems($item);

        $item2 = new CartItemTransfer();
        $item2->setId(2);
        $item2->setGrossPrice(200);
        $item2->setQuantity(5);
        $item2->setSku('Brillenpinguin');
        $item2->setPriceToPay(2450);
        $item2->setUniqueIdentifier(123);
        $cart->addItems($item2);

        $item3 = new CartItemTransfer();
        $item3->setId(2);
        $item3->setGrossPrice(200);
        $item3->setQuantity(2);
        $item3->setSku('DRACHENRITTER BERSERKER');
        $item3->setPriceToPay(3250);
        $item3->setUniqueIdentifier(123);
        $cart->addItems($item3);

        return $cart;
    }

    /**
     * @return CheckoutResponseTransfer
     */
    private function demoPaypalResponse()
    {
        $response = new CheckoutResponseTransfer();

        $response->setIsSuccess(true);
        $response->setIsExternalRedirect(true);
        $response->setRedirectUrl('http://www.paypal.de/fqwcra4wr4tvecttc4t');

        return $response;
    }

    /**
     * @return CheckoutResponseTransfer
     */
    private function demoSuccessResponse()
    {
        $response = new CheckoutResponseTransfer();

        $response->setIsSuccess(true);
        $response->setIsExternalRedirect(false);

        return $response;
    }



}
