<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Functional\Pyz\Zed\Payolution;

use Functional\SprykerFeature\Zed\Payolution\Business\Api\Adapter\Http\PreAuthorizationAdapterMock;
use Functional\SprykerFeature\Zed\Payolution\Business\PayolutionFacadeMockBuilder;
use Functional\SprykerFeature\Zed\PayolutionOmsConnector\Communication\Plugin\Command\Mock\OmsOrderHydrator;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Factory;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use SprykerFeature\Zed\Checkout\Business\CheckoutFacade;
use SprykerFeature\Zed\Checkout\CheckoutDependencyProvider;
use SprykerFeature\Zed\Payolution\Business\Api\Adapter\AdapterInterface;
use SprykerFeature\Zed\Payolution\Business\PayolutionFacade;
use SprykerFeature\Zed\Payolution\Persistence\Propel\Map\SpyPaymentPayolutionTableMap;
use SprykerFeature\Zed\PayolutionCheckoutConnector\Communication\Plugin\CheckoutSaveOrderPlugin;
use SprykerFeature\Zed\PayolutionCheckoutConnector\PayolutionCheckoutConnectorDependencyProvider;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItemQuery;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStock;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStockProduct;

/**
 * @method
 */
class StateMachineTest extends AbstractFunctionalTest
{

    public function testCheckoutEventTransition()
    {

        /*
         * @todo CD-442 This is the wrong approach to mock things.
         * We would probably need to mock Oms facade and let it talk to the payolution facade mock
         * to avoid calling Payolution's gateway directly.
         */
        $adapterMock = new PreAuthorizationAdapterMock();
        
        $payolutionFacadeMock = $this->getPayolutionFacadeMock($adapterMock);
        $pluginMock = $this->getPayolutionCheckoutConnectorSaveOrderPlugin($payolutionFacadeMock);

        $checkoutFacade = $this->getCheckoutFacade($pluginMock);
        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $checkoutFacade->requestCheckout($checkoutRequestTransfer);

        $orderItem = SpySalesOrderItemQuery::create()->findOne();

        $this->assertEquals('waiting for payolution payment', $orderItem->getState()->getName());
return;
        $omsFacade = $this->getFacade('Pyz', 'Oms');
        $omsFacade->triggerEventForOneItem('capture', $orderItem, $logContext = []);

        $this->assertEquals('paid', $orderItem->getState()->getName());
    }

    /**
     * @param AdapterInterface $adapter
     *
     * @return PayolutionFacade
     */
    private function getPayolutionFacadeMock(AdapterInterface $adapter)
    {
        return PayolutionFacadeMockBuilder::build($adapter, $this);
    }

    private function getPayolutionCheckoutConnectorSaveOrderPlugin(PayolutionFacade $payolutionFacade)
    {
        $container = new Container();
        $dependencyKey = PayolutionCheckoutConnectorDependencyProvider::FACADE_PAYOLUTION;
        $container[$dependencyKey] = function(Container $container) use ($payolutionFacade) {
            return $payolutionFacade;
        };

        /** @var Locator $locator */
        $locator = Locator::getInstance();
        /** @var CheckoutSaveOrderPlugin $plugin */
        $plugin = $locator->payolutionCheckoutConnector()->pluginCheckoutSaveOrderPlugin();
        $plugin->setExternalDependencies($container);

        return $plugin;
    }

