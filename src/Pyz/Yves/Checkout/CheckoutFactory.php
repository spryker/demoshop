<?php

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Checkout\Form\Steps\AddressCollectionForm;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Process\StepProcess;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoicePlugin;
use Spryker\Client\Calculation\CalculationClient;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Checkout\CheckoutClient;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Symfony\Component\HttpFoundation\Request;
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
            $this->createAddressStep(),
            $this->createShipmentSte(),
            $this->createPaymentStep(),
            $this->createSummaryStep(),
        ];
    }

    /**
     * @return AddressStep
     */
    protected function createAddressStep()
    {
        return new AddressStep(CheckoutControllerProvider::CHECKOUT_ADDRESS, ApplicationControllerProvider::ROUTE_HOME);
    }

    /**
     * @return ShipmentStep
     */
    protected function createShipmentSte()
    {
        return new ShipmentStep(CheckoutControllerProvider::CHECKOUT_SHIPMENT, ApplicationControllerProvider::ROUTE_HOME);
    }

    /**
     * @return PaymentStep
     */
    protected function createPaymentStep()
    {
        return new PaymentStep(CheckoutControllerProvider::CHECKOUT_PAYMENT, ApplicationControllerProvider::ROUTE_HOME);
    }

    /**
     * @return SummaryStep
     */
    protected function createSummaryStep()
    {
        return new SummaryStep(
            CheckoutControllerProvider::CHECKOUT_SUMMARY,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->getCalculationClient()
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
        $cartClient = $this->getCartClient();

        return new StepProcess(
            $application,
            $this->createSteps(),
            $cartClient
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
     * @return PaymentForm
     */
    public function createPaymentForm()
    {
        return new PaymentForm(
            $this->getPaymentMethodsSubForms()
        );
    }

    /**
     * @return array
     */
    public function getPaymentMethodsSubForms()
    {
        return [
            (new PayolutionInvoicePlugin())->createSubFrom(),
            (new PayolutionInstallmentPlugin())->createSubFrom(),
        ];
    }

    /**
     * @return CheckoutClient
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
     * @return PayolutionClientInterface
     */
    public function getPayolutionClient()
    {
        return $this->getLocator()->payolution()->client();
    }

    /**
     * @return CalculationClient
     */
    public function getCalculationClient()
    {
        return $this->getLocator()->calculation()->client();
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
