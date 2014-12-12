<?php

use Generated\Shared\Library\TransferLoader;
use Generated\Shared\Sales\Transfer\Order;
use Generated\Shared\Sales\Transfer\Payment;
use Generated\Zed\Catalog\Component\CatalogFactory;
use Generated\Zed\Checkout\Component\CheckoutFactory;
use Generated\Zed\DependencyInjectionContainer;
use ProjectA\Zed\Checkout\Component\CheckoutFacade;
use ProjectA\Zed\Library\Copy;

class CheckoutTest extends \Codeception\TestCase\Test
{
    /**
     * @var CheckoutFacade
     */
    private $checkoutFacade;

    protected function setUp()
    {
        parent::setUp();
        $cartFactory = new CheckoutFactory();
        $this->checkoutFacade = new CheckoutFacade();
        $dependencyContainer = new DependencyInjectionContainer();
        $dependencyContainer->doInjection($this->checkoutFacade, $cartFactory);

    }

    public function testPlaceOrder()
    {
        /** @var Order $orderTransfer */
        $orderTransfer = TransferLoader::loadSalesOrder();
        $orderTransfer = $this->addPayment($orderTransfer);
        $orderTransfer = $this->addOrderItems($orderTransfer);
        $orderTransfer = $this->addShippingAddress($orderTransfer);
        $orderTransfer = $this->addBillingAddress($orderTransfer);
        $orderTransfer = $this->addCustomer($orderTransfer);

        $totals = TransferLoader::loadSalesPriceTotals();
        $totals->setGrandTotal(11000);
        $orderTransfer->setTotals($totals);

        $request = new ProjectA\Shared\Library\Communication\Request();
        $sessionId = md5('foo');
        $request->setSessionId($sessionId);
        $metaRequest = TransferLoader::loadPaymentControlMetaRequest();
        $metaRequest->setIpAddress('127.0.0.1');
        $request->addMetaTransfer('paymentcontrol', $metaRequest);

        //mock controller action call, cause TransitionLog:165 grab this information direct from the front controller
        $ZendRequest = new Zend_Controller_Request_Http();
        $ZendRequest->setActionName('save-order');
        $ZendRequest->setControllerName('yves');
        $ZendRequest->setModuleName('checkout');
        \Zend_Controller_Front::getInstance()->setRequest($ZendRequest);

        $result = $this->checkoutFacade->saveOrder($orderTransfer, $request);
        $this->assertTrue($result->isSuccess(), var_export($result->getErrors(), true));

        $storedOrder = $this->codeGuy->execInDatabase(
            'SELECT * FROM pac_sales_order WHERE customer_session_id ="' . $sessionId . '"'
        );

        $this->assertNotEmpty($storedOrder[0]);
        $this->assertArrayHasKey('email', $storedOrder[0]);
        $this->assertEquals($orderTransfer->getCustomer()->getEmail(), $storedOrder[0]['email']);

    }

    protected function addCustomer(Order $orderTransfer)
    {

        $status = Generated_Zed_Customer_Persistence_Om_BasePacCustomerStatusQuery::create()->findOne();

        $customer = Generated_Zed_EntityLoader::loadPacCustomer();
        $customer->setFirstName('Max');
        $customer->setLastName('Muster');
        $customer->setPassword('aaaaaa');
        $customer->setEmail('qa@spryker.de');
        $customer->setStatus($status);
        $customer->save();

        $customerTransfer = Copy::entityToTransfer(TransferLoader::loadCustomer(), $customer);
        $orderTransfer->setCustomer($customerTransfer);

        return $orderTransfer;
    }

    protected function addShippingAddress(Order $orderTransfer)
    {
        $faker = Faker\Factory::create('de_DE');

        $shippingAddress = TransferLoader::loadSalesAddress();
        $shippingAddress->fillWithFixtureData();
        $shippingAddress->setFkMiscCountry(60); //Foreign key for DE
        $shippingAddress->setIso2Country('DE');
        $shippingAddress->setEmail($faker->safeEmail);
        $shippingAddress->setAddress1($faker->streetAddress);
        $shippingAddress->setCity($faker->city);
        $shippingAddress->setFirstName($faker->firstName);
        $shippingAddress->setLastName($faker->lastName);
        $shippingAddress->setSalutation(
            Generated_Zed_Customer_Persistence_Om_BasePacCustomerAddressPeer::SALUTATION_MR
        );
        $shippingAddress->setZipCode($faker->postcode);

        $orderTransfer->setShippingAddress($shippingAddress);

        return $orderTransfer;
    }

    protected function addBillingAddress(Order $orderTransfer)
    {
        $faker = Faker\Factory::create('de_DE');
        $billingAddress = TransferLoader::loadSalesAddress();
        $billingAddress->setFkMiscCountry(60); //Foreign key for DE
        $billingAddress->setIso2Country('DE');
        $billingAddress->setEmail($faker->safeEmail);
        $billingAddress->setAddress1($faker->streetAddress);
        $billingAddress->setCity($faker->city);
        $billingAddress->setFirstName($faker->firstName);
        $billingAddress->setLastName($faker->lastName);
        $billingAddress->setSalutation(
            Generated_Zed_Customer_Persistence_Om_BasePacCustomerAddressPeer::SALUTATION_MRS
        );
        $billingAddress->setZipCode($faker->postcode);

        $orderTransfer->setBillingAddress($billingAddress);

        return $orderTransfer;
    }

    /**
     * @param Order $orderTransfer
     * @return Order
     */
    protected function addOrderItems(Order $orderTransfer)
    {
        $product = Generated_Zed_Catalog_Persistence_Om_BasePacCatalogProductQuery::create()
            ->findOne();

        $catalogFactory = new CatalogFactory();
        $catalogFacade = new \Pyz\Zed\Catalog\Component\CatalogFacade();
        $dependencyContainer = new DependencyInjectionContainer();
        $dependencyContainer->doInjection($catalogFacade, $catalogFactory);

        $name = $catalogFacade->getProductNameBySku($product->getSku());
        //$price = $catalogFacade->

        $collection = TransferLoader::loadSalesOrderItemCollection();
        $item = TransferLoader::loadSalesOrderItem();
        $item->setSku($product->getSku());
        $item->setUniqueIdentifier($product->getSku());
        $item->setQuantity(1);
        $item->setName($name);
        $item->setGrossPrice(11000);
        $collection->add($item);

        $orderTransfer->setItems($collection);

        return $orderTransfer;
    }

    /**
     * @param Order $orderTransfer
     * @return Order
     */
    protected function addPayment(Order $orderTransfer)
    {
        /** @var Payment $payment */
        $payment = TransferLoader::loadSalesPayment();
        $payment->setMethod('payment.payone.prepayment');
        $orderTransfer->setPayment($payment);

        return $orderTransfer;
    }

}
