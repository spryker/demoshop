<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormInterface;
use Pyz\Yves\Checkout\Form\Steps\AddressCollectionForm;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Form\Steps\SummaryForm;
use Pyz\Yves\Checkout\Process\StepProcess;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Pyz\Yves\Payolution\Plugin\PayolutionHandlerPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Cart\CartClientInterface;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return StepInterface[]
     */
    protected function createSteps()
    {
        return [
            $this->createCustomerStep(),
            $this->createAddressStep(),
            $this->createShipmentStep(),
            $this->createPaymentStep(),
            $this->createSummaryStep(),
            $this->createPlaceOrderStep(),
            $this->createSuccessStep()
        ];
    }

    /**
     * @return AddressStep
     */
    protected function createAddressStep()
    {
        return new AddressStep(
            $this->getFlashMessenger(),
            $this->getStore(),
            CheckoutControllerProvider::CHECKOUT_ADDRESS,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return ShipmentStep
     */
    protected function createShipmentStep()
    {
        return new ShipmentStep(
            $this->getFlashMessenger(),
            $this->getCalculationClient(),
            CheckoutControllerProvider::CHECKOUT_SHIPMENT,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return PaymentStep
     */
    protected function createPaymentStep()
    {
        return new PaymentStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_PAYMENT,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return SummaryStep
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
     * @return PlaceOrderStep
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
     * @return PlaceOrderStep
     */
    protected function createSuccessStep()
    {
        return new SuccessStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_SUCCESS,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return PlaceOrderStep
     */
    protected function createCustomerStep()
    {
        return new CustomerStep(
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_CUSTOMER,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }


    /**
     * @todo get rid of application dependency.
     *
     * @param Application $application
     *
     * @return StepProcess
     */
    public function createCheckoutProcess(Application $application)
    {
        return new StepProcess(
            $application['form.factory'],
            $application['url_generator'],
            $this->createSteps(),
            $this->getCartClient(),
            $application['flash_messenger']
        );
    }

    /**
     * @return AddressCollectionForm
     */
    public function createAddressCollectionForm()
    {
        return new AddressCollectionForm();
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return ShipmentForm
     */
    public function createShipmentForm(QuoteTransfer $quoteTransfer)
    {
        return new ShipmentForm(
            $quoteTransfer,
            $this->createShipmentMethodsSubForms()
        );
    }

    /**
     * @return CheckoutSubFormInterface[]
     */
    public function createShipmentMethodsSubForms()
    {
        return [
            new ShipmentSubFormPlugin(),
        ];
    }

    /**
     * @return CheckoutStepHandlerInterface[]
     */
    public function createShipmentPlugins()
    {
        return [
            'dummy_shipment' => new ShipmentHandlerPlugin(),
        ];
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return PaymentForm
     */
    public function createPaymentForm(QuoteTransfer $quoteTransfer)
    {
        return new PaymentForm(
            $quoteTransfer,
            $this->createPaymentMethodsSubForms()
        );
    }

    /**
     * @return CheckoutSubFormInterface[]
     */
    public function createPaymentMethodsSubForms()
    {
        return [
            new PayolutionInvoiceSubFormPlugin(),
            new PayolutionInstallmentSubFormPlugin(),
        ];
    }

    /**
     * @return CheckoutStepHandlerInterface[]
     */
    public function createPaymentPlugins()
    {
        return [
            'payolution_invoice' => new PayolutionHandlerPlugin(),
            'payolution_installment' => new PayolutionHandlerPlugin(),
        ];
    }

    /**
     * @return SummaryForm
     */
    public function createSummaryForm()
    {
        return new SummaryForm();
    }

    /**
     * @return CheckoutClientInterface
     */
    public function getCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

    /**
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return CalculationClient
     */
    public function getCalculationClient()
    {
        return $this->getLocator()->calculation()->client();
    }

    /**
     * @return FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->createApplication()['flash_messenger'];
    }

    /**
     * @return Application
     */
    protected function createApplication()
    {
        return (new Pimple())->getApplication();
    }

    /**
     * @return Store
     */
    protected function getStore()
    {
        return Store::getInstance();
    }

    /**
     * @return CurrencyManager
     */
    protected function getCurrencyManager()
    {
        return CurrencyManager::getInstance();
    }

}