    /**
     * @return CheckoutFacade
     */
    private function getCheckoutFacade(CheckoutSaveOrderPlugin $saveOrderPlugin)
    {
        $container = new Container();

        $container[CheckoutDependencyProvider::CHECKOUT_PRECONDITIONS] = function(Container $container) {
            return [
                $container->getLocator()->customerCheckoutConnector()->pluginCustomerPreconditionCheckerPlugin(),
                $container->getLocator()->availabilityCheckoutConnector()->pluginProductsAvailablePreconditionPlugin(),
            ];
        };

        $container[CheckoutDependencyProvider::CHECKOUT_ORDERHYDRATORS] = function(Container $container) {
            return [
                $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerHydrationPlugin(),
                $container->getLocator()->cartCheckoutConnector()->pluginOrderCartHydrationPlugin(),
                $container->getLocator()->payolutionCheckoutConnector()->pluginCheckoutOrderHydrationPlugin(),
                new OmsOrderHydrator(),
            ];
        };

        $container[CheckoutDependencyProvider::CHECKOUT_ORDERSAVERS] = function(Container $container) use ($saveOrderPlugin) {
            return [
                $container->getLocator()->salesCheckoutConnector()->pluginSalesOrderSaverPlugin(),
                $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerSavePlugin(),
                $container->getLocator()->payolutionCheckoutConnector()->pluginCheckoutSaveOrderPlugin(),
            ];
        };

        $container[CheckoutDependencyProvider::CHECKOUT_PRE_HYDRATOR] = function(Container $container) {
            return [];
        };

        $container[CheckoutDependencyProvider::CHECKOUT_POSTHOOKS] = function(Container $container) {
            return [];
        };

        $container[CheckoutDependencyProvider::FACADE_OMS] = function(Container $container) {
            return $container->getLocator()->oms()->facade();
        };

        $container[CheckoutDependencyProvider::FACADE_CALCULATION] = function(Container $container) {
            return $container->getLocator()->calculation()->facade();
        };

        $checkoutFacade = $this->getFacade('SprykerFeature', 'Checkout');
        $checkoutFacade->setExternalDependencies($container);

        return $checkoutFacade;
    }

    /**
     * @return CheckoutRequestTransfer
     */
    private function getCheckoutRequestTransfer()
    {
        $abstractProduct = (new SpyAbstractProduct())
            ->setSku('0987654321')
            ->setAttributes('{}');

        $concreteProduct = (new SpyProduct())
            ->setSku('1234567890')
            ->setAttributes('{}')
            ->setSpyAbstractProduct($abstractProduct);
        $concreteProduct->save();

        $stock = (new SpyStock())->setName('testStock');

        (new SpyStockProduct())
            ->setQuantity(1)
            ->setStock($stock)
            ->setSpyProduct($concreteProduct)
            ->save();

        $itemTransfer = (new ItemTransfer())
            ->setSku('1234567890')
            ->setQuantity(1)
            ->setPriceToPay(10000)
            ->setGrossPrice(10000 * 1.19)
            ->setName('Socken')
            ->setTaxSet(new TaxSetTransfer());

        $totalsTransfer = (new TotalsTransfer())
            ->setGrandTotal(10000)
            ->setGrandTotalWithDiscounts(10000)
            ->setSubtotal(10000);

        $cartTransfer = (new CartTransfer())
            ->addItem($itemTransfer)
            ->setTotals($totalsTransfer);

        $billingAddressTransfer = (new AddressTransfer())
            ->setIso2Code('de')
            ->setEmail('john@doe.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setAddress1('Straße des 17. Juni')
            ->setAddress2('135')
            ->setZipCode('10623')
            ->setCity('Berlin');

        $shippingAddressTransfer = (new AddressTransfer())
            ->setIso2Code('de')
            ->setEmail('john@doe.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setAddress1('Fraunhoferstraße')
            ->setAddress2('120')
            ->setZipCode('80469')
            ->setCity('München');

        $checkoutRequestTransfer = (new CheckoutRequestTransfer())
            ->setGuest(false)
            ->setIdUser(null)
            ->setShippingAddress($shippingAddressTransfer)
            ->setBillingAddress($billingAddressTransfer)
            ->setPaymentMethod('invoice')
            ->setCart($cartTransfer);

        $payment = new PayolutionPaymentTransfer();
        $payment
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setSalutation(SpyPaymentPayolutionTableMap::COL_SALUTATION_MR)
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_MALE)
            ->setEmail('testst@tewst.com')
            ->setDateOfBirth('1970-01-02')
            ->setCountryIso2Code('de')
            ->setCity('Berlin')
            ->setStreet('Straße des 17. Juni 135')
            ->setZipCode('10623')
            ->setClientIp('127.0.0.1')
            ->setAccountBrand(PayolutionApiConstants::BRAND_INVOICE)
            ->setLanguageIso2Code('de')
            ->setCurrencyIso3Code('EUR');

        $checkoutRequestTransfer->setPayolutionPayment($payment);

        return $checkoutRequestTransfer;
    }

}
