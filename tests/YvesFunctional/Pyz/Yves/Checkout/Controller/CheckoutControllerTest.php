<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesFunctional\Pyz\Yves\Checkout\Controller;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use PHPUnit_Framework_TestCase;
use Pyz\Yves\Checkout\Controller\CheckoutController;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Customer\Form\AddressForm;
use Pyz\Yves\Customer\Form\GuestForm;
use ReflectionProperty;
use Spryker\Client\Cart\CartClient;
use Spryker\Client\Session\SessionClient;
use Spryker\Client\ZedRequest\Client\HttpClient;
use Spryker\Shared\Price\PriceMode;
use Spryker\Shared\Shipment\ShipmentConstants;
use Spryker\Yves\DummyPayment\Form\AbstractSubForm;
use Spryker\Yves\Kernel\Plugin\Pimple;
use Spryker\Zed\DummyPayment\DummyPaymentConfig;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @group YvesFunctional
 * @group Pyz
 * @group Yves
 * @group Checkout
 * @group Controller
 * @group CheckoutControllerTest
 */
class CheckoutControllerTest extends PHPUnit_Framework_TestCase
{

    const CUSTOMER_URL = '/checkout/customer';
    const CUSTOMER_ACTION = 'customerAction';
    const CUSTOMER_ROUTE = 'checkout-customer';
    const GUEST_FORM = 'guestForm';
    const CUSTOMER_EMAIL = 'hans@muster.de';

    const ADDRESS_URL = '/checkout/address';
    const ADDRESS_ACTION = 'addressAction';
    const ADDRESS_ROUTE = 'checkout-address';
    const ADDRESS_FORM = 'addressesForm';

    const SHIPMENT_URL = '/checkout/shipment';
    const SHIPMENT_ACTION = 'shipmentAction';
    const SHIPMENT_ROUTE = 'checkout-shipment';
    const SHIPMENT_FORM = 'shipmentForm';

    const PAYMENT_URL = '/checkout/payment';
    const PAYMENT_ACTION = 'paymentAction';
    const PAYMENT_ROUTE = 'checkout-payment';
    const PAYMENT_FORM = 'paymentForm';

    const SUMMARY_URL = '/checkout/summary';
    const SUMMARY_ACTION = 'summaryAction';
    const SUMMARY_ROUTE = 'checkout-summary';
    const SUMMARY_FORM = 'summaryForm';

    const PLACE_ORDER_URL = '/checkout/place-order';
    const PLACE_ORDER_ACTION = 'placeOrderAction';
    const PLACE_ORDER_ROUTE = 'checkout-place-order';

    const SUCCESS_URL = '/checkout/success';

    /**
     * @var \Pyz\Yves\Checkout\Controller\CheckoutController
     */
    private $controller;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->skipIfCi();
        $this->controller = new CheckoutController();

