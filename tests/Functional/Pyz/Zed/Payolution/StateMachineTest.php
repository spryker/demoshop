<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Functional\Pyz\Zed\Payolution;

use Functional\Pyz\Zed\Payolution\Mock\OmsFacadeMockBuilder;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CartTransfer;
use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use Pyz\Zed\Oms\Business\OmsFacade;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Communication\Factory as CommunicationFactory;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use SprykerFeature\Zed\Checkout\Business\CheckoutFacade;
use SprykerFeature\Zed\Checkout\CheckoutDependencyProvider;
use SprykerFeature\Zed\Payolution\Persistence\Propel\Map\SpyPaymentPayolutionTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItemQuery;
use SprykerFeature\Zed\Sales\SalesDependencyProvider;
use SprykerFeature\Zed\SalesCheckoutConnector\Communication\Plugin\SalesOrderSaverPlugin;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStock;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStockProduct;

/**
 * A couple of things to know about the mocked objects:
 *
 * 1.) OMS facade
 * The facade got mocked to return our very own state-machine process called PayolutionPayment01 without
 * having to modify the demo-shop. The config needed to get mocked to return the correct process names.
 * In addition, the dependency-container needed to get mocked to have the state-machine-builder use a custom
 * path to the XML definition file.
 * Dependency provider required a list of all condition and command plugins used by the process
 *
 * 2.) SalesOrderSaverPlugin
 * This plugin uses the Sales bundle facade which has an external dependency to OMS facade for setting
 * selected process names on order items. This dependency had to be replaced with the OMS facade mock
 * from #1
 *
 * 3.) Checkout facade
 * Checkout facade needs to know about Payolution's hydrator and saver plugins
 *
 * 4.) Payolution facade
 * Payolution facade gets mocked to return pre-defined responses and not use Payolution's sandbox
 * gateway. The replacement is done through the command plugins that are provided to the OMS facade in #1.
 * PayolutionOmsConnector‚'s dependency-provider will return the mocked Payolution facade.
 */
class StateMachineTest extends AbstractFunctionalTest
{

    public function testCheckoutEventTransition()
    {
        $omsFacadeMock = $this->getOmsFacadeMock();
        $salesOrderSaverPlugin = $this->getSalesOrderSaverPlugin($omsFacadeMock);
        $checkoutFacade = $this->getCheckoutFacade($omsFacadeMock, $salesOrderSaverPlugin);
        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $checkoutFacade->requestCheckout($checkoutRequestTransfer);

        $orderItem = SpySalesOrderItemQuery::create()->findOne();
        $this->assertEquals('waiting for payolution payment', $orderItem->getState()->getName());

        $omsFacadeMock->triggerEventForOneItem('capture', $orderItem, $logContext = []);
        $this->assertEquals('paid', $orderItem->getState()->getName());
    }

    /**
     * @return OmsFacade|\PHPUnit_Framework_MockObject_MockObject
     */
    private function getOmsFacadeMock()
    {
        return OmsFacadeMockBuilder::create($this);
    }

    /**
     * @param OmsFacade|\PHPUnit_Framework_MockObject_MockObject $omsFacadeMock
     *
     * @return SalesOrderSaverPlugin
     */
    private function getSalesOrderSaverPlugin(OmsFacade $omsFacadeMock)
    {
        // Replace external OMS-facade dependency in Sales bundle with our mock object
        $salesFacade = $this->getFacade('SprykerFeature', 'Sales');
        $container = new Container();
        $dependencyProvider = new SalesDependencyProvider();
        $dependencyProvider->provideBusinessLayerDependencies($container);
        $dependencyProvider->provideCommunicationLayerDependencies($container);
        $dependencyProvider->providePersistenceLayerDependencies($container);
        $container[SalesDependencyProvider::FACADE_OMS] = function (Container $container) use ($omsFacadeMock) {
            return $omsFacadeMock;
        };
        $salesFacade->setExternalDependencies($container);

        $factory = new CommunicationFactory('SalesCheckoutConnector');
        $locator = Locator::getInstance();
        $plugin = new SalesOrderSaverPlugin($factory, $locator);
        $plugin->setOwnFacade($salesFacade);

        return $plugin;
    }

    /**
     * @return CheckoutFacade
     */
    private function getCheckoutFacade(OmsFacade $omsFacade, SalesOrderSaverPlugin $orderSaverPlugin)
    {
        $container = new Container();
        $container[CheckoutDependencyProvider::CHECKOUT_PRECONDITIONS] = function (Container $container) {
            return [
                $container->getLocator()->customerCheckoutConnector()->pluginCustomerPreconditionCheckerPlugin(),
                $container->getLocator()->availabilityCheckoutConnector()->pluginProductsAvailablePreconditionPlugin(),
            ];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_ORDERHYDRATORS] = function (Container $container) {
            return [
                $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerHydrationPlugin(),
                $container->getLocator()->cartCheckoutConnector()->pluginOrderCartHydrationPlugin(),
                $container->getLocator()->payolutionCheckoutConnector()->pluginCheckoutOrderHydrationPlugin(),
            ];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_ORDERSAVERS] = function (Container $container) use ($orderSaverPlugin) {
            return [
                $orderSaverPlugin,
                $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerSavePlugin(),
                $container->getLocator()->payolutionCheckoutConnector()->pluginCheckoutSaveOrderPlugin(),
            ];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_PRE_HYDRATOR] = function (Container $container) {
            return [];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_POSTHOOKS] = function (Container $container) {
            return [];
        };
        $container[CheckoutDependencyProvider::FACADE_OMS] = function (Container $container) use ($omsFacade) {
            return $omsFacade;
        };
        $container[CheckoutDependencyProvider::FACADE_CALCULATION] = function (Container $container) {
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
