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
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Checkout\CheckoutFactory;
use Pyz\Yves\Checkout\Controller\CheckoutController;
use Pyz\Yves\Checkout\Form\DataProvider\SubformDataProviders;
use Pyz\Yves\Checkout\Form\FormFactory;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\StepFactory;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Shared\Shipment\ShipmentConstants;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CheckoutControllerTest extends Test
{

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $persistedQuoteTransfer;

    /**
     * @return void
     */
    public function testIndexActionShouldReturnRedirectResponse()
    {
        $checkoutController = $this->createCheckoutControllerMock($this->createQuoteTransfer());
        $result = $checkoutController->indexAction(Request::createFromGlobals());
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @return void
     */
    public function testCustomerStepShouldRenderRegisterAndLoginForms()
    {
        $quoteTransfer = $this->createQuoteTransfer();

        $request = Request::createFromGlobals();
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
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
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
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SHIPMENT);

        $response = $checkoutController->shipmentAction($request);

        $this->assertArrayHasKey('shipmentForm', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);

    }

    /**
     * @return void
     */
    public function testPaymentStepShouldRenderPaymenttForms()
    {
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_PAYMENT);

        $response = $checkoutController->paymentAction($request);

        $this->assertArrayHasKey('paymentForm', $response);
        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testSummaryStepShouldRenderSummaryPage()
    {
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
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
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_PLACE_ORDER);

        $response = $checkoutController->placeOrderAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('#1', $quoteTransfer->getOrderReference());
    }

    /**
     * @return void
     */
    public function testSuccessStepShouldClearQuoteIfOrderWasPlaced()
    {
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $this->setAddresses($quoteTransfer);
        $this->setExpenses($quoteTransfer);
        $this->setPayment($quoteTransfer);

        $quoteTransfer->setOrderReference('#1');

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUCCESS);

        $response = $checkoutController->successAction($request);

        $this->assertCount(0, $this->persistedQuoteTransfer->getItems());

        $this->assertArrayHasKey('quoteTransfer', $response);
        $this->assertArrayHasKey('previousStepUrl', $response);
    }

    /**
     * @return void
     */
    public function testWhenTryingAccessUncompletedStepShouldRedirectToLastCompleted()
    {
        $quoteTransfer = $this->createQuoteTransfer();

        $customerTransfer = new CustomerTransfer();
        $quoteTransfer->setCustomer($customerTransfer);

        $checkoutController = $this->createCheckoutControllerMock($quoteTransfer);

        $request = Request::createFromGlobals();
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
        $checkoutController = $this->createCheckoutControllerMock(new QuoteTransfer());

        $request = Request::createFromGlobals();
        $request->attributes->set('_route', CheckoutControllerProvider::CHECKOUT_SUMMARY);

        $response = $checkoutController->summaryAction($request);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('/', $response->getTargetUrl());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\Controller\CheckoutController
     */
    protected function createCheckoutControllerMock(QuoteTransfer $quoteTransfer)
    {
        $checkoutControllerMock = $this->getMock(CheckoutController::class, ['getFactory']);
        $checkoutFactoryMock = $this->createCheckoutFactoryMock($quoteTransfer);
        $checkoutControllerMock->method('getFactory')->willReturn($checkoutFactoryMock);

        return $checkoutControllerMock;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\CheckoutFactory
     */
    protected function createCheckoutFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $checkoutFactoryMock = $this->getMock(
            CheckoutFactory::class,
            [
                'createStepFactory',
                'createCheckoutFormFactory',
                'getCartClient'
            ]
        );

        $formFactoryMock = $this->createFormFactoryMock($quoteTransfer);
        $stepFactoryMock = $this->createStepFactoryMock($quoteTransfer);
        $cartClientMock = $this->getCartClientMock($quoteTransfer);

        $checkoutFactoryMock->method('createStepFactory')->willReturn($stepFactoryMock);
        $checkoutFactoryMock->method('createCheckoutFormFactory')->willReturn($formFactoryMock);
        $checkoutFactoryMock->method('getCartClient')->willReturn($cartClientMock);

        return $checkoutFactoryMock;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\Form\FormFactory
     */
    protected function createFormFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $formFactoryMock = $this->getMock(
            FormFactory::class,
            [
                'getCustomerClient',
                'createShipmentForm',
                'createPaymentForm',
                'createSubFormDataProvider'
            ]
        );

        $subFormDataProviderMock = $this->createSubFormDataProvider($quoteTransfer);
        $formFactoryMock->method('createSubFormDataProvider')->willReturn($subFormDataProviderMock);

        $customerClientMock = $this->getCustomerClientMock();
        $formFactoryMock->method('getCustomerClient')->willReturn($customerClientMock);

        $shipmentForm = $this->createShipmentForm();
        $formFactoryMock->method('createShipmentForm')->willReturn($shipmentForm);

        $paymentForm = $this->createPaymentForm();
        $formFactoryMock->method('createPaymentForm')->willReturn($paymentForm);

        return $formFactoryMock;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Cart\CartClientInterface
     */
    protected function getCartClientMock(QuoteTransfer $quoteTransfer)
    {
        $cartClientMock = $this->getMock(CartClientInterface::class);
        $cartClientMock->method('storeQuote')->willReturnCallback(
            function (QuoteTransfer $newQuoteTransfer) use ($quoteTransfer) {
                $this->persistedQuoteTransfer = $newQuoteTransfer;
            }
        );
        $cartClientMock->method('getQuote')->willReturn($quoteTransfer);

        return $cartClientMock;
    }

    /**
     * @return array
     */
    protected function createShipmentForm()
    {
        return new ShipmentForm([]);
    }

    /**
     * @return \Pyz\Yves\Checkout\Form\Steps\PaymentForm
     */
    protected function createPaymentForm()
    {
         return new PaymentForm([]);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\Process\StepFactory
     */
    protected function createStepFactoryMock(QuoteTransfer $quoteTransfer)
    {
        $stepFactoryMock = $this->getMock(StepFactory::class, ['getCheckoutClient', 'getCalculationClient']);

        $checkoutClientMock = $this->createCheckoutClientMock();
        $stepFactoryMock->method('getCheckoutClient')->willReturn($checkoutClientMock);

        $cartClientMock = $this->createCalculationClientMock($quoteTransfer);
        $stepFactoryMock->method('getCalculationClient')->willReturn($cartClientMock);

        return $stepFactoryMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Checkout\CheckoutClientInterface
     */
    protected function createCheckoutClientMock()
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Calculation\CalculationClient
     */
    protected function createCalculationClientMock(QuoteTransfer $quoteTransfer)
    {
        $calculationClientMock = $this->getMock(CalculationClient::class, ['recalculate']);
        $calculationClientMock->method('recalculate')->willReturn($quoteTransfer);

        return $calculationClientMock;
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
     * @return \Generated\Shared\Transfer\ItemTransfer
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function createQuoteTransfer()
    {
        $quoteTransfer = new QuoteTransfer();
        $itemTransfer = $this->createItemTransfer();
        $quoteTransfer->addItem($itemTransfer);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
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
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    protected function setPayment(QuoteTransfer $quoteTransfer)
    {
        $paymentTransfer = new PaymentTransfer();
        $paymentTransfer->setPaymentProvider('test');
        $quoteTransfer->setPayment($paymentTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Checkout\Form\DataProvider\SubformDataProviders
     */
    protected function createSubFormDataProvider(QuoteTransfer $quoteTransfer)
    {
        if (empty($quoteTransfer->getPayment())) {
            $quoteTransfer->setPayment(new PaymentTransfer());
        }

        if (empty($quoteTransfer->getShipment())) {
            $quoteTransfer->setShipment(new ShipmentTransfer());
        }

        $subFormDataProviderMock = $this->getMockBuilder(SubformDataProviders::class)->disableOriginalConstructor()->getMock();
        $subFormDataProviderMock->method('getData')->willReturn($quoteTransfer);
        $subFormDataProviderMock->method('getOptions')->willReturn(['select_options' =>[]]);

        return $subFormDataProviderMock;
    }

}
