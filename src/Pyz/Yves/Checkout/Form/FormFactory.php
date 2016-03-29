<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Form;

use Pyz\Yves\Checkout\CheckoutDependencyProvider;
use Pyz\Yves\Checkout\Form\DataProvider\SubFormDataProviders;
use Pyz\Yves\Checkout\Form\Steps\PaymentForm;
use Pyz\Yves\Checkout\Form\Steps\ShipmentForm;
use Pyz\Yves\Checkout\Form\Steps\SummaryForm;
use Pyz\Yves\Customer\Form\CheckoutAddressCollectionForm;
use Pyz\Yves\Customer\Form\CustomerCheckoutForm;
use Pyz\Yves\Customer\Form\DataProvider\CheckoutAddressFormDataProvider;
use Pyz\Yves\Customer\Form\GuestForm;
use Pyz\Yves\Customer\Form\LoginForm;
use Pyz\Yves\Customer\Form\RegisterForm;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Checkout\Form\FormFactory as SprykerFormFactory;
use Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection;
use Spryker\Yves\StepEngine\Form\FormCollectionHandler;
use Symfony\Component\Form\FormTypeInterface;

class FormFactory extends SprykerFormFactory
{

    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createCustomerFormCollection()
    {
        return $this->createFormCollection($this->createCustomerFormTypes());
    }

    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createAddressFormCollection()
    {
        return $this->createFormCollection($this->createAddressFormTypes(), $this->createAddressFormDataProvider());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createShipmentFormCollection()
    {
        $shipmentSubForms = $this->createShipmentMethodsSubForms();
        $shipmentFormType = $this->createShipmentForm($shipmentSubForms);
        $subFormDataProvider = $this->createSubFormDataProvider($shipmentSubForms);

        return $this->createSubFormCollection($shipmentFormType, $subFormDataProvider);
    }

    /**
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createPaymentFormCollection()
    {
        $createPaymentSubForms = $this->createPaymentMethodSubForms();
        $paymentFormType = $this->createPaymentForm($createPaymentSubForms);
        $subFormDataProvider = $this->createSubFormDataProvider($createPaymentSubForms);

        return $this->createSubFormCollection($paymentFormType, $subFormDataProvider);
    }

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection $subForms
     *
     * @return \Pyz\Yves\Checkout\Form\DataProvider\SubFormDataProviders
     */
    protected function createSubFormDataProvider(SubFormPluginCollection $subForms)
    {
        return new SubFormDataProviders($subForms);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer
     *
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    public function createSummaryFormCollection()
    {
        return $this->createFormCollection($this->createSummaryFormTypes());
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createCustomerFormTypes()
    {
        return [
            $this->createLoginForm(),
            $this->createCustomerCheckoutForm($this->createRegisterForm()),
            $this->createCustomerCheckoutForm($this->createGuestForm()),
        ];
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $subForm
     *
     * @return \Pyz\Yves\Customer\Form\CustomerCheckoutForm
     */
    protected function createCustomerCheckoutForm(FormTypeInterface $subForm)
    {
        return new CustomerCheckoutForm($subForm);
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createAddressFormTypes()
    {
        return [
            new CheckoutAddressCollectionForm(),
        ];
    }

    /**
     * @return \Pyz\Yves\Customer\Form\DataProvider\CheckoutAddressFormDataProvider
     */
    protected function createAddressFormDataProvider()
    {
        return new CheckoutAddressFormDataProvider($this->getCustomerClient(), $this->createStore());
    }

    /**
     * @return \Symfony\Component\Form\FormTypeInterface[]
     */
    protected function createSummaryFormTypes()
    {
        return [
            $this->createSummaryForm(),
        ];
    }

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection $subForms
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\ShipmentForm
     */
    protected function createShipmentForm(SubFormPluginCollection $subForms)
    {
        return new ShipmentForm($subForms);
    }

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection
     */
    protected function createShipmentMethodsSubForms()
    {
        return $this->createShipmentFormPlugin();
    }

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection $subForms
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\PaymentForm
     */
    protected function createPaymentForm(SubFormPluginCollection $subForms)
    {
        return new PaymentForm($subForms);
    }

    /**
     * Move Braintree
     * @return \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    public function createPaymentMethodsSubForms()
    {
        return [
            $this->createBraintreePayPalSubFormPlugin(),
        ];
    }

    /**
     * @return \Pyz\Yves\Checkout\Form\Steps\SummaryForm
     */
    protected function createSummaryForm()
    {
        return new SummaryForm();
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface[] $formTypes
     * @param \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface|null $dataProvider
     *
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    protected function createFormCollection(array $formTypes, StepEngineFormDataProviderInterface $dataProvider = null)
    {
        return new FormCollectionHandler($formTypes, $this->getFormFactory(), $dataProvider);
    }

    /**
     * @param \Symfony\Component\Form\FormTypeInterface $formType
     * @param \Spryker\Yves\StepEngine\Dependency\Form\StepEngineFormDataProviderInterface $dataProvider
     *
     * @return \Spryker\Yves\StepEngine\Form\FormCollectionHandlerInterface
     */
    protected function createSubFormCollection($formType, StepEngineFormDataProviderInterface $dataProvider)
    {
        return new FormCollectionHandler([$formType], $this->getFormFactory(), $dataProvider);
    }

    /**
     * @return \Symfony\Component\Form\FormFactoryInterface
     */
    protected function getFormFactory()
    {
        return $this->getApplication()['form.factory'];
    }

    /**
     * @return \Spryker\Yves\Application\Application
     */
    protected function getApplication()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function createStore()
    {
        return Store::getInstance();
    }

    /**
     * @return \Pyz\Client\Customer\CustomerClient
     */
    protected function getCustomerClient()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @return \Pyz\Yves\Customer\Form\LoginForm
     */
    protected function createLoginForm()
    {
        return new LoginForm();
    }

    /**
<<<<<<< HEAD
     * @return \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection
=======
     * @return \Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin
     */
    protected function createPayolutionInvoiceSubFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_INVOICE_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin
     */
    protected function createPayolutionInstallmentSubFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_INSTALLMENT_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Braintree\Plugin\BraintreePayPalSubFormPlugin
     */
    protected function createBraintreePayPalSubFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_PAY_PAL_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin
>>>>>>> Add frontend part of Braintree.
     */
    protected function createShipmentFormPlugin()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::PLUGIN_SHIPMENT_SUB_FORM);
    }

    /**
     * @return \Pyz\Yves\Customer\Form\RegisterForm
     */
    protected function createRegisterForm()
    {
        return new RegisterForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\GuestForm
     */
    protected function createGuestForm()
    {
        return new GuestForm();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CheckoutDependencyProvider::CLIENT_CART);
    }

}
