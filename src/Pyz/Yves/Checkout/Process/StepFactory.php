<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Checkout\Process;

use Generated\Shared\Transfer\PaymentTransfer;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Checkout\CheckoutDependencyProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Spryker\Yves\Kernel\AbstractFactory;

class StepFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\StepInterface[]
     */
    public function createSteps()
    {
        return [
            $this->createEntryStep(),
            $this->createCustomerStep(),
            $this->createAddressStep(),
            $this->createShipmentStep(),
            $this->createPaymentStep(),
            $this->createSummaryStep(),
            $this->createPlaceOrderStep(),
            $this->createSuccessStep(),
        ];
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\EntryStep
     */
    protected function createEntryStep()
    {
        return new EntryStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_INDEX,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep
     */
    protected function createCustomerStep()
    {
        return new CustomerStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_CUSTOMER,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->createCustomerStepHandler(),
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER)
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\AddressStep
     */
    protected function createAddressStep()
    {
        return new AddressStep(
            $this->getFlashMessenger(),
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER),
            CheckoutControllerProvider::CHECKOUT_ADDRESS,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\ShipmentStep
     */
    protected function createShipmentStep()
    {
        return new ShipmentStep(
            $this->getFlashMessenger(),
            $this->getCalculationClient(),
            CheckoutControllerProvider::CHECKOUT_SHIPMENT,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->createShipmentPlugins()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface[]
     */
    public function createShipmentPlugins()
    {
        return [
            'dummy_shipment' => $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_SHIPMENT_HANDLER),
        ];
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PaymentStep
     */
    protected function createPaymentStep()
    {
        return new PaymentStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_PAYMENT,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->createPaymentPlugins()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface[]
     */
    public function createPaymentPlugins()
    {
        return [
            PaymentTransfer::PAYOLUTION_INVOICE => $this->createPayolutionHandlerPlugin(),
            PaymentTransfer::PAYOLUTION_INSTALLMENT => $this->createPayolutionHandlerPlugin(),
        ];
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\SummaryStep
     */
    protected function createSummaryStep()
    {
        return new SummaryStep(
            $this->getFlashMessenger(),
            $this->getCalculationClient(),
            CheckoutControllerProvider::CHECKOUT_SUMMARY,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep
     */
    protected function createPlaceOrderStep()
    {
        return new PlaceOrderStep(
            $this->getFlashMessenger(),
            $this->getCheckoutClient(),
            CheckoutControllerProvider::CHECKOUT_PLACE_ORDER,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep
     */
    protected function createSuccessStep()
    {
        return new SuccessStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_SUCCESS,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER)
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface
     */
    protected function createCustomerStepHandler()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_CUSTOMER_STEP_HANDLER);
    }

    /**
     * @return \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->getApplication()['flash_messenger'];
    }

    /**
     * @return \Pyz\Yves\Payolution\Plugin\PayolutionHandlerPlugin
     */
    public function createPayolutionHandlerPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_PAYOLUTION_HANDLER);
    }

    /**
     * @return \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    protected function getUrlGenerator()
    {
        return $this->getApplication()['url_generator'];
    }

    /**
     * @return \Spryker\Yves\Application\Application
     */
    protected function getApplication()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Client\Calculation\CalculationClient
     */
    public function getCalculationClient()
    {
        $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CALCULATION);
    }

    /**
     * @return \Spryker\Client\Checkout\CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CHECKOUT);
    }

}
