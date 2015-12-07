<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

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
use Orm\Zed\Payolution\Persistence\Map\SpyPaymentPayolutionTableMap;
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

    /**
     * @var array
     */
    protected static $payolutionPaymentMethodMapper = [
        'payolution_invoice' => PayolutionApiConstants::BRAND_INVOICE,
        'payolution_installment' => PayolutionApiConstants::BRAND_INSTALLMENT,
    ];

    /**
     * @var array
     */
    protected static $payolutionGenderMapper = [
        'Mr' => SpyPaymentPayolutionTableMap::COL_GENDER_MALE,
        'Mrs' => SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE,
    ];

    /**
     * @var CheckoutRequestTransfer
     */
    protected $checkoutRequestTransfer;

    /**
     * @var CartTransfer
     */
    protected $cartTransfer;

    /**
     * @var ShipmentTransfer
     */
    protected $shipmentTransfer;

    /**
     * @var PayolutionCalculationResponseTransfer
     */
    protected $payolutionCalculationResponseTransfer;

    /**
     * @var FormInterface
     */
    protected $checkoutForm;

    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $this->setCheckoutInitialData();
        $this->buildCheckoutForm($request);

        return [
            'form' => $this->checkoutForm->createView(),
            'cart' => $this->cartTransfer,
        ];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function buyAction(Request $request)
    {
        $this->setCheckoutInitialData();
        $this->buildCheckoutForm($request);

        if ($this->checkoutForm->isValid()) {
            $this->setCheckoutSubmittedData($request);

            $checkoutResponseTransfer = $this->requestCheckout();
            if ($checkoutResponseTransfer->getIsSuccess() === false) {
                return $this->getErrors($checkoutResponseTransfer->getErrors());
            }

            $this->clearCart();

            return $this->redirectSuccess($checkoutResponseTransfer);
        }

        return [
            'form' => $this->checkoutForm->createView(),
            'cart' => $this->cartTransfer,
        ];
    }

    /**
     * @return void
     */
    protected function setCheckoutInitialData()
    {
        $this->createCheckoutRequestTransfer();

        $this->setCartTransfer();
        $this->checkoutRequestTransfer->setCart($this->cartTransfer);

        $this->setShipmentTransfer();
        $this->setPayolutionInstallmentPayments();
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    protected function setCheckoutSubmittedData(Request $request)
    {
        $this->checkoutRequestTransfer = $this->checkoutForm->getData();
        $this->setCheckoutShipment();
        $this->setCheckoutPayolutionPayment($request);
        $this->setCustomerPassword();
    }

    /**
     * @return void
     */
    protected function createCheckoutRequestTransfer()
    {
        $this->checkoutRequestTransfer = new CheckoutRequestTransfer();
    }

    /**
     * @return void
     */
    protected function setCartTransfer()
    {
        $this->cartTransfer = $this
            ->getDependencyContainer()
            ->createCartClient()
            ->getCart();
    }

    /**
     *
     * @return void
     */
    protected function setShipmentTransfer()
    {
        $shipmentMethodAvailabilityTransfer =
            (new ShipmentMethodAvailabilityTransfer())
                ->setCart($this->cartTransfer);

        $this->shipmentTransfer = $this
            ->getDependencyContainer()
            ->createShipmentClient()
            ->getAvailableMethods($shipmentMethodAvailabilityTransfer);
    }

    /**
     * @return void
     */
    protected function setPayolutionInstallmentPayments()
    {
        $this->payolutionCalculationResponseTransfer = $this->cartTransfer->getTotals() === null
            ? new PayolutionCalculationResponseTransfer()
            : $this->getPayolutionCalculationResponseTransfer();
    }

    /**
     * @return PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionCalculationResponseTransfer()
    {
        $addressTransfer = (new AddressTransfer())->setIso2Code(APPLICATION_STORE);
        $payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAddress($addressTransfer)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode());

        $this->checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);

        return $this->payolutionCalculationResponseTransfer = $this
            ->getDependencyContainer()
            ->createPayolutionClient()
            ->calculateInstallmentPayments($this->checkoutRequestTransfer);
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    protected function buildCheckoutForm(Request $request)
    {
        $checkoutFormType = $this
            ->getDependencyContainer()
            ->createCheckoutForm($request, $this->shipmentTransfer, $this->payolutionCalculationResponseTransfer);

        $this->checkoutForm =  $this->createForm($checkoutFormType, $this->checkoutRequestTransfer);
    }

    /**
     * @return void
     */
    protected function setCheckoutShipment()
    {
        $this->setCheckoutShippingAddress();
        $this->setCheckoutShippingMethod();
    }

    /**
     * @return void
     */
    protected function setCheckoutShippingAddress()
    {
        $shippingAddressTransfer = $this->checkoutRequestTransfer->getShippingAddress();
        if ($shippingAddressTransfer->getAddress1() === null) {
            $this->checkoutRequestTransfer->setShippingAddress($this->checkoutRequestTransfer->getBillingAddress());
        }
    }

    /**
     * @return void
     */
    protected function setCheckoutShippingMethod()
    {
        foreach ($this->shipmentTransfer->getMethods() as $shipmentMethodTransfer) {
            if ($shipmentMethodTransfer->getIdShipmentMethod() === $this->checkoutRequestTransfer->getIdShipmentMethod()) {
                $this->checkoutRequestTransfer->setShipmentMethod($shipmentMethodTransfer);

                $shipmentExpenseTransfer = new ExpenseTransfer();
                $shipmentExpenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
                $shipmentExpenseTransfer->setGrossPrice($shipmentMethodTransfer->getPrice());
                $shipmentExpenseTransfer->setName($shipmentMethodTransfer->getName());

                $this->replaceShipmentExpenseInCart($shipmentExpenseTransfer);
            }
        }
    }

    /**
     * @param ExpenseTransfer $expenseTransfer
     *
     * @return void
     */
    protected function replaceShipmentExpenseInCart(ExpenseTransfer $expenseTransfer)
    {
        $otherExpenseCollection = new \ArrayObject();
        foreach ($this->cartTransfer->getExpenses() as $expense) {
            if ($expense->getType() !== ShipmentConstants::SHIPMENT_EXPENSE_TYPE) {
                $otherExpenseCollection->append($expense);
            }
        }
        $this->cartTransfer->setExpenses($otherExpenseCollection);
        $this->cartTransfer->addExpense($expenseTransfer);
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    protected function setCheckoutPayolutionPayment(Request $request)
    {
        $payolutionPaymentTransfer = $this->checkoutRequestTransfer->getPayolutionPayment();
        $billingAddress = $this->checkoutRequestTransfer->getBillingAddress();

        $payolutionPaymentTransfer
            ->setAccountBrand(self::$payolutionPaymentMethodMapper[$this->checkoutRequestTransfer->getPaymentMethod()])
            ->setAddress($billingAddress)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode())
            ->setLanguageIso2Code($billingAddress->getIso2Code())
            ->setGender(self::$payolutionGenderMapper[$billingAddress->getSalutation()])
            ->setClientIp($request->getClientIp())
            ->getAddress()->setEmail($this->checkoutRequestTransfer->getEmail());

        if ($payolutionPaymentTransfer->getAccountBrand() === PayolutionApiConstants::BRAND_INSTALLMENT) {
            $this->setPayolutionInstallmentPayment($payolutionPaymentTransfer);
        }

        $this->checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);
    }

    /**
     * @param PayolutionPaymentTransfer $payolutionPaymentTransfer
     *
     * @return void
     */
    protected function setPayolutionInstallmentPayment(PayolutionPaymentTransfer $payolutionPaymentTransfer)
    {
        $installmentPaymentDetail = $this
            ->payolutionCalculationResponseTransfer
            ->getPaymentDetails()[$payolutionPaymentTransfer->getInstallmentPaymentDetailIndex()];

        $payolutionPaymentTransfer
            ->setInstallmentAmount($installmentPaymentDetail->getInstallments()[0]->getAmount())
            ->setInstallmentDuration($installmentPaymentDetail->getDuration());
    }

    /**
     * @return void
     */
    protected function setCustomerPassword()
    {
        $createAccount = $this->checkoutForm[CheckoutType::FIELD_CREATE_ACCOUNT]->getData();

        if ($createAccount) {
            $this->checkoutRequestTransfer->setCustomerPassword($this->checkoutForm[CheckoutType::FIELD_PASSWORD]->getData());
        }
    }

    /**
     * @return CheckoutResponseTransfer
     */
    protected function requestCheckout()
    {
        return $this->getDependencyContainer()
            ->createCheckoutClient()
            ->requestCheckout($this->checkoutRequestTransfer);
    }

    /**
     * @return void
     */
    protected function clearCart()
    {
        $this->getDependencyContainer()->createCartClient()->clearCart();
    }

    /**
     * @param CheckoutErrorTransfer[] $errors
     *
     * @return JsonResponse
     */
    protected function getErrors($errors)
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
    protected function redirectSuccess(CheckoutResponseTransfer $checkoutResponseTransfer)
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
     * @param Request $request
     *
     * @return array
     */
    public function successAction(Request $request)
    {
        //@todo add success page
    }

}
