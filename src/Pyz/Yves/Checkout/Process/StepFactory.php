<?php

namespace Pyz\Yves\Checkout\Process;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Pyz\Yves\Customer\Plugin\CustomerStepHandler;
use Pyz\Yves\Payolution\Plugin\PayolutionHandlerPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;

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
            $this->getLocator()->customer()->client()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\AddressStep
     */
    protected function createAddressStep()
    {
        return new AddressStep(
            $this->getFlashMessenger(),
            $this->getLocator()->customer()->client(),
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
            'dummy_shipment' => new ShipmentHandlerPlugin(),
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
            'payolution_invoice' => new PayolutionHandlerPlugin(),
            'payolution_installment' => new PayolutionHandlerPlugin(),
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
            $this->getLocator()->customer()->client()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface
     */
    protected function createCustomerStepHandler()
    {
        return new CustomerStepHandler();
    }

    /**
     * @return \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->getApplication()['flash_messenger'];
    }

    /**
     * @return \Symfony\Component\Form\FormFactoryInterface
     */
    protected function getFormFactory()
    {
        return $this->getApplication()['form.factory'];
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
        return (new Pimple())->getApplication();
    }

    /**
     * @return \Spryker\Client\Calculation\CalculationClient
     */
    public function getCalculationClient()
    {
        return $this->getLocator()->calculation()->client();
    }

    /**
     * @return \Spryker\Client\Checkout\CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

}
