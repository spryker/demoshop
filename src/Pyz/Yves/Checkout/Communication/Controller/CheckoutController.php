<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Shipment\ShipmentInterface;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Pyz\Yves\Checkout\Communication\Form\CheckoutType;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use SprykerFeature\Shared\Shipment\ShipmentConstants;
use Symfony\Component\Form\FormInterface;
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
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $shipmentMethodAvailabilityTransfer = new ShipmentMethodAvailabilityTransfer();
        $shipmentMethodAvailabilityTransfer->setCart($this->getCartTransfer());

        $shipmentTransfer = $this->getDependencyContainer()->createShipmentClient()
            ->getAvailableMethods($shipmentMethodAvailabilityTransfer);

        $checkoutFormType = $this->getDependencyContainer()->createCheckoutForm($request, $shipmentTransfer);

        $checkoutTransfer = new CheckoutRequestTransfer();
        $checkoutForm = $this->createForm($checkoutFormType, $checkoutTransfer);

        if ($request->isMethod('POST')) {
            if ($checkoutForm->isValid()) {
                /** @var CheckoutRequestTransfer $checkoutRequestTransfer */
                $checkoutRequestTransfer = $checkoutForm->getData();

                $checkoutRequestTransfer->setCart($this->getCartTransfer());

                $this->setShippingAddress($checkoutRequestTransfer);
                $this->setShippingMethod($shipmentTransfer, $checkoutRequestTransfer);
                $this->setCustomerPassword($checkoutForm, $checkoutRequestTransfer);

                $checkoutResponseTransfer = $this->getDependencyContainer()
                    ->createCheckoutClient()
                    ->requestCheckout($checkoutRequestTransfer);

                if ($checkoutResponseTransfer->getIsSuccess()) {
                    $this->getDependencyContainer()->createCartClient()->clearCart();

                    return $this->redirect($checkoutResponseTransfer);
                } else {
                    return $this->errors($checkoutResponseTransfer->getErrors());
                }
            }
        }

        return [
            'form' => $checkoutForm->createView(),
            'cart' => $this->getCartTransfer(),
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
        $redirectUrl = $checkoutResponseTransfer->getIsExternalRedirect()
            ? $checkoutResponseTransfer->getRedirectUrl()
            : CheckoutControllerProvider::ROUTE_CHECKOUT_SUCCESS;

        return new JsonResponse([
            'success' => true,
            'url' => $redirectUrl,
        ]);
    }


    /**
     * @return CartTransfer
     */
    public function getCartTransfer()
    {
        return $this->getDependencyContainer()->createCartClient()->getCart();
    }


    /**
     * @param ShipmentInterface $shipmentTransfer
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setShippingMethod(
        ShipmentInterface $shipmentTransfer,
        CheckoutRequestTransfer $checkoutRequestTransfer
    ) {
        foreach ($shipmentTransfer->getMethods() as $shipmentMethodTransfer) {
            if ($shipmentMethodTransfer->getIdShipmentMethod() === $checkoutRequestTransfer->getIdShipmentMethod()) {
                $checkoutRequestTransfer->setShipmentMethod($shipmentMethodTransfer);

                $shipmentExpenseTransfer = new ExpenseTransfer();
                $shipmentExpenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
                $shipmentExpenseTransfer->setGrossPrice($shipmentMethodTransfer->getPrice());
                $shipmentExpenseTransfer->setName($shipmentMethodTransfer->getName());

                $this->replaceShipmentExpenseInCart($checkoutRequestTransfer->getCart(), $shipmentExpenseTransfer);
            }
        }
    }

    /**
     * @param CartTransfer $cartTransfer
     * @param ExpenseTransfer $expenseTransfer
     *
     * @return void
     */
    protected function replaceShipmentExpenseInCart(CartTransfer $cartTransfer, ExpenseTransfer $expenseTransfer)
    {
        $otherExpenseCollection = new \ArrayObject();
        foreach ($cartTransfer->getExpenses() as $expense) {
            if ($expense->getType() !== ShipmentConstants::SHIPMENT_EXPENSE_TYPE) {
                $otherExpenseCollection->append($expense);
            }
        }
        $cartTransfer->setExpenses($otherExpenseCollection);
        $cartTransfer->addExpense($expenseTransfer);
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
     * @param FormInterface $checkoutForm
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setCustomerPassword(FormInterface $checkoutForm, CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $createAccount = $checkoutForm[CheckoutType::FIELD_CREATE_ACCOUNT]->getData();
        if ($createAccount) {
            $checkoutRequestTransfer->setCustomerPassword($checkoutForm[CheckoutType::FIELD_PASSWORD]->getData());
        }
    }

}
