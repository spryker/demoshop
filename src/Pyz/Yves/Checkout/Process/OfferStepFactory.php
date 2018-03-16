<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process;

use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Checkout\CheckoutDependencyProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Checkout\Process\Steps\AddressStep;
use Pyz\Yves\Checkout\Process\Steps\CustomerStep;
use Pyz\Yves\Checkout\Process\Steps\EntryStep;
use Pyz\Yves\Checkout\Process\Steps\Offer\PlaceOfferStep;
use Pyz\Yves\Checkout\Process\Steps\PaymentStep;
use Pyz\Yves\Checkout\Process\Steps\ShipmentStep;
use Pyz\Yves\Checkout\Process\Steps\SuccessStep;
use Pyz\Yves\Checkout\Process\Steps\SummaryStep;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper;
use Spryker\Yves\StepEngine\Process\StepCollection;

class OfferStepFactory extends StepFactory
{
    /**
     * @return \Spryker\Yves\StepEngine\Process\StepCollectionInterface
     */
    public function createStepCollection()
    {
        $stepCollection = new StepCollection(
            $this->getUrlGenerator(),
            CheckoutControllerProvider::CHECKOUT_ERROR
        );

        $stepCollection
            ->addStep($this->createEntryStep())
            ->addStep($this->createCustomerStep())
            ->addStep($this->createAddressStep())
            ->addStep($this->createShipmentStep())
            ->addStep($this->createPaymentStep())
            ->addStep($this->createSummaryStep())
            ->addStep($this->createPlaceOfferStep())
            ->addStep($this->createSuccessStep());

        return $stepCollection;
    }

    /**
     * @return \Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper
     */
    public function createProductBundleGrouper()
    {
        return new ProductBundleGrouper();
    }

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginCollection
     */
    public function getShipmentPlugins()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_SHIPMENT_HANDLER);
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\EntryStep
     */
    protected function createEntryStep()
    {
        return new EntryStep(
            CheckoutControllerProvider::CHECKOUT_OFFER_INDEX,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\CustomerStep
     */
    protected function createCustomerStep()
    {
        return new CustomerStep(
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER),
            $this->getCustomerStepHandler(),
            CheckoutControllerProvider::CHECKOUT_OFFER_CUSTOMER,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->getApplication()->path(CustomerControllerProvider::ROUTE_LOGOUT)
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\AddressStep
     */
    protected function createAddressStep()
    {
        return new AddressStep(
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER),
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CALCULATION),
            CheckoutControllerProvider::CHECKOUT_OFFER_ADDRESS,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\ShipmentStep
     */
    protected function createShipmentStep()
    {
        return new ShipmentStep(
            $this->getCalculationClient(),
            $this->getShipmentPlugins(),
            CheckoutControllerProvider::CHECKOUT_OFFER_SHIPMENT,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PaymentStep
     */
    protected function createPaymentStep()
    {
        return new PaymentStep(
            $this->getPaymentClient(),
            $this->createPaymentMethodHandler(),
            CheckoutControllerProvider::CHECKOUT_OFFER_PAYMENT,
            ApplicationControllerProvider::ROUTE_HOME,
            $this->getFlashMessenger(),
            $this->getCalculationClient()
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\SummaryStep
     */
    protected function createSummaryStep()
    {
        return new SummaryStep(
            $this->createProductBundleGrouper(),
            $this->getCartClient(),
            CheckoutControllerProvider::CHECKOUT_OFFER_SUMMARY,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\PlaceOrderStep
     */
    protected function createPlaceOfferStep()
    {
        return new PlaceOfferStep(
            $this->getCheckoutClient(),
            $this->getFlashMessenger(),
            CheckoutControllerProvider::CHECKOUT_PLACE_OFFER,
            ApplicationControllerProvider::ROUTE_HOME,
            [
                'payment failed' => CheckoutControllerProvider::CHECKOUT_PAYMENT,
            ]
        );
    }

    /**
     * @return \Pyz\Yves\Checkout\Process\Steps\SuccessStep
     */
    protected function createOfferSuccessStep()
    {
        return new SuccessStep(
            $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER),
            $this->getCartClient(),
            CheckoutControllerProvider::CHECKOUT_OFFER_SUCCESS,
            ApplicationControllerProvider::ROUTE_HOME
        );
    }
}
