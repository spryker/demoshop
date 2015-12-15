<?php

namespace Pyz\Yves\Checkout\Controller;

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
use Pyz\Yves\Checkout\Form\CheckoutType;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Spryker\Shared\Payolution\PayolutionConfigConstants;
use Spryker\Yves\Application\Controller\AbstractController;
use Pyz\Yves\Checkout\CheckoutDependencyContainer;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Payolution\PayolutionApiConstants;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Message\Response as GuzzleResponse;

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
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $checkoutRequestTransfer = $this->createCheckoutRequestTransfer();
        $cartTransfer = $this->getCartTransfer();
        $checkoutRequestTransfer->setCart($cartTransfer);
        $shipmentTransfer = $this->getShipmentTransfer($cartTransfer);
        $payolutionInstallmentPayments = $this->getPayolutionInstallmentPayments($checkoutRequestTransfer, $cartTransfer);

        $checkoutForm = $this->buildCheckoutForm($checkoutRequestTransfer, $shipmentTransfer, $payolutionInstallmentPayments, $request);

        return [
            'form' => $checkoutForm->createView(),
            'cart' => $cartTransfer,
        ];
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function buyAction(Request $request)
    {
        $checkoutRequestTransfer = $this->createCheckoutRequestTransfer();
        $cartTransfer = $this->getCartTransfer();
        $checkoutRequestTransfer->setCart($cartTransfer);
        $shipmentTransfer = $this->getShipmentTransfer($cartTransfer);
        $payolutionInstallmentPayments = $this->getPayolutionInstallmentPayments($checkoutRequestTransfer, $cartTransfer);

        $checkoutForm = $this->buildCheckoutForm($checkoutRequestTransfer, $shipmentTransfer, $payolutionInstallmentPayments, $request);

        if ($checkoutForm->isValid()) {
            $this->setCheckoutSubmittedData($cartTransfer, $shipmentTransfer, $payolutionInstallmentPayments, $checkoutForm, $request);

            $checkoutResponseTransfer = $this->requestCheckout($checkoutRequestTransfer);
            if (!$checkoutResponseTransfer->getIsSuccess()) {
                $this->getDependencyContainer()->getPayolutionClient()->removeInstallmentPaymentsFromSession();
                return $this->getErrors($checkoutResponseTransfer->getErrors());
            }

            $this->clearSession();

            return $this->redirectSuccess($checkoutResponseTransfer);
        }

        return [
            'form' => $checkoutForm->createView(),
            'cart' => $cartTransfer,
        ];
    }

    /**
     * @param CartTransfer $cartTransfer
     * @param ShipmentTransfer $shipmentTransfer
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param FormInterface $checkoutForm
     * @param Request $request
     */
    protected function setCheckoutSubmittedData(
        CartTransfer $cartTransfer,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        FormInterface $checkoutForm,
        Request $request
    ) {
        $checkoutRequestTransfer = $checkoutForm->getData();
        $this->setCheckoutShipment($checkoutRequestTransfer, $cartTransfer, $shipmentTransfer);
        $this->setCheckoutPayolutionPayment($checkoutRequestTransfer, $payolutionCalculationResponseTransfer, $request);
        $this->setCustomerPassword($checkoutRequestTransfer, $checkoutForm);
    }

    /**
     * @return CheckoutRequestTransfer
     */
    protected function createCheckoutRequestTransfer()
    {
        return new CheckoutRequestTransfer();
    }

    /**
     * @return CartTransfer
     */
    protected function getCartTransfer()
    {
        return $this
            ->getDependencyContainer()
            ->getCartClient()
            ->getCart();
    }

    /**
     * @param CartTransfer $cartTransfer
     *
     * @return ShipmentTransfer
     */
    protected function getShipmentTransfer(CartTransfer $cartTransfer)
    {
        $shipmentMethodAvailabilityTransfer = (new ShipmentMethodAvailabilityTransfer())->setCart($cartTransfer);

        return $this
            ->getDependencyContainer()
            ->getShipmentClient()
            ->getAvailableMethods($shipmentMethodAvailabilityTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param CartTransfer $cartTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionInstallmentPayments(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer)
    {
        // @ todo: optimize and get rid of this check #875
        return $cartTransfer->getTotals() === null
            ? new PayolutionCalculationResponseTransfer()
            : $this->getPayolutionCalculationResponseTransfer($checkoutRequestTransfer, $cartTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param CartTransfer $cartTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionCalculationResponseTransfer(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer)
    {
        $addressTransfer = (new AddressTransfer())->setIso2Code(APPLICATION_STORE);
        $payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAddress($addressTransfer)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode());
        $checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);

        $payolutionCalculationResponseTransfer = $this->getDependencyContainer()->getPayolutionClient()->hasInstallmentPaymentsInSession()
            ? $this->getPayolutionInstallmentPaymentsFromSession($checkoutRequestTransfer)
            : $this->calculatePayolutionInstallmentPayments($checkoutRequestTransfer);

        return $cartTransfer->getTotals()->getGrandTotal() === $payolutionCalculationResponseTransfer->getPaymentDetails()[0]->getOriginalAmount()
            ? $payolutionCalculationResponseTransfer
            : $this->calculatePayolutionInstallmentPayments($checkoutRequestTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function calculatePayolutionInstallmentPayments(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $payolutionCalculationResponseTransfer = $this
            ->getDependencyContainer()
            ->getPayolutionClient()
            ->calculateInstallmentPayments($checkoutRequestTransfer);

        return $this->storePayolutionInstallmentPaymentsInSession($payolutionCalculationResponseTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionInstallmentPaymentsFromSession(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        return $this
            ->getDependencyContainer()
            ->getPayolutionClient()
            ->getInstallmentPaymentsFromSession();
    }

    /**
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     *
     * @return PayolutionCalculationResponseTransfer
     */
    protected function storePayolutionInstallmentPaymentsInSession(PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer)
    {
        return $this->getDependencyContainer()
            ->getPayolutionClient()
            ->storeInstallmentPaymentsInSession($payolutionCalculationResponseTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param ShipmentTransfer $shipmentTransfer
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param Request $request
     *
     * @return FormInterface
     */
    protected function buildCheckoutForm(
        CheckoutRequestTransfer $checkoutRequestTransfer,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        Request $request
    ) {
        $checkoutFormType = $this
            ->getDependencyContainer()
            ->createCheckoutForm($request, $shipmentTransfer, $payolutionCalculationResponseTransfer);

        return $this->createForm($checkoutFormType, $checkoutRequestTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param CartTransfer $cartTransfer
     * @param ShipmentTransfer $shipmentTransfer
     *
     * @return void
     */
    protected function setCheckoutShipment(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer, ShipmentTransfer $shipmentTransfer)
    {
        $this->setCheckoutShippingAddress($checkoutRequestTransfer);
        $this->setCheckoutShippingMethod($checkoutRequestTransfer, $cartTransfer, $shipmentTransfer);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return void
     */
    protected function setCheckoutShippingAddress(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $shippingAddressTransfer = $checkoutRequestTransfer->getShippingAddress();
        if ($shippingAddressTransfer->getAddress1() === null) {
            $checkoutRequestTransfer->setShippingAddress($checkoutRequestTransfer->getBillingAddress());
        }
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param CartTransfer $cartTransfer
     * @param ShipmentTransfer $shipmentTransfer
     *
     * @return void
     */
    protected function setCheckoutShippingMethod(
        CheckoutRequestTransfer $checkoutRequestTransfer,
        CartTransfer $cartTransfer,
        ShipmentTransfer $shipmentTransfer
    ) {
        foreach ($shipmentTransfer->getMethods() as $shipmentMethodTransfer) {
            if ($shipmentMethodTransfer->getIdShipmentMethod() === $checkoutRequestTransfer->getIdShipmentMethod()) {
                $checkoutRequestTransfer->setShipmentMethod($shipmentMethodTransfer);

                $shipmentExpenseTransfer = new ExpenseTransfer();
                $shipmentExpenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
                $shipmentExpenseTransfer->setGrossPrice($shipmentMethodTransfer->getPrice());
                $shipmentExpenseTransfer->setName($shipmentMethodTransfer->getName());
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
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param Request $request
     *
     * @return void
     */
    protected function setCheckoutPayolutionPayment(
        CheckoutRequestTransfer $checkoutRequestTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        Request $request
    ) {
        $payolutionPaymentTransfer = $checkoutRequestTransfer->getPayolutionPayment();
        $billingAddress = $checkoutRequestTransfer->getBillingAddress();

        $payolutionPaymentTransfer
            ->setAccountBrand(self::$payolutionPaymentMethodMapper[$checkoutRequestTransfer->getPaymentMethod()])
            ->setAddress($billingAddress)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode())
            ->setLanguageIso2Code($billingAddress->getIso2Code())
            ->setGender(self::$payolutionGenderMapper[$billingAddress->getSalutation()])
            ->setClientIp($request->getClientIp());

        $payolutionPaymentTransfer->getAddress()
            ->setEmail($checkoutRequestTransfer->getEmail());

        if ($payolutionPaymentTransfer->getAccountBrand() === PayolutionApiConstants::BRAND_INSTALLMENT) {
            $this->setPayolutionInstallmentPayment($payolutionPaymentTransfer, $payolutionCalculationResponseTransfer);
        }

        $checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);
    }

    /**
     * @param PayolutionPaymentTransfer $payolutionPaymentTransfer
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     *
     * @return void
     */
    protected function setPayolutionInstallmentPayment(
        PayolutionPaymentTransfer $payolutionPaymentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
    ) {
        $installmentPaymentDetail = $payolutionCalculationResponseTransfer
            ->getPaymentDetails()[$payolutionPaymentTransfer->getInstallmentPaymentDetailIndex()];

        $payolutionPaymentTransfer
            ->setInstallmentCalculationId($payolutionCalculationResponseTransfer->getIdentificationUniqueid())
            ->setInstallmentAmount($installmentPaymentDetail->getInstallments()[0]->getAmount())
            ->setInstallmentDuration($installmentPaymentDetail->getDuration());
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     * @param FormInterface $checkoutForm
     *
     * @return void
     */
    protected function setCustomerPassword(CheckoutRequestTransfer $checkoutRequestTransfer, FormInterface $checkoutForm)
    {
        $createAccount = $checkoutForm[CheckoutType::FIELD_CREATE_ACCOUNT]->getData();

        if ($createAccount) {
            $checkoutRequestTransfer->setCustomerPassword($checkoutForm[CheckoutType::FIELD_PASSWORD]->getData());
        }
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return CheckoutResponseTransfer
     */
    protected function requestCheckout(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        return $this->getDependencyContainer()
            ->getCheckoutClient()
            ->requestCheckout($checkoutRequestTransfer);
    }

    /**
     * @return void
     */
    protected function clearSession()
    {
        $this->getDependencyContainer()->getCartClient()->clearCart();
        $this->getDependencyContainer()->getPayolutionClient()->removeInstallmentPaymentsFromSession();
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
        return $this->viewResponse();
    }

    /**
     * @param string $calculationRequestId
     * @param string $installmentDuration
     *
     * @return GuzzleResponse
     */
    public function displayInstallmentDetailsAction($calculationRequestId, $installmentDuration)
    {
        $client = new GuzzleClient();
        $requestCredentials = $this->getDependencyContainer()->getPayolutionCalculationCredentials();
        $url = 'https://test-payment.payolution.com/payolution-payment/rest/query/customerinfo/pdf?trxId=' . $calculationRequestId . '&duration=' . $installmentDuration;

        $request = $client->get($url);
        $request->setAuth(
            $requestCredentials[PayolutionConfigConstants::CALCULATION_USER_LOGIN],
            $requestCredentials[PayolutionConfigConstants::CALCULATION_USER_PASSWORD]
        );
        $response = $request->send();

        $attachmentFileName = 'payolution_payment_detail_' . $installmentDuration . '.pdf';
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $attachmentFileName);
        header('Content-Length: '.strlen($response));

        return $response;
    }

}