        $sessionClient = new SessionClient();
        $pimple = new Pimple();
        $sessionContainer = $pimple->getApplication()['session'];
        $sessionClient->setContainer($sessionContainer);
    }

    /**
     * @return void
     */
    protected function skipIfCi()
    {
        if (getenv('CIRCLECI') || getenv('TRAVIS')) {
            $this->markTestSkipped('CircleCi/Travis not set up properly');
        }
    }

    /**
     * @return void
     */
    public function testIndexAction()
    {
        $checkoutController = new CheckoutController();

        $this->setQuoteForCustomer();

        $request = new Request();
        $request->request->set('_route', CheckoutControllerProvider::CHECKOUT_INDEX);
        $response = $checkoutController->indexAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::CUSTOMER_URL);
    }

    /**
     * @return void
     */
    public function testCustomerActionShouldRenderRegisterAndLoginForms()
    {
        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_CUSTOMER);

        $response = $this->controller->customerAction($request);

        $this->assertArrayHasKey('guestForm', $response);
        $this->assertArrayHasKey('loginForm', $response);
        $this->assertArrayHasKey('registerForm', $response);
    }

    /**
     * @return void
     */
    public function testCustomerAction()
    {
        $this->setQuoteForCustomer();

        $customerData = $this->getFormData(self::CUSTOMER_URL, self::CUSTOMER_ACTION, self::CUSTOMER_ROUTE, self::GUEST_FORM);
        $customerData['customer'][GuestForm::FIELD_SALUTATION] = 'Mr';
        $customerData['customer'][GuestForm::FIELD_FIRST_NAME] = 'Hans';
        $customerData['customer'][GuestForm::FIELD_LAST_NAME] = 'Muster';
        $customerData['customer'][GuestForm::FIELD_EMAIL] = self::CUSTOMER_EMAIL;
        $customerData['customer'][GuestForm::FIELD_ACCEPT_TERMS] = true;
        $customerData['customer']['is_guest'] = true;
        $data = [
            'guestForm' => $customerData,
        ];

        $request = Request::create(self::CUSTOMER_URL, Request::METHOD_POST, $data);
        $request->request->set('_route', self::CUSTOMER_ROUTE);

        $response = $this->controller->customerAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::ADDRESS_URL);
    }

    /**
     * @return void
     */
    public function testAddressActionShouldRenderAddressForms()
    {
        $this->setQuoteForAddress();

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_ADDRESS);

        $response = $this->controller->addressAction($request);

        $this->assertArrayHasKey('addressesForm', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testAddressAction()
    {
        $this->setQuoteForAddress();

        $addressesData = $this->getFormData(self::ADDRESS_URL, self::ADDRESS_ACTION, self::ADDRESS_ROUTE, self::ADDRESS_FORM);
        $address = [
            AddressForm::FIELD_SALUTATION => 'Mr',
            AddressForm::FIELD_FIRST_NAME => 'Hans',
            AddressForm::FIELD_LAST_NAME => 'Muster',
            AddressForm::FIELD_ADDRESS_1 => 'Any Street',
            AddressForm::FIELD_ADDRESS_2 => '23',
            AddressForm::FIELD_CITY => 'Berlin',
            AddressForm::FIELD_ZIP_CODE => '12347',
            AddressForm::FIELD_ISO_2_CODE => 'DE',
        ];
        $addressesData['billingAddress'] = $address;
        $addressesData['shippingAddress'] = $address;
        $data = [
            self::ADDRESS_FORM => $addressesData,
        ];

        $request = Request::create(self::ADDRESS_URL, Request::METHOD_POST, $data);
        $request->request->set('_route', self::ADDRESS_ROUTE);

        $response = $this->controller->addressAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::SHIPMENT_URL);
    }

    /**
     * @return void
     */
    public function testShipmentActionShouldRenderShipmentForms()
    {
        $this->setQuoteForShipment();

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SHIPMENT);

        $response = $this->controller->shipmentAction($request);

        $this->assertArrayHasKey('shipmentForm', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testShipmentAction()
    {
        $this->setQuoteForShipment();

        $shipmentData = $this->getFormData(self::SHIPMENT_URL, self::SHIPMENT_ACTION, self::SHIPMENT_ROUTE, self::SHIPMENT_FORM);
        $shipmentData['idShipmentMethod'] = 1;
        $data = [
            self::SHIPMENT_FORM => $shipmentData,
        ];

        $request = Request::create(self::SHIPMENT_URL, Request::METHOD_POST, $data);
        $request->request->set('_route', self::SHIPMENT_ROUTE);

        $response = $this->controller->shipmentAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::PAYMENT_URL);
    }

    /**
     * @return void
     */
    public function testPaymentActionShouldRenderPaymentForms()
    {
        $this->allowMoreThenOneRequestToZed();

        $this->setQuoteForPayment();

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_PAYMENT);

        $response = $this->controller->paymentAction($request);

        $this->assertArrayHasKey('paymentForm', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * This test only works with DummyPayment
     *
     * @return void
     */
    public function testPaymentAction()
    {
        $this->allowMoreThenOneRequestToZed();

        $this->setQuoteForPayment();

        $paymentData = $this->getFormData(self::PAYMENT_URL, self::PAYMENT_ACTION, self::PAYMENT_ROUTE, self::PAYMENT_FORM);
        $paymentData[PaymentForm::PAYMENT_SELECTION] = DummyPaymentConfig::PAYMENT_METHOD_INVOICE;

        $paymentData[DummyPaymentConfig::PAYMENT_METHOD_INVOICE] = [
            AbstractSubForm::FIELD_DATE_OF_BIRTH => '06.12.1980',
        ];

        $data = [
            self::PAYMENT_FORM => $paymentData,
        ];

        $request = Request::create(self::PAYMENT_URL, Request::METHOD_POST, $data);
        $request->request->set('_route', self::PAYMENT_ROUTE);

        $response = $this->controller->paymentAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::SUMMARY_URL);
    }

    /**
     * @return void
     */
    public function testSummaryActionShouldRenderSummaryPage()
    {
        $this->setQuoteForSummary();

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUMMARY);

        $response = $this->controller->summaryAction($request);

        $this->assertArrayHasKey('summaryForm', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testSummaryAction()
    {
        $this->allowMoreThenOneRequestToZed();

        $this->setQuoteForSummary();

        $summaryData = $this->getFormData(self::SUMMARY_URL, self::SUMMARY_ACTION, self::SUMMARY_ROUTE, self::SUMMARY_FORM);
        $data = [
            self::SUMMARY_FORM => $summaryData,
        ];

        $request = Request::create(self::SUMMARY_URL, Request::METHOD_POST, $data);
        $request->request->set('_route', self::SUMMARY_ROUTE);

        $response = $this->controller->summaryAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::PLACE_ORDER_URL);
    }

    /**
     * @return void
     */
    public function testPlaceOrder()
    {
        $this->markTestIncomplete('Request data missing');
        $this->setQuoteForSummary();

        $request = Request::create(self::PLACE_ORDER_URL, Request::METHOD_POST);
        $request->request->set('_route', self::PLACE_ORDER_ROUTE);
        $response = $this->controller->placeOrderAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertSame($response->getTargetUrl(), self::SUCCESS_URL);
    }

    /**
     * @return void
     */
    private function setQuoteForCustomer()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setPriceMode(PriceMode::PRICE_MODE_GROSS);

        $itemTransfer = new ItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        $cartClient = new CartClient();
        $cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return void
     */
    private function setQuoteForAddress()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setPriceMode(PriceMode::PRICE_MODE_GROSS);

        $itemTransfer = new ItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(false);
        $quoteTransfer->setCustomer($customerTransfer);

        $cartClient = new CartClient();
        $cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return void
     */
    private function setQuoteForShipment()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setPriceMode(PriceMode::PRICE_MODE_GROSS);

        $itemTransfer = new ItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(false);
        $quoteTransfer->setCustomer($customerTransfer);

        $addressTransfer = new AddressTransfer();
        $address = [
            AddressForm::FIELD_SALUTATION => 'Mr',
            AddressForm::FIELD_FIRST_NAME => 'Hans',
            AddressForm::FIELD_LAST_NAME => 'Muster',
            AddressForm::FIELD_ADDRESS_1 => 'Any Street',
            AddressForm::FIELD_ADDRESS_2 => '23',
            AddressForm::FIELD_CITY => 'Berlin',
            AddressForm::FIELD_ZIP_CODE => '12347',
            AddressForm::FIELD_ISO_2_CODE => 'DE',
        ];
        $addressTransfer->fromArray($address);
        $quoteTransfer->setBillingAddress($addressTransfer);
        $quoteTransfer->setShippingAddress($addressTransfer);

        $cartClient = new CartClient();
        $cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return void
     */
    private function setQuoteForPayment()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setPriceMode(PriceMode::PRICE_MODE_GROSS);

        $itemTransfer = new ItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(false);
        $quoteTransfer->setCustomer($customerTransfer);

        $addressTransfer = new AddressTransfer();
        $address = [
            AddressForm::FIELD_SALUTATION => 'Mr',
            AddressForm::FIELD_FIRST_NAME => 'Hans',
            AddressForm::FIELD_LAST_NAME => 'Muster',
            AddressForm::FIELD_ADDRESS_1 => 'Any Street',
            AddressForm::FIELD_ADDRESS_2 => '23',
            AddressForm::FIELD_CITY => 'Berlin',
            AddressForm::FIELD_ZIP_CODE => '12347',
            AddressForm::FIELD_ISO_2_CODE => 'DE',
        ];
        $addressTransfer->fromArray($address);
        $quoteTransfer->setBillingAddress($addressTransfer);
        $quoteTransfer->setShippingAddress($addressTransfer);

        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $quoteTransfer->addExpense($expenseTransfer);

        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer->setGrandTotal(10000);
        $quoteTransfer->setTotals($totalsTransfer);

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('paymentProvider');
        $quoteTransfer->setPayment($paymentTransfer);

        $cartClient = new CartClient();
        $cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return void
     */
    private function setQuoteForSummary()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->setPriceMode(PriceMode::PRICE_MODE_GROSS);

        $itemTransfer = new ItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setIsGuest(false);
        $quoteTransfer->setCustomer($customerTransfer);

        $addressTransfer = new AddressTransfer();
        $address = [
            AddressForm::FIELD_SALUTATION => 'Mr',
            AddressForm::FIELD_FIRST_NAME => 'Hans',
            AddressForm::FIELD_LAST_NAME => 'Muster',
            AddressForm::FIELD_ADDRESS_1 => 'Any Street',
            AddressForm::FIELD_ADDRESS_2 => '23',
            AddressForm::FIELD_CITY => 'Berlin',
            AddressForm::FIELD_ZIP_CODE => '12347',
            AddressForm::FIELD_ISO_2_CODE => 'DE',
        ];
        $addressTransfer->fromArray($address);
        $quoteTransfer->setBillingAddress($addressTransfer);
        $quoteTransfer->setShippingAddress($addressTransfer);

        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $expenseTransfer->setUnitGrossPrice(1000);
        $expenseTransfer->setQuantity(1);
        $quoteTransfer->addExpense($expenseTransfer);

        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer->setGrandTotal(10000);
        $quoteTransfer->setTotals($totalsTransfer);

        $shipmentTransfer = new ShipmentTransfer();
        $quoteTransfer->setShipment($shipmentTransfer);

        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('paymentProvider');
        $quoteTransfer->setPayment($paymentTransfer);

        $cartClient = new CartClient();
        $cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $url
     * @param string $actionName
     * @param string $routeName
     * @param string $formName
     *
     * @return array
     */
    protected function getFormData($url, $actionName, $routeName, $formName)
    {
        $request = Request::create($url, 'GET');
        $request->request->set('_route', $routeName);

        $result = $this->controller->$actionName($request);

        return $this->getFormDataFromResult($result[$formName]);
    }

    /**
     * @param \Symfony\Component\Form\FormView $formView
     *
     * @return array
     */
    protected function getFormDataFromResult(FormView $formView)
    {
        $customerData = [];
        foreach ($formView->getIterator() as $item) {
            $customerData[$item->vars['name']] = $item->vars['value'];
        }

        return $customerData;
    }

    /**
     * @return void
     */
    protected function allowMoreThenOneRequestToZed()
    {
        $reflectionProperty = new ReflectionProperty(HttpClient::class, 'alreadyRequested');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue(null, false);

        $reflectionProperty = new ReflectionProperty(HttpClient::class, 'requestCounter');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue(null, 0);
    }

}
