<?php

namespace Pyz\Yves\Checkout\Controller;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Guzzle\Http\Client as GuzzleClient;
use Orm\Zed\Payolution\Persistence\Map\SpyPaymentPayolutionTableMap;
use Pyz\Yves\Checkout\Form\CheckoutType;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Shipment\ShipmentConstants;
use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Checkout\CheckoutFactory getFactory()
 */
class CheckoutController extends AbstractController
{

    /**
     * @var array
     */
    protected static $payolutionPaymentMethodMapper = [
        'payolution_invoice' => PayolutionConstants::BRAND_INVOICE,
        'payolution_installment' => PayolutionConstants::BRAND_INSTALLMENT,
    ];

    /**
     * @var array
     */
    protected static $payolutionGenderMapper = [
        'Mr' => SpyPaymentPayolutionTableMap::COL_GENDER_MALE,
        'Mrs' => SpyPaymentPayolutionTableMap::COL_GENDER_FEMALE,
    ];

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function buyAction(Request $request)
    {
        $checkoutRequestTransfer = $this->createCheckoutRequestTransfer();
        $cartTransfer = $this->getCartTransfer();
        $checkoutRequestTransfer->setCart($cartTransfer);
        $shipmentTransfer = $this->getShipmentTransfer($cartTransfer);
        $payolutionInstallmentPayments = $this->getPayolutionInstallmentPayments($checkoutRequestTransfer, $cartTransfer);

        $checkoutForm = $this->buildCheckoutForm($checkoutRequestTransfer, $shipmentTransfer, $payolutionInstallmentPayments, $request);
        $checkoutForm->handleRequest($request);

        if ($checkoutForm->isValid()) {
            $this->setCheckoutSubmittedData($cartTransfer, $shipmentTransfer, $payolutionInstallmentPayments, $checkoutForm, $request);

            $checkoutResponseTransfer = $this->requestCheckout($checkoutRequestTransfer);
            if (!$checkoutResponseTransfer->getIsSuccess()) {
                $this->getFactory()->getPayolutionClient()->removeInstallmentPaymentsFromSession();

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
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param \Symfony\Component\Form\FormInterface $checkoutForm
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
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
     * @return \Generated\Shared\Transfer\CheckoutRequestTransfer
     */
    protected function createCheckoutRequestTransfer()
    {
        return new CheckoutRequestTransfer();
    }

    /**
     * @return \Generated\Shared\Transfer\CartTransfer
     */
    protected function getCartTransfer()
    {
        return $this
            ->getFactory()
            ->getCartClient()
            ->getCart();
    }

    /**
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentTransfer
     */
    protected function getShipmentTransfer(CartTransfer $cartTransfer)
    {
        $shipmentMethodAvailabilityTransfer = (new ShipmentMethodAvailabilityTransfer())->setCart($cartTransfer);

        return $this
            ->getFactory()
            ->getShipmentClient()
            ->getAvailableMethods($shipmentMethodAvailabilityTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionInstallmentPayments(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer)
    {
        // @ todo: optimize and get rid of this check #875
        return $cartTransfer->getTotals() === null
            ? new PayolutionCalculationResponseTransfer()
            : $this->getPayolutionCalculationResponseTransfer($checkoutRequestTransfer, $cartTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionCalculationResponseTransfer(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer)
    {
        $addressTransfer = (new AddressTransfer())->setIso2Code(APPLICATION_STORE);
        $payolutionPaymentTransfer = (new PayolutionPaymentTransfer())
            ->setAddress($addressTransfer)
            ->setCurrencyIso3Code(CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode());
        $checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);

        $payolutionCalculationResponseTransfer = $this->getFactory()->getPayolutionClient()->hasInstallmentPaymentsInSession()
            ? $this->getPayolutionInstallmentPaymentsFromSession($checkoutRequestTransfer)
            : $this->calculatePayolutionInstallmentPayments($checkoutRequestTransfer);

        return $cartTransfer->getTotals()->getGrandTotal() === $payolutionCalculationResponseTransfer->getPaymentDetails()[0]->getOriginalAmount()
            ? $payolutionCalculationResponseTransfer
            : $this->calculatePayolutionInstallmentPayments($checkoutRequestTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function calculatePayolutionInstallmentPayments(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        $payolutionCalculationResponseTransfer = $this
            ->getFactory()
            ->getPayolutionClient()
            ->calculateInstallmentPayments($checkoutRequestTransfer);

        return $this->storePayolutionInstallmentPaymentsInSession($payolutionCalculationResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function getPayolutionInstallmentPaymentsFromSession(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        return $this
            ->getFactory()
            ->getPayolutionClient()
            ->getInstallmentPaymentsFromSession();
    }

    /**
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function storePayolutionInstallmentPaymentsInSession(PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer)
    {
        return $this->getFactory()
            ->getPayolutionClient()
            ->storeInstallmentPaymentsInSession($payolutionCalculationResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function buildCheckoutForm(
        CheckoutRequestTransfer $checkoutRequestTransfer,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        Request $request
    ) {
        return $this->getFactory()->createCheckoutForm($request, $shipmentTransfer, $payolutionCalculationResponseTransfer, $checkoutRequestTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     *
     * @return void
     */
    protected function setCheckoutShipment(CheckoutRequestTransfer $checkoutRequestTransfer, CartTransfer $cartTransfer, ShipmentTransfer $shipmentTransfer)
    {
        $this->setCheckoutShippingAddress($checkoutRequestTransfer);
        $this->setCheckoutShippingMethod($checkoutRequestTransfer, $cartTransfer, $shipmentTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
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
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
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
     * @param \Generated\Shared\Transfer\CartTransfer $cartTransfer
     * @param \Generated\Shared\Transfer\ExpenseTransfer $expenseTransfer
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
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param \Symfony\Component\HttpFoundation\Request $request
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

        if ($payolutionPaymentTransfer->getAccountBrand() === PayolutionConstants::BRAND_INSTALLMENT) {
            $this->setPayolutionInstallmentPayment($payolutionPaymentTransfer, $payolutionCalculationResponseTransfer);
        }

        $checkoutRequestTransfer->setPayolutionPayment($payolutionPaymentTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PayolutionPaymentTransfer $payolutionPaymentTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
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
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     * @param \Symfony\Component\Form\FormInterface $checkoutForm
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
     * @param \Generated\Shared\Transfer\CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CheckoutResponseTransfer
     */
    protected function requestCheckout(CheckoutRequestTransfer $checkoutRequestTransfer)
    {
        return $this->getFactory()
            ->getCheckoutClient()
            ->requestCheckout($checkoutRequestTransfer);
    }

    /**
     * @return void
     */
    protected function clearSession()
    {
        $this->getFactory()->getCartClient()->clearCart();
        $this->getFactory()->getPayolutionClient()->removeInstallmentPaymentsFromSession();
    }

    /**
     * @param \Generated\Shared\Transfer\CheckoutErrorTransfer[] $errors
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
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
     * @param \Generated\Shared\Transfer\CheckoutResponseTransfer $checkoutResponseTransfer
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
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
     * @param \Symfony\Component\HttpFoundation\Request $request
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
     * @return \Guzzle\Http\Message\Response
     */
    public function displayInstallmentDetailsAction($calculationRequestId, $installmentDuration)
    {
        $client = new GuzzleClient();
        $requestCredentials = $this->getFactory()->getPayolutionCalculationCredentials();
        $url = 'https://test-payment.payolution.com/payolution-payment/rest/query/customerinfo/pdf?trxId=' . $calculationRequestId . '&duration=' . $installmentDuration;

        $request = $client->get($url);
        $request->setAuth(
            $requestCredentials[PayolutionConstants::CALCULATION_USER_LOGIN],
            $requestCredentials[PayolutionConstants::CALCULATION_USER_PASSWORD]
        );
        $response = $request->send();

        $attachmentFileName = 'payolution_payment_detail_' . $installmentDuration . '.pdf';
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename=' . $attachmentFileName);
        header('Content-Length: ' . strlen($response));

        return $response;
    }

}
