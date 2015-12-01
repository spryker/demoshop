<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutErrorTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Pyz\Yves\Checkout\Communication\Form\CheckoutType;
use Pyz\Yves\Checkout\Communication\Plugin\Provider\CheckoutControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\CheckoutDependencyContainer;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
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

    protected static $payolutionPaymentMethodMapper = [
        'payolution_invoice' => PayolutionApiConstants::BRAND_INVOICE,
        'payolution_installment' => PayolutionApiConstants::BRAND_INSTALLMENT,
    ];

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $cartTransfer = $this->getCartTransfer();
        $shipmentMethodAvailabilityTransfer = new ShipmentMethodAvailabilityTransfer();
        $shipmentMethodAvailabilityTransfer->setCart($cartTransfer);
        $shipmentTransfer = $this
            ->getDependencyContainer()
            ->createShipmentClient()
            ->getAvailableMethods($shipmentMethodAvailabilityTransfer);

        $checkoutTransfer = new CheckoutRequestTransfer();

        $payolutionCalculationResponseTransfer = $this->getPayolutionInstallmentPayments($checkoutTransfer);

        $checkoutFormType = $this
            ->getDependencyContainer()
            ->createCheckoutForm($request, $shipmentTransfer, $payolutionCalculationResponseTransfer);
        $checkoutForm = $this->createForm($checkoutFormType, $checkoutTransfer);

        if ($checkoutForm->isValid()) {
            /** @var CheckoutRequestTransfer $checkoutRequestTransfer */
            $checkoutRequestTransfer = $checkoutForm->getData();

            $checkoutRequestTransfer->setCart($cartTransfer);

            $this->setShippingAddress($checkoutRequestTransfer);
            $this->setShippingMethod($shipmentTransfer, $checkoutRequestTransfer);
            $this->setCustomerPassword($checkoutForm, $checkoutRequestTransfer);

            $this->setPayolutionPayment($checkoutRequestTransfer, $payolutionCalculationResponseTransfer, $request);

            $checkoutResponseTransfer = $this->getDependencyContainer()
                ->createCheckoutClient()
                ->requestCheckout($checkoutRequestTransfer);

            if ($checkoutResponseTransfer->getIsSuccess()) {
                $this->getDependencyContainer()->createCartClient()->clearCart();

                return $this->redirect($checkoutResponseTransfer);
            }

            return $this->errors($checkoutResponseTransfer->getErrors());
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
     * @param ShipmentTransfer $shipmentTransfer
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setShippingMethod(
        ShipmentTransfer $shipmentTransfer,
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

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param Request $request
     *
     */
    protected function setPayolutionPayment(
        CheckoutRequestTransfer $checkoutRequestTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        Request $request)
    {
        $installmentPaymentDetail = $payolutionCalculationResponseTransfer
            ->getPaymentDetails()[$checkoutRequestTransfer->getPayolutionPayment()->getInstallmentPaymentDetailIndex()];
        $installmentAmount = $installmentPaymentDetail->getInstallments()[0]->getAmount() / 100;
        $installmentDuration = $installmentPaymentDetail->getDuration();

        $checkoutRequestTransfer->getPayolutionPayment()
            ->setAccountBrand(self::$payolutionPaymentMethodMapper[$checkoutRequestTransfer->getPaymentMethod()])
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode())
            ->setLanguageIso2Code($checkoutRequestTransfer->getBillingAddress()->getIso2Code())
            ->setGender('Male')
            ->setClientIp($request->getClientIp())
            ->setInstallmentAmount($installmentAmount)
            ->setInstallmentDuration($installmentDuration);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionInstallmentPayments(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $addressTransfer = (new AddressTransfer())->setIso2Code('DE');
        $payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAddress($addressTransfer)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode());
        $checkoutRequestTransfer
            ->setCart($this->getCartTransfer())
            ->setPayolutionPayment($payolutionPaymentTransfer);

        return $this
            ->getDependencyContainer()
            ->createPayolutionClient()
            ->calculateInstallmentPayments($checkoutRequestTransfer);
    }

}
