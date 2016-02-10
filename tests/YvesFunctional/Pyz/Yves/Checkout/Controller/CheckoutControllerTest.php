<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesFunctional\Pyz\Yves\Checkout\Controller;

use Codeception\TestCase\Test;
use Generated\Shared\Transfer\AddressesTransfer;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\SaveOrderTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\CheckoutFactory;
use Pyz\Yves\Checkout\Controller\CheckoutController;
use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Client\Kernel\Locator;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\StepFactory;
use Pyz\Client\Customer\CustomerClient;

class CheckoutControllerTest extends Test
{

    /**
     * @return void
     */
    public function testIndexActionShouldReturnRedirectResponse()
    {
        $checkoutController = $this->createCheckoutControllerMock($this->createQuoteTransfer());
        $result = $checkoutController->indexAction(Request::createfromGlobals());
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @return void
     */
    public function testCustomerStepShouldRenderRegisterAndLoginForms()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();
        $cartClient->storeQuoteToSession($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_CUSTOMER);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);
        $response = $checkoutController->customerAction($request);

        $this->assertArrayHasKey('guestForm', $response);
        $this->assertArrayHasKey('loginForm', $response);
        $this->assertArrayHasKey('registerForm', $response);

    }

    /**
     * @return void
     */
    public function testAddressStepShouldRenderAddressForms()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);
        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_ADDRESS);

        $response = $checkoutController->addressAction($request);

        $this->assertArrayHasKey('addressesForm', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }


    /**
     * @return void
     */
    public function testShipmentStepShouldRenderShipmentForms()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SHIPMENT);

        $response = $checkoutController->shipmentAction($request);

        $this->assertArrayHasKey('shipmentForm', $response);
        $this->assertArrayHasKey('shipmentMethodsSubForms', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);

    }

    /**
     * @return void
     */
    public function testPaymentStepShouldRenderPaymenttForms()
    {

        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_PAYMENT);

        $response = $checkoutController->paymentAction($request);

        $this->assertArrayHasKey('paymentMethodsSubForms', $response);
        $this->assertArrayHasKey('paymentForm', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testSummaryStepShouldRenderSummaryPage()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUMMARY);

        $response = $checkoutController->summaryAction($request);

        $this->assertArrayHasKey('summaryForm', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testPlaceOrderShouldReturnRedirectAndOrderReferenceIndicatingSuccess()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_PLACE_ORDER);

        $response = $checkoutController->placeOrderAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $quoteTransfer = $this->getCartClient()->getQuote();
        $this->assertEquals('#1', $quoteTransfer->getOrderReference());
    }

    /**
     * @return void
     */
    public function testSuccessStepShouldClearQuoteIfOrderWasPlaced()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $quoteTransfer->setOrderReference('#1');

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUCCESS);

        $response = $checkoutController->successAction($request);

        $this->assertEmpty($quoteTransfer);

        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testWhenTryingAccessUncompletedStepShouldRedirectToLastCompleted()
    {
        $cartClient = $this->getCartClient();
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SHIPMENT);

        $response = $checkoutController->shipmentAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertContains('address', $response->getTargetUrl());
    }


    /**
     * @return void
     */
    public function testWhenCartEmptyShouldRedirectToEscapeUrl()
    {
        $cartClient = $this->getCartClient();
        $cartClient->storeQuoteToSession(new QuoteTransfer());

        $checkoutController = $this->createCheckoutControllerMock(new QuoteTransfer());

        $request = Request::createfromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUMMARY);

        $response = $checkoutController->summaryAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('/', $response->getTargetUrl());
    }

    /**
     * @return CartClientInterface
     */
    protected function getCartClient()
    {
        return Locator::getInstance()->cart()->client();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|CheckoutController
     */
    protected function createCheckoutControllerMock(QuoteTransfer $quoteTransfer)
    {
        $checkoutControllerMock = $this->getMock(CheckoutController::class, ['getFactory']);
        $checkoutFactoryMock = $this->createCheckoutFactoryMock($quoteTransfer);
        $checkoutControllerMock->method('getFactory')->willReturn($checkoutFactoryMock);

        return $checkoutControllerMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|CheckoutFactory
     */
    protected function createCheckoutFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $checkoutFactoryMock = $this->getMock(
            CheckoutFactory::class,
            [
                'createStepFactory',
                'createCheckoutFormFactory'
            ]
        );

        $formFactoryMock = $this->createFormFactoryMock($quoteTransfer);
        $stepFactorymock = $this->createStepFactoryMock($quoteTransfer);

        $checkoutFactoryMock->method('createStepFactory')->willReturn($stepFactorymock);
        $checkoutFactoryMock->method('createCheckoutFormFactory')->willReturn($formFactoryMock);

        return $checkoutFactoryMock;
    }
    
    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|FormFactory
     */
    protected function createFormFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $formFactoryMock = $this->getMock(
            FormFactory::class,
            [
                'getCustomerClient',
                'createShipmentMethodsSubForms',
                'createShipmentForm',
                'createPaymentForm'
            ]
        );

        $customerClientMock = $this->getCustomerClientMock();
        $formFactoryMock->method('getCustomerClient')->willReturn($customerClientMock);

        $shipmentForm = $this->createShipmentForm($quoteTransfer);
        $formFactoryMock->method('createShipmentForm')->willReturn($shipmentForm);

        $paymentForm = $this->createPaymentForm($quoteTransfer);
        $formFactoryMock->method('createPaymentForm')->willReturn($paymentForm);

        return $formFactoryMock;
    }

    /**
     * @return array
     */
    protected function createShipmentForm(QuoteTransfer $quoteTransfer)
    {
        return new ShipmentForm($quoteTransfer, []);
    }

    /**
     * @return PaymentForm
     */
    protected function createPaymentForm(QuoteTransfer $quoteTransfer)
    {
       return new PaymentForm($quoteTransfer, []);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     * @return \PHPUnit_Framework_MockObject_MockObject|StepFactory
     */
    protected function createStepFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $stepFactoryMock = $this->getMock(StepFactory::class, ['getCheckoutClient', 'getCalculationClient']);

        $checkoutClientMock = $this->createCheckoutClientMock($quoteTransfer);
        $stepFactoryMock->method('getCheckoutClient')->willReturn($checkoutClientMock);

        $cartClientMock = $this->createCalculationClientMock($quoteTransfer);
        $stepFactoryMock->method('getCalculationClient')->willReturn($cartClientMock);

        return $stepFactoryMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|
     */
    protected function createCheckoutClientMock(QuoteTransfer $quoteTransfer)
    {
        $checkoutResponseTransfer = new CheckoutResponseTransfer();
        $checkoutResponseTransfer->setIsSuccess(true);
        $saverOrderTransfer = new SaveOrderTransfer();
        $saverOrderTransfer->setOrderReference('#1');
        $checkoutResponseTransfer->setSaveOrder($saverOrderTransfer);

        $checkoutClientMock = $this->getMock(CheckoutClientInterface::class, ['placeOrder']);
        $checkoutClientMock->method('placeOrder')->willReturn($checkoutResponseTransfer);

        return $checkoutClientMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function createCalculationClientMock(QuoteTransfer $quoteTransfer)
    {
        $calculatationClientMock = $this->getMock(CalculationClient::class, ['recalculate']);
        $calculatationClientMock->method('recalculate')->willReturn($quoteTransfer);

        return $calculatationClientMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getCustomerClientMock()
    {
        $customerClientMock = $this->getMock(
            CustomerClient::class,
            [
                'createAddressAndUpdateCustomerDefaultAddresses',
                'updateAddressAndCustomerDefaultAddresses',
                'getCustomer',
                'getAddresses',
            ]
        );

        $customerClientMock
            ->method('createAddressAndUpdateCustomerDefaultAddresses')
            ->willReturn(new CustomerTransfer());

        $customerClientMock
            ->method('updateAddressAndCustomerDefaultAddresses')
            ->willReturn(new CustomerTransfer());

        $customerClientMock
            ->method('getCustomer')
            ->willReturn(new CustomerTransfer());

        $customerClientMock
            ->method('getAddresses')
            ->willReturn(new AddressesTransfer());

        return $customerClientMock;

    }

    /**
     * @return ItemTransfer
     */
    protected function createItemTransfer()
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku(123);
        $itemTransfer->setName('name');
        $itemTransfer->setSku('sku');

        return $itemTransfer;
    }

    /**
     * @return QuoteTransfer
     */
    protected function createQuoteTransfer()
    {
        $quoteTransfer = new QuoteTransfer();
        $itemTransfer = $this->createItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        return $quoteTransfer;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setAddresses(QuoteTransfer $quoteTransfer)
    {
        $addressTransfer = new AddressTransfer();
        $addressTransfer->setFirstName('FIRST');
        $addressTransfer->setLastName('LAST');

        $quoteTransfer->setBillingAddress($addressTransfer);
        $quoteTransfer->setShippingAddress(clone $addressTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setExpenses(QuoteTransfer $quoteTransfer)
    {
        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType(ShipmentConstants::SHIPMENT_EXPENSE_TYPE);
        $quoteTransfer->addExpense($expenseTransfer);

        $shipmentTransfer = new ShipmentTransfer();
        $quoteTransfer->setShipment($shipmentTransfer);
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setPayment(QuoteTransfer $quoteTransfer)
    {
        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('test');
        $quoteTransfer->setPayment($paymentTransfer);
    }

}
