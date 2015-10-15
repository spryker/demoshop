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
use Pyz\Codeception\Module\EnvironmentalTestCaseInterface;
use SprykerEngine\Zed\Kernel\AbstractFunctionalTest;
use SprykerEngine\Zed\Kernel\Communication\Factory as CommunicationFactory;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use SprykerFeature\Zed\Checkout\Business\CheckoutFacade;
use SprykerFeature\Zed\Checkout\CheckoutDependencyProvider;
use SprykerFeature\Zed\Oms\Business\OmsFacade;
use SprykerFeature\Zed\Payolution\Persistence\Propel\Map\SpyPaymentPayolutionTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyAbstractProduct;
use SprykerFeature\Zed\Product\Persistence\Propel\SpyProduct;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItemQuery;
use SprykerFeature\Zed\Sales\SalesDependencyProvider;
use SprykerFeature\Zed\SalesCheckoutConnector\Communication\Plugin\SalesOrderSaverPlugin;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStock;
use SprykerFeature\Zed\Stock\Persistence\Propel\SpyStockProduct;
/**
 * Modes of this test:
 *
 * You can run this test against a set of pre-defined mock-responses (default) and against
 * Payolution's sandbox interface. To use the sandbox interface use environment environment
 * 'payolutionLiveMode' (--env payolutionLiveMode).
 *
 *
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
abstract class AbstractStateMachineTest extends AbstractFunctionalTest implements EnvironmentalTestCaseInterface
{
    /**
     * @var bool[]
     */
    private $expectSuccess = [];

    /**
     * @var OmsFacade|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $omsFacadeMock;

    /**
     * @var CheckoutFacade
     */
    protected $checkoutFacade;

    /**
     * @var array
     */
    private $environmentConfig = [];

    /**
     * @var SpySalesOrderItem
     */
    protected $orderItem;

    protected function _before()
    {
        parent::_before();

        $this->expectSuccess = [
            'preAuthorization' => true,
            'reAuthorization' => true,
            'reversal' => true,
            'capture' => true,
            'refund' => true,
        ];

        $this->omsFacadeMock = null;
        $this->checkoutFacade = null;

        // Skip over failure tests in live mode because we cannot force failures with the
        // Payolution sandbox interface.
        $isFailureTest = (false !== mb_strpos($this->getName(), 'Declined'));
        if (true === $this->isLiveMode() && true === $isFailureTest) {
            $this->markTestSkipped('Skipping test due to live mode');
        }
    }

    /**
     * @return bool
     */
    protected function isLiveMode()
    {
        if (true === array_key_exists('mode', $this->environmentConfig)
            && 'live' === $this->environmentConfig['mode']
        ) {
            return true;
        }

        return false;
    }

    protected function _after()
    {
        unset($this->omsFacadeMock, $this->checkoutFacade, $this->orderItem);

        parent::_after();
    }

    /**
     * @param array $config
     */
    public function setEnvironmentConfig(array $config = [])
    {
        $this->environmentConfig = $config;
    }

    protected function setUpFacades()
    {
        $omsFacadeMockBuilder = $this->getOmsFacadeMockBuilder();
        $omsFacadeMockBuilder->setExpectSuccess($this->expectSuccess);
        $this->omsFacadeMock = $omsFacadeMockBuilder->build();
        $salesOrderSaverPlugin = $this->getSalesOrderSaverPlugin($this->omsFacadeMock);
        $this->checkoutFacade = $this->getCheckoutFacade($this->omsFacadeMock, $salesOrderSaverPlugin);
    }

    /**s
     * @return OmsFacadeMockBuilder
     */
    private function getOmsFacadeMockBuilder()
    {
        return new OmsFacadeMockBuilder($this, $this->isLiveMode());
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
     * @param OmsFacade $omsFacade
     * @param SalesOrderSaverPlugin $salesOrderSaverPlugin
     *
     * @return CheckoutFacade
     */
    private function getCheckoutFacade(OmsFacade $omsFacade, SalesOrderSaverPlugin $salesOrderSaverPlugin)
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
                $container->getLocator()->payolution()->pluginCheckoutCheckoutOrderHydrationPlugin(),
            ];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_ORDERSAVERS] = function (
            Container $container
        ) use ($salesOrderSaverPlugin) {
            return [
                $salesOrderSaverPlugin,
                $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerSavePlugin(),
                $container->getLocator()->payolution()->pluginCheckoutCheckoutSaveOrderPlugin(),
            ];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_PRE_HYDRATOR] = function () {
            return [];
        };
        $container[CheckoutDependencyProvider::CHECKOUT_POSTHOOKS] = function () {
            return [];
        };
        $container[CheckoutDependencyProvider::FACADE_OMS] = function () use ($omsFacade) {
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
    protected function getCheckoutRequestTransfer()
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

        $itemTransfer = new ItemTransfer();
        $itemTransfer
            ->setSku('1234567890')
            ->setQuantity(1)
            ->setPriceToPay(10000)
            ->setGrossPrice(10000 * 1.19)
            ->setName('Socken')
            ->setTaxSet(new TaxSetTransfer());

        $totalsTransfer = new TotalsTransfer();
        $totalsTransfer
            ->setGrandTotal(10000)
            ->setGrandTotalWithDiscounts(10000)
            ->setSubtotal(10000);

        $cartTransfer = new CartTransfer();
        $cartTransfer
            ->addItem($itemTransfer)
            ->setTotals($totalsTransfer);

        $billingAddressTransfer = new AddressTransfer();
        $billingAddressTransfer
            ->setIso2Code('de')
            ->setEmail('john@doe.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setAddress1('Straße des 17. Juni')
            ->setAddress2('135')
            ->setZipCode('10623')
            ->setCity('Berlin');

        $shippingAddressTransfer = new AddressTransfer();
        $shippingAddressTransfer
            ->setIso2Code('de')
            ->setEmail('john@doe.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setAddress1('Fraunhoferstraße')
            ->setAddress2('120')
            ->setZipCode('80469')
            ->setCity('München');

        $checkoutRequestTransfer = new CheckoutRequestTransfer();
        $checkoutRequestTransfer
            ->setIdUser(null)
            ->setShippingAddress($shippingAddressTransfer)
            ->setBillingAddress($billingAddressTransfer)
            ->setPaymentMethod('invoice')
            ->setCart($cartTransfer);

        $paymentAddressTransfer = new AddressTransfer();
        $paymentAddressTransfer
            ->setIso2Code('de')
            ->setEmail('testst@tewst.com')
            ->setFirstName('John')
            ->setLastName('Doe')
            ->setAddress1('Straße des 17. Juni')
            ->setAddress2('135')
            ->setZipCode('10623')
            ->setSalutation(SpyPaymentPayolutionTableMap::COL_SALUTATION_MR)
            ->setCity('Berlin');

        $paymentTransfer = new PayolutionPaymentTransfer();
        $paymentTransfer
            ->setGender(SpyPaymentPayolutionTableMap::COL_GENDER_MALE)
            ->setDateOfBirth('1970-01-02')
            ->setClientIp('127.0.0.1')
            ->setAccountBrand(PayolutionApiConstants::BRAND_INVOICE)
            ->setLanguageIso2Code('de')
            ->setCurrencyIso3Code('EUR')
            ->setAddress($paymentAddressTransfer);

        $checkoutRequestTransfer->setPayolutionPayment($paymentTransfer);

        return $checkoutRequestTransfer;
    }

    /**
     * @return SpySalesOrderItem
     */
    protected function getLastOrderItem()
    {
        return SpySalesOrderItemQuery::create()->find()->getLast();
    }

    protected function expectPreAuthorizationFailure()
    {
        $this->expectSuccess['preAuthorization'] = false;
        $this->setUpFacades();
    }

    protected function expectPreAuthorizationSuccess()
    {
        $this->expectSuccess['preAuthorization'] = true;
        $this->setUpFacades();
    }

    protected function expectReAuthorizationFailure()
    {
        $this->expectSuccess['reAuthorization'] = false;
        $this->setUpFacades();
    }

    protected function expectReAuthorizationSuccess()
    {
        $this->expectSuccess['reAuthorization'] = true;
        $this->setUpFacades();
    }

    protected function expectReversalFailure()
    {
        $this->expectSuccess['reversal'] = false;
        $this->setUpFacades();
    }

    protected function expectReversalSuccess()
    {
        $this->expectSuccess['reversal'] = true;
        $this->setUpFacades();
    }

    protected function expectCaptureFailure()
    {
        $this->expectSuccess['capture'] = false;
        $this->setUpFacades();
    }

    protected function expectCaptureSuccess()
    {
        $this->expectSuccess['capture'] = true;
        $this->setUpFacades();
    }

    protected function expectRefundFailure()
    {
        $this->expectSuccess['refund'] = false;
        $this->setUpFacades();
    }

    protected function expectRefundSuccess()
    {
        $this->expectSuccess['refund'] = true;
        $this->setUpFacades();
    }

    protected function doCheckout()
    {
        $this->setUpFacades();
        $checkoutRequestTransfer = $this->getCheckoutRequestTransfer();
        $this->checkoutFacade->requestCheckout($checkoutRequestTransfer);
        $this->orderItem = $this->getLastOrderItem();
    }

}
