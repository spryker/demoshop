<?php

namespace Pyz\Yves\Checkout;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Form\Multipage\AddressCollectionType;
use Pyz\Yves\Checkout\Form\Multipage\ShipmentType;
use Pyz\Yves\Checkout\Process\StepProcess;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\RegisterStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\StepInterface;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Checkout\Form\CheckoutType;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Shared\Config;
use Spryker\Shared\Payolution\PayolutionConstants;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;

class CheckoutFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Checkout\CheckoutClient
     */
    public function getCheckoutClient()
    {
        return $this->getLocator()->checkout()->client();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getLocator()->cart()->client();
    }

    /**
     * @return \Spryker\Client\Shipment\ShipmentClientInterface
     */
    public function getShipmentClient()
    {
        return $this->getLocator()->shipment()->client();
    }

    /**
     * @return \Spryker\Client\Glossary\GlossaryClientInterface
     */
    public function getGlossaryClient()
    {
        return $this->getLocator()->glossary()->client();
    }

    /**
     * @return \Spryker\Client\Payolution\PayolutionClientInterface
     */
    public function getPayolutionClient()
    {
        return $this->getLocator()->payolution()->client();
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\ShipmentTransfer $shipmentTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param CheckoutRequestTransfer $checkoutRequestTransfer
     *
     * @return \Pyz\Yves\Checkout\Form\CheckoutType
     */
    public function createCheckoutForm(
        Request $request,
        ShipmentTransfer $shipmentTransfer,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        CheckoutRequestTransfer $checkoutRequestTransfer
    ) {
        $formType = new CheckoutType(
            $request,
            $shipmentTransfer,
            $this->getGlossaryClient(),
            $payolutionCalculationResponseTransfer
        );
        return $this->getFormFactory()->create($formType, $checkoutRequestTransfer);
    }
    /**
     * @todo get rid of application dependecy.
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
        return new SummaryStep(CheckoutControllerProvider::CHECKOUT_SUMMARY, ApplicationControllerProvider::ROUTE_HOME);
    }

    /**
     * @return AddressCollectionType
     */
    public function createAddressCollectionType()
    {
       return new AddressCollectionType();
    }

    /**
     * @return ShipmentType
     */
    public function createShipmentType()
    {
        return new ShipmentType(
            $this->getGlossaryClient(),
            $this->getShipmentClient(),
            $this->getCartClient(),
            $this->getStore(),
            $this->getCurrencyManager()
        );
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
