<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Checkout\Dependency\Handler\PaymentHandlerInterface;
use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
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
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentFormPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoiceFormPlugin;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Client\Checkout\CheckoutClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Config;
use Spryker\Shared\Payolution\PayolutionConstants;
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
     * @return ShipmentForm
     */
    public function createShipmentForm()
    {
        return new ShipmentForm(
            $this->getGlossaryClient(),
            $this->getShipmentClient(),
            $this->getCartClient(),
            $this->getStore(),
            $this->getCurrencyManager()
        );
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
            $this->createPaymentMethods()
        );
    }

    /**
     * @return PaymentSubFormInterface[]
     */
    public function createPaymentMethods()
    {
        return [
            new PayolutionInvoiceFormPlugin(),
            new PayolutionInstallmentFormPlugin(),
        ];
    }

    /**
     * @param $paymentSelection
     *
     * @return PaymentHandlerInterface
     */
    public function createPaymentHandler($paymentSelection)
    {
        switch ($paymentSelection) {
            case 'payolution_invoice':
                return new PayolutionHandlerPlugin();
                break;
            case 'payolution_installment':
                return new PayolutionHandlerPlugin();
                break;
        }
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
     * @return ShipmentClientInterface
     */
    public function getShipmentClient()
    {
        return $this->getLocator()->shipment()->client();
    }

    /**
     * @return GlossaryClientInterface
     */
    public function getGlossaryClient()
    {
        return $this->getLocator()->glossary()->client();
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
     * @return string[]
     */
    public function getPayolutionCalculationCredentials()
    {
        return [
            PayolutionConstants::CALCULATION_USER_LOGIN => Config::get(PayolutionConstants::CALCULATION_USER_LOGIN),
            PayolutionConstants::CALCULATION_USER_PASSWORD => Config::get(PayolutionConstants::CALCULATION_USER_PASSWORD),
        ];
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
